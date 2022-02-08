## 466 Get Product Order Part4

- `resources/views/backend/orders/order_details.blade.php`を編集<br>

```html:order_details.blade.php
@extends('admin.admin_master') @section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-wrapper">
  <div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Order Detials</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item">
              <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Invoice:
              <strong>
                <span class="text-danger">{{ $order->invoice_no }}</span>
              </strong>
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
      <div class="main-body">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <ul class="list-group">
                  <li class="list-group-item">
                    <strong>
                      <span class="text-dark">Product Name :</span>
                    </strong>
                    {{ $order->product_name }}
                  </li>
                  <li class="list-group-item">
                    <strong>
                      <span class="text-dark">Product Code :</span>
                    </strong>
                    {{ $order->product_code }}
                  </li>
                  <li class="list-group-item">
                    <strong>
                      <span class="text-dark">Product Size :</span>
                    </strong>
                    {{ $order->size }}
                  </li>
                  <li class="list-group-item">
                    <strong>
                      <span class="text-dark">Product Color :</span>
                    </strong>
                    {{ $order->color }}
                  </li>
                  <li class="list-group-item">
                    <strong>
                      <span class="text-dark">Product Quantity :</span>
                    </strong>
                    {{ $order->quantity }}
                  </li>
                  <li class="list-group-item">
                    <strong><span class="text-dark">Unit Price :</span></strong>
                    {{ $order->unit_price }}
                  </li>
                  <li class="list-group-item">
                    <strong>
                      <span class="text-dark">Total Price :</span>
                    </strong>
                    {{ $order->total_price }}
                  </li>
                  <li class="list-group-item">
                    <strong><span class="text-dark">User Email :</span></strong>
                    {{ $order->email }}
                  </li>
                  <li class="list-group-item">
                    <strong><span class="text-dark">User Name :</span></strong>
                    {{ $order->name }}
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <form
              method="post"
              action="{{ route('user.profile.store') }}"
              enctype="multipart/form-data"
            >
              @csrf
              <div class="card">
                <div class="card-body">
                  <ul class="list-group">
                    <li class="list-group-item">
                      <strong>
                        <span class="text-dark">Payment Method :</span>
                      </strong>
                      {{ $order->payment_method }}
                    </li>
                    <li class="list-group-item">
                      <strong>
                        <span class="text-dark">Delivery Address :</span>
                      </strong>
                      {{ $order->delivery_address }}
                    </li>
                    <li class="list-group-item">
                      <strong><span class="text-dark">City :</span></strong>
                      {{ $order->city }}
                    </li>
                    <li class="list-group-item">
                      <strong>
                        <span class="text-dark">Delivery Charge :</span>
                      </strong>
                      {{ $order->delivery_charge }}
                    </li>
                    <li class="list-group-item">
                      <strong>
                        <span class="text-dark">Order Date :</span>
                      </strong>
                      {{ $order->order_date }}
                    </li>
                    <li class="list-group-item">
                      <strong>
                        <span class="text-dark">Order Time :</span>
                      </strong>
                      {{ $order->order_time }}
                    </li>
                    <li class="list-group-item">
                      <strong>
                        <span class="text-dark">Order Status :</span>
                      </strong>
                      <span
                        class="badge badge-pill"
                        style="background: #FF0000;"
                      >
                        {{ $order->order_status }}
                      </span>
                    </li>
                    <br />
                    @if($order->order_status == 'Pending')
                    <a href="" class="btn btn-block btn-success">
                      Processing Order
                    </a>
                    @elseif($order->order_status == 'Processing')
                    <a href="" class="btn btn-block btn-success">
                      Complete Order
                    </a>
                    @endif
                  </ul>
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

- `resources/views/backend/orders/processing_orders.blade.php`を編集<br>

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
                  // 編集
                  <a
                    href="{{ route('order.details', $order->id) }}"
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

## 467 Get Product Order Part5

- `resources/views/backend/orders/order_details.blade.php`を編集<br>

```html:order_details.blade.php
@extends('admin.admin_master') @section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-wrapper">
  <div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Order Detials</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item">
              <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Invoice:
              <strong>
                <span class="text-danger">{{ $order->invoice_no }}</span>
              </strong>
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
      <div class="main-body">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <ul class="list-group">
                  <li class="list-group-item">
                    <strong>
                      <span class="text-dark">Product Name :</span>
                    </strong>
                    {{ $order->product_name }}
                  </li>
                  <li class="list-group-item">
                    <strong>
                      <span class="text-dark">Product Code :</span>
                    </strong>
                    {{ $order->product_code }}
                  </li>
                  <li class="list-group-item">
                    <strong>
                      <span class="text-dark">Product Size :</span>
                    </strong>
                    {{ $order->size }}
                  </li>
                  <li class="list-group-item">
                    <strong>
                      <span class="text-dark">Product Color :</span>
                    </strong>
                    {{ $order->color }}
                  </li>
                  <li class="list-group-item">
                    <strong>
                      <span class="text-dark">Product Quantity :</span>
                    </strong>
                    {{ $order->quantity }}
                  </li>
                  <li class="list-group-item">
                    <strong><span class="text-dark">Unit Price :</span></strong>
                    {{ $order->unit_price }}
                  </li>
                  <li class="list-group-item">
                    <strong>
                      <span class="text-dark">Total Price :</span>
                    </strong>
                    {{ $order->total_price }}
                  </li>
                  <li class="list-group-item">
                    <strong><span class="text-dark">User Email :</span></strong>
                    {{ $order->email }}
                  </li>
                  <li class="list-group-item">
                    <strong><span class="text-dark">User Name :</span></strong>
                    {{ $order->name }}
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <form
              method="post"
              action="{{ route('user.profile.store') }}"
              enctype="multipart/form-data"
            >
              @csrf
              <div class="card">
                <div class="card-body">
                  <ul class="list-group">
                    <li class="list-group-item">
                      <strong>
                        <span class="text-dark">Payment Method :</span>
                      </strong>
                      {{ $order->payment_method }}
                    </li>
                    <li class="list-group-item">
                      <strong>
                        <span class="text-dark">Delivery Address :</span>
                      </strong>
                      {{ $order->delivery_address }}
                    </li>
                    <li class="list-group-item">
                      <strong><span class="text-dark">City :</span></strong>
                      {{ $order->city }}
                    </li>
                    <li class="list-group-item">
                      <strong>
                        <span class="text-dark">Delivery Charge :</span>
                      </strong>
                      {{ $order->delivery_charge }}
                    </li>
                    <li class="list-group-item">
                      <strong>
                        <span class="text-dark">Order Date :</span>
                      </strong>
                      {{ $order->order_date }}
                    </li>
                    <li class="list-group-item">
                      <strong>
                        <span class="text-dark">Order Time :</span>
                      </strong>
                      {{ $order->order_time }}
                    </li>
                    <li class="list-group-item">
                      <strong>
                        <span class="text-dark">Order Status :</span>
                      </strong>
                      <span
                        class="badge badge-pill"
                        style="background: #FF0000;"
                      >
                        {{ $order->order_status }}
                      </span>
                    </li>
                    <br />
                    @if($order->order_status == 'Pending') // 編集
                    <a
                      href="{{ route('pending.processing', $order->id) }}"
                      class="btn btn-block btn-success"
                    >
                      // Processing Order
                    </a>
                    @elseif($order->order_status == 'Processing')
                    <a href="" class="btn btn-block btn-success">
                      Complete Order
                    </a>
                    @endif
                  </ul>
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

  Route::get('/processing', [
    ProductCartController::class,
    'processingOrder',
  ])->name('processing.order');

  Route::get('/complete', [
    ProductCartController::class,
    'completeOrder',
  ])->name('complete.order');

  Route::get('/details/{id}', [
    ProductCartController::class,
    'orderDetails',
  ])->name('order.details');

  // 追記
  Route::get('/status/processing/{id}', [
    ProductCartController::class,
    'pendingToProcessing',
  ])->name('pending.processing');
});
```

- `app/Http/Controllers/Admin/ProductCartController.php`を編集<br>

```php:ProcutCartController.php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CartOrder;
use App\Models\ProductCart;
use App\Models\ProductList;
use Illuminate\Http\Request;

