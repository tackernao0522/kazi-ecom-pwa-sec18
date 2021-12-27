# Section30: Create and Consume Product List Rest API

## 319 Create Product List API Part1

+ `$ php artisan make:model ProductList -m`を実行<br>

+ `create_product_lists_table.php`を編集<br>

```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_lists', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('price');
            $table->string('special_price');
            $table->string('image');
            $table->string('category');
            $table->string('subcategory');
            $table->string('remark');
            $table->string('brand');
            $table->string('star');
            $table->string('product_code');
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
        Schema::dropIfExists('product_lists');
    }
}
```

+ `app/Models/ProductList.php`を編集<br>

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    use HasFactory;

    protected $guarded = [];
}
```

+ `$ php artisan migrate`を実行<br>

+ `$ php artisan make:controller Admin/ProductListController`を実行<br>

+ `routes/api.php`を編集<br>

```
<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProductListController;
use App\Http\Controllers\Admin\SiteInfoController;
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
```

+ `app/Http/Controllers/Admin/ProductListController.php`を編集<br>

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
        $productlist = ProductList::where('remark', $remark)->get();

        return $productlist;
    }
}
```

+ `phpMyAdminのproduct_listsテーブルに直接データ挿入`<br>

+ `POSTMAN(GET) localhost/api/productlistbyremark/FEATURED`<br>

```
[
    {
        "id": 1,
        "title": "ASUS TUF A15 FA506IU Ryzen",
        "price": "2000",
        "special_price": "1500",
        "image": "https://rukminim1.flixcart.com/image/416/416/kn7sdjk0/mobile/q/j/x/c21-rmx3201-realme-original-imagfxfwbszrxkvu.jpeg?q=70",
        "category": "Mobiles",
        "subcategory": "Samsung",
        "remark": "FEATURED",
        "brand": "Tony",
        "star": "4",
        "product_code": "5645656",
        "created_at": null,
        "updated_at": null
    }
]
```

## 320 Create Product List API Part2

+ `routes/api.php`を編集<br>

```
<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProductListController;
use App\Http\Controllers\Admin\SiteInfoController;
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
Route::get('/productlistbycategory{category}', [ProductListController::class, 'productListByCategory']);
```

+ `app/Http/Controllers/Admin/ProductListController.php`を編集<br>

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
        $productlist = ProductList::where('remark', $remark)->get();

        return $productlist;
    }

    public function productListByCategory(Request $request)
    {
        $category = $request->category;
        $productlist = ProductList::where('category', $category)->get();

        return $productlist;
    }
}
```

+ `POSTMAN(GET) localhost/api/productlistbycategory/Mobiles`

```
[
    {
        "id": 1,
        "title": "ASUS TUF A15 FA506IU Ryzen",
        "price": "2000",
        "special_price": "1500",
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
        "id": 2,
        "title": "POCO M3 (Power Black, 64 GB)",
        "price": "3000",
        "special_price": "2000",
        "image": "https://rukminim1.flixcart.com/image/416/416/kklhbbk0/mobile/m/s/f/m3-mzb0879in-poco-original-imafzxf686qtxq2x.jpeg?q=70",
        "category": "Mobiles",
        "subcategory": "Samsung",
        "remark": "NEW",
        "brand": "Test",
        "star": "5",
        "product_code": "446464645",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 9,
        "title": "Apple iPhone XR (White, 64 GB)",
        "price": "3200",
        "special_price": "2500",
        "image": "https://rukminim1.flixcart.com/image/416/416/jnj7iq80/mobile/y/q/d/apple-iphone-xr-mry52hn-a-original-imafa6zkfgwpnsgz.jpeg?q=70",
        "category": "Mobiles",
        "subcategory": "Apple",
        "remark": "COLLECTION",
        "brand": "Apple",
        "star": "5",
        "product_code": "53129",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 10,
        "title": "Realme C21 (Cross Black, 64 GB)",
        "price": "1200",
        "special_price": "780",
        "image": "https://rukminim1.flixcart.com/image/416/416/kn7sdjk0/mobile/g/r/g/c21-rmx3201-realme-original-imagfxfwn9aryyda.jpeg?q=70",
        "category": "Mobiles",
        "subcategory": "OPPO",
        "remark": "NEW",
        "brand": "OPPO",
        "star": "3",
        "product_code": "467843",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 13,
        "title": "vivo Y21 (Midnight Blue, 64 GB) ",
        "price": "560",
        "special_price": "500",
        "image": "https://rukminim1.flixcart.com/image/416/416/ksj9dow0/mobile/k/u/x/y21-v2111-vivo-original-imag627urx8mhhqm.jpeg?q=70",
        "category": "Mobiles",
        "subcategory": "OPPO",
        "remark": "FEATURED",
        "brand": "vivo",
        "star": "5",
        "product_code": "217890",
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
    },
    {
        "id": 20,
        "title": "OPPO A53 (Mint Cream, 64 GB)",
        "price": "1200",
        "special_price": "1000",
        "image": "https://rukminim1.flixcart.com/image/416/416/kmax8y80/mobile/r/y/g/a53-cph2127-oppo-original-imagf8hxxendurgm.jpeg?q=70",
        "category": "Mobiles",
        "subcategory": "OPPO",
        "remark": "NEW",
        "brand": "OPPO",
        "star": "3",
        "product_code": "1467890",
        "created_at": null,
        "updated_at": null
    }
]
```

+ `routes/api.php`を編集<br>

```
<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProductListController;
use App\Http\Controllers\Admin\SiteInfoController;
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
```

+ `app/Http/Controllers/Admin/ProductListController.php`を編集<br>

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
        $productlist = ProductList::where('remark', $remark)->get();

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
}
```

+ `POSTMAN(GET) localhost/api/productlistbysubcategory/Mobiles/Samsung`<br>

```
[
    {
        "id": 1,
        "title": "ASUS TUF A15 FA506IU Ryzen",
        "price": "2000",
        "special_price": "1500",
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
        "id": 2,
        "title": "POCO M3 (Power Black, 64 GB)",
        "price": "3000",
        "special_price": "2000",
        "image": "https://rukminim1.flixcart.com/image/416/416/kklhbbk0/mobile/m/s/f/m3-mzb0879in-poco-original-imafzxf686qtxq2x.jpeg?q=70",
        "category": "Mobiles",
        "subcategory": "Samsung",
        "remark": "NEW",
        "brand": "Test",
        "star": "5",
        "product_code": "446464645",
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

## 321 Consume Product List API Part1

+ `React Project`を編集<br>
