<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function reviewList(Request $request)
    {
        $id = $request->id;

        $result = ProductReview::where('product_id', $id)
            ->orderBy('id', 'desc')
            ->limit(4)->get();

        return $result;
    }
}
