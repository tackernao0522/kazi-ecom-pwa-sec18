# Section33: Create and Consume Product Details Rest API

## 336 Create Product Details API Part1

- `$ php artisan make:model ProductDetail -m`を実行<br>

- `create/product_details_table.php`を編集<br>

```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('image_one');
            $table->string('image_two');
            $table->string('image_three');
            $table->string('image_four');
            $table->string('short_description');
            $table->string('color');
            $table->string('size');
            $table->text('long_description');
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
        Schema::dropIfExists('product_details');
    }
}
```

- `app/Models/ProductDetail.php`を編集<br>

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $guarded = [];
}
```

- `$ php artisan migrate`を実行<br>

- `$ php artisan make:controller Admin/ProductDetailController`を実行

- `phpMyAdminのproduct_details_tableに直接データ入力`<br>

## 337 Create Product Details API Part2

- `routes/api.php`を編集<br>

```
<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\ProductListController;
use App\Http\Controllers\Admin\SiteInfoController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\VisitorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Get Visitor
Route::get('/getvisitor', [VisitorController::class, 'getVisitorDetails']);
// Contact Page Route
Route::post('/postcontact', [ContactController::class, 'postContactDetails']);
// Site Info Route
Route::get('/allsiteinfo', [SiteInfoController::class, 'allSiteInfo']);
// All Category Route
Route::get('/allcategory', [CategoryController::class, 'AllCategory']);
// ProductList Route
Route::get('/productlistbyremark/{remark}', [ProductListController::class, 'productListByRemark']);
Route::get('/productlistbycategory/{category}', [ProductListController::class, 'productListByCategory']);
Route::get('/productlistbysubcategory/{category}/{subcategory}', [ProductListController::class, 'productListBySubCategory']);
// Slider Route
Route::get('/allslider', [SliderController::class, 'allSlider']);
// Product Details Route
Route::get('/productdetails/{id}', [ProductDetailController::class, 'productDetails']);
```

- `app/Http/Controllers/Admin/ProductDetailController.php`を編集<br>

```
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
```

- `POSTMAN(GET) http://localhost/api/productdetails/2`<br>

```
{
    "productDetails": [
        {
            "id": 1,
            "product_id": 2,
            "image_one": "https://rukminim1.flixcart.com/image/416/416/kklhbbk0/mobile/m/s/f/m3-mzb0879in-poco-original-imafzxf686qtxq2x.jpeg?q=70",
            "image_two": "https://rukminim1.flixcart.com/image/416/416/kpmy8i80/mobile/q/z/z/m3-pro-5g-mzb0952in-poco-original-imag3th6btkchjn2.jpeg?q=70",
            "image_three": "https://rukminim1.flixcart.com/image/416/416/kpmy8i80/mobile/q/z/z/m3-pro-5g-mzb0952in-poco-original-imag3th6btkchjn2.jpeg?q=70",
            "image_four": "https://rukminim1.flixcart.com/image/416/416/kklhbbk0/mobile/m/s/f/m3-mzb0879in-poco-original-imafzxf686qtxq2x.jpeg?q=70",
            "short_description": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took",
            "color": "Red,White,Black",
            "size": "S,L,M,XL",
            "long_description": "What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            "created_at": null,
            "updated_at": null
        }
    ],
    "productList": [
        {
            "id": 2,
            "title": "POCO M3 (Power Black, 64 GB)",
            "price": "3000",
            "special_price": "na",
            "image": "https://rukminim1.flixcart.com/image/416/416/kklhbbk0/mobile/m/s/f/m3-mzb0879in-poco-original-imafzxf686qtxq2x.jpeg?q=70",
            "category": "Mobiles",
            "subcategory": "Samsung",
            "remark": "NEW",
            "brand": "Test",
            "star": "5",
            "product_code": "446464645",
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

## 338 Consume Product Details API Part1

- `React Project`を編集<br>

# Section34: Create and Consume Notification Rest API

## 345 Create Notification History API

- `$ php artisan make:model Notification -m`を実行<br>

- `create_notifications_table.php`を編集<br>

```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('message');
            $table->string('date');
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
        Schema::dropIfExists('notifications');
    }
}
```

- `app/Models/Notification.php`を編集<br>

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'message',
        'date',
    ];
}
```

- `$ php artisan migrate`を実行<br>

- `phpMyAdminのnotificationsテーブル`に直接データ挿入<br>

- `$ php artisan make:controller Admin/NotificationController`を実行<br>

- `routes/api.php`を編集<br>

```
<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\ProductListController;
use App\Http\Controllers\Admin\SiteInfoController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\VisitorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Get Visitor
Route::get('/getvisitor', [VisitorController::class, 'getVisitorDetails']);
// Contact Page Route
Route::post('/postcontact', [ContactController::class, 'postContactDetails']);
// Site Info Route
Route::get('/allsiteinfo', [SiteInfoController::class, 'allSiteInfo']);
// All Category Route
Route::get('/allcategory', [CategoryController::class, 'AllCategory']);
// ProductList Route
Route::get('/productlistbyremark/{remark}', [ProductListController::class, 'productListByRemark']);
Route::get('/productlistbycategory/{category}', [ProductListController::class, 'productListByCategory']);
Route::get('/productlistbysubcategory/{category}/{subcategory}', [ProductListController::class, 'productListBySubCategory']);
// Slider Route
Route::get('/allslider', [SliderController::class, 'allSlider']);
// Product Details Route
Route::get('/productdetails/{id}', [ProductDetailController::class, 'productDetails']);
// Notifications Route
Route::get('/notification', [NotificationController::class, 'notificationHistory']);
```

