# Section50: Backend Store Category Setup

## 433 Get Category All Data Part1

- `rousources/views/admin/body/sidebar.blade.php`を編集<br>

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
        // 編集
        <div class="parent-icon"><i class="bx bx-home-circle"></i></div>
        <div class="menu-title">Dashboard</div>
      </a>
    </li>
    <li class="menu-label">UI Elements</li>
    <li>
      <a href="javascript:;" class="has-arrow">
        <div class="parent-icon"><i class="bx bx-cart"></i></div>
        <div class="menu-title">Category</div>
        // 編集
      </a>
      <ul>
        <li>
          <a href="{{ route('all.category') }}">
            // 編集
            <i class="bx bx-right-arrow-alt"></i>
            All Category // 編集
          </a>
        </li>
        <li>
          <a href="ecommerce-products-details.html">
            <i class="bx bx-right-arrow-alt"></i>
            Add Category
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a class="has-arrow" href="javascript:;">
        <div class="parent-icon"><i class="bx bx-bookmark-heart"></i></div>
        <div class="menu-title">Components</div>
      </a>
      <ul>
        <li>
          <a href="component-alerts.html">
            <i class="bx bx-right-arrow-alt"></i>
            Alerts
          </a>
        </li>
        <li>
          <a href="component-accordions.html">
            <i class="bx bx-right-arrow-alt"></i>
            Accordions
          </a>
        </li>
        <li>
          <a href="component-badges.html">
            <i class="bx bx-right-arrow-alt"></i>
            Badges
          </a>
        </li>
        <li>
          <a href="component-buttons.html">
            <i class="bx bx-right-arrow-alt"></i>
            Buttons
          </a>
        </li>
        <li>
          <a href="component-cards.html">
            <i class="bx bx-right-arrow-alt"></i>
            Cards
          </a>
        </li>
        <li>
          <a href="component-carousels.html">
            <i class="bx bx-right-arrow-alt"></i>
            Carousels
          </a>
        </li>
        <li>
          <a href="component-list-groups.html">
            <i class="bx bx-right-arrow-alt"></i>
            List Groups
          </a>
        </li>
        <li>
          <a href="component-media-object.html">
            <i class="bx bx-right-arrow-alt"></i>
            Media Objects
          </a>
        </li>
        <li>
          <a href="component-modals.html">
            <i class="bx bx-right-arrow-alt"></i>
            Modals
          </a>
        </li>
        <li>
          <a href="component-navs-tabs.html">
            <i class="bx bx-right-arrow-alt"></i>
            Navs & Tabs
          </a>
        </li>
        <li>
          <a href="component-navbar.html">
            <i class="bx bx-right-arrow-alt"></i>
            Navbar
          </a>
        </li>
        <li>
          <a href="component-paginations.html">
            <i class="bx bx-right-arrow-alt"></i>
            Pagination
          </a>
        </li>
        <li>
          <a href="component-popovers-tooltips.html">
            <i class="bx bx-right-arrow-alt"></i>
            Popovers & Tooltips
          </a>
        </li>
        <li>
          <a href="component-progress-bars.html">
            <i class="bx bx-right-arrow-alt"></i>
            Progress
          </a>
        </li>
        <li>
          <a href="component-spinners.html">
            <i class="bx bx-right-arrow-alt"></i>
            Spinners
          </a>
        </li>
        <li>
          <a href="component-notifications.html">
            <i class="bx bx-right-arrow-alt"></i>
            Notifications
          </a>
        </li>
        <li>
          <a href="component-avtars-chips.html">
            <i class="bx bx-right-arrow-alt"></i>
            Avatrs & Chips
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
}
```

- `resources/views/backend/category`ディレクトリを作成<br>

* `resources/views/backend/category/category_view.blade.php`ファイルを作成<br>

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
                <th>Order id</th>
                <th>Product</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>#897656</td>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="recent-product-img">
                      <img src="assets/images/icons/chair.png" alt="" />
                    </div>
                    <div class="ms-2">
                      <h6 class="mb-1 font-14">Light Blue Chair</h6>
                    </div>
                  </div>
                </td>
                <td>Brooklyn Zeo</td>
                <td>12 Jul 2020</td>
                <td>$64.00</td>
                <td>
                  <div class="badge rounded-pill bg-light-info text-info w-100">
                    In Progress
                  </div>
                </td>
                <td>
                  <div class="d-flex order-actions">
                    <a href="javascript:;" class="">
                      <i class="bx bx-cog"></i>
                    </a>
                    <a href="javascript:;" class="ms-4">
                      <i class="bx bx-down-arrow-alt"></i>
                    </a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>#987549</td>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="recent-product-img">
                      <img src="assets/images/icons/shoes.png" alt="" />
                    </div>
                    <div class="ms-2">
                      <h6 class="mb-1 font-14">Green Sport Shoes</h6>
                    </div>
                  </div>
                </td>
                <td>Martin Hughes</td>
                <td>14 Jul 2020</td>
                <td>$45.00</td>
                <td>
                  <div
                    class="badge rounded-pill bg-light-success text-success w-100"
                  >
                    Completed
                  </div>
                </td>
                <td>
                  <div class="d-flex order-actions">
                    <a href="javascript:;" class="">
                      <i class="bx bx-cog"></i>
                    </a>
                    <a href="javascript:;" class="ms-4">
                      <i class="bx bx-down-arrow-alt"></i>
                    </a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>#685749</td>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="recent-product-img">
                      <img src="assets/images/icons/headphones.png" alt="" />
                    </div>
                    <div class="ms-2">
                      <h6 class="mb-1 font-14">Red Headphone 07</h6>
                    </div>
                  </div>
                </td>
                <td>Shoan Stephen</td>
                <td>15 Jul 2020</td>
                <td>$67.00</td>
                <td>
                  <div
                    class="badge rounded-pill bg-light-danger text-danger w-100"
                  >
                    Cancelled
                  </div>
                </td>
                <td>
                  <div class="d-flex order-actions">
                    <a href="javascript:;" class="">
                      <i class="bx bx-cog"></i>
                    </a>
                    <a href="javascript:;" class="ms-4">
                      <i class="bx bx-down-arrow-alt"></i>
                    </a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>#887459</td>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="recent-product-img">
                      <img src="assets/images/icons/idea.png" alt="" />
                    </div>
                    <div class="ms-2">
                      <h6 class="mb-1 font-14">Mini Laptop Device</h6>
                    </div>
                  </div>
                </td>
                <td>Alister Campel</td>
                <td>18 Jul 2020</td>
                <td>$87.00</td>
                <td>
                  <div
                    class="badge rounded-pill bg-light-success text-success w-100"
                  >
                    Completed
                  </div>
                </td>
                <td>
                  <div class="d-flex order-actions">
                    <a href="javascript:;" class="">
                      <i class="bx bx-cog"></i>
                    </a>
                    <a href="javascript:;" class="ms-4">
                      <i class="bx bx-down-arrow-alt"></i>
                    </a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>#335428</td>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="recent-product-img">
                      <img
                        src="assets/images/icons/user-interface.png"
                        alt=""
                      />
                    </div>
                    <div class="ms-2">
                      <h6 class="mb-1 font-14">Purple Mobile Phone</h6>
                    </div>
                  </div>
                </td>
                <td>Keate Medona</td>
                <td>20 Jul 2020</td>
                <td>$75.00</td>
                <td>
                  <div class="badge rounded-pill bg-light-info text-info w-100">
                    In Progress
                  </div>
                </td>
                <td>
                  <div class="d-flex order-actions">
                    <a href="javascript:;" class="">
                      <i class="bx bx-cog"></i>
                    </a>
                    <a href="javascript:;" class="ms-4">
                      <i class="bx bx-down-arrow-alt"></i>
                    </a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>#224578</td>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="recent-product-img">
                      <img src="assets/images/icons/watch.png" alt="" />
                    </div>
                    <div class="ms-2">
                      <h6 class="mb-1 font-14">Smart Hand Watch</h6>
                    </div>
                  </div>
                </td>
                <td>Winslet Maya</td>
                <td>22 Jul 2020</td>
                <td>$80.00</td>
                <td>
                  <div
                    class="badge rounded-pill bg-light-danger text-danger w-100"
                  >
                    Cancelled
                  </div>
                </td>
                <td>
                  <div class="d-flex order-actions">
                    <a href="javascript:;" class="">
                      <i class="bx bx-cog"></i>
                    </a>
                    <a href="javascript:;" class="ms-4">
                      <i class="bx bx-down-arrow-alt"></i>
                    </a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>#447896</td>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="recent-product-img">
                      <img src="assets/images/icons/tshirt.png" alt="" />
                    </div>
                    <div class="ms-2">
                      <h6 class="mb-1 font-14">T-Shirt Blue</h6>
                    </div>
                  </div>
                </td>
                <td>Emy Jackson</td>
                <td>28 Jul 2020</td>
                <td>$96.00</td>
                <td>
                  <div
                    class="badge rounded-pill bg-light-success text-success w-100"
                  >
                    Completed
                  </div>
                </td>
                <td>
                  <div class="d-flex order-actions">
                    <a href="javascript:;" class="">
                      <i class="bx bx-cog"></i>
                    </a>
                    <a href="javascript:;" class="ms-4">
                      <i class="bx bx-down-arrow-alt"></i>
                    </a>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
```
