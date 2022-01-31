# Section51: Backend Store Sub Category Setup

## 441 Get Sub Category All Data

- `resurces/views/admin/body/sidebar.blade.php`を編集<br>

```html:sidebar.blade.php
<div class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header">
    <div>
      <img
        src="{{ asset('backend/assets/images/logo-icon.png') }}"
        class="logo-icon"
        alt="logo icon"
      />
    </div>
    <div>
      <h4 class="logo-text">Easy Shop</h4>
    </div>
    <div class="toggle-icon ms-auto"><i class="bx bx-arrow-to-left"></i></div>
  </div>
  <!--navigation-->
  <ul class="metismenu" id="menu">
    <li>
      <a href="{{ url('/dashboard') }}">
        <div class="parent-icon"><i class="bx bx-home-circle"></i></div>
        <div class="menu-title">Dashboard</div>
      </a>
    </li>
    <li class="menu-label">UI Elements</li>
    <li>
      <a href="javascript:;" class="has-arrow">
        <div class="parent-icon"><i class="bx bx-cart"></i></div>
        <div class="menu-title">Category</div>
      </a>
      <ul>
        <li>
          <a href="{{ route('all.category') }}">
            <i class="bx bx-right-arrow-alt"></i>
            All Category
          </a>
        </li>
        <li>
          <a href="{{ route('add.category') }}">
            <i class="bx bx-right-arrow-alt"></i>
            Add Category
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a class="has-arrow" href="javascript:;">
        <div class="parent-icon"><i class="bx bx-bookmark-heart"></i></div>
        <div class="menu-title">Sub Category</div>
      </a>
      <ul>
        <li>
          // 編集
          <a href="{{ route('all.subcategory') }}">
            <i class="bx bx-right-arrow-alt"></i>
            All SubCategory
          </a>
        </li>
        <li>
          // 編集
          <a href="component-accordions.html">
            <i class="bx bx-right-arrow-alt"></i>
            Add SubCategory
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a class="has-arrow" href="javascript:;">
        <div class="parent-icon"><i class="bx bx-repeat"></i></div>
        <div class="menu-title">Content</div>
      </a>
      <ul>
        <li>
          <a href="content-grid-system.html">
            <i class="bx bx-right-arrow-alt"></i>
            Grid System
          </a>
        </li>
        <li>
          <a href="content-typography.html">
            <i class="bx bx-right-arrow-alt"></i>
            Typography
          </a>
        </li>
        <li>
          <a href="content-text-utilities.html">
            <i class="bx bx-right-arrow-alt"></i>
            Text Utilities
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a class="has-arrow" href="javascript:;">
        <div class="parent-icon"><i class="bx bx-donate-blood"></i></div>
        <div class="menu-title">Icons</div>
      </a>
      <ul>
        <li>
          <a href="icons-line-icons.html">
            <i class="bx bx-right-arrow-alt"></i>
            Line Icons
          </a>
        </li>
        <li>
          <a href="icons-boxicons.html">
            <i class="bx bx-right-arrow-alt"></i>
            Boxicons
          </a>
        </li>
        <li>
          <a href="icons-feather-icons.html">
            <i class="bx bx-right-arrow-alt"></i>
            Feather Icons
          </a>
        </li>
      </ul>
    </li>
    <li class="menu-label">Forms & Tables</li>
    <li>
      <a class="has-arrow" href="javascript:;">
        <div class="parent-icon"><i class="bx bx-message-square-edit"></i></div>
        <div class="menu-title">Forms</div>
      </a>
      <ul>
        <li>
          <a href="form-elements.html">
            <i class="bx bx-right-arrow-alt"></i>
            Form Elements
          </a>
        </li>
        <li>
          <a href="form-input-group.html">
            <i class="bx bx-right-arrow-alt"></i>
            Input Groups
          </a>
        </li>
        <li>
          <a href="form-layouts.html">
            <i class="bx bx-right-arrow-alt"></i>
            Forms Layouts
          </a>
        </li>
        <li>
          <a href="form-validations.html">
            <i class="bx bx-right-arrow-alt"></i>
            Form Validation
          </a>
        </li>
        <li>
          <a href="form-wizard.html">
            <i class="bx bx-right-arrow-alt"></i>
            Form Wizard
          </a>
        </li>
        <li>
          <a href="form-text-editor.html">
            <i class="bx bx-right-arrow-alt"></i>
            Text Editor
          </a>
        </li>
        <li>
          <a href="form-file-upload.html">
            <i class="bx bx-right-arrow-alt"></i>
            File Upload
          </a>
        </li>
        <li>
          <a href="form-date-time-pickes.html">
            <i class="bx bx-right-arrow-alt"></i>
            Date Pickers
          </a>
        </li>
        <li>
          <a href="form-select2.html">
            <i class="bx bx-right-arrow-alt"></i>
            Select2
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a class="has-arrow" href="javascript:;">
        <div class="parent-icon"><i class="bx bx-grid-alt"></i></div>
        <div class="menu-title">Tables</div>
      </a>
      <ul>
        <li>
          <a href="table-basic-table.html">
            <i class="bx bx-right-arrow-alt"></i>
            Basic Table
          </a>
        </li>
        <li>
          <a href="table-datatable.html">
            <i class="bx bx-right-arrow-alt"></i>
            Data Table
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a href="https://themeforest.net/user/codervent" target="_blank">
        <div class="parent-icon"><i class="bx bx-support"></i></div>
        <div class="menu-title">Support</div>
      </a>
    </li>
  </ul>
  <!--end navigation-->
</div>
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
    // 追記
    $subCategories = Subcategory::latest()->get();

    return view(
      'backend.subCategory.subCategory_view',
      compact('subCategories')
    );
  }
}
```

