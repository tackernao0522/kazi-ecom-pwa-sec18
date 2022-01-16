<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\ProductList;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function addFavorite(Request $request)
    {
        $product_code = $request->product_code;
        $email = $request->email;
        $productDetails = ProductList::where('product_code', $product_code)->get();

        $result = Favorite::insert([
            'product_name' => $productDetails[0]['title'],
            'image' => $productDetails[0]['image'],
            'product_code' => $product_code,
            'email' => $email,
        ]);

        return $result;
    }

    public function favoriteList(Request $request)
    {
        $email = $request->email;

        $result = Favorite::where('email', $email)->get();

        return $result;
    }
}
