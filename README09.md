# Section42: Add To Favorite Option Setup

## 392 Add To Favorite Part1

- `$ php artisan make:model Favorite -m`を実行<br>

* `create_favorites_table.php`を編集<br>

```php:create_favorites_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('favorites', function (Blueprint $table) {
      $table->id();
      $table->string('product_name');
      $table->string('image');
      $table->string('product_code');
      $table->string('email');
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
    Schema::dropIfExists('favorites');
  }
}
```

- `app/Models/Favorite.php`を編集<br>

```php:Favorite.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
  use HasFactory;

  protected $fillable = ['product_name', 'image', 'product_code', 'email'];
}
```

- `$ php artisan migrate`を実行<br>

* `$ php artisan make:controller Admin/FavoriteController`を実行<br>

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
```

- `app/Http/Controllers/Admin/FavoriteController.php`を編集<br>

```php:FavoriteController.php
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
}
```

## 393 Add To Favorite Part2

- `React Project`を編集<br>

## 394 Add To Favorite Part4

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
]); // 追記
```

## 395 Add To Favorite Part4

- `React Project`を編集<br>

## 396 Remove Item From Favorite Part1

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
]); // 追記
```

- `app/Http/Controllers/Admin/FavoriteController.php`を編集<br>

```php:FavoriteController.php
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

  public function favoriteRemove(Request $request)
  {
    $product_code = $request->product_code;
    $email = $request->email;
    $result = Favorite::where('product_code', $product_code)
      ->where('email', $email)
      ->delete();

    return $result;
  }
}
```

## 397 Remove Item From Favorite Part2

- `React Project`を編集<br>

# Section43: Cart List and Cart Item Option Setup

## 399 Cart List Part1

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
}
```

- `POSTMAN(GET) http://localhost/api/cartlist/takaki_5573031@yahoo.co.jp`<br>

```
[
    {
        "id": 12,
        "image": "https://rukminim1.flixcart.com/image/416/416/kph8h3k0/television/k/9/h/40y1-40fa1a00-oneplus-original-imag3p45tdgyvpqa.jpeg?q=70",
        "email": "takaki_5573031@yahoo.co.jp",
        "product_name": "OnePlus Y Series 100 cm (40 inch)",
        "product_code": "231334",
        "size": "Size: M",
        "color": "Color: Red",
        "quantity": "02",
        "unit_price": "2500",
        "total_price": "5000",
        "created_at": null,
        "updated_at": null
    }
]
```

## 400 Cart List Part2

- `React Project`を編集<br>
