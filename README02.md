# Section29: Create and Consume Category and Subcategroy Rest API

## 313 Create Category and Subcategory Table

+ `$ php artisan make:model Category -m`を実行<br>

+ `create_cateogries_table.php`を編集<br>

```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
            $table->string('category_image');
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
        Schema::dropIfExists('categories');
    }
}
```

+ `app/Models/Category.php`を編集<br>

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'category_image',
    ];
}
```

+ `$ php artisan migrate`を実行<br>

+ `$ php artisan make:model Subcategory -m`を実行<br>

+ `create_subcategories_table.php`を編集<br>

```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
            $table->string('subcategory_name');
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
        Schema::dropIfExists('subcategories');
    }
}
```

+ `app/Models/Subcategory.php`を編集<br>

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'subcategory_name',
    ];
}
```

+ `$ php artisan migrate`を実行<br>

+ `$ php artisan make:controller Admin/CategoryController`を実行<br>

+ `routes/api.php`を編集<br>

```
<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
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
```

+ `storage/app/public`ディレクトリに`caticon.png`を配置<br>

+ `$ php artisan storage:link`を実行<br>

+ `phpMyAdminのcategory_tableに直接入力`<br>

```
category_imageは http://localhost/storage/caticon.pngを記述
```

+ `app/Http/Controllers/Admin/CategoryController.php`を編集<br>

```
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function AllCategory()
    {
        $categories = Category::all();

        return $categories;
    }
}
```

+ `POSTMAN(GET) localhost/api/allcategory`<br>

```
[
    {
        "id": 1,
        "category_name": "Mobiles",
        "category_image": "http://localhost/storage/caticon.png",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 2,
        "category_name": "Computer",
        "category_image": "http://localhost/storage/caticon.png",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 3,
        "category_name": "Electronics",
        "category_image": "http://localhost/storage/caticon.png",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 4,
        "category_name": "TVs & Appliances",
        "category_image": "http://localhost/storage/caticon.png",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 5,
        "category_name": "Fashion",
        "category_image": "http://localhost/storage/caticon.png",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 6,
        "category_name": "Baby & Kids",
        "category_image": "http://localhost/storage/caticon.png",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 7,
        "category_name": "Home & Furniture",
        "category_image": "http://localhost/storage/caticon.png",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 8,
        "category_name": "Sports, Books",
        "category_image": "http://localhost/storage/caticon.png",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 9,
        "category_name": "Mobile Accessories",
        "category_image": "http://localhost/storage/caticon.png",
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 10,
        "category_name": "Others",
        "category_image": "http://localhost/storage/caticon.png",
        "created_at": null,
        "updated_at": null
    }
]
```