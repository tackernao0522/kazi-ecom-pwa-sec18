# Section49: Backend Change Password Setup

## 431 Admin Profile Change Password Part1

- `resources/views/admin/body/header.blade.php`を編集<br>

```html:header.blade.php
<header>
  <div class="topbar d-flex align-items-center">
    <nav class="navbar navbar-expand">
      <div class="mobile-toggle-menu"><i class="bx bx-menu"></i></div>
      <div class="search-bar flex-grow-1">
        <div class="position-relative search-bar-box">
          <input
            type="text"
            class="form-control search-control"
            placeholder="Type to search..."
          />
          <span class="position-absolute top-50 search-show translate-middle-y">
            <i class="bx bx-search"></i>
          </span>
          <span
            class="position-absolute top-50 search-close translate-middle-y"
          >
            <i class="bx bx-x"></i>
          </span>
        </div>
      </div>
      <div class="top-menu ms-auto">
        <ul class="navbar-nav align-items-center">
          <li class="nav-item mobile-search-icon">
            <a class="nav-link" href="#"><i class="bx bx-search"></i></a>
          </li>
          <li class="nav-item dropdown dropdown-large">
            <a
              class="nav-link dropdown-toggle dropdown-toggle-nocaret"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <i class="bx bx-category"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
              <div class="row row-cols-3 g-3 p-3">
                <div class="col text-center">
                  <div class="app-box mx-auto bg-gradient-cosmic text-white">
                    <i class="bx bx-group"></i>
                  </div>
                  <div class="app-title">Teams</div>
                </div>
                <div class="col text-center">
                  <div class="app-box mx-auto bg-gradient-burning text-white">
                    <i class="bx bx-atom"></i>
                  </div>
                  <div class="app-title">Projects</div>
                </div>
                <div class="col text-center">
                  <div class="app-box mx-auto bg-gradient-lush text-white">
                    <i class="bx bx-shield"></i>
                  </div>
                  <div class="app-title">Tasks</div>
                </div>
                <div class="col text-center">
                  <div class="app-box mx-auto bg-gradient-kyoto text-dark">
                    <i class="bx bx-notification"></i>
                  </div>
                  <div class="app-title">Feeds</div>
                </div>
                <div class="col text-center">
                  <div class="app-box mx-auto bg-gradient-blues text-dark">
                    <i class="bx bx-file"></i>
                  </div>
                  <div class="app-title">Files</div>
                </div>
                <div class="col text-center">
                  <div class="app-box mx-auto bg-gradient-moonlit text-white">
                    <i class="bx bx-filter-alt"></i>
                  </div>
                  <div class="app-title">Alerts</div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown dropdown-large">
            <a
              class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <span class="alert-count">7</span>
              <i class="bx bx-bell"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
              <a href="javascript:;">
                <div class="msg-header">
                  <p class="msg-header-title">Notifications</p>
                  <p class="msg-header-clear ms-auto">Marks all as read</p>
                </div>
              </a>
              <div class="header-notifications-list">
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="notify bg-light-primary text-primary">
                      <i class="bx bx-group"></i>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">
                        New Customers
                        <span class="msg-time float-end">14 Sec ago</span>
                      </h6>
                      <p class="msg-info">5 new user registered</p>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="notify bg-light-danger text-danger">
                      <i class="bx bx-cart-alt"></i>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">
                        New Orders
                        <span class="msg-time float-end">2 min ago</span>
                      </h6>
                      <p class="msg-info">You have recived new orders</p>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="notify bg-light-success text-success">
                      <i class="bx bx-file"></i>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">
                        24 PDF File
                        <span class="msg-time float-end">19 min ago</span>
                      </h6>
                      <p class="msg-info">The pdf files generated</p>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="notify bg-light-warning text-warning">
                      <i class="bx bx-send"></i>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">
                        Time Response
                        <span class="msg-time float-end">28 min ago</span>
                      </h6>
                      <p class="msg-info">5.1 min avarage time response</p>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="notify bg-light-info text-info">
                      <i class="bx bx-home-circle"></i>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">
                        New Product Approved
                        <span class="msg-time float-end">2 hrs ago</span>
                      </h6>
                      <p class="msg-info">Your new product has approved</p>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="notify bg-light-danger text-danger">
                      <i class="bx bx-message-detail"></i>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">
                        New Comments
                        <span class="msg-time float-end">4 hrs ago</span>
                      </h6>
                      <p class="msg-info">New customer comments recived</p>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="notify bg-light-success text-success">
                      <i class="bx bx-check-square"></i>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">
                        Your item is shipped
                        <span class="msg-time float-end">5 hrs ago</span>
                      </h6>
                      <p class="msg-info">Successfully shipped your item</p>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="notify bg-light-primary text-primary">
                      <i class="bx bx-user-pin"></i>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">
                        New 24 authors
                        <span class="msg-time float-end">1 day ago</span>
                      </h6>
                      <p class="msg-info">24 new authors joined last week</p>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="notify bg-light-warning text-warning">
                      <i class="bx bx-door-open"></i>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">
                        Defense Alerts
                        <span class="msg-time float-end">2 weeks ago</span>
                      </h6>
                      <p class="msg-info">45% less alerts last 4 weeks</p>
                    </div>
                  </div>
                </a>
              </div>
              <a href="javascript:;">
                <div class="text-center msg-footer">View All Notifications</div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown dropdown-large">
            <a
              class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <span class="alert-count">8</span>
              <i class="bx bx-comment"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
              <a href="javascript:;">
                <div class="msg-header">
                  <p class="msg-header-title">Messages</p>
                  <p class="msg-header-clear ms-auto">Marks all as read</p>
                </div>
              </a>
              <div class="header-message-list">
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="user-online">
                      <img
                        src="{{ asset('backend/assets/images/avatars/avatar-1.png') }}"
                        class="msg-avatar"
                        alt="user avatar"
                      />
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">
                        Daisy Anderson
                        <span class="msg-time float-end">5 sec ago</span>
                      </h6>
                      <p class="msg-info">The standard chunk of lorem</p>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="user-online">
                      <img
                        src="{{ asset('backend/assets/images/avatars/avatar-2.png') }}"
                        class="msg-avatar"
                        alt="user avatar"
                      />
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">
                        Althea Cabardo
                        <span class="msg-time float-end">14 sec ago</span>
                      </h6>
                      <p class="msg-info">Many desktop publishing packages</p>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="user-online">
                      <img
                        src="{{ asset('backend/assets/images/avatars/avatar-3.png') }}"
                        class="msg-avatar"
                        alt="user avatar"
                      />
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">
                        Oscar Garner
                        <span class="msg-time float-end">8 min ago</span>
                      </h6>
                      <p class="msg-info">Various versions have evolved over</p>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="user-online">
                      <img
                        src="{{ asset('backend/assets/images/avatars/avatar-4.png') }}"
                        class="msg-avatar"
                        alt="user avatar"
                      />
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">
                        Katherine Pechon
                        <span class="msg-time float-end">15 min ago</span>
                      </h6>
                      <p class="msg-info">
                        Making this the first true generator
                      </p>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="user-online">
                      <img
                        src="{{ asset('backend/assets/images/avatars/avatar-5.png') }}"
                        class="msg-avatar"
                        alt="user avatar"
                      />
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">
                        Amelia Doe
                        <span class="msg-time float-end">22 min ago</span>
                      </h6>
                      <p class="msg-info">
                        Duis aute irure dolor in reprehenderit
                      </p>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="user-online">
                      <img
                        src="{{ asset('backend/assets/images/avatars/avatar-6.png') }}"
                        class="msg-avatar"
                        alt="user avatar"
                      />
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">
                        Cristina Jhons
                        <span class="msg-time float-end">2 hrs ago</span>
                      </h6>
                      <p class="msg-info">
                        The passage is attributed to an unknown
                      </p>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="user-online">
                      <img
                        src="{{ asset('backend/assets/images/avatars/avatar-7.png') }}"
                        class="msg-avatar"
                        alt="user avatar"
                      />
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">
                        James Caviness
                        <span class="msg-time float-end">4 hrs ago</span>
                      </h6>
                      <p class="msg-info">The point of using Lorem</p>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="user-online">
                      <img
                        src="{{ asset('backend/assets/images/avatars/avatar-8.png') }}"
                        class="msg-avatar"
                        alt="user avatar"
                      />
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">
                        Peter Costanzo
                        <span class="msg-time float-end">6 hrs ago</span>
                      </h6>
                      <p class="msg-info">It was popularised in the 1960s</p>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="user-online">
                      <img
                        src="{{ asset('backend/assets/images/avatars/avatar-9.png') }}"
                        class="msg-avatar"
                        alt="user avatar"
                      />
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">
                        David Buckley
                        <span class="msg-time float-end">2 hrs ago</span>
                      </h6>
                      <p class="msg-info">Various versions have evolved over</p>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="user-online">
                      <img
                        src="{{ asset('backend/assets/images/avatars/avatar-10.png') }}"
                        class="msg-avatar"
                        alt="user avatar"
                      />
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">
                        Thomas Wheeler
                        <span class="msg-time float-end">2 days ago</span>
                      </h6>
                      <p class="msg-info">If you are going to use a passage</p>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="user-online">
                      <img
                        src="{{ asset('backend/assets/images/avatars/avatar-11.png') }}"
                        class="msg-avatar"
                        alt="user avatar"
                      />
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">
                        Johnny Seitz
                        <span class="msg-time float-end">5 days ago</span>
                      </h6>
                      <p class="msg-info">All the Lorem Ipsum generators</p>
                    </div>
                  </div>
                </a>
              </div>
              <a href="javascript:;">
                <div class="text-center msg-footer">View All Messages</div>
              </a>
            </div>
          </li>
        </ul>
      </div>
      <div class="user-box dropdown">
        <a
          class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret"
          href="#"
          role="button"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
          @php $adminData = App\Models\User::find(1) @endphp
          <img
            src="{{ !empty($adminData->profile_photo_path) ? url('upload/admin_images/' . $adminData->profile_photo_path) : url('upload/no_image.jpg') }}"
            class="user-img"
            alt="user avatar"
          />
          <div class="user-info ps-3">
            <p class="user-name mb-0">{{ $adminData->name }}</p>
            <p class="designattion mb-0">{{ $adminData->email }}</p>
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a class="dropdown-item" href="{{ route('user.profile') }}">
              <i class="bx bx-user"></i>
              <span>Profile</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="{{ route('change.password') }}">
              // 編集
              <i class="bx bx-cog"></i>
              <span>Change Password</span>
              // 編集
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="javascript:;">
              <i class="bx bx-home-circle"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="javascript:;">
              <i class="bx bx-dollar-circle"></i>
              <span>Earnings</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="javascript:;">
              <i class="bx bx-download"></i>
              <span>Downloads</span>
            </a>
          </li>
          <li>
            <div class="dropdown-divider mb-0"></div>
          </li>
          <li>
            <a class="dropdown-item" href="{{ route('admin.logout')}}">
              <i class="bx bx-log-out-circle"></i>
              <span>Logout</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</header>
```

