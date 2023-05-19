<?php

use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AlergenController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SpicinessController;
use App\Http\Controllers\StatusListController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\MunicipalityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/activate/{id}/{token}', [UserController::class, 'activate'])->name('activate');

// Route::get('/dashboard', function () {
//     // return view('dashboard');
//     return view('bootstrap_views.dashboards.admin');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'verified','admin')->group(function(){
    Route::get('/dashboard', [AdminController::class, 'getUsers'])->name('dashboard');
    Route::get('/profile/{user}', [AdminController::class, 'viewUser'])->name('view.user');
    Route::get('/archivedusers', [AdminController::class, 'archivedUsers'])->name('view.archivedusers');
    Route::post('/restore/user/{id}', [AdminController::class, 'restoreUser'])->name('restore.user');


    Route::get('/alergens',[AlergenController::class, 'viewAlergens'])->name('view.alergens');
    Route::get('/alegen/add', [AlergenController::class, 'addAlergenForm'])->name('add.alergen');
    Route::post('/alegen/store', [AlergenController::class, 'storeAlergen'])->name('store.alergen');
    Route::get('/alegen/edit/{alergen}', [AlergenController::class, 'editAlergen'])->name('edit.alergen');
    Route::put('/alegen/update/{alergen}', [AlergenController::class, 'updateAlergen'])->name('update.alergen');

    Route::get('/municipalities', [MunicipalityController::class, 'viewMunicipalities'])->name('view.municipalities');
    Route::get('/municipality/add', [MunicipalityController::class, 'addMunicipalityForm'])->name('add.municipality');
    Route::post('/municipality/store', [MunicipalityController::class, 'storeMunicipality'])->name('store.municipality');
    Route::get('/municipality/edit/{municipality}', [MunicipalityController::class, 'editMunicipality'])->name('edit.municipality');
    Route::put('/municipality/update/{municipality}', [MunicipalityController::class, 'updateMunicipality'])->name('update.municipality');

    Route::get('/categories', [CategoryController::class, 'viewCategories'])->name('view.category');
    Route::get('/category/add', [CategoryController::class, 'addCategoryForm'])->name('add.category');
    Route::post('/category/store', [CategoryController::class, 'storeCategory'])->name('store.category');
    Route::get('/category/edit/{category}', [CategoryController::class, 'editCategory'])->name('edit.category');
    Route::put('/category/update/{category}', [CategoryController::class, 'updateCategory'])->name('update.category');

    Route::get('/spicines', [SpicinessController::class, 'viewSpicines'])->name('view.spicy');
    Route::get('/spiciness/add', [SpicinessController::class, 'addSpiciness'])->name('add.spiciness');
    Route::post('/spiciness/store', [SpicinessController::class, 'storeSpiciness'])->name('store.spiciness');
    Route::get('/spiciness/edit/{spiciness}', [SpicinessController::class, 'editSpiciness'])->name('edit.spiciness');
    Route::put('/spiciness/update/{spiciness}', [SpicinessController::class, 'updateSpiciness'])->name('update.spiciness');

    Route::get('/statuses', [StatusListController::class, 'viewStatusList'])->name('view.status');
    Route::get('/status/add', [StatusListController::class, 'addStatus'])->name('add.status');
    Route::post('/status/store', [StatusListController::class, 'storeStatus'])->name('store.status');
    Route::get('/status/edit/{status}', [StatusListController::class, 'editStatus'])->name('edit.status');
    Route::put('/status/update/{status}', [StatusListController::class, 'updateStatus'])->name('update.status');

    Route::get('/alldishes', [AdminController::class, 'listDishes'])->name('view.dishes');
    Route::get('/view/dish/{id}', [AdminController::class, 'viewDish'])->name('view.dishdetails');

    Route::get('/orders', [AdminController::class, 'viewAllOrders'])->name('orders');
    Route::get('/order/{id}/cart', [AdminController::class, 'viewOrderDetails'])->name('order.details');
    Route::get('/view/subscribers', [AdminController::class, 'viewSuscribers'])->name('view.subscribers');
    Route::get('/restore/subscriber/{id}', [AdminController::class, 'restoreSubscriber'])->name('restore.subscriber');
    Route::delete('/trash/subscriber/{id}', [AdminController::class, 'trashSubscriber'])->name('trash.subscriber');
    Route::delete('/destroy/subscriber/{id}', [AdminController::class, 'destroySubscriber'])->name('destroy.subscriber');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/status/{id}', [AdminController::class, 'changeStatus'])->name('change.status'); //Activate/Deactivate User


Route::get('/user/edit/{user}', [AdminController::class, 'edit'])->name('edit.profile'); //Edite User

Route::get('/validation/{email}/{code}', [UserController::class, 'activateUser'])->name('user.activate');


Route::middleware('auth', 'verified','cook')->group(function(){
    Route::get('/cook', [CookController::class, 'index'])->name('list.dishes');
    Route::get('/newdish', [CookController::class, 'newDishCreate'])->name('create.dish');
    Route::get('/edit/dish/{dish}', [CookController::class, 'editDish'])->name('edit.dish');
    Route::put('/update/dish/{dish}', [CookController::class, 'updateDish'])->name('update.dish');
    Route::post('newdish/add', [CookController::class, 'store'])->name('add.dish');
    Route::get('getdish/{dish}', [CookController::class, 'createAvailableDates'])->name('create.dates');
    Route::post('dish/{curentDish}', [CookController::class, 'storeDishDates'])->name('available.date');
    Route::delete('/date/delete/{date}', [CookController::class, 'destroyDate'])->name('delete.date');

    Route::get('/receivedorders/cook', [CookController::class, 'receivedOrders'])->name('received.orders');

    Route::get('orderdetail/cook/{id}', [CookController::class, 'cookOrderDetails'])->name('cook_order.details');

    Route::get('get/status/order/{id}', [OrderController::class, 'getStatus'])->name('get.status');
    Route::put('update/status/order/{id}', [OrderController::class, 'updateOrderStatus'])->name('update_order.status');

});


Route::middleware('auth', 'verified')->group(function(){
    Route::get('user', [UserController::class, 'userDashboard'])->name('userDashboard');
    Route::get('offers', [OfferController::class, 'viewOffers'])->name('view.offers');
    Route::get('createoffer', [OfferController::class, 'createOffer'])->name('create.offer');
    Route::post('offer', [OfferController::class, 'storeOffer'])->name('store.offer');

    Route::get('/orders/user/', [UserController::class, 'viewOrders'])->name('user.orders');
    Route::get('orderdetail/user/{id}', [UserController::class, 'orderDetails'])->name('user_order.details');

});

// Route::get('/createsubscriber', [SubscriberController::class, 'createSubscriber'])->name('create.subscriber');

// Route::post('/addsubscriber', [SubscriberController::class, 'storeSubscriber'])->name('store.subscriber');



