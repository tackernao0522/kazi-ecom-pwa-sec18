<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function AllCategory()
    {
        $categories = Category::all();
        $categoryDetailsArray = [];

        foreach ($categories as $value) {
            $subcategory = Subcategory::where('category_name', $value->category_name)->get();

            $item = [
                'category_name' => $value->category_name,
                'category_image' => $value->category_image,
                'subcategory_name' => $subcategory,
            ];

            array_push($categoryDetailsArray, $item);
        }

        return $categoryDetailsArray;
    }

    public function getAllCategory()
    {
        $categories = Category::latest()->get();

        return view('backend.category.category_view', compact('categories'));
    }

    public function addCategory()
    {
        return view('backend.category.category_add');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ], [
            'category_name.required' => 'Input Category Name',
        ]);

        $image = $request->file('category_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalName();
        Image::make($image)->resize(128, 128)->save('upload/category/' . $name_gen);
        $save_url = 'http://localhost/upload/category/' . $name_gen;

        Category::insert([
            'category_name' => $request->category_name,
            'category_image' => $save_url,
        ]);

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.category')->with($notification);
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);

        return view('backend.category.category_edit', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        if ($request->file('category_image')) {
            $image = $request->file('category_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalName();
            Image::make($image)->resize(128, 128)->save('upload/category/' . $name_gen);
            $save_url = 'http://localhost/upload/category/' . $name_gen;

            $category->category_name = $request->category_name;
            $category->category_image = $save_url;
            $category->save();

            $notification = array(
                'message' => 'Category Update With Image Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('all.category')->with($notification);
        } else {
            $category->category_name = $request->category_name;
            $category->save();

            $notification = array(
                'message' => 'Category Updated Without Image Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('all.category')->with($notification);
        }
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function getAllSubCategory()
    {
        $subCategories = Subcategory::latest()->get();

        return view('backend.subCategory.subCategory_view', compact('subCategories'));
    }

    public function addSubCategory()
    {
        $categories = Category::latest()->get();

        return view('backend.subCategory.subCategory_add', compact('categories'));
    }

    public function storeSubCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'subcategory_name' => 'required',
        ], [
            'category_name.required' => 'Input Category Name',
            'subcategory_name.required' => 'Input SubCategory Name',
        ]);

        Subcategory::insert([
            'category_name' => $request->category_name,
            'subcategory_name' => $request->subcategory_name,
        ]);

        $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.subcategory')->with($notification);
    }

    public function editSubCategory($id)
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $subCategory = Subcategory::findOrFail($id);

        return view(
            'backend.subCategory.subCategory_edit',
            compact(
                'categories',
                'subCategory'
            )
        );
    }

    public function updateSubCategory(Request $request, $id)
    {
        $subCategory = Subcategory::findOrFail($id);

        $request->validate([
            'category_name' => 'required',
            'subcategory_name' => 'required',
        ], [
            'category_name.required' => 'Input Category Name',
            'subcategory_name.required' => 'Input SubCategory Name',
        ]);

        $subCategory->category_name = $request->category_name;
        $subCategory->subcategory_name = $request->subcategory_name;
        $subCategory->save();

        $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.subcategory')->with($notification);
    }

    public function deleteSubCategory($id)
    {
        $subCategory = Subcategory::findOrFail($id);
        $subCategory->delete();

        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'error',
        );

        return redirect()->back()->with($notification);
    }
}
