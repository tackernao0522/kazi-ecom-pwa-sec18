## 438 Edit Store Category

- `resources/veiws/backend/category/category_view.blade.php`を編集<br>

```html:category_view.blade.php
@extends('admin.admin_master') @section('admin')
<div class="page-wrapper">
  <div class="page-content">
    <div class="card radius-10">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div>
            <h5 class="mb-0">All Category</h5>
          </div>
          <div class="font-22 ms-auto">
            <i class="bx bx-dots-horizontal-rounded"></i>
          </div>
        </div>
        <hr />
        <div class="table-responsive">
          <table class="table align-middle mb-0">
            <thead class="table-light">
              <tr>
                <th>SL</th>
                <th>Category Image</th>
                <th>Category Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php($i = 1) @foreach($categories as $category)
              <tr>
                <td>{{ $i++ }}</td>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="recent-product-img">
                      <img src="{{ $category->category_image }}" alt="" />
                    </div>
                  </div>
                </td>
                <td>{{ $category->category_name }}</td>
                <td>
                  <a
                    href="{{ route('category.edit', $category->id) }}"
                    class="btn btn-info"
                  >
                    Edit
                  </a>
                  <a href="" class="btn btn-danger">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
```

- `routes/web.php`を編集<br>

```php:web.php
<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])
  ->get('/dashboard', function () {
    return view('admin.index');
  })
  ->name('dashboard');

// Admin Logout Routes
Route::get('/logout', [AdminController::class, 'adminLogout'])->name(
  'admin.logout'
);

Route::prefix('admin')->group(function () {
  Route::get('/user/profile', [AdminController::class, 'userProfile'])->name(
    'user.profile'
  );

  Route::post('/user/profile/store', [
    AdminController::class,
    'userProfileStore',
  ])->name('user.profile.store');

  Route::get('/change/password', [
    AdminController::class,
    'changePassword',
  ])->name('change.password');

  Route::post('/change/password/update', [
    AdminController::class,
    'changePasswordUpdate',
  ])->name('change.password.update');
});

Route::prefix('category')->group(function () {
  Route::get('/all', [CategoryController::class, 'getAllCategory'])->name(
    'all.category'
  );

  Route::get('/add', [CategoryController::class, 'addCategory'])->name(
    'add.category'
  );

  Route::post('/store', [CategoryController::class, 'storeCategory'])->name(
    'category.store'
  );

  Route::get('/edit/{id}', [CategoryController::class, 'editCategory'])->name(
    'category.edit'
  ); // 追記
});
```

- `app/Http/Controllers/Admin/CategoryController.php`を編集<br>

```php:CategoryController.php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
  public function AllCategory()
  {
    $categories = Category::all();
    $categoryDetailsArray = [];

    foreach ($categories as $value) {
      $subcategory = Subcategory::where(
        'category_name',
        $value->category_name
      )->get();

      $item = [
        'category_name' => $value->category_name,
        'category_image' => $value->category_image,
        'subcategory_name' => $subcategory,
      ];

      array_push($categoryDetailsArray, $item);
    }

    return $categoryDetailsArray;
  }

  public function getAllCategory()
  {
    $categories = Category::latest()->get();

    return view('backend.category.category_view', compact('categories'));
  }

  public function addCategory()
  {
    return view('backend.category.category_add');
  }

  public function storeCategory(Request $request)
  {
    $request->validate(
      [
        'category_name' => 'required',
      ],
      [
        'category_name.required' => 'Input Category Name',
      ]
    );

    $image = $request->file('category_image');
    $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalName();
    Image::make($image)
      ->resize(128, 128)
      ->save('upload/category/' . $name_gen);
    $save_url = 'http://localhost/upload/category/' . $name_gen;

    Category::insert([
      'category_name' => $request->category_name,
      'category_image' => $save_url,
    ]);

    $notification = [
      'message' => 'Category Inserted Successfully',
      'alert-type' => 'success',
    ];

    return redirect()
      ->route('all.category')
      ->with($notification);
  }

  public function editCategory($id)
  {
    $category = Category::findOrFail($id);

    return view('backend.category.category_edit', compact('category'));
  }
}
```

- `resources/views/backend/category/category_edit.blade.php`ファイルを作成<br>

```html:category_edit.blade.php
@extends('admin.admin_master') @section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-wrapper">
  <div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Edit Category</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item">
              <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Edit Category
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
      <div class="main-body">
        <div class="row">
          <div class="col-lg-8">
            <form
              method="post"
              action="{{ route('category.update', $category->id) }}"
              enctype="multipart/form-data"
            >
              @csrf
              <div class="card">
                <div class="card-body">
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Category Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input
                        type="text"
                        name="category_name"
                        class="form-control"
                        value="{{ old('category_name', $category->category_name) }}"
                      />
                      @error('category_name')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="image" class="form-label">
                      Upload Category Image
                    </label>
                    <input
                      class="form-control"
                      type="file"
                      name="category_image"
                      id="image"
                    />
                  </div>
                  <div class="mb-3">
                    <img
                      id="showImage"
                      src="{{ asset($category->category_image) }}"
                      style="width: 100px; height: 100px"
                    />
                  </div>
                  <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                      <input
                        type="submit"
                        class="btn btn-success px-4"
                        value="Update Category"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {
    $('#image').change(function (e) {
      var reader = new FileReader()
      reader.onload = function (e) {
        $('#showImage').attr('src', e.target.result)
      }
      reader.readAsDataURL(e.target.files['0'])
    })
  })
</script>
@endsection
```

- `routes/web.php`を編集<br>

