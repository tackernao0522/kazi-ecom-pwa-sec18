<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductList;
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
}
