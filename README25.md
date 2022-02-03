# Section53: Backend Store Product Setup

## 450 Get Product All Data

- `server/resources/views/admin/body/sidebar.blade.php`を編集<br>

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
        <div class="menu-title">Slider</div>
      </a>
      <ul>
        <li>
          <a href="{{ route('all.slider') }}">
            <i class="bx bx-right-arrow-alt"></i>
            All Slider
          </a>
        </li>
        <li>
          <a href="{{ route('add.slider') }}">
            <i class="bx bx-right-arrow-alt"></i>
            Add Slider
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a class="has-arrow" href="javascript:;">
        <div class="parent-icon"><i class="bx bx-donate-blood"></i></div>
        <div class="menu-title">Product</div>
      </a>
      <ul>
        <li>
          // 編集
          <a href="{{ route('all.product') }}">
            <i class="bx bx-right-arrow-alt"></i>
            All Product
          </a>
        </li>
        <li>
          // 編集
          <a href="icons-boxicons.html">
            <i class="bx bx-right-arrow-alt"></i>
            Add Product
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
use App\Http\Controllers\Admin\ProductListController;
use App\Http\Controllers\Admin\SliderController;
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
  ])->name('subcategory.edit');

  Route::post('/update/{id}', [
    CategoryController::class,
    'updateSubCategory',
  ])->name('subcategory.update');

  Route::get('/delete/{id}', [
    CategoryController::class,
    'deleteSubCategory',
  ])->name('subcategory.delete');
});

Route::prefix('slider')->group(function () {
  Route::get('/all', [SliderController::class, 'getAllSlider'])->name(
    'all.slider'
  );

  Route::get('/add', [SliderController::class, 'addSlider'])->name(
    'add.slider'
  );

  Route::post('/store', [SliderController::class, 'storeSlider'])->name(
    'slider.store'
  );

  Route::get('/edit/{id}', [SliderController::class, 'editSlider'])->name(
    'slider.edit'
  );

  Route::post('/update/{id}', [SliderController::class, 'updateSlider'])->name(
    'slider.update'
  );

  Route::get('/delete/{id}', [SliderController::class, 'deleteSlider'])->name(
    'slider.delete'
  );
});

// 追記
Route::prefix('product')->group(function () {
  Route::get('/all', [ProductListController::class, 'getAllProduct'])->name(
    'all.product'
  );
});
```

- `app/Http/Controllers/Admin/ProductListController.php`を編集<br>

```php:ProductController.php
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

  public function similarProduct(Request $request)
  {
    $subcategory = $request->subcategory;
    $productlist = ProductList::where('subcategory', $subcategory)
      ->orderBy('id', 'desc')
      ->limit(6)
      ->get();

    return $productlist;
  }

  // 追記
  public function getAllProduct()
  {
    $products = ProductList::latest()->get();

    return view('backend.product.product_all', compact('products'));
  }
}
```

- `resources/views/backend/product`ディレクトリを作成<br>

* `resources/views/backend/product.product_all.blade.php`ファイルを作成<br>

```html:product_all.blade.php
@extends('admin.admin_master') @section('admin')
<div class="page-wrapper">
  <div class="page-content">
    <div class="card radius-10">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div>
            <h5 class="mb-0">All Product</h5>
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
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Product Code</th>
                <th>Product Category</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php($i = 1) @foreach($products as $product)
              <tr>
                <td>{{ $i++ }}</td>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="recent-product-img">
                      <img src="{{ $product->image }}" alt="" />
                    </div>
                  </div>
                </td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->product_code }}</td>
                <td>{{ $product->category }}</td>
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

## 451 Create Custom Paginations

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

  public function similarProduct(Request $request)
  {
    $subcategory = $request->subcategory;
    $productlist = ProductList::where('subcategory', $subcategory)
      ->orderBy('id', 'desc')
      ->limit(6)
      ->get();

    return $productlist;
  }

  public function getAllProduct()
  {
    // 編集
    $products = ProductList::latest()->paginate(10);

    return view('backend.product.product_all', compact('products'));
  }
}
```

- 参考: https://laravel.com/docs/8.x/pagination#introduction <br>

* `$ php artisan vendor:publish --tag=laravel-pagination`を実行<br>

- `resources/views/vendor/pagination/custom.blade.php`ファイルを作成<br>

```html:custom.blade.php
@if ($paginator->hasPages())
<nav aria-label="Page navigation example">
  <ul class="pagination round-pagination">
    @if ($paginator->onFirstPage())
    <li
      class="page-item disabled"
      aria-disabled="true"
      aria-label="@lang('pagination.previous')"
    >
      <a class="page-link" href="javascript:;">Previous</a>
    </li>
    @else
    <li class="page-item">
      <a
        class="page-link"
        href="{{ $paginator->previousPageUrl() }}"
        rel="prev"
        aria-label="@lang('pagination.previous')"
      >
        &lsaquo;
      </a>
    </li>
    @endif @foreach ($elements as $element) {{-- "Three Dots" Separator --}} @if
    (is_string($element))
    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
    @endif {{-- Array Of Links --}} @if (is_array($element)) @foreach ($element
    as $page => $url) @if ($page == $paginator->currentPage())
    <li class="page-item active active" aria-current="page">
      <a class="page-link" href="javascript:;">{{ $page }}</a>
    </li>
    @else
    <li><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
    @endif @endforeach @endif @endforeach @if ($paginator->hasMorePages())
    <li class="page-item">
      <a
        class="page-link"
        href="{{ $paginator->nextPageUrl() }}"
        rel="next"
        aria-label="@lang('pagination.next')"
      >
        Next
      </a>
    </li>
    @else
    <li
      class="page-item disabled"
      aria-disabled="true"
      aria-label="@lang('pagination.next')"
    >
      <a class="page-link" href="javascript:;">Next</a>
    </li>
    @endif
  </ul>
</nav>
@endif
```

- `resources/views/backend/product/product_all.blade.php`を編集<br>

```html:product_all.blade.php
@extends('admin.admin_master') @section('admin')
<div class="page-wrapper">
  <div class="page-content">
    <div class="card radius-10">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div>
            <h5 class="mb-0">All Product</h5>
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
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Product Code</th>
                <th>Product Category</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php($i = 1) @foreach($products as $product)
              <tr>
                <td>{{ $i++ }}</td>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="recent-product-img">
                      <img src="{{ $product->image }}" alt="" />
                    </div>
                  </div>
                </td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->product_code }}</td>
                <td>{{ $product->category }}</td>
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
    // 追記 {{ $products->links('vendor.pagination.custom') }}
  </div>
</div>
@endsection
```
