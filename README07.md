# Section40: Related Product Suggest Option Setup

## 380 Related Product Suggest Part1

- `routes/api.php`を編集<br>

```php:api.php
<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\ProductListController;
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
// Similar Product Route 追記
Route::get('/similar/{subcategory}', [
  ProductListController::class,
  'similarProduct',
]); // 追記
```

- `app/Http/Controllers/Admin/ProductListController.php`を編集<br>

```php:ProductListController.php
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
    $productlist = ProductList::where('remark', $remark)
      ->limit(8)
      ->get();

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
      ->orWhere('brand', 'LIKE', "%{$key}%")
      ->get();

    return $productlist;
  }

  // 追記
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
```

- `POSTMAN(GET) http://localhost/api/similar/Laptops` <br>

```
[
    {
        "id": 14,
        "title": "Acer Predator Helios 300 Octa Core i7",
        "price": "2500",
        "special_price": "2000",
        "image": "https://rukminim1.flixcart.com/image/416/416/kuvkcy80/computer/x/s/4/na-gaming-laptop-acer-original-imag7whp2f8fgpaz.jpeg?q=70",
        "category": "Computer",
        "subcategory": "Laptops",
        "remark": "NEW",
        "brand": "Acer",
        "star": "4",
        "product_code": "215432",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 8,
        "title": "HP 14s Core i5 10th Gen",
        "price": "2200",
        "special_price": "1800",
        "image": "https://rukminim1.flixcart.com/image/416/416/kb89ea80/computer/n/m/5/hp-na-thin-and-light-laptop-original-imafsmmghwzzu3mq.jpeg?q=70",
        "category": "Computer",
        "subcategory": "Laptops",
        "remark": "NEW",
        "brand": "HP",
        "star": "5",
        "product_code": "498076",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 7,
        "title": "ASUS VivoBook Ultra 14 Core i3 10th Gen",
        "price": "2300",
        "special_price": "2000",
        "image": "https://rukminim1.flixcart.com/image/416/416/kh9gbrk0/computer/a/s/k/asus-na-thin-and-light-laptop-original-imafxbj7gyrpudka.jpeg?q=70",
        "category": "Computer",
        "subcategory": "Laptops",
        "remark": "FEATURED",
        "brand": "ASUS",
        "star": "5",
        "product_code": "45672",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 3,
        "title": "Lenovo IdeaPad 3 Core i3 10th Gen",
        "price": "5000",
        "special_price": "na",
        "image": "https://rukminim1.flixcart.com/image/416/416/keaaavk0/computer/x/m/y/lenovo-na-laptop-original-imafuzt8r5jqppfn.jpeg?q=70",
        "category": "Computer",
        "subcategory": "Laptops",
        "remark": "FEATURED",
        "brand": "Lenovo",
        "star": "3",
        "product_code": "342314",
        "created_at": null,
        "updated_at": null
    }
]
```

## 381 Related Product Suggest Part2

- `React Project`を編集<br>

## 382 User Review Show Part1

- `$ php artisan make:model ProductReview -m`を実行<br>

- `create_product_reviews_table.php`を編集<br>

```php:create_product_reviews_table
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
      $table->bigInteger('product_id');
      $table->string('product_name');
      $table->string('review_name');
      $table->string('reviewer_photo');
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

- `app/Models/ProductReview.php`を編集<br>

```php:ProductReview.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
  use HasFactory;

  protected $guarded = [];
}
```

- `$ php artisan migrate`を実行<br>

* `phpMyAdmin`に直接入力<br>

- `$ php artisan make:controller Admin/ProductReviewController`を実行<br>

* `routes/api.php`を編集<br>

```php:api.php
<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\ProductListController;
use App\Http\Controllers\Admin\ProductReviewController; // 追記
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
Route::get('/reviewlist/{id}', [ProductReviewController::class, 'reviewList']); // 追記
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
}
```

- `POSTMAN(GET) http://localhost/api/reviewlist/4`<br>

```
[
    {
        "id": 4,
        "product_id": 4,
        "product_name": "APPLE ALL IN ONE Core i5 (5th Gen) ",
        "review_name": "Takaki Nakamura",
        "reviewer_photo": "https://rukminim1.flixcart.com/image/880/1056/j9st5zk0/sweatshirt/z/f/y/l-whomaroon-whoroyalblue-fleximaa-original-imaezgd5usq5z74v.jpeg?q=50",
        "reviewer_rating": "4",
        "reviewer_comments": "Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 3,
        "product_id": 4,
        "product_name": "APPLE ALL IN ONE Core i5 (5th Gen) ",
        "review_name": "Takaki Nakamura",
        "reviewer_photo": "https://rukminim1.flixcart.com/image/880/1056/j9st5zk0/sweatshirt/z/f/y/l-whomaroon-whoroyalblue-fleximaa-original-imaezgd5usq5z74v.jpeg?q=50",
        "reviewer_rating": "3",
        "reviewer_comments": "Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 2,
        "product_id": 4,
        "product_name": "APPLE ALL IN ONE Core i5 (5th Gen) ",
        "review_name": "Naomi",
        "reviewer_photo": "https://rukminim1.flixcart.com/image/880/1056/j9st5zk0/sweatshirt/z/f/y/l-whomaroon-whoroyalblue-fleximaa-original-imaezgd5usq5z74v.jpeg?q=50",
        "reviewer_rating": "4",
        "reviewer_comments": "Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 1,
        "product_id": 4,
        "product_name": "APPLE ALL IN ONE Core i5 (5th Gen) ",
        "review_name": "Takaki Nakamura",
        "reviewer_photo": "https://rukminim1.flixcart.com/image/880/1056/j9st5zk0/sweatshirt/z/f/y/l-whomaroon-whoroyalblue-fleximaa-original-imaezgd5usq5z74v.jpeg?q=50",
        "reviewer_rating": "5",
        "reviewer_comments": "Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.",
        "created_at": null,
        "updated_at": null
    }
]
```
