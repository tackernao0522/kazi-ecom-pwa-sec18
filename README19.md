## 435 Install Image Intervention Package

- 参考: https://image.intervention.io/v2/introduction/installation <br>

* `$ composer require intervention/image`を実行<br>

- `config/app.php`を編集<br>

```php:app.php
<?php

return [
  /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

  'name' => env('APP_NAME', 'Laravel'),

  /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

  'env' => env('APP_ENV', 'production'),

  /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

  'debug' => (bool) env('APP_DEBUG', false),

  /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

  'url' => env('APP_URL', 'http://localhost'),

  'asset_url' => env('ASSET_URL', null),

  /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

  'timezone' => 'UTC',

  /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

  'locale' => 'en',

  /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

  'fallback_locale' => 'en',

  /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeds. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

  'faker_locale' => 'en_US',

  /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

  'key' => env('APP_KEY'),

  'cipher' => 'AES-256-CBC',

  /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

  'providers' => [
    /*
     * Laravel Framework Service Providers...
     */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    Illuminate\Database\DatabaseServiceProvider::class,
    Illuminate\Encryption\EncryptionServiceProvider::class,
    Illuminate\Filesystem\FilesystemServiceProvider::class,
    Illuminate\Foundation\Providers\FoundationServiceProvider::class,
    Illuminate\Hashing\HashServiceProvider::class,
    Illuminate\Mail\MailServiceProvider::class,
    Illuminate\Notifications\NotificationServiceProvider::class,
    Illuminate\Pagination\PaginationServiceProvider::class,
    Illuminate\Pipeline\PipelineServiceProvider::class,
    Illuminate\Queue\QueueServiceProvider::class,
    Illuminate\Redis\RedisServiceProvider::class,
    Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
    Illuminate\Session\SessionServiceProvider::class,
    Illuminate\Translation\TranslationServiceProvider::class,
    Illuminate\Validation\ValidationServiceProvider::class,
    Illuminate\View\ViewServiceProvider::class,

    /*
     * Package Service Providers...
     */
    Intervention\Image\ImageServiceProvider::class, // 追記

    /*
     * Application Service Providers...
     */
    App\Providers\AppServiceProvider::class,
    App\Providers\AuthServiceProvider::class,
    // App\Providers\BroadcastServiceProvider::class,
    App\Providers\EventServiceProvider::class,
    App\Providers\RouteServiceProvider::class,
    App\Providers\FortifyServiceProvider::class,
    App\Providers\JetstreamServiceProvider::class,
  ],

  /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

  'aliases' => [
    'App' => Illuminate\Support\Facades\App::class,
    'Arr' => Illuminate\Support\Arr::class,
    'Artisan' => Illuminate\Support\Facades\Artisan::class,
    'Auth' => Illuminate\Support\Facades\Auth::class,
    'Blade' => Illuminate\Support\Facades\Blade::class,
    'Broadcast' => Illuminate\Support\Facades\Broadcast::class,
    'Bus' => Illuminate\Support\Facades\Bus::class,
    'Cache' => Illuminate\Support\Facades\Cache::class,
    'Config' => Illuminate\Support\Facades\Config::class,
    'Cookie' => Illuminate\Support\Facades\Cookie::class,
    'Crypt' => Illuminate\Support\Facades\Crypt::class,
    'Date' => Illuminate\Support\Facades\Date::class,
    'DB' => Illuminate\Support\Facades\DB::class,
    'Eloquent' => Illuminate\Database\Eloquent\Model::class,
    'Event' => Illuminate\Support\Facades\Event::class,
    'File' => Illuminate\Support\Facades\File::class,
    'Gate' => Illuminate\Support\Facades\Gate::class,
    'Hash' => Illuminate\Support\Facades\Hash::class,
    'Http' => Illuminate\Support\Facades\Http::class,
    'Js' => Illuminate\Support\Js::class,
    'Lang' => Illuminate\Support\Facades\Lang::class,
    'Log' => Illuminate\Support\Facades\Log::class,
    'Mail' => Illuminate\Support\Facades\Mail::class,
    'Notification' => Illuminate\Support\Facades\Notification::class,
    'Password' => Illuminate\Support\Facades\Password::class,
    'Queue' => Illuminate\Support\Facades\Queue::class,
    'RateLimiter' => Illuminate\Support\Facades\RateLimiter::class,
    'Redirect' => Illuminate\Support\Facades\Redirect::class,
    // 'Redis' => Illuminate\Support\Facades\Redis::class,
    'Request' => Illuminate\Support\Facades\Request::class,
    'Response' => Illuminate\Support\Facades\Response::class,
    'Route' => Illuminate\Support\Facades\Route::class,
    'Schema' => Illuminate\Support\Facades\Schema::class,
    'Session' => Illuminate\Support\Facades\Session::class,
    'Storage' => Illuminate\Support\Facades\Storage::class,
    'Str' => Illuminate\Support\Str::class,
    'URL' => Illuminate\Support\Facades\URL::class,
    'Validator' => Illuminate\Support\Facades\Validator::class,
    'View' => Illuminate\Support\Facades\View::class,
    'Image' => Intervention\Image\Facades\Image::class, // 追記
  ],
];
```

- `$ php artisan vendor:publish --provider="Intervention\Image\ImageServiceProviderLaravelRecent"`を実行<br>

## 436 Add Store Category Part1

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
            // 編集
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

  Route::get('/add', [CategoryController::class, 'addCategory'])->name(
    'add.category'
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
    // 追記
    return view('backend.category.category_add');
  }
}
```

- `resources/views/backend/category/category_add.blade.php`ファイルを作成<br>

* `resources/views/backend/category/category_add.blade.php`を編集<br>

```html:category_add.blade.php
@extends('admin.admin_master') @section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-wrapper">
  <div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Add Category</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item">
              <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Add Category
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
              action="{{ route('category.store') }}"
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
                        value="{{ old('category_name') }}"
                      />
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
                      src="{{ url('upload/no_image.jpg') }}"
                      style="width: 100px; height: 100px"
                    />
                  </div>
                  <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                      <input
                        type="submit"
                        class="btn btn-primary px-4"
                        value="Add Category"
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
});
```

## 437 Add Store Category Part2

- `public/upload/category`ディレクトリを作成<br>

* `resources/views/backend/category/category_add.blade.php`を編集<br>

```html:category_add.blade.php
@extends('admin.admin_master') @section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-wrapper">
  <div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Add Category</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item">
              <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Add Category
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
              action="{{ route('category.store') }}"
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
                        value="{{ old('category_name') }}"
                      />
                      @error('category_name') // 追記
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
                      src="{{ url('upload/no_image.jpg') }}"
                      style="width: 100px; height: 100px"
                    />
                  </div>
                  <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                      <input
                        type="submit"
                        class="btn btn-primary px-4"
                        value="Add Category"
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
}
```

- Icon 参考サイト: https://www.flaticon.com/ <br>
