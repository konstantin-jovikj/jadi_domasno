<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function viewCategories()
    {
        $categories = Category::all();
        return view('bootstrap_views.dashboards.admincategory', compact('categories'));
    }

    public function addCategoryForm()
    {
        return view('bootstrap_views.dashboards.addcategory');
    }

    public function storeCategory(CategoryRequest $request)
    {
        $category = new Category();
        $category->category_name = $request->category_name;

        $category->save();
        return redirect()->route('view.category')->with('success', 'New Category Sucessfully added to the list!');
    }

    public function editCategory($category)
    {
        $editedCategory = Category::find($category);
        return view('bootstrap_views.dashboards.editcategory', compact('editedCategory'));
    }

    public function updateCategory(CategoryRequest $request, $category)
    {
        $category = Category::find($category);
        $category->category_name = $request->category_name;

        $category->save();
        return redirect()->route('view.category')->with('success', 'The Category is Sucessfully updated!');
    }

    public function destroyCategory(Category $category)
    {
        if ($category->delete()) {
            return ['success' => 'The category is successfuly deleted !!!'];
        } else {
            return ['error' => 'Somethign went wrong!!'];
        }
    }
}
