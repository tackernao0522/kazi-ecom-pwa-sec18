<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductList;
use App\Models\Subcategory;
use Illuminate\Http\Request;

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
}
