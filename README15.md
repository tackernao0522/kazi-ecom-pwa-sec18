## 425 Customize Login Form

`resources/views/auth/login.blade.php`を編集<br>

```html:login.blade.php
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--favicon-->
    <link
      rel="icon"
      href="{{ asset('backend/assets/images/favicon-32x32.png') }}"
      type="image/png"
    />
    <!--plugins-->
    <link
      href="{{ asset('backend/assets/plugins/simplebar/css/simplebar.css') }}"
      rel="stylesheet"
    />
    <link
      href="{{ asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}"
      rel="stylesheet"
    />
    <link
      href="{{ asset('backend/assets/plugins/metismenu/css/metisMenu.min.css') }}"
      rel="stylesheet"
    />
    <!-- loader-->
    <link
      href="{{ asset('backend/assets/css/pace.min.css') }}"
      rel="stylesheet"
    />
    <script src="{{ asset('backend/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link
      href="{{ asset('backend/assets/css/bootstrap.min.css') }}"
      rel="stylesheet"
    />
    <link href="{{ asset('backend/assets/css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet" />
    <title>Easy Shop Login Page</title>
  </head>

  <body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
      <div
        class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0"
      >
        <div class="container-fluid">
          <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
            <div class="col mx-auto">
              <div class="mb-4 text-center"></div>
              <div class="card">
                <div class="card-body">
                  <div class="border p-4 rounded">
                    <div class="text-center">
                      <h3 class="">Sign in</h3>
                      <p>
                        Don't have an account yet?
                        <a href="authentication-signup.html">Sign up here</a>
                      </p>
                    </div>
                    <div class="d-grid"></div>
                    <div class="login-separater text-center mb-4">
                      <span>OR SIGN IN WITH EMAIL</span>
                      <hr />
                    </div>
                    <div class="form-body">
                      <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="col-12">
                          <label for="inputEmailAddress" class="form-label">
                            Email Address
                          </label>
                          <input
                            type="email"
                            name="email"
                            class="form-control"
                            id="email"
                            placeholder="Email Address"
                          />
                        </div>
                        @error('email')
                        <div
                          class="alert alert-danger border-0 bg-danger alert-dismissible fade show"
                        >
                          <div class="text-white">
                            {{ $message }}
                          </div>
                          <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Close"
                          ></button>
                        </div>
                        @enderror
                        <div class="col-12">
                          <label for="inputChoosePassword" class="form-label">
                            Enter Password
                          </label>
                          <div class="input-group" id="show_hide_password">
                            <input
                              type="password"
                              class="form-control border-end-0"
                              id="password"
                              name="password"
                              placeholder="Enter Password"
                            />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-check form-switch">
                            <input
                              class="form-check-input"
                              type="checkbox"
                              id="flexSwitchCheckChecked"
                              checked
                            />
                            <label
                              class="form-check-label"
                              for="flexSwitchCheckChecked"
                            >
                              Remember Me
                            </label>
                          </div>
                        </div>
                        <div class="col-md-6 text-end">
                          <a href="{{ route('password.request') }}">
                            Forgot Password ?
                          </a>
                        </div>
                        <div class="col-12">
                          <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                              <i class="bx bxs-lock-open"></i>
                              Sign in
                            </button>
                          </div>
                        </div>
                      </form>
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
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <!--Password show & hide js -->
    <script>
      $(document).ready(function () {
        $('#show_hide_password a').on('click', function (event) {
          event.preventDefault()
          if ($('#show_hide_password input').attr('type') == 'text') {
            $('#show_hide_password input').attr('type', 'password')
            $('#show_hide_password i').addClass('bx-hide')
            $('#show_hide_password i').removeClass('bx-show')
          } else if (
            $('#show_hide_password input').attr('type') == 'password'
          ) {
            $('#show_hide_password input').attr('type', 'text')
            $('#show_hide_password i').removeClass('bx-hide')
            $('#show_hide_password i').addClass('bx-show')
          }
        })
      })
    </script>
    <!--app JS-->
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
  </body>
</html>
```

# セクション 48: Backend Admin Profile Setup