```php:web.php
<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])
  ->get('/dashboard', function () {
    return view('admin.index');
  })
  ->name('dashboard');

// Admin Logout Routes
Route::get('/logout', [AdminController::class, 'adminLogout'])->name(
  'admin.logout'
);

Route::prefix('admin')->group(function () {
  Route::get('/user/profile', [AdminController::class, 'userProfile'])->name(
    'user.profile'
  );

  Route::post('/user/profile/store', [
    AdminController::class,
    'userProfileStore',
  ])->name('user.profile.store');

  Route::get('/change/password', [
    AdminController::class,
    'changePassword',
  ])->name('change.password');

  Route::post('/change/password/update', [
    AdminController::class,
    'changePasswordUpdate',
  ])->name('change.password.update');
});

Route::prefix('category')->group(function () {
  Route::get('/all', [CategoryController::class, 'getAllCategory'])->name(
    'all.category'
  );

  Route::get('/add', [CategoryController::class, 'addCategory'])->name(
    'add.category'
  );

  Route::post('/store', [CategoryController::class, 'storeCategory'])->name(
    'category.store'
  );

  Route::get('/edit/{id}', [CategoryController::class, 'editCategory'])->name(
    'category.edit'
  );

  Route::post('/update/{id}', [
    CategoryController::class,
    'updateCategory',
  ])->name('category.update'); // 追記
});
```

- `app/Http/Controllers/Admin/CategoryController.php`を編集<br>

```php:CateogryController.php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
  public function AllCategory()
  {
    $categories = Category::all();
    $categoryDetailsArray = [];

    foreach ($categories as $value) {
      $subcategory = Subcategory::where(
        'category_name',
        $value->category_name
      )->get();

      $item = [
        'category_name' => $value->category_name,
        'category_image' => $value->category_image,
        'subcategory_name' => $subcategory,
      ];

      array_push($categoryDetailsArray, $item);
    }

    return $categoryDetailsArray;
  }

  public function getAllCategory()
  {
    $categories = Category::latest()->get();

    return view('backend.category.category_view', compact('categories'));
  }

  public function addCategory()
  {
    return view('backend.category.category_add');
  }

  public function storeCategory(Request $request)
  {
    $request->validate(
      [
        'category_name' => 'required',
      ],
      [
        'category_name.required' => 'Input Category Name',
      ]
    );

    $image = $request->file('category_image');
    $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalName();
    Image::make($image)
      ->resize(128, 128)
      ->save('upload/category/' . $name_gen);
    $save_url = 'http://localhost/upload/category/' . $name_gen;

    Category::insert([
      'category_name' => $request->category_name,
      'category_image' => $save_url,
    ]);

    $notification = [
      'message' => 'Category Inserted Successfully',
      'alert-type' => 'success',
    ];

    return redirect()
      ->route('all.category')
      ->with($notification);
  }

  public function editCategory($id)
  {
    $category = Category::findOrFail($id);

    return view('backend.category.category_edit', compact('category'));
  }

  public function updateCategory(Request $request, Category $id)
  {
  }
}
```

## 439 Update Store Category

- `app/Http/Controllers/Admin/CategoryController.php`を編集<br>

```php:CategoryController.php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
  public function AllCategory()
  {
    $categories = Category::all();
    $categoryDetailsArray = [];

    foreach ($categories as $value) {
      $subcategory = Subcategory::where(
        'category_name',
        $value->category_name
      )->get();

      $item = [
        'category_name' => $value->category_name,
        'category_image' => $value->category_image,
        'subcategory_name' => $subcategory,
      ];

      array_push($categoryDetailsArray, $item);
    }

    return $categoryDetailsArray;
  }

  public function getAllCategory()
  {
    $categories = Category::latest()->get();

    return view('backend.category.category_view', compact('categories'));
  }

  public function addCategory()
  {
    return view('backend.category.category_add');
  }

  public function storeCategory(Request $request)
  {
    $request->validate(
      [
        'category_name' => 'required',
      ],
      [
        'category_name.required' => 'Input Category Name',
      ]
    );

    $image = $request->file('category_image');
    $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalName();
    Image::make($image)
      ->resize(128, 128)
      ->save('upload/category/' . $name_gen);
    $save_url = 'http://localhost/upload/category/' . $name_gen;

    Category::insert([
      'category_name' => $request->category_name,
      'category_image' => $save_url,
    ]);

    $notification = [
      'message' => 'Category Inserted Successfully',
      'alert-type' => 'success',
    ];

    return redirect()
      ->route('all.category')
      ->with($notification);
  }

  public function editCategory($id)
  {
    $category = Category::findOrFail($id);

    return view('backend.category.category_edit', compact('category'));
  }

  public function updateCategory(Request $request, $id)
  {
    $category = Category::findOrFail($id);

    if ($request->file('category_image')) {
      $image = $request->file('category_image');
      $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalName();
      Image::make($image)
        ->resize(128, 128)
        ->save('upload/category/' . $name_gen);
      $save_url = 'http://localhost/upload/category/' . $name_gen;

      $category->category_name = $request->category_name;
      $category->category_image = $save_url;
      $category->save();

      $notification = [
        'message' => 'Category Update With Image Successfully',
        'alert-type' => 'success',
      ];

      return redirect()
        ->route('all.category')
        ->with($notification);
    } else {
      $category->category_name = $request->category_name;
      $category->save();

      $notification = [
        'message' => 'Category Updated Without Image Successfully',
        'alert-type' => 'success',
      ];

      return redirect()
        ->route('all.category')
        ->with($notification);
    }
  }
}
```
