<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductDetail;
use App\Models\ProductList;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function productDetails(Request $request, $id)
    {
        $id = $request->id;
        $productDetails = ProductDetail::where('product_id', $id)->get();
        $productList = ProductList::where('id', $id)->get();

        $item = [
            'productDetails' => $productDetails,
            'productList' => $productList,
        ];

        return $item;
    }
}