class ProductCartController extends Controller
{
  public function addToCart(Request $request)
  {
    $email = $request->input('email');
    $size = $request->input('size');
    $color = $request->input('color');
    $quantity = $request->input('quantity');
    $product_code = $request->input('product_code');

    $productDetails = ProductList::where('product_code', $product_code)->get();
    $price = $productDetails[0]['price'];
    $special_price = $productDetails[0]['special_price'];

    if ($special_price === 'na') {
      $total_price = $price * $quantity;
      $unit_price = $price;
    } else {
      $total_price = $special_price * $quantity;
      $unit_price = $special_price;
    }

    $result = ProductCart::insert([
      'email' => $email,
      'image' => $productDetails[0]['image'],
      'product_name' => $productDetails[0]['title'],
      'product_code' => $productDetails[0]['product_code'],
      'size' => 'Size: ' . $size,
      'color' => 'Color: ' . $color,
      'quantity' => $quantity,
      'unit_price' => $unit_price,
      'total_price' => $total_price,
    ]);

    return $result;
  }

  public function cartCount(Request $request)
  {
    $product_code = $request->product_code;
    $result = ProductCart::count();

    return $result;
  }

  public function cartList(Request $request)
  {
    $email = $request->email;
    $result = ProductCart::where('email', $email)->get();

    return $result;
  }

