## 403 Cart Item Plus Minus Part1

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
```

- `app/Http/Controllers/Admin/ProductCartController.php`を編集<br>

```php:ProductCartController.php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
      'size' => 'Size: ' . $size,
      'color' => 'Color: ' . $color,
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

    $result = ProductCart::where('id', $id)->update([
      'quantity' => $newQuantity,
      'total_price' => $total_price,
    ]);

    return $result;
  } // 追記

  public function cartItemMinus(Request $request)
  {
    $id = $request->id;
    $quantity = $request->quantity;
    $price = $request->price;
    $newQuantity = $quantity - 1;
    $total_price = $newQuantity * $price;

    $result = ProductCart::where('id', $id)->update([
      'quantity' => $newQuantity,
      'total_price' => $total_price,
    ]);

    return $result;
  } // 追記
}
```

## 404 Cart Item Plus Minus Part2

- `React Project`を編集<br>

## 406 Cart List Confirm Order Part1

- `$ php artisan make:model CartOrder -m`を実行<br>

* `create_cart_orders_table.php`を編集<br>

```php:create_cart_orders_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartOrdersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('cart_orders', function (Blueprint $table) {
      $table->id();
      $table->string('invoice_no');
      $table->string('product_name');
      $table->string('product_code');
      $table->string('size');
      $table->string('color');
      $table->string('quantity');
      $table->string('unit_price');
      $table->string('total_price');
      $table->string('email');
      $table->string('name');
      $table->string('payment_method');
      $table->text('delivery_address');
      $table->string('city');
      $table->string('delovery_charge');
      $table->string('order_date');
      $table->string('order_time');
      $table->string('order_status');
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
    Schema::dropIfExists('cart_orders');
  }
}
```

- `app/Models/CartOrder.php`を編集<br>

## 403 Cart Item Plus Minus Part1

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
```

- `app/Http/Controllers/Admin/ProductCartController.php`を編集<br>

```php:ProductCartController.php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
      'size' => 'Size: ' . $size,
      'color' => 'Color: ' . $color,
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

    $result = ProductCart::where('id', $id)->update([
      'quantity' => $newQuantity,
      'total_price' => $total_price,
    ]);

    return $result;
  } // 追記

  public function cartItemMinus(Request $request)
  {
    $id = $request->id;
    $quantity = $request->quantity;
    $price = $request->price;
    $newQuantity = $quantity - 1;
    $total_price = $newQuantity * $price;

    $result = ProductCart::where('id', $id)->update([
      'quantity' => $newQuantity,
      'total_price' => $total_price,
    ]);

    return $result;
  } // 追記
}
```

## 404 Cart Item Plus Minus Part2

- `React Project`を編集<br>

## 406 Cart List Confirm Order Part1

- `$ php artisan make:model CartOrder -m`を実行<br>

* `create_cart_orders_table.php`を編集<br>

```php:create_cart_orders_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartOrdersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('cart_orders', function (Blueprint $table) {
      $table->id();
      $table->string('invoice_no');
      $table->string('product_name');
      $table->string('product_code');
      $table->string('size');
      $table->string('color');
      $table->string('quantity');
      $table->string('unit_price');
      $table->string('total_price');
      $table->string('email');
      $table->string('name');
      $table->string('payment_method');
      $table->text('delivery_address');
      $table->string('city');
      $table->string('delivery_charge');
      $table->string('order_date');
      $table->string('order_time');
      $table->string('order_status');
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
    Schema::dropIfExists('cart_orders');
  }
}
```

- `app/Models/CartOrder.php`を編集<br>

```php:CartOrder.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartOrder extends Model
{
  use HasFactory;

  protected $guarded = [];
}
```

- `$ php artisan migrate`を実行<br>

* `routes/api.php`を編集<br>

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
Route::post('/cartorder', [ProductCartController::class, 'cartOrder']); // 追記
```

- `app/Http/Controllers/Admin/ProductCartController.php`を編集<br>

```php:ProductCartController.php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
      'size' => 'Size: ' . $size,
      'color' => 'Color: ' . $color,
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

    $result = ProductCart::where('id', $id)->update([
      'quantity' => $newQuantity,
      'total_price' => $total_price,
    ]);

    return $result;
  }

  public function cartItemMinus(Request $request)
  {
    $id = $request->id;
    $quantity = $request->quantity;
    $price = $request->price;
    $newQuantity = $quantity - 1;
    $total_price = $newQuantity * $price;

    $result = ProductCart::where('id', $id)->update([
      'quantity' => $newQuantity,
      'total_price' => $total_price,
    ]);

    return $result;
  }

  public function cartOrder(Request $request)
  {
  } // 追記
}
```

## 407 Cart List Confirm Order Part2

- `app/Http/Controllers/Admin/ProductCartController.php`を編集<br>

```php:ProductCartController.php
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
      'size' => 'Size: ' . $size,
      'color' => 'Color: ' . $color,
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

    $result = ProductCart::where('id', $id)->update([
      'quantity' => $newQuantity,
      'total_price' => $total_price,
    ]);

    return $result;
  }

  public function cartItemMinus(Request $request)
  {
    $id = $request->id;
    $quantity = $request->quantity;
    $price = $request->price;
    $newQuantity = $quantity - 1;
    $total_price = $newQuantity * $price;

    $result = ProductCart::where('id', $id)->update([
      'quantity' => $newQuantity,
      'total_price' => $total_price,
    ]);

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

    date_default_timezone_set('Asia/Tokyo');
    $request_time = date('h:i:sa');
    $request_date = date('d-m-Y');

    $cartList = ProductCart::where('email', $email)->get();

    foreach ($cartList as $cartListItem) {
      $cartInsertDeleteResult = '';

      $resultInsert = CartOrder::insert([
        'invoice_no' => 'Easy' . $invoice_no,
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
        'order_status' => 'Pending',
      ]);

      if ($resultInsert == 1) {
        $resultDelete = ProductCart::where('id', $cartListItem['id'])->delete();
        if ($resultDelete == 1) {
          $cartInsertDeleteResult = 1;
        } else {
          $cartInsertDeleteResult = 0;
        }
      }

      return $cartInsertDeleteResult;
    }
  }
}
```

## 408 Cart List Confirm Order Part3

- `React Project`を編集<br>
