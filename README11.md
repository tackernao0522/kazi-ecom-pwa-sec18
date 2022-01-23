# Section44: Product Order History Option Setup

## 410 Product Order History Part1

- `routes/api.php`を編集<br>

```php:api.php
<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FavoriteController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ProductCartController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\ProductListController;
use App\Http\Controllers\Admin\ProductReviewController;
use App\Http\Controllers\Admin\SiteInfoController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\ForgetPasswordController;
use App\Http\Controllers\User\ResetPasswordController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// --------- User Login API Start -------------
// Login Routes
Route::post('/login', [AuthController::class, 'login']);
// Register Routes
Route::post('/register', [AuthController::class, 'register']);
// Forget Password Routes
Route::post('/forgetpassword', [
  ForgetPasswordController::class,
  'forgetPassword',
]);
// Reset Password Routes
Route::post('/resetpassword', [
  ResetPasswordController::class,
  'resetPassword',
]);
// Current User Route
Route::get('/user', [UserController::class, 'user'])->middleware('auth:api');
// --------- End User Login API ---------

// Get Visitor
Route::get('/getvisitor', [VisitorController::class, 'getVisitorDetails']);
// Contact Page Route
Route::post('/postcontact', [ContactController::class, 'postContactDetails']);
// Site Info Route
Route::get('/allsiteinfo', [SiteInfoController::class, 'allSiteInfo']);
// All Category Route
Route::get('/allcategory', [CategoryController::class, 'AllCategory']);
// ProductList Route
Route::get('/productlistbyremark/{remark}', [
  ProductListController::class,
  'productListByRemark',
]);
Route::get('/productlistbycategory/{category}', [
  ProductListController::class,
  'productListByCategory',
]);
Route::get('/productlistbysubcategory/{category}/{subcategory}', [
  ProductListController::class,
  'productListBySubCategory',
]);
// Slider Route
Route::get('/allslider', [SliderController::class, 'allSlider']);
// Product Details Route
Route::get('/productdetails/{id}', [
  ProductDetailController::class,
  'productDetails',
]);
// Notifications Route
Route::get('/notification', [
  NotificationController::class,
  'notificationHistory',
]);
// Search Route
Route::get('/search/{key}', [ProductListController::class, 'productBySearch']);
// Similar Product Route
Route::get('/similar/{subcategory}', [
  ProductListController::class,
  'similarProduct',
]);
// Review Product Route
Route::get('/reviewlist/{id}', [ProductReviewController::class, 'reviewList']);
// Product Cart Route
Route::post('/addtocart', [ProductCartController::class, 'addToCart']);
// Cart Count Route
Route::get('/cartcount/{product_code}', [
  ProductCartController::class,
  'cartCount',
]);
// Favorite Route
Route::get('/favorite/{product_code}/{email}', [
  FavoriteController::class,
  'addFavorite',
]);
Route::get('/favoritelist/{email}', [
  FavoriteController::class,
  'favoriteList',
]);
Route::get('/favoriteremove/{product_code}/{email}', [
  FavoriteController::class,
  'favoriteRemove',
]);
// Cart List Route
Route::get('/cartlist/{email}', [ProductCartController::class, 'cartList']);
Route::get('/removecartlist/{id}', [
  ProductCartController::class,
  'removeCartList',
]);
Route::get('/cartitemplus/{id}/{quantity}/{price}', [
  ProductCartController::class,
  'cartItemPlus',
]);
Route::get('/cartitemminus/{id}/{quantity}/{price}', [
  ProductCartController::class,
  'cartItemMinus',
]);
// Cart Order Route
Route::post('/cartorder', [ProductCartController::class, 'cartOrder']);
Route::get('/orderlistbyuser/{email}', [
  ProductCartController::class,
  'orderListByUser',
]);
```

- `POSTMAN(GET) http://localhost/api/orderlistbyuser/takaki_5573031@yahoo.co.jp`<br>

```
[
    {
        "id": 13,
        "invoice_no": "Easy1642586217937",
        "product_name": "OnePlus Y Series 100 cm (40 inch)",
        "product_code": "231334",
        "size": "Size: S",
        "color": "Color: White",
        "quantity": "01",
        "unit_price": "2500",
        "total_price": "2500",
        "email": "takaki_5573031@yahoo.co.jp",
        "name": "Naomi",
        "payment_method": "Cash On Delivery",
        "delivery_address": "布田2-18-2-103",
        "city": "Dhaka",
        "delivery_charge": "00",
        "order_date": "19-01-2022",
        "order_time": "06:57:00pm",
        "order_status": "Pending",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 12,
        "invoice_no": "Easy1642586217937",
        "product_name": "POCO M3 (Power Black, 64 GB)",
        "product_code": "446464645",
        "size": "Size: L",
        "color": "Color: Black",
        "quantity": "06",
        "unit_price": "2500",
        "total_price": "15000",
        "email": "takaki_5573031@yahoo.co.jp",
        "name": "Naomi",
        "payment_method": "Cash On Delivery",
        "delivery_address": "布田2-18-2-103",
        "city": "Dhaka",
        "delivery_charge": "00",
        "order_date": "19-01-2022",
        "order_time": "06:57:00pm",
        "order_status": "Pending",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 11,
        "invoice_no": "Easy1642586217937",
        "product_name": "APPLE ALL IN ONE Core i5 (5th Gen) ",
        "product_code": "542367",
        "size": "Size: L",
        "color": "Color: Red",
        "quantity": "03",
        "unit_price": "11000",
        "total_price": "33000",
        "email": "takaki_5573031@yahoo.co.jp",
        "name": "Naomi",
        "payment_method": "Cash On Delivery",
        "delivery_address": "布田2-18-2-103",
        "city": "Dhaka",
        "delivery_charge": "00",
        "order_date": "19-01-2022",
        "order_time": "06:57:00pm",
        "order_status": "Pending",
        "created_at": null,
        "updated_at": null
    }
]
```