- `routes/web.php`を編集<br>

```php:web.php
<?php

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

  Route::get('/change/password', [AdminController::class, 'changePassword'])->name('change.password');
```

- `app/Http/Controllers/AdminController.php`を編集<br>

```php:AdminController.php
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
  public function adminLogout()
  {
    Auth::logout();

    return redirect()->route('login');
  }

  public function userProfile()
  {
    $adminData = User::find(1);

    return view('backend.admin.admin_profile', compact('adminData'));
  }

  public function userProfileStore(Request $request)
  {
    $data = User::find(1);
    $data->name = $request->name;
    $data->email = $request->email;

    if ($request->file('profile_photo_path')) {
      $file = $request->file('profile_photo_path');
      @unlink(public_path('upload/admin_images/' . $data->profile_photo_path));
      $filename = date('YmdHi') . $file->getClientOriginalName();
      $file->move(public_path('upload/admin_images'), $filename);
      $data['profile_photo_path'] = $filename;
    }
    $data->save();

    $notification = [
      'message' => 'User Profile Updated Successfully',
      'alert-type' => 'success',
    ];

    return redirect()
      ->route('user.profile')
      ->with($notification);
  }

  public function changePassword()
  {
    return view('backend.admin.change_password');
  }
}
```

- `resources/views/backend/admin/change_password.blade.php`ファイルを作成<br>