- `app/Http/Controllers/Admin/NotificationController.php`を編集<br>

```
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notificationHistory()
    {
        $result = Notification::all();

        return $result;
    }
}
```

- `POSTMAN(GET) http://localhost/api/notification`<br>

```
[
    {
        "id": 1,
        "title": "test 1 Lorem Ipsum is simply dummy text of ",
        "message": "message 1 Each course has been hand-tailored to teach a specific skill. I hope you agree! Whether you’re trying to learn a new skill from scratch or want to refresh your memory on something you’ve learned in the past, you’ve come to the right place.",
        "date": "11/05/2021",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 2,
        "title": "test 2 Lorem Ipsum is simply dummy text of ",
        "message": "message 2 Each course has been hand-tailored to teach a specific skill. I hope you agree! Whether you’re trying to learn a new skill from scratch or want to refresh your memory on something you’ve learned in the past, you’ve come to the right place.",
        "date": "12/05/2021",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 3,
        "title": "test 3 Lorem Ipsum is simply dummy text of ",
        "message": "message 3 Each course has been hand-tailored to teach a specific skill. I hope you agree! Whether you’re trying to learn a new skill from scratch or want to refresh your memory on something you’ve learned in the past, you’ve come to the right place.",
        "date": "13/05/2021",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 4,
        "title": "test 4 Lorem Ipsum is simply dummy text of ",
        "message": "message 4 Each course has been hand-tailored to teach a specific skill. I hope you agree! Whether you’re trying to learn a new skill from scratch or want to refresh your memory on something you’ve learned in the past, you’ve come to the right place.",
        "date": "14/05/2021",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 5,
        "title": "test 5 Lorem Ipsum is simply dummy text of ",
        "message": "message 5 Each course has been hand-tailored to teach a specific skill. I hope you agree! Whether you’re trying to learn a new skill from scratch or want to refresh your memory on something you’ve learned in the past, you’ve come to the right place.",
        "date": "15/05/2021",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 6,
        "title": "test 6 Lorem Ipsum is simply dummy text of ",
        "message": "message 6 Each course has been hand-tailored to teach a specific skill. I hope you agree! Whether you’re trying to learn a new skill from scratch or want to refresh your memory on something you’ve learned in the past, you’ve come to the right place.",
        "date": "16/05/2021",
        "created_at": null,
        "updated_at": null
    }
]
```

## 346 Consume Notification History API Part1

- `React Project`を編集<br>

# Section36: Create and Consume Search Rest API

## 351 Create Search API

- `routes/api.php`を編集<br>

```
<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\ProductListController;
use App\Http\Controllers\Admin\SiteInfoController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\VisitorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Get Visitor
Route::get('/getvisitor', [VisitorController::class, 'getVisitorDetails']);
// Contact Page Route
Route::post('/postcontact', [ContactController::class, 'postContactDetails']);
// Site Info Route
Route::get('/allsiteinfo', [SiteInfoController::class, 'allSiteInfo']);
// All Category Route
Route::get('/allcategory', [CategoryController::class, 'AllCategory']);
// ProductList Route
Route::get('/productlistbyremark/{remark}', [ProductListController::class, 'productListByRemark']);
Route::get('/productlistbycategory/{category}', [ProductListController::class, 'productListByCategory']);
Route::get('/productlistbysubcategory/{category}/{subcategory}', [ProductListController::class, 'productListBySubCategory']);
// Slider Route
Route::get('/allslider', [SliderController::class, 'allSlider']);
// Product Details Route
Route::get('/productdetails/{id}', [ProductDetailController::class, 'productDetails']);
// Notifications Route
Route::get('/notification', [NotificationController::class, 'notificationHistory']);
// Search Route
Route::get('/search/{key}', [ProductListController::class, 'productBySearch']);
```

- `app/Http/Controllers/Admin/ProductListController.php`を編集<br>

```
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
        $productlist = ProductList::where('remark', $remark)->limit(8)->get();

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
            ->orWhere('brand', 'LIKE', "%{$key}%")->get();

        return $productlist;
    }
}
```

- `POSTMAN(GET) http://localhost/api/search/asus`<br>

```
[
    {
        "id": 1,
        "title": "ASUS TUF A15 FA506IU Ryzen",
        "price": "2000",
        "special_price": "na",
        "image": "https://rukminim1.flixcart.com/image/416/416/kn7sdjk0/mobile/q/j/x/c21-rmx3201-realme-original-imagfxfwbszrxkvu.jpeg?q=70",
        "category": "Mobiles",
        "subcategory": "Samsung",
        "remark": "FEATURED",
        "brand": "Tony",
        "star": "4",
        "product_code": "5645656",
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
        "id": 18,
        "title": "ASUS TUF A15 FA506IU Ryzen 7 4800H GTX",
        "price": "1250",
        "special_price": "1000",
        "image": "https://rukminim1.flixcart.com/image/416/416/knm2s280/mobile/v/l/u/hot-10-play-x688b-infinix-original-imag29hfaedkgdfe.jpeg?q=70",
        "category": "Mobiles",
        "subcategory": "Samsung",
        "remark": "COLLECTION",
        "brand": "ASUS",
        "star": "3",
        "product_code": "318745",
        "created_at": null,
        "updated_at": null
    }
]
```
