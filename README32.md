## 461 Get Site Infos Part1

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

    // 追記
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
    //

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
use App\Http\Controllers\Admin\ContactController;
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

// 追記
Route::get('/getsite/info', [SiteInfoController::class, 'getSiteInfo'])->name(
  'getsite.info'
);
```

- `app/Http/Controllers/Admin/SiteInfoController.php`を編集<br>

```php:SiteInfoController.php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteInfo;
use Illuminate\Http\Request;

class SiteInfoController extends Controller
{
  public function allSiteInfo()
  {
    $result = SiteInfo::all();

    return $result;
  }

  // 追記
  public function getSiteInfo()
  {
    $siteinfo = SiteInfo::find(1);

    return view('backend.site_info.siteinfo_update', compact('siteinfo'));
  }
}
```

- `resources/views/backend/site_info`ディレクトリを作成<br>

* `resources/views/backend/site_info/siteinfo_update.blade.php`ファイルを作成<br>

```html:siteinfo_update.blade.php
@extends('admin.admin_master') @section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-wrapper">
  <div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Site Info Update</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item">
              <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Site Info Update
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
      <div class="main-body">
        <div class="row">
          <div class="col-lg-12">
            <form method="post" action="{{ route('change.password.update') }}">
              @csrf
              <div class="card">
                <div class="card-body">
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">About</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <textarea id="mytextarea" name="about">
 {{ old('about', $siteinfo->about) }} </textarea
                      >
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Refund Policy</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <textarea id="mytextarea1" name="refund">
 {{ old('refund', $siteinfo->refund) }} </textarea
                      >
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">How To Purchase</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <textarea id="mytextarea2" name="parchase_guide">
 {{ old('parchase_guide', $siteinfo->parchase_guide) }} </textarea
                      >
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Privacy Policy</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <textarea id="mytextarea3" name="privacy">
 {{ old('privacy', $siteinfo->privacy) }} </textarea
                      >
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <textarea id="mytextarea4" name="address">
 {{ old('privacy', $siteinfo->address) }} </textarea
                      >
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Andoroid App Link</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input
                        type="text"
                        name="android_app_link"
                        value="{{ old('android_app_link', $siteinfo->android_app_link) }}"
                        class="form-control"
                      />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Ios App Link</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input
                        type="text"
                        name="ios_app_link"
                        value="{{ old('ios_app_link', $siteinfo->ios_app_link) }}"
                        class="form-control"
                      />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Facebook Link</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input
                        type="text"
                        name="facebook_link"
                        value="{{ old('facebook_link', $siteinfo->facebook_link) }}"
                        class="form-control"
                      />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Twitter Link</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input
                        type="text"
                        name="twitter_link"
                        value="{{ old('twitter_link', $siteinfo->twitter_link) }}"
                        class="form-control"
                      />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Instagram Link</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input
                        type="text"
                        name="instagram_link"
                        value="{{ old('instagram_link', $siteinfo->instagram_link) }}"
                        class="form-control"
                      />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Copyright Text</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input
                        type="text"
                        name="copyright_text"
                        value="{{ old('copyright_text', $siteinfo->copyright_text) }}"
                        class="form-control"
                      />
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                      <input
                        type="submit"
                        class="btn btn-primary px-4"
                        value="Update SiteInfo"
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

<script
  src="https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js"
  referrerpolicy="origin"
></script>
<script>
  tinymce.init({
    selector: '#mytextarea',
  })
</script>
<script>
  tinymce.init({
    selector: '#mytextarea1',
  })
</script>
<script>
  tinymce.init({
    selector: '#mytextarea2',
  })
</script>
<script>
  tinymce.init({
    selector: '#mytextarea3',
  })
</script>
<script>
  tinymce.init({
    selector: '#mytextarea4',
  })
</script>
@endsection
```