```html:change_password.blade.php
@extends('admin.admin_master') @section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-wrapper">
  <div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">User Change Password</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item">
              <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Change Password
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
                      <h6 class="mb-0">Current Password</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input
                        id="current_password"
                        type="oldPassword"
                        name="name"
                        class="form-control"
                      />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">New Password</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input
                        id="password"
                        type="password"
                        name="password"
                        class="form-control"
                        value=""
                      />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Confirm Password</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        class="form-control"
                        value=""
                      />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                      <input
                        type="submit"
                        class="btn btn-primary px-4"
                        value="Change Password"
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
@endsection
```

- `routes/web.php`を編集<br>

```php:web.php
<?php

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
  ])->name('change.password.update'); // 追記
});
```

- `app/Http/Controllers/AdminController.php`を編集<br>

```php:AdminController.php
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
  public function adminLogout()
  {
    Auth::logout();

    return redirect()->route('login');
  }

  public function userProfile()
  {
    $adminData = User::find(1);

    return view('backend.admin.admin_profile', compact('adminData'));
  }

  public function userProfileStore(Request $request)
  {
    $data = User::find(1);
    $data->name = $request->name;
    $data->email = $request->email;

    if ($request->file('profile_photo_path')) {
      $file = $request->file('profile_photo_path');
      @unlink(public_path('upload/admin_images/' . $data->profile_photo_path));
      $filename = date('YmdHi') . $file->getClientOriginalName();
      $file->move(public_path('upload/admin_images'), $filename);
      $data['profile_photo_path'] = $filename;
    }
    $data->save();

    $notification = [
      'message' => 'User Profile Updated Successfully',
      'alert-type' => 'success',
    ];

    return redirect()
      ->route('user.profile')
      ->with($notification);
  }

  public function changePassword()
  {
    return view('backend.admin.change_password');
  }

  public function changePasswordUpdate(Request $request)
  {
  }
}
```
