## 452 Add Store Product Part1

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
          <a href="{{ route('all.product') }}">
            <i class="bx bx-right-arrow-alt"></i>
            All Product
          </a>
        </li>
        <li>
          // 編集
          <a href="{{ route('add.product') }}">
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

Route::prefix('product')->group(function () {
  Route::get('/all', [ProductListController::class, 'getAllProduct'])->name(
    'all.product'
  );

  // 追記
  Route::get('/add', [ProductListController::class, 'addProduct'])->name(
    'add.product'
  );
});
```

- `app/Http/Controllers/Admin/ProductListController.php`を編集<br>

```php:ProductListController.php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductList;
use App\Models\Subcategory;
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
    $products = ProductList::latest()->paginate(10);

    return view('backend.product.product_all', compact('products'));
  }

  // 追記
  public function addProduct()
  {
    $categories = Category::orderBy('category_name', 'ASC')->get();
    $subCategories = Subcategory::orderBy('subcategory_name', 'ASC')->get();

    return view(
      'backend.product.product_add',
      compact('categories', 'subCategories')
    );
  }
}
```

- `resources/views/backend/product/product_add.blade.php`ファイルを作成<br>

```html:product_add.blade.php
@extends('admin.admin_master') @section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-wrapper">
  <div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">eCommerce</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item">
              <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Add New Product
            </li>
          </ol>
        </nav>
      </div>
      <div class="ms-auto">
        <div class="btn-group">
          <button type="button" class="btn btn-primary">Settings</button>
          <button
            type="button"
            class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
            data-bs-toggle="dropdown"
          >
            <span class="visually-hidden">Toggle Dropdown</span>
          </button>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
            <a class="dropdown-item" href="javascript:;">Action</a>
            <a class="dropdown-item" href="javascript:;">Another action</a>
            <a class="dropdown-item" href="javascript:;">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="javascript:;">Separated link</a>
          </div>
        </div>
      </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
      <div class="card-body p-4">
        <h5 class="card-title">Add New Product</h5>
        <hr />
        <div class="form-body mt-4">
          <div class="row">
            <div class="col-lg-8">
              <div class="border border-3 p-4 rounded">
                <div class="mb-3">
                  <label for="inputProductTitle" class="form-label">
                    Product Title
                  </label>
                  <input
                    type="email"
                    class="form-control"
                    id="inputProductTitle"
                    placeholder="Enter product title"
                  />
                </div>
                <div class="mb-3">
                  <label for="inputProductDescription" class="form-label">
                    Description
                  </label>
                  <textarea
                    class="form-control"
                    id="inputProductDescription"
                    rows="3"
                  ></textarea>
                </div>
                <div class="mb-3">
                  <label for="inputProductDescription" class="form-label">
                    Product Images
                  </label>
                  <input
                    id="image-uploadify"
                    type="file"
                    accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf"
                    multiple=""
                    style="display: none;"
                  />
                  <div class="imageuploadify well">
                    <div class="imageuploadify-overlay">
                      <i class="fa fa-picture-o"></i>
                    </div>
                    <div class="imageuploadify-images-list text-center">
                      <i class="bx bxs-cloud-upload"></i>
                      <span class="imageuploadify-message">
                        Drag&amp;Drop Your File(s)Here To Upload
                      </span>
                      <button type="button" class="btn btn-default">
                        or select file to upload
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="border border-3 p-4 rounded">
                <div class="row g-3">
                  <div class="col-md-6">
                    <label for="inputPrice" class="form-label">Price</label>
                    <input
                      type="email"
                      class="form-control"
                      id="inputPrice"
                      placeholder="00.00"
                    />
                  </div>
                  <div class="col-md-6">
                    <label for="inputCompareatprice" class="form-label">
                      Compare at Price
                    </label>
                    <input
                      type="password"
                      class="form-control"
                      id="inputCompareatprice"
                      placeholder="00.00"
                    />
                  </div>
                  <div class="col-md-6">
                    <label for="inputCostPerPrice" class="form-label">
                      Cost Per Price
                    </label>
                    <input
                      type="email"
                      class="form-control"
                      id="inputCostPerPrice"
                      placeholder="00.00"
                    />
                  </div>
                  <div class="col-md-6">
                    <label for="inputStarPoints" class="form-label">
                      Star Points
                    </label>
                    <input
                      type="password"
                      class="form-control"
                      id="inputStarPoints"
                      placeholder="00.00"
                    />
                  </div>
                  <div class="col-12">
                    <label for="inputProductType" class="form-label">
                      Product Type
                    </label>
                    <select class="form-select" id="inputProductType">
                      <option></option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <label for="inputVendor" class="form-label">Vendor</label>
                    <select class="form-select" id="inputVendor">
                      <option></option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <label for="inputCollection" class="form-label">
                      Collection
                    </label>
                    <select class="form-select" id="inputCollection">
                      <option></option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <label for="inputProductTags" class="form-label">
                      Product Tags
                    </label>
                    <input
                      type="text"
                      class="form-control"
                      id="inputProductTags"
                      placeholder="Enter Product Tags"
                    />
                  </div>
                  <div class="col-12">
                    <div class="d-grid">
                      <button type="button" class="btn btn-primary">
                        Save Product
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--end row-->
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