- `resources/views/backend/subCategory`ディレクトリを作成<br>

* `redources/views/backend/subCategory/subCategory_view.blade.php`ファイルを作成<br>

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
                  <a
                    href="{{-- route('category.edit', $category->id) --}}"
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

- `resources/views/admin/body/sidebar.blade.php`を編集<br>

```html:sidebar.blade.php
<div class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header">
    <div>
      <img
        src="{{ asset('backend/assets/images/logo-icon.png') }}"
        class="logo-icon"
        alt="logo icon"
      />
    </div>
    <div>
      <h4 class="logo-text">Easy Shop</h4>
    </div>
    <div class="toggle-icon ms-auto"><i class="bx bx-arrow-to-left"></i></div>
  </div>
  <!--navigation-->
  <ul class="metismenu" id="menu">
    <li>
      <a href="{{ url('/dashboard') }}">
        <div class="parent-icon"><i class="bx bx-home-circle"></i></div>
        <div class="menu-title">Dashboard</div>
      </a>
    </li>
    <li class="menu-label">UI Elements</li>
    <li>
      <a href="javascript:;" class="has-arrow">
        <div class="parent-icon"><i class="bx bx-cart"></i></div>
        <div class="menu-title">Category</div>
      </a>
      <ul>
        <li>
          <a href="{{ route('all.category') }}">
            <i class="bx bx-right-arrow-alt"></i>
            All Category
          </a>
        </li>
        <li>
          <a href="{{ route('add.category') }}">
            <i class="bx bx-right-arrow-alt"></i>
            Add Category
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a class="has-arrow" href="javascript:;">
        <div class="parent-icon"><i class="bx bx-bookmark-heart"></i></div>
        <div class="menu-title">Sub Category</div>
      </a>
      <ul>
        <li>
          <a href="{{ route('all.subcategory') }}">
            <i class="bx bx-right-arrow-alt"></i>
            All SubCategory
          </a>
        </li>
        <li>
          // 編集
          <a href="{{ route('add.subcategory') }}">
            <i class="bx bx-right-arrow-alt"></i>
            Add SubCategory
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a class="has-arrow" href="javascript:;">
        <div class="parent-icon"><i class="bx bx-repeat"></i></div>
        <div class="menu-title">Content</div>
      </a>
      <ul>
        <li>
          <a href="content-grid-system.html">
            <i class="bx bx-right-arrow-alt"></i>
            Grid System
          </a>
        </li>
        <li>
          <a href="content-typography.html">
            <i class="bx bx-right-arrow-alt"></i>
            Typography
          </a>
        </li>
        <li>
          <a href="content-text-utilities.html">
            <i class="bx bx-right-arrow-alt"></i>
            Text Utilities
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a class="has-arrow" href="javascript:;">
        <div class="parent-icon"><i class="bx bx-donate-blood"></i></div>
        <div class="menu-title">Icons</div>
      </a>
      <ul>
        <li>
          <a href="icons-line-icons.html">
            <i class="bx bx-right-arrow-alt"></i>
            Line Icons
          </a>
        </li>
        <li>
          <a href="icons-boxicons.html">
            <i class="bx bx-right-arrow-alt"></i>
            Boxicons
          </a>
        </li>
        <li>
          <a href="icons-feather-icons.html">
            <i class="bx bx-right-arrow-alt"></i>
            Feather Icons
          </a>
        </li>
      </ul>
    </li>
    <li class="menu-label">Forms & Tables</li>
    <li>
      <a class="has-arrow" href="javascript:;">
        <div class="parent-icon"><i class="bx bx-message-square-edit"></i></div>
        <div class="menu-title">Forms</div>
      </a>
      <ul>
        <li>
          <a href="form-elements.html">
            <i class="bx bx-right-arrow-alt"></i>
            Form Elements
          </a>
        </li>
        <li>
          <a href="form-input-group.html">
            <i class="bx bx-right-arrow-alt"></i>
            Input Groups
          </a>
        </li>
        <li>
          <a href="form-layouts.html">
            <i class="bx bx-right-arrow-alt"></i>
            Forms Layouts
          </a>
        </li>
        <li>
          <a href="form-validations.html">
            <i class="bx bx-right-arrow-alt"></i>
            Form Validation
          </a>
        </li>
        <li>
          <a href="form-wizard.html">
            <i class="bx bx-right-arrow-alt"></i>
            Form Wizard
          </a>
        </li>
        <li>
          <a href="form-text-editor.html">
            <i class="bx bx-right-arrow-alt"></i>
            Text Editor
          </a>
        </li>
        <li>
          <a href="form-file-upload.html">
            <i class="bx bx-right-arrow-alt"></i>
            File Upload
          </a>
        </li>
        <li>
          <a href="form-date-time-pickes.html">
            <i class="bx bx-right-arrow-alt"></i>
            Date Pickers
          </a>
        </li>
        <li>
          <a href="form-select2.html">
            <i class="bx bx-right-arrow-alt"></i>
            Select2
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a class="has-arrow" href="javascript:;">
        <div class="parent-icon"><i class="bx bx-grid-alt"></i></div>
        <div class="menu-title">Tables</div>
      </a>
      <ul>
        <li>
          <a href="table-basic-table.html">
            <i class="bx bx-right-arrow-alt"></i>
            Basic Table
          </a>
        </li>
        <li>
          <a href="table-datatable.html">
            <i class="bx bx-right-arrow-alt"></i>
            Data Table
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a href="https://themeforest.net/user/codervent" target="_blank">
        <div class="parent-icon"><i class="bx bx-support"></i></div>
        <div class="menu-title">Support</div>
      </a>
    </li>
  </ul>
  <!--end navigation-->
</div>
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
    // 追記
    $categories = Category::latest()->get();

    return view('backend.subCategory.subCategory_add', compact('categories'));
  }
}
```

- `resources/views/backend/subCategory/subCategory_add.blade.php`ファイルを作成<br>

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
            <form method="post" action="{{ route('category.store') }}">
              @csrf
              <div class="card">
                <div class="card-body">
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Category Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <select class="form-select mb-3" name="category_name" aria-label="Default select example">
                        <option selected="">Choose Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->category_name }}" {{ old('category_name') == $category->category_name ? 'selected': '' }}>{{ $category->category_name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">SubCategory Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="category_name" class="form-control" value="{{ old('subcategory_name') }}">
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
