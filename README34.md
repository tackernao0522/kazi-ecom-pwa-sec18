## 464 Get Product Order Part2

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
    <li class="menu-label">Manage Site</li>
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
          <a href="{{ route('add.product') }}">
            <i class="bx bx-right-arrow-alt"></i>
            Add Product
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a href="{{ route('contact.message') }}">
        <div class="parent-icon"><i class="bx bx-donate-blood"></i></div>
        <div class="menu-title">Contact Message</div>
      </a>
    </li>
    <li>
      <a href="{{ route('all.reviews') }}">
        <div class="parent-icon"><i class="bx bx-donate-blood"></i></div>
        <div class="menu-title">Product Review</div>
      </a>
    </li>

    <li>
      <a class="has-arrow" href="javascript:;">
        <div class="parent-icon"><i class="bx bx-donate-blood"></i></div>
        <div class="menu-title">Site Info</div>
      </a>
      <ul>
        <li>
          <a href="{{ route('getsite.info') }}">
            <i class="bx bx-right-arrow-alt"></i>
            Get Site Info
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-label">Customer Order</li>
    <li>
      <a class="has-arrow" href="javascript:;">
        <div class="parent-icon"><i class="bx bx-message-square-edit"></i></div>
        <div class="menu-title">Manege Order</div>
      </a>
      <ul>
        <li>
          <a href="{{ route('pending.order') }}">
            <i class="bx bx-right-arrow-alt"></i>
            Pending Order
          </a>
        </li>
        <li>
          // 編集
          <a href="{{ route('processing.order') }}">
            <i class="bx bx-right-arrow-alt"></i>
            Processing Order
          </a>
        </li>
        <li>
          <a href="{{ route('complete.order') }}">
            <i class="bx bx-right-arrow-alt"></i>
            Complete Order
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
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProductCartController;
use App\Http\Controllers\Admin\ProductListController;
use App\Http\Controllers\Admin\ProductReviewController;
use App\Http\Controllers\Admin\SiteInfoController;
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

  Route::get('/add', [ProductListController::class, 'addProduct'])->name(
    'add.product'
  );

  Route::post('/store', [ProductListController::class, 'storeProduct'])->name(
    'product.store'
  );

  Route::get('/edit/{id}', [ProductListController::class, 'editProduct'])->name(
    'product.edit'
  );

  Route::post('/update/{id}', [
    ProductListController::class,
    'updateProduct',
  ])->name('product.update');
});

Route::get('/all/message', [ContactController::class, 'getAllMessage'])->name(
  'contact.message'
);

Route::get('/message/delete/{id}', [
  ContactController::class,
  'deleteMessage',
])->name('message.delete');

Route::get('/all/reviews', [
  ProductReviewController::class,
  'getAllReviews',
])->name('all.reviews');

Route::get('/getsite/info', [SiteInfoController::class, 'getSiteInfo'])->name(
  'getsite.info'
);

Route::post('/update/siteinfo/{id}', [
  SiteInfoController::class,
  'updateSiteInfo',
])->name('update.siteinfo');

Route::prefix('order')->group(function () {
  Route::get('/pending', [ProductCartController::class, 'pendingOrder'])->name(
    'pending.order'
  );

  // 追記
  Route::get('/processing', [
    ProductCartController::class,
    'processingOrder',
  ])->name('processing.order');

  Route::get('/complete', [
    ProductCartController::class,
    'completeOrder',
  ])->name('complete.order');
  //
});
```

- `resources/views/backend/orders/processing_orders.blade.php`ファイルを作成<br>

```html:processing_orders.blade.php
@extends('admin.admin_master') @section('admin')
<div class="page-wrapper">
  <div class="page-content">
    <div class="card radius-10">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div>
            <h5 class="mb-0">All Processing Order</h5>
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
                <th>Product Name</th>
                <th>Invoice No</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Order Date</th>
                <th>Order Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php($i = 1) @foreach($orders as $order)
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $order->product_name}}</td>
                <td>{{ $order->invoice_no }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->total_price }}</td>
                <td>{{ $order->order_date }}</td>
                <td>
                  <strong>
                    <span class="text-danger">{{ $order->order_status }}</span>
                  </strong>
                </td>
                <td>
                  <a
                    href="{{-- route('subcategory.edit', $subCategory->id) --}}"
                    class="btn btn-info"
                  >
                    Details
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

- `resources/views/backend/orders/complete_orders.blade.php`ファイルを作成<br>

```html:complete_orders.blade.php
@extends('admin.admin_master') @section('admin')
<div class="page-wrapper">
  <div class="page-content">
    <div class="card radius-10">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div>
            <h5 class="mb-0">All Complete Order</h5>
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
                <th>Product Name</th>
                <th>Invoice No</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Order Date</th>
                <th>Order Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php($i = 1) @foreach($orders as $order)
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $order->product_name}}</td>
                <td>{{ $order->invoice_no }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->total_price }}</td>
                <td>{{ $order->order_date }}</td>
                <td>
                  <strong>
                    <span class="text-danger">{{ $order->order_status }}</span>
                  </strong>
                </td>
                <td>
                  <a
                    href="{{-- route('subcategory.edit', $subCategory->id) --}}"
                    class="btn btn-info"
                  >
                    Details
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
