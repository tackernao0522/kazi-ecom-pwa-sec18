## 423 Refreach Admin Template

- `resources/amin/body/sidebar.blade.php`を編集<br>

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
      <a href="widgets.html">
        <div class="parent-icon"><i class="bx bx-home-circle"></i></div>
        <div class="menu-title">Dashboard</div>
      </a>
    </li>
    <li class="menu-label">UI Elements</li>
    <li>
      <a href="javascript:;" class="has-arrow">
        <div class="parent-icon"><i class="bx bx-cart"></i></div>
        <div class="menu-title">eCommerce</div>
      </a>
      <ul>
        <li>
          <a href="ecommerce-products.html">
            <i class="bx bx-right-arrow-alt"></i>
            Products
          </a>
        </li>
        <li>
          <a href="ecommerce-products-details.html">
            <i class="bx bx-right-arrow-alt"></i>
            Product Details
          </a>
        </li>
        <li>
          <a href="ecommerce-add-new-products.html">
            <i class="bx bx-right-arrow-alt"></i>
            Add New Products
          </a>
        </li>
        <li>
          <a href="ecommerce-orders.html">
            <i class="bx bx-right-arrow-alt"></i>
            Orders
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

- `resources/views/admin/index.blade.php`を編集<br>

```html:index.blade.php
@extends('admin.admin_master') @section('admin')
<div class="page-wrapper">
  <div class="page-content">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
      <div class="col">
        <div class="card radius-10 bg-gradient-deepblue">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <h5 class="mb-0 text-white">9526</h5>
              <div class="ms-auto">
                <i class="bx bx-cart fs-3 text-white"></i>
              </div>
            </div>
            <div class="progress my-3 bg-light-transparent" style="height:3px;">
              <div
                class="progress-bar bg-white"
                role="progressbar"
                style="width: 55%"
                aria-valuenow="25"
                aria-valuemin="0"
                aria-valuemax="100"
              ></div>
            </div>
            <div class="d-flex align-items-center text-white">
              <p class="mb-0">Total Orders</p>
              <p class="mb-0 ms-auto">
                +4.2%
                <span><i class="bx bx-up-arrow-alt"></i></span>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card radius-10 bg-gradient-orange">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <h5 class="mb-0 text-white">$8323</h5>
              <div class="ms-auto">
                <i class="bx bx-dollar fs-3 text-white"></i>
              </div>
            </div>
            <div class="progress my-3 bg-light-transparent" style="height:3px;">
              <div
                class="progress-bar bg-white"
                role="progressbar"
                style="width: 55%"
                aria-valuenow="25"
                aria-valuemin="0"
                aria-valuemax="100"
              ></div>
            </div>
            <div class="d-flex align-items-center text-white">
              <p class="mb-0">Total Revenue</p>
              <p class="mb-0 ms-auto">
                +1.2%
                <span><i class="bx bx-up-arrow-alt"></i></span>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card radius-10 bg-gradient-ohhappiness">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <h5 class="mb-0 text-white">6200</h5>
              <div class="ms-auto">
                <i class="bx bx-group fs-3 text-white"></i>
              </div>
            </div>
            <div class="progress my-3 bg-light-transparent" style="height:3px;">
              <div
                class="progress-bar bg-white"
                role="progressbar"
                style="width: 55%"
                aria-valuenow="25"
                aria-valuemin="0"
                aria-valuemax="100"
              ></div>
            </div>
            <div class="d-flex align-items-center text-white">
              <p class="mb-0">Visitors</p>
              <p class="mb-0 ms-auto">
                +5.2%
                <span><i class="bx bx-up-arrow-alt"></i></span>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card radius-10 bg-gradient-ibiza">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <h5 class="mb-0 text-white">5630</h5>
              <div class="ms-auto">
                <i class="bx bx-envelope fs-3 text-white"></i>
              </div>
            </div>
            <div class="progress my-3 bg-light-transparent" style="height:3px;">
              <div
                class="progress-bar bg-white"
                role="progressbar"
                style="width: 55%"
                aria-valuenow="25"
                aria-valuemin="0"
                aria-valuemax="100"
              ></div>
            </div>
            <div class="d-flex align-items-center text-white">
              <p class="mb-0">Messages</p>
              <p class="mb-0 ms-auto">
                +2.2%
                <span><i class="bx bx-up-arrow-alt"></i></span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--end row-->
    <div class="card radius-10">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div>
            <h5 class="mb-0">Orders Summary</h5>
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
                      <img
                        src="{{ asset('backend/assets/images/icons/chair.png') }}"
                        alt=""
                      />
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
                      <img
                        src="{{ asset('backend/assets/images/icons/shoes.png') }}"
                        alt=""
                      />
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
                      <img
                        src="{{ asset('backend/assets/images/icons/headphones.png') }}"
                        alt=""
                      />
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
                      <img
                        src="{{ asset('backend/assets/images/icons/idea.png') }}"
                        alt=""
                      />
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
                        src="{{ asset('backend/assets/images/icons/user-interface.png') }}"
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
                      <img
                        src="{{ asset('backend/assets/images/icons/watch.png') }}"
                        alt=""
                      />
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
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
```

## 424 Admin Logout Option

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
            <a class="dropdown-item" href="javascript:;">
              <i class="bx bx-user"></i>
              <span>Profile</span>
            </a>
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
            // 編集
          </li>
        </ul>
      </div>
    </nav>
  </div>
</header>
```

- `$ php artisan make:controller AdminController`を実行<br>

* `routes/web.php`を編集<br>

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
); // 追記
```

- `app/Http/Controllers/AdminController.php`を編集<br>

```php:AdminController.php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
  public function adminLogout()
  {
    Auth::logout();

    return redirect()->route('login');
  }
}
```
