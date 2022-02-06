<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductDetail;
use App\Models\ProductList;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductListController extends Controller
{
    public function productListByRemark(Request $request)
    {
        $remark = $request->remark;
        $productlist = ProductList::where('remark', $remark)->limit(8)->get();

        return $productlist;
    }

    public function productListByCategory(Request $request)
    {
        $category = $request->category;
        $productlist = ProductList::where('category', $category)->get();

        return $productlist;
    }

    public function productListBySubCategory(Request $request)
    {
        $category = $request->category;
        $subCategory = $request->subcategory;
        $productlist = ProductList::where('category', $category)
            ->where('subcategory', $subCategory)
            ->get();

        return $productlist;
    }

    public function productBySearch(Request $request)
    {
        $key = $request->key;
        $productlist = ProductList::where('title', 'LIKE', "%{$key}%")
            ->orWhere('brand', 'LIKE', "%{$key}%")->get();

        return $productlist;
    }

    public function similarProduct(Request $request)
    {
        $subcategory = $request->subcategory;
        $productlist = ProductList::where('subcategory', $subcategory)
            ->orderBy('id', 'desc')
            ->limit(6)
            ->get();

        return $productlist;
    }

    public function getAllProduct()
    {
        $products = ProductList::latest()->paginate(10);

        return view('backend.product.product_all', compact('products'));
    }

    public function addProduct()
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $subCategories = Subcategory::orderBy('subcategory_name', 'ASC')->get();

        return view('backend.product.product_add', compact('categories', 'subCategories'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'product_code' => 'required',
        ], [
            'product_code.required' => 'Input Product Code'
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalName();
        Image::make($image)->resize(711, 960)->save('upload/product/' . $name_gen);
        $save_url = 'http://localhost/upload/product/' . $name_gen;

        $product = ProductList::insertGetId([
            'title' => $request->title,
            'price' => $request->price,
            'special_price' => $request->special_price,
            'category' => $request->category,
            'subcategory' => $request->subcategory,
            'remark' => $request->remark,
            'brand' => $request->brand,
            'product_code' => $request->product_code,
            'image' => $save_url,
        ]);

        $image1 = $request->file('image_one');
        $name_gen1 = hexdec(uniqid()) . '.' . $image1->getClientOriginalName();
        Image::make($image1)->resize(711, 960)->save('upload/product_details/' . $name_gen1);
        $save_url1 = 'http://localhost/upload/product_details/' . $name_gen1;

        $image2 = $request->file('image_two');
        $name_gen2 = hexdec(uniqid()) . '.' . $image2->getClientOriginalName();
        Image::make($image2)->resize(711, 960)->save('upload/product_details/' . $name_gen2);
        $save_url2 = 'http://localhost/upload/product_details/' . $name_gen2;

        $image3 = $request->file('image_three');
        $name_gen3 = hexdec(uniqid()) . '.' . $image3->getClientOriginalName();
        Image::make($image3)->resize(711, 960)->save('upload/product_details/' . $name_gen3);
        $save_url3 = 'http://localhost/upload/product_details/' . $name_gen3;

        $image4 = $request->file('image_four');
        $name_gen4 = hexdec(uniqid()) . '.' . $image4->getClientOriginalName();
        Image::make($image4)->resize(711, 960)->save('upload/product_details/' . $name_gen4);
        $save_url4 = 'http://localhost/upload/product_details/' . $name_gen4;

        ProductDetail::insert([
            'product_id' => $product,
            'image_one' => $save_url1,
            'image_two' => $save_url2,
            'image_three' => $save_url3,
            'image_four' => $save_url4,
            'short_description' => $request->short_description,
            'color' => $request->color,
            'size' => $request->size,
            'long_description' => $request->long_description,
        ]);

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.product')->with($notification);
    }

    public function editProduct($id)
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $subCategories = Subcategory::orderBy('subcategory_name', 'ASC')->get();
        $product = ProductList::findOrFail($id);
        $details = ProductDetail::where('product_id', $id)->get();

        return view('backend.product.product_edit', compact(
            'categories',
            'subCategories',
            'product',
            'details',
        ));
    }
}