  public function removeCartList(Request $request)
  {
    $id = $request->id;
    $result = ProductCart::where('id', $id)->delete();

    return $result;
  }

  public function cartItemPlus(Request $request)
  {
    $id = $request->id;
    $quantity = $request->quantity;
    $price = $request->price;
    $newQuantity = $quantity + 1;
    $total_price = $newQuantity * $price;

    $result = ProductCart::where('id', $id)->update([
      'quantity' => $newQuantity,
      'total_price' => $total_price,
    ]);

    return $result;
  }

  public function cartItemMinus(Request $request)
  {
    $id = $request->id;
    $quantity = $request->quantity;
    $price = $request->price;
    $newQuantity = $quantity - 1;
    $total_price = $newQuantity * $price;

    $result = ProductCart::where('id', $id)->update([
      'quantity' => $newQuantity,
      'total_price' => $total_price,
    ]);

    return $result;
  }

  public function cartOrder(Request $request)
  {
    $city = $request->input('city');
    $paymentMethod = $request->input('payment_method');
    $yourName = $request->input('name');
    $email = $request->input('email');
    $deliveryAddress = $request->input('delivery_address');
    $invoice_no = $request->input('invoice_no');
    $deliveryCharge = $request->input('delivery_charge');

    date_default_timezone_set('Asia/Tokyo');
    $request_time = date('h:i:sa');
    $request_date = date('d-m-Y');

    $cartList = ProductCart::where('email', $email)->get();

    foreach ($cartList as $cartListItem) {
      $cartInsertDeleteResult = '';

      $resultInsert = CartOrder::insert([
        'invoice_no' => 'Easy' . $invoice_no,
        'product_name' => $cartListItem['product_name'],
        'product_code' => $cartListItem['product_code'],
        'size' => $cartListItem['size'],
        'color' => $cartListItem['color'],
        'quantity' => $cartListItem['quantity'],
        'unit_price' => $cartListItem['unit_price'],
        'total_price' => $cartListItem['total_price'],
        'email' => $cartListItem['email'],
        'name' => $yourName,
        'payment_method' => $paymentMethod,
        'delivery_address' => $deliveryAddress,
        'city' => $city,
        'delivery_charge' => $deliveryCharge,
        'order_date' => $request_date,
        'order_time' => $request_time,
        'order_status' => 'Pending',
      ]);

      if ($resultInsert == 1) {
        $resultDelete = ProductCart::where('id', $cartListItem['id'])->delete();
        if ($resultDelete == 1) {
          $cartInsertDeleteResult = 1;
        } else {
          $cartInsertDeleteResult = 0;
        }
      }
    }

    return $cartInsertDeleteResult;
  }

