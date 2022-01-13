# Section41: Add To Cart Option Setup

## 384 Add To Cart Part1

- `$ php artisan make:model ProductCart -m`を実行<br>

* `create_product_carts_table.php`を編集<br>

```php:create_product_carts_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCartsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('product_carts', function (Blueprint $table) {
      $table->id();
      $table->string('image');
      $table->string('email');
      $table->string('product_name');
      $table->string('product_code');
      $table->string('size');
      $table->string('color');
      $table->string('quantity');
      $table->string('unit_price');
      $table->string('total_price');
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
    Schema::dropIfExists('product_carts');
  }
}
```

- `app/Models/ProductCart.php`を編集<br>

```php:ProductCart.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCart extends Model
{
  use HasFactory;

  protected $guarded = [];
}
```

- `$ php artisan make:controller Admin/ProductCartController`を実行<br>

* `routes/api.php`を編集<br>

```php:api.php
<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
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
```

- `app/Http/Controllers/Admin/ProductCartController.php`を編集<br>

```php:ProductCartController.php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductCartController extends Controller
{
  public function addToCart(Request $request)
  {
  }
}
```
