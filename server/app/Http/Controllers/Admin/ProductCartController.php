<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CartOrder;
use App\Models\ProductCart;
use App\Models\ProductList;
use Illuminate\Http\Request;

class ProductCartController extends Controller
{
    public function addToCart(Request $request)
    {
        $email = $request->input('email');
        $size = $request->input('size');
        $color = $request->input('color');
        $quantity = $request->input('quantity');
        $product_code = $request->input('product_code');

        $productDetails = ProductList::where('product_code', $product_code)->get();
        $price = $productDetails[0]['price'];
        $special_price = $productDetails[0]['special_price'];

        if ($special_price === 'na') {
            $total_price = $price * $quantity;
            $unit_price = $price;
        } else {
            $total_price = $special_price * $quantity;
            $unit_price = $special_price;
        }

        $result = ProductCart::insert([
            'email' => $email,
            'image' => $productDetails[0]['image'],
            'product_name' => $productDetails[0]['title'],
            'product_code' => $productDetails[0]['product_code'],
            'size' => "Size: " . $size,
            'color' => "Color: " . $color,
            'quantity' => $quantity,
            'unit_price' => $unit_price,
            'total_price' => $total_price,
        ]);

        return $result;
    }

    public function cartCount(Request $request)
    {
        $product_code = $request->product_code;
        $result = ProductCart::count();

        return $result;
    }

    public function cartList(Request $request)
    {
        $email = $request->email;
        $result = ProductCart::where('email', $email)->get();

        return $result;
    }

    public function removeCartList(Request $request)
    {
        $id = $request->id;
        $result = ProductCart::where('id', $id)->delete();

        return $result;
    }

    public function cartItemPlus(Request $request)
    {
        $id = $request->id;
        $quantity = $request->quantity;
        $price = $request->price;
        $newQuantity = $quantity + 1;
        $total_price = $newQuantity * $price;

        $result = ProductCart::where('id', $id)
            ->update(['quantity' => $newQuantity, 'total_price' => $total_price]);

        return $result;
    }

    public function cartItemMinus(Request $request)
    {
        $id = $request->id;
        $quantity = $request->quantity;
        $price = $request->price;
        $newQuantity = $quantity - 1;
        $total_price = $newQuantity * $price;

        $result = ProductCart::where('id', $id)
            ->update(['quantity' => $newQuantity, 'total_price' => $total_price]);

        return $result;
    }

    public function cartOrder(Request $request)
    {
        $city = $request->input('city');
        $paymentMethod = $request->input('payment_method');
        $yourName = $request->input('name');
        $email = $request->input('email');
        $deliveryAddress = $request->input('delivery_address');
        $invoice_no = $request->input('invoice_no');
        $deliveryCharge = $request->input('delivery_charge');

        date_default_timezone_set("Asia/Tokyo");
        $request_time = date("h:i:sa");
        $request_date = date("d-m-Y");

        $cartList = ProductCart::where('email', $email)->get();

        foreach ($cartList as $cartListItem) {
            $cartInsertDeleteResult = "";

            $resultInsert = CartOrder::insert([
                'invoice_no' => "Easy" . $invoice_no,
                'product_name' => $cartListItem['product_name'],
                'product_code' => $cartListItem['product_code'],
                'size' => $cartListItem['size'],
                'color' => $cartListItem['color'],
                'quantity' => $cartListItem['quantity'],
                'unit_price' => $cartListItem['unit_price'],
                'total_price' => $cartListItem['total_price'],
                'email' => $cartListItem['email'],
                'name' => $yourName,
                'payment_method' => $paymentMethod,
                'delivery_address' => $deliveryAddress,
                'city' => $city,
                'delivery_charge' => $deliveryCharge,
                'order_date' => $request_date,
                'order_time' => $request_time,
                'order_status' => "Pending",
            ]);

            if ($resultInsert == 1) {
                $resultDelete = ProductCart::where('id', $cartListItem['id'])->delete();
                if ($resultDelete == 1) {
                    $cartInsertDeleteResult = 1;
                } else {
                    $cartInsertDeleteResult = 0;
                }
            }
        }

        return $cartInsertDeleteResult;
    }

    public function orderListByUser(Request $request)
    {
        $email = $request->email;
        $result = CartOrder::where('email', $email)
            ->orderBy('id', 'DESC')
            ->get();

        return $result;
    }

    public function pendingOrder()
    {
        $orders = CartOrder::where('order_status', 'Pending')
            ->orderBy('id', 'DESC')
            ->get();

        return view('backend.orders.pending_orders', compact('orders'));
    }
}
