<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class adminCategoryController extends Controller
{
    protected function validateCategory(?Category $category=null){
        return request()->validate([
            'name' => ['required','min:7','max:255',Rule::unique('categories','name')->ignore($category)],
        ]);
    }

    public function allCategory(){
        return view('admin.category.all',['categories'=>Category::all()]);
    }

    public function createCategory(){
        return view('admin.category.edit_create');
    }

    public function storeCategory(){
        Category::create($this->validateCategory());
        return redirect('admin/categories/all');
    }

    public function editCategory(Category $category){
        return view('admin.category.edit_create',['category'=>$category]);
    }

    public function updateCategory(Category $category){
        $category->update($this->validateCategory($category));
        return redirect('admin/categories/all');
    }

    public function deleteCategory(Category $category){
        $category->forceDelete();
        return back();
    }
}