  public function orderListByUser(Request $request)
  {
    $email = $request->email;
    $result = CartOrder::where('email', $email)
      ->orderBy('id', 'DESC')
      ->get();

    return $result;
  }

  public function pendingOrder()
  {
    $orders = CartOrder::where('order_status', 'Pending')
      ->orderBy('id', 'DESC')
      ->get();

    return view('backend.orders.pending_orders', compact('orders'));
  }

  public function processingOrder()
  {
    $orders = CartOrder::where('order_status', 'Processing')
      ->orderBy('id', 'DESC')
      ->get();

    return view('backend.orders.processing_orders', compact('orders'));
  }

  public function completeOrder()
  {
    $orders = CartOrder::where('order_status', 'Complete')
      ->orderBy('id', 'DESC')
      ->get();

    return view('backend.orders.complete_orders', compact('orders'));
  }

  public function orderDetails($id)
  {
    $order = CartOrder::findOrFail($id);

    return view('backend.orders.order_details', compact('order'));
  }

  // 追記
  public function pendingToProcessing($id)
  {
    $order = CartOrder::findOrFail($id);
    $order->order_status = 'Processing';
    $order->save();

    $notification = [
      'message' => 'Order Processing Successfully',
      'alert-type' => 'success',
    ];

    return redirect()
      ->route('pending.order')
      ->with($notification);
  }
}
```

- `resources/views/backend/orders/order_details.blade.php`を編集<br>

```html:order_details.blade.php
@extends('admin.admin_master') @section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-wrapper">
  <div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Order Detials</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item">
              <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Invoice:
              <strong>
                <span class="text-danger">{{ $order->invoice_no }}</span>
              </strong>
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
      <div class="main-body">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <ul class="list-group">
                  <li class="list-group-item">
                    <strong>
                      <span class="text-dark">Product Name :</span>
                    </strong>
                    {{ $order->product_name }}
                  </li>
                  <li class="list-group-item">
                    <strong>
                      <span class="text-dark">Product Code :</span>
                    </strong>
                    {{ $order->product_code }}
                  </li>
                  <li class="list-group-item">
                    <strong>
                      <span class="text-dark">Product Size :</span>
                    </strong>
                    {{ $order->size }}
                  </li>
                  <li class="list-group-item">
                    <strong>
                      <span class="text-dark">Product Color :</span>
                    </strong>
                    {{ $order->color }}
                  </li>
                  <li class="list-group-item">
                    <strong>
                      <span class="text-dark">Product Quantity :</span>
                    </strong>
                    {{ $order->quantity }}
                  </li>
                  <li class="list-group-item">
                    <strong><span class="text-dark">Unit Price :</span></strong>
                    {{ $order->unit_price }}
                  </li>
                  <li class="list-group-item">
                    <strong>
                      <span class="text-dark">Total Price :</span>
                    </strong>
                    {{ $order->total_price }}
                  </li>
                  <li class="list-group-item">
                    <strong><span class="text-dark">User Email :</span></strong>
                    {{ $order->email }}
                  </li>
                  <li class="list-group-item">
                    <strong><span class="text-dark">User Name :</span></strong>
                    {{ $order->name }}
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <form
              method="post"
              action="{{ route('user.profile.store') }}"
              enctype="multipart/form-data"
            >
              @csrf
              <div class="card">
                <div class="card-body">
                  <ul class="list-group">
                    <li class="list-group-item">
                      <strong>
                        <span class="text-dark">Payment Method :</span>
                      </strong>
                      {{ $order->payment_method }}
                    </li>
                    <li class="list-group-item">
                      <strong>
                        <span class="text-dark">Delivery Address :</span>
                      </strong>
                      {{ $order->delivery_address }}
                    </li>
                    <li class="list-group-item">
                      <strong><span class="text-dark">City :</span></strong>
                      {{ $order->city }}
                    </li>
                    <li class="list-group-item">
                      <strong>
                        <span class="text-dark">Delivery Charge :</span>
                      </strong>
                      {{ $order->delivery_charge }}
                    </li>
                    <li class="list-group-item">
                      <strong>
                        <span class="text-dark">Order Date :</span>
                      </strong>
                      {{ $order->order_date }}
                    </li>
                    <li class="list-group-item">
                      <strong>
                        <span class="text-dark">Order Time :</span>
                      </strong>
                      {{ $order->order_time }}
                    </li>
                    <li class="list-group-item">
                      <strong>
                        <span class="text-dark">Order Status :</span>
                      </strong>
                      <span
                        class="badge badge-pill"
                        style="background: #FF0000;"
                      >
                        {{ $order->order_status }}
                      </span>
                    </li>
                    <br />
                    @if($order->order_status == 'Pending')
                    <a
                      href="{{ route('pending.processing', $order->id) }}"
                      class="btn btn-block btn-success"
                    >
                      Processing Order
                    </a>
                    @elseif($order->order_status == 'Processing') // 編集
                    <a
                      href="{{ route('processing.complete', $order->id) }}"
                      class="btn btn-block btn-success"
                    >
                      Complete Order
                    </a>
                    @endif
                  </ul>
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

  Route::get('/processing', [
    ProductCartController::class,
    'processingOrder',
  ])->name('processing.order');

  Route::get('/complete', [
    ProductCartController::class,
    'completeOrder',
  ])->name('complete.order');

  Route::get('/details/{id}', [
    ProductCartController::class,
    'orderDetails',
  ])->name('order.details');

  Route::get('/status/processing/{id}', [
    ProductCartController::class,
    'pendingToProcessing',
  ])->name('pending.processing');

  // 追記
  Route::get('/status/complete/{id}', [
    ProductCartController::class,
    'processingToComplete',
  ])->name('processing.complete');
});
```

- `app/Http/Controllers/Admin/ProductCartController.php`を編集<br>

```php:ProductCartController.php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CartOrder;
use App\Models\ProductCart;
use App\Models\ProductList;
use Illuminate\Http\Request;

