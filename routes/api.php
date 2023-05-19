<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CookController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlergenController;
use App\Http\Controllers\APIUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SpicinessController;
use App\Http\Controllers\StatusListController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SubscriberController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::middleware('auth::sanctum')->group(function(){

// });


// Delete za Admin Dashboard
    Route::delete('/user/archive/{user}', [AdminController::class, 'destroy'])->name('delete.profile'); // Archive User
    Route::delete('/user/delete/{id}', [AdminController::class, 'deleteUser'])->name('delete.user'); // Permanently Delete User

    Route::delete('/dish/delete/{dish}', [CookController::class, 'destroyDish'])->name('delete.dish'); // Delete Dish

    Route::delete('/alergen/delete/{alergen}', [AlergenController::class, 'destroyAlergen'])->name('delete.alergen'); // Delete Alergen
    Route::delete('/municipality/delete/{municipality}', [MunicipalityController::class, 'destroyMunicipality'])->name('delete.municipality'); // Delete Municipality
    Route::delete('/category/delete/{category}', [CategoryController::class, 'destroyCategory'])->name('delete.category'); // Delete Category
    Route::delete('/spiciness/delete/{spiciness}', [SpicinessController::class, 'destroySpiciness'])->name('delete.spiciness'); // Delete Spiciness Level
    Route::delete('/status/delete/{status}', [StatusListController::class, 'destroyStatus'])->name('delete.status'); // Delete Status Level

    Route::delete('/offer/delete/{offer}', [OfferController::class, 'destroyOffer'])->name('delete.offer');

// Home Page route

Route::get('/home', [UserController::class, 'index'])->name('homepage');

//Cooks Page route

Route::get('/cooks', [MenuController::class, 'indexCooks'])->name('cooks');


// Menu Page route

Route::get('/dishes', [MenuController::class, 'indexDishes'])->name('list.alldishes');


//Add to Cart and make Order

Route::post('/cart/add/{dishid}', [CartController::class, 'addToCart'])->name('add.cart');

Route::middleware('auth::sanctum')->group(function () {
    Route::post('/makeorder', [CartController::class, 'makeOrder'])->name('make.order');
    Route::post('/update/{user}', [APIUserController::class, 'update'])->name('APIupdate.user');
    Route::post('/comment/{id}', [UserController::class, 'commentsAndRatings'])->name('commentandrate.dish');
});

// Login and Register

Route::post('/register', [APIUserController::class, 'register'])->name('APIregister.user');

Route::post('/login', [APIUserController::class, 'APIloginUser'])->name('APILogin.user');


//Save Subscriber to Database

Route::get('/createsubscriber', [SubscriberController::class, 'createSubscriber'])->name('create.subscriber');

Route::post('/addsubscriber', [SubscriberController::class, 'storeSubscriber'])->name('store.subscriber');
Route::delete('/unsubscribe/{id}', [SubscriberController::class, 'unsubscribe'])->name('unsubscribe'); // unsubscribe



//view dish from Notification email
Route::get('/view/newdish/{id}', [AdminController::class, 'viewDish'])->name('view_new_dish.dishdetails');


//search route

Route::get('/search/{search_data}', [SearchController::class, 'search'])->name('search');