## 426 Admin Profile & Image Update Part1

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
          <img
            src="{{ asset('backend/assets/images/avatars/avatar-2.png') }}"
            class="user-img"
            alt="user avatar"
          />
          <div class="user-info ps-3">
            <p class="user-name mb-0">Pauline Seitz</p>
            <p class="designattion mb-0">Web Designer</p>
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a class="dropdown-item" href="{{ route('user.profile') }}">
              <i class="bx bx-user"></i>
              <span>Profile</span>
            </a>
            // 編集
          </li>
          <li>
            <a class="dropdown-item" href="javascript:;">
              <i class="bx bx-cog"></i>
              <span>Settings</span>
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
  ); // 追記
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
}
```

- `resources/views/backend`ディレクトリを作成<br>

* `resources/views/backend/admin`ディレクトリを作成<br>

- `resources/views/backend/admin/admin_profile.blade.php`ファイルを作成<br>

* `resources/views/backend/admin/admin_profile.blade.php`を編集<br>

```html:admin_profile.blade.php
@extends('admin.admin_master') @section('admin')
<div class="page-wrapper">
  <div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">User Profile</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item">
              <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              User Profile
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
      <div class="main-body">
        <div class="row">
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                  <img
                    src="{{ asset('backend/assets/images/avatars/avatar-2.png') }}"
                    alt="Admin"
                    class="rounded-circle p-1 bg-primary"
                    width="110"
                  />
                  <div class="mt-3">
                    <h4>John Doe</h4>
                    <p class="text-secondary mb-1">Full Stack Developer</p>
                    <p class="text-muted font-size-sm">
                      Bay Area, San Francisco, CA
                    </p>
                    <button class="btn btn-primary">Follow</button>
                    <button class="btn btn-outline-primary">Message</button>
                  </div>
                </div>
                <hr class="my-4" />
                <ul class="list-group list-group-flush">
                  <li
                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap"
                  >
                    <h6 class="mb-0">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather feather-globe me-2 icon-inline"
                      >
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="2" y1="12" x2="22" y2="12"></line>
                        <path
                          d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"
                        ></path>
                      </svg>
                      Website
                    </h6>
                    <span class="text-secondary">https://codervent.com</span>
                  </li>
                  <li
                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap"
                  >
                    <h6 class="mb-0">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather feather-github me-2 icon-inline"
                      >
                        <path
                          d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"
                        ></path>
                      </svg>
                      Github
                    </h6>
                    <span class="text-secondary">codervent</span>
                  </li>
                  <li
                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap"
                  >
                    <h6 class="mb-0">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather feather-twitter me-2 icon-inline text-info"
                      >
                        <path
                          d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"
                        ></path>
                      </svg>
                      Twitter
                    </h6>
                    <span class="text-secondary">@codervent</span>
                  </li>
                  <li
                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap"
                  >
                    <h6 class="mb-0">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather feather-instagram me-2 icon-inline text-danger"
                      >
                        <rect
                          x="2"
                          y="2"
                          width="20"
                          height="20"
                          rx="5"
                          ry="5"
                        ></rect>
                        <path
                          d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"
                        ></path>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                      </svg>
                      Instagram
                    </h6>
                    <span class="text-secondary">codervent</span>
                  </li>
                  <li
                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap"
                  >
                    <h6 class="mb-0">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather feather-facebook me-2 icon-inline text-primary"
                      >
                        <path
                          d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"
                        ></path>
                      </svg>
                      Facebook
                    </h6>
                    <span class="text-secondary">codervent</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Full Name</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" value="John Doe" />
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input
                      type="text"
                      class="form-control"
                      value="john@example.com"
                    />
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Phone</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input
                      type="text"
                      class="form-control"
                      value="(239) 816-9029"
                    />
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Mobile</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input
                      type="text"
                      class="form-control"
                      value="(320) 380-4539"
                    />
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Address</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input
                      type="text"
                      class="form-control"
                      value="Bay Area, San Francisco, CA"
                    />
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9 text-secondary">
                    <input
                      type="button"
                      class="btn btn-primary px-4"
                      value="Save Changes"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
```