class ProductCartController extends Controller
{
  public function addToCart(Request $request)
  {
    $email = $request->input('email');
    $size = $request->input('size');
    $color = $request->input('color');
    $quantity = $request->input('quantity');
    $product_code = $request->input('product_code');

    $productDetails = ProductList::where('product_code', $product_code)->get();
    $price = $productDetails[0]['price'];
    $special_price = $productDetails[0]['special_price'];

    if ($special_price === 'na') {
      $total_price = $price * $quantity;
      $unit_price = $price;
    } else {
      $total_price = $special_price * $quantity;
      $unit_price = $special_price;
    }

    $result = ProductCart::insert([
      'email' => $email,
      'image' => $productDetails[0]['image'],
      'product_name' => $productDetails[0]['title'],
      'product_code' => $productDetails[0]['product_code'],
      'size' => 'Size: ' . $size,
      'color' => 'Color: ' . $color,
      'quantity' => $quantity,
      'unit_price' => $unit_price,
      'total_price' => $total_price,
    ]);

    return $result;
  }

  public function cartCount(Request $request)
  {
    $product_code = $request->product_code;
    $result = ProductCart::count();

    return $result;
  }

  public function cartList(Request $request)
  {
    $email = $request->email;
    $result = ProductCart::where('email', $email)->get();

    return $result;
  }

  public function removeCartList(Request $request)
  {
    $id = $request->id;
    $result = ProductCart::where('id', $id)->delete();

    return $result;
  }

  public function cartItemPlus(Request $request)
  {
    $id = $request->id;
    $quantity = $request->quantity;
    $price = $request->price;
    $newQuantity = $quantity + 1;
    $total_price = $newQuantity * $price;

    $result = ProductCart::where('id', $id)->update([
      'quantity' => $newQuantity,
      'total_price' => $total_price,
    ]);

    return $result;
  }

