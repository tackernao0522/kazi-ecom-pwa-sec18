## 442 Add Store Sub Category

- `resources/views/backend/subCategory/subCategory_add.blade.php`を編集<br>

```html:subCategory_add.blade.php
@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-wrapper">
  <div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Add SubCategory</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Add SubCategory</li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
      <div class="main-body">
        <div class="row">
          <div class="col-lg-8">
            <form method="post" action="{{ route('subcategory.store') }}">
              @csrf
              <div class="card">
                <div class="card-body">
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Category Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <select class="form-select mb-3" name="category_name" aria-label="Default select example">
                        <option selected="" disabled="">--Choose Category--</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->category_name }}" {{ old('category_name') == $category->category_name ? 'selected': '' }}>{{ $category->category_name }}</option>
                        @endforeach
                      </select>
                      @error('category_name')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">SubCategory Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="subcategory_name" class="form-control" value="{{ old('subcategory_name') }}">
                      @error('subcategory_name')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                      <input type="submit" class="btn btn-primary px-4" value="Add SubCategory">
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
  ])->name('category.update');

  Route::get('/delete/{id}', [
    CategoryController::class,
    'deleteCategory',
  ])->name('category.delete');
});

Route::prefix('subcategory')->group(function () {
  Route::get('/all', [CategoryController::class, 'getAllSubCategory'])->name(
    'all.subcategory'
  );

  Route::get('/add', [CategoryController::class, 'addSubCategory'])->name(
    'add.subcategory'
  );

  Route::post('/store', [CategoryController::class, 'storeSubCategory'])->name(
    'subcategory.store'
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

  public function deleteCategory($id)
  {
    $category = Category::findOrFail($id);
    $category->delete();

    $notification = [
      'message' => 'Category Deleted Successfully',
      'alert-type' => 'success',
    ];

    return redirect()
      ->back()
      ->with($notification);
  }

  public function getAllSubCategory()
  {
    $subCategories = Subcategory::latest()->get();

    return view(
      'backend.subCategory.subCategory_view',
      compact('subCategories')
    );
  }

  public function addSubCategory()
  {
    $categories = Category::latest()->get();

    return view('backend.subCategory.subCategory_add', compact('categories'));
  }

  // 追記
  public function storeSubCategory(Request $request)
  {
    $request->validate(
      [
        'category_name' => 'required',
        'subcategory_name' => 'required',
      ],
      [
        'category_name.required' => 'Input Category Name',
        'subcategory_name.required' => 'Input SubCategory Name',
      ]
    );

    Subcategory::insert([
      'category_name' => $request->category_name,
      'subcategory_name' => $request->subcategory_name,
    ]);

    $notification = [
      'message' => 'SubCategory Inserted Successfully',
      'alert-type' => 'success',
    ];

    return redirect()
      ->route('all.subcategory')
      ->with($notification);
  }
}
```

## 443 Edit Store Sub Category

- `resources/views/backend/subCategory/subCategory_view.blade.php`を編集<br>

```html:subCategory_view.blade.php
@extends('admin.admin_master') @section('admin')
<div class="page-wrapper">
  <div class="page-content">
    <div class="card radius-10">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div>
            <h5 class="mb-0">All SubCategory</h5>
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
                <th>Category Name</th>
                <th>SubCategory Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php($i = 1) @foreach($subCategories as $subCategory)
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $subCategory->category_name}}</td>
                <td>{{ $subCategory->subcategory_name }}</td>
                <td>
                  // 編集
                  <a
                    href="{{ route('subcategory.edit', $subCategory->id) }}"
                    class="btn btn-info"
                  >
                    Edit
                  </a>
                  <a
                    href="{{-- route('category.delete', $category->id) --}}"
                    id="delete"
                    class="btn btn-danger"
                  >
                    Delete
                  </a>
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
  );

  Route::post('/update/{id}', [
    CategoryController::class,
    'updateCategory',
  ])->name('category.update');

  Route::get('/delete/{id}', [
    CategoryController::class,
    'deleteCategory',
  ])->name('category.delete');
});

Route::prefix('subcategory')->group(function () {
  Route::get('/all', [CategoryController::class, 'getAllSubCategory'])->name(
    'all.subcategory'
  );

  Route::get('/add', [CategoryController::class, 'addSubCategory'])->name(
    'add.subcategory'
  );

  Route::post('/store', [CategoryController::class, 'storeSubCategory'])->name(
    'subcategory.store'
  );

  Route::get('/edit/{id}', [
    CategoryController::class,
    'editSubCategory',
  ])->name('subcategory.edit'); // 追記
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

  public function deleteCategory($id)
  {
    $category = Category::findOrFail($id);
    $category->delete();

    $notification = [
      'message' => 'Category Deleted Successfully',
      'alert-type' => 'success',
    ];

    return redirect()
      ->back()
      ->with($notification);
  }

  public function getAllSubCategory()
  {
    $subCategories = Subcategory::latest()->get();

    return view(
      'backend.subCategory.subCategory_view',
      compact('subCategories')
    );
  }

  public function addSubCategory()
  {
    $categories = Category::latest()->get();

    return view('backend.subCategory.subCategory_add', compact('categories'));
  }

  public function storeSubCategory(Request $request)
  {
    $request->validate(
      [
        'category_name' => 'required',
        'subcategory_name' => 'required',
      ],
      [
        'category_name.required' => 'Input Category Name',
        'subcategory_name.required' => 'Input SubCategory Name',
      ]
    );

    Subcategory::insert([
      'category_name' => $request->category_name,
      'subcategory_name' => $request->subcategory_name,
    ]);

    $notification = [
      'message' => 'SubCategory Inserted Successfully',
      'alert-type' => 'success',
    ];

    return redirect()
      ->route('all.subcategory')
      ->with($notification);
  }

  // 追記
  public function editSubCategory($id)
  {
    $categories = Category::orderBy('category_name', 'ASC')->get();
    $subCategory = Subcategory::findOrFail($id);

    return view(
      'backend.subCategory.subCategory_edit',
      compact('categories', 'subCategory')
    );
  }
}
```

- `resources/views/backend/subCategory/subCategory_edit.blade.php`ファイルを作成<br>

```html:subCategory_edit.blade.php
@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-wrapper">
  <div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Edit SubCategory</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit SubCategory</li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
      <div class="main-body">
        <div class="row">
          <div class="col-lg-8">
            <form method="post" action="{{ route('subcategory.update', $subCateroy->id) }}">
              @csrf
              <div class="card">
                <div class="card-body">
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Category Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <select name="category_name" class="form-select mb-3" aria-label="Default select example">
                        <option selected="" disabled="">--Choose Category--</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->category_name }}" {{ old('category_name', $category->category_name) == $subCategory->category_name ? 'selected': '' }}>{{ $category->category_name }}</option>
                        @endforeach
                      </select>
                      @error('category_name')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">SubCategory Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="subcategory_name" class="form-control" value="{{ old('subcategory_name', $subCategory->subcategory_name) }}">
                      @error('subcategory_name')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                      <input type="submit" class="btn btn-primary px-4" value="Update SubCategory">
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
@endsection
```
