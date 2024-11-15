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

## 411 Product Order History Part2

- `React Project`を編集<br>

# Section45: Product Review Option Setup

## 414 Post Product Review Part1

- `create_product_reviews_table.php`を編集<br>

```php:create_product_reviews_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductReviewsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('product_reviews', function (Blueprint $table) {
      $table->id();
      $table->string('product_code'); // 編集
      $table->string('product_name');
      $table->string('reviewer_name');
      $table->string('reviewer_photo')->nullable(); // 編集
      $table->string('reviewer_rating');
      $table->text('reviewer_comments');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('product_reviews');
  }
}
```

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
// Post Product Review Route
Route::post('/postreview', [ProductReviewController::class, 'postReview']);
```

- `app/Http/Controllers/Admin/ProductReviewController.php`を編集<br>

```php:ProductReviewController.php
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
      ->limit(4)
      ->get();

    return $result;
  }

  public function postReview(Request $request)
  {
    // 追記
    $product_name = $request->input('product_name');
    $product_code = $request->input('product_code');
    $user_name = $request->input('reviewer_name');
    $reviewer_photo = $request->input('reviewer_photo');
    $reviewer_rating = $request->input('reviewer_rating');
    $reviewer_comments = $request->input('reviewer_comments');

    $result = ProductReview::insert([
      'product_name' => $product_name,
      'product_code' => $product_code,
      'reviewer_name' => $user_name,
      'reviewer_photo' => $reviewer_photo,
      'reviewer_rating' => $reviewer_rating,
      'reviewer_comments' => $reviewer_comments,
    ]);

    return $result;
  }
}
```

## 415 Post Product Review Part2

- `React Project`を編集<br>

## 417 Post Product Review Part4

- `routes/api.php`を修正<br>

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
// Post Product Review Route
Route::post('/postreview', [ProductReviewController::class, 'postReview']);
// Review Product Route
Route::get('/reviewlist/{product_code}', [
  ProductReviewController::class,
  'reviewList',
]); // 最下部に移動してparameterを変更
```

- `app/Http/Controllers/Admin/ProductReviewController.php`を編集<br>

```php:ProductReviewController.php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
  public function reviewList(Request $request)
  {
    $product_code = $request->product_code;

    $result = ProductReview::where('product_code', $product_code) // 修正
      ->orderBy('id', 'desc')
      ->limit(4)
      ->get();

    return $result;
  }

  public function postReview(Request $request)
  {
    $product_name = $request->input('product_name');
    $product_code = $request->input('product_code');
    $user_name = $request->input('reviewer_name');
    $reviewer_photo = $request->input('reviewer_photo');
    $reviewer_rating = $request->input('reviewer_rating');
    $reviewer_comments = $request->input('reviewer_comments');

    $result = ProductReview::insert([
      'product_name' => $product_name,
      'product_code' => $product_code,
      'reviewer_name' => $user_name,
      'reviewer_photo' => $reviewer_photo,
      'reviewer_rating' => $reviewer_rating,
      'reviewer_comments' => $reviewer_comments,
    ]);

    return $result;
  }
}
```

- `Laravel Project`を編集<br>