  public function cartItemMinus(Request $request)
  {
    $id = $request->id;
    $quantity = $request->quantity;
    $price = $request->price;
    $newQuantity = $quantity - 1;
    $total_price = $newQuantity * $price;

    $result = ProductCart::where('id', $id)->update([
      'quantity' => $newQuantity,
      'total_price' => $total_price,
    ]);

    return $result;
  }

  public function cartOrder(Request $request)
  {
    $city = $request->input('city');
    $paymentMethod = $request->input('payment_method');
    $yourName = $request->input('name');
    $email = $request->input('email');
    $deliveryAddress = $request->input('delivery_address');
    $invoice_no = $request->input('invoice_no');
    $deliveryCharge = $request->input('delivery_charge');

    date_default_timezone_set('Asia/Tokyo');
    $request_time = date('h:i:sa');
    $request_date = date('d-m-Y');

    $cartList = ProductCart::where('email', $email)->get();

    foreach ($cartList as $cartListItem) {
      $cartInsertDeleteResult = '';

      $resultInsert = CartOrder::insert([
        'invoice_no' => 'Easy' . $invoice_no,
        'product_name' => $cartListItem['product_name'],
        'product_code' => $cartListItem['product_code'],
        'size' => $cartListItem['size'],
        'color' => $cartListItem['color'],
        'quantity' => $cartListItem['quantity'],
        'unit_price' => $cartListItem['unit_price'],
        'total_price' => $cartListItem['total_price'],
        'email' => $cartListItem['email'],
        'name' => $yourName,
        'payment_method' => $paymentMethod,
        'delivery_address' => $deliveryAddress,
        'city' => $city,
        'delivery_charge' => $deliveryCharge,
        'order_date' => $request_date,
        'order_time' => $request_time,
        'order_status' => 'Pending',
      ]);

      if ($resultInsert == 1) {
        $resultDelete = ProductCart::where('id', $cartListItem['id'])->delete();
        if ($resultDelete == 1) {
          $cartInsertDeleteResult = 1;
        } else {
          $cartInsertDeleteResult = 0;
        }
      }
    }

    return $cartInsertDeleteResult;
  }

  public function orderListByUser(Request $request)
  {
    $email = $request->email;
    $result = CartOrder::where('email', $email)
      ->orderBy('id', 'DESC')
      ->get();

    return $result;
  }

  public function pendingOrder()
  {
    $orders = CartOrder::where('order_status', 'Pending')
      ->orderBy('id', 'DESC')
      ->get();

    return view('backend.orders.pending_orders', compact('orders'));
  }

  public function processingOrder()
  {
    $orders = CartOrder::where('order_status', 'Processing')
      ->orderBy('id', 'DESC')
      ->get();

    return view('backend.orders.processing_orders', compact('orders'));
  }

  public function completeOrder()
  {
    $orders = CartOrder::where('order_status', 'Complete')
      ->orderBy('id', 'DESC')
      ->get();

    return view('backend.orders.complete_orders', compact('orders'));
  }

  public function orderDetails($id)
  {
    $order = CartOrder::findOrFail($id);

    return view('backend.orders.order_details', compact('order'));
  }

  public function pendingToProcessing($id)
  {
    $order = CartOrder::findOrFail($id);
    $order->order_status = 'Processing';
    $order->save();

    $notification = [
      'message' => 'Order Processing Successfully',
      'alert-type' => 'success',
    ];

    return redirect()
      ->route('pending.order')
      ->with($notification);
  }

  // 追記
  public function processingToComplete($id)
  {
    $order = CartOrder::findOrFail($id);
    $order->order_status = 'Complete';
    $order->save();

    $notification = [
      'message' => 'Order Complete Successfully',
      'alert-type' => 'success',
    ];

    return redirect()
      ->route('processing.order')
      ->with($notification);
  }
}
```

- `resources/views/backend/orders/complete_orders.blade.php`を編集<br>

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
                  // 編集
                  <a
                    href="{{-- route('complete.delete', $order->id) --}}"
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
