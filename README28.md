## 454 Add Store Product Part3

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

  Route::get('/add', [ProductListController::class, 'addProduct'])->name(
    'add.product'
  );

  // 追記
  Route::post('/store', [ProductListController::class, 'storeProduct'])->name(
    'product.store'
  );
});
```

- `public/upload/product`ディレクトリを作成<br>

* `resources/views/backend/product/product_add.blade.php`を編集<br>

```html:product_add.blade.php
@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-wrapper">
  <div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">eCommerce</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
      <div class="card-body p-4">
        <h5 class="card-title">Add New Product</h5>
        <hr>
        <div class="form-body mt-4">
          <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-lg-8">
                <div class="border border-3 p-4 rounded">
                  <div class="mb-3">
                    <label for="inputProductTitle" class="form-label">Product Title</label>
                    <input type="text" name="title" class="form-control" id="inputProductTitle" placeholder="Enter product title">
                  </div>

                  <div class="mb-3">
                    <label for="inputProductTitle" class="form-label">Product Code</label>
                    <input type="text" name="product_code" class="form-control" id="inputProductTitle" placeholder="Enter product code">
                    @error('product_code')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="formFile" class="form-label">Product Thumbnail</label>
                    <input class="form-control" type="file" name="image" id="image">
                  </div>
                  <div class="mb-3">
                    <img id="showImage" src="{{ url('upload/no_image.jpg') }}" style="width: 100px; height: 100px">
                  </div>

                  <div class="mb-3">
                    <label for="formFile" class="form-label">Image One</label>
                    <input class="form-control" type="file" name="image_one">
                  </div>

                  <div class="mb-3">
                    <label for="formFile" class="form-label">Image Two</label>
                    <input class="form-control" type="file" name="image_two">
                  </div>

                  <div class="mb-3">
                    <label for="formFile" class="form-label">Image Three</label>
                    <input class="form-control" type="file" name="image_three">
                  </div>

                  <div class="mb-3">
                    <label for="formFile" class="form-label">Image Four</label>
                    <input class="form-control" type="file" name="image_four">
                  </div>

                  <div class="mb-3">
                    <label for="inputProductDescription" class="form-label">Short Description</label>
                    <textarea name="short_description" class="form-control" id="inputProductDescription" rows="3"></textarea>
                  </div>

                  <div class="mb-3">
                    <label for="inputProductDescription" class="form-label">Long Description</label>
                    <textarea id="mytextarea" name="long_description">Hello, World!</textarea>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="border border-3 p-4 rounded">
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label for="inputPrice" class="form-label">Price</label>
                      <input type="text" name="price" class="form-control" id="inputPrice" placeholder="00.00">
                    </div>

                    <div class="col-md-6">
                      <label for="inputCompareatprice" class="form-label">Special Price</label>
                      <input type="text" name="special_price" class="form-control" id="inputCompareatprice" placeholder="00.00">
                    </div>

                    <div class="col-12">
                      <label for="inputProductType" class="form-label">Product Category</label>
                      <select class="form-select" name="category" id="inputProductType">
                        <option selected="" disabled="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->category_name }}" {{ old('category') == $category->category_name ? 'selected': '' }}>{{ $category->category_name }}</option>
                        @endforeach
                      </select>
                      @error('category')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="col-12">
                      <label for="inputProductType" class="form-label">Product SubCategory</label>
                      <select class="form-select" name="subcategory" id="inputProductType">
                        <option selected="" disabled="">Select SubCategory</option>
                        @foreach($subCategories as $subCategory)
                        <option value="{{ $subCategory->subcategory_name }}" {{ old('subcategory') == $subCategory->subcategory_name ? 'selected': '' }}>{{ $subCategory->subcategory_name }}</option>
                        @endforeach
                      </select>
                      @error('subcategory')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="col-12">
                      <label for="inputCollection" class="form-label">Brand</label>
                      <select class="form-select" name="brand" id="inputCollection">
                        <option selected="" disabled="">Select Brand</option>
                        <option value="Tony">Tony</option>
                        <option value="Apple">Apple</option>
                        <option value="OPPO">OPPO</option>
                        <option value="Samsung">Samsung</option>
                      </select>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Product Size</label>
                      <input type="text" name="size" class="form-control visually-hidden" data-role="tagsinput" value="S,M,L,XL">
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Product Color</label>
                      <input type="text" name="color" class="form-control visually-hidden" data-role="tagsinput" value="Red,White,Black">
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" name="remark" type="checkbox" value="FEATURED" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">FEATURED</label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" name="remark" type="checkbox" value="NEW" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">NEW</label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" name="remark" type="checkbox" value="COLLECTION" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">COLLECTION</label>
                    </div>

                    <div class="col-12">
                      <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Save Product</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--end row-->
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#image').change(function(e) {
      var reader = new FileReader()
      reader.onload = function(e) {
        $('#showImage').attr('src', e.target.result)
      }
      reader.readAsDataURL(e.target.files['0'])
    })
  })
</script>
<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin">
</script>
<script>
  tinymce.init({
    selector: '#mytextarea'
  });
</script>
@endsection
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
use Intervention\Image\Facades\Image;

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

  public function addProduct()
  {
    $categories = Category::orderBy('category_name', 'ASC')->get();
    $subCategories = Subcategory::orderBy('subcategory_name', 'ASC')->get();

    return view(
      'backend.product.product_add',
      compact('categories', 'subCategories')
    );
  }

  // 追記
  public function storeProduct(Request $request)
  {
    $request->validate(
      [
        'product_code' => 'required',
      ],
      [
        'product_code.required' => 'Input Product Code',
      ]
    );

    $image = $request->file('image');
    $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalName();
    Image::make($image)
      ->resize(711, 960)
      ->save('upload/product/' . $name_gen);
    $save_url = 'http://localhost/upload/product/' . $name_gen;

    $product = ProductList::insertGetId([
      'title' => $request->title,
      'price' => $request->price,
      'special_price' => $request->special_price,
      'category' => $request->category,
      'subcategory' => $request->subcategory,
      'remark' => $request->remark,
      'brand' => $request->brand,
      'product_code' => $request->product_code,
      'image' => $save_url,
    ]);
  }
}
```

## 455 Add Store Product Part4

- `public/upload/product_details`ディレクトリを作成<br>

* `app/Http/Controllers/Admin/ProductListController.php`を編集<br>

```php:ProductListController.php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductDetail;
use App\Models\ProductList;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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

  public function addProduct()
  {
    $categories = Category::orderBy('category_name', 'ASC')->get();
    $subCategories = Subcategory::orderBy('subcategory_name', 'ASC')->get();

    return view(
      'backend.product.product_add',
      compact('categories', 'subCategories')
    );
  }

  public function storeProduct(Request $request)
  {
    $request->validate(
      [
        'product_code' => 'required',
      ],
      [
        'product_code.required' => 'Input Product Code',
      ]
    );

    $image = $request->file('image');
    $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalName();
    Image::make($image)
      ->resize(711, 960)
      ->save('upload/product/' . $name_gen);
    $save_url = 'http://localhost/upload/product/' . $name_gen;

    $product = ProductList::insertGetId([
      'title' => $request->title,
      'price' => $request->price,
      'special_price' => $request->special_price,
      'category' => $request->category,
      'subcategory' => $request->subcategory,
      'remark' => $request->remark,
      'brand' => $request->brand,
      'product_code' => $request->product_code,
      'image' => $save_url,
    ]);

    // 追記
    $image1 = $request->file('image_one');
    $name_gen1 = hexdec(uniqid()) . '.' . $image1->getClientOriginalName();
    Image::make($image1)
      ->resize(711, 960)
      ->save('upload/product_details/' . $name_gen1);
    $save_url1 = 'http://localhost/upload/product_details/' . $name_gen1;

    $image2 = $request->file('image_two');
    $name_gen2 = hexdec(uniqid()) . '.' . $image2->getClientOriginalName();
    Image::make($image2)
      ->resize(711, 960)
      ->save('upload/product_details/' . $name_gen2);
    $save_url2 = 'http://localhost/upload/product_details/' . $name_gen2;

    $image3 = $request->file('image_three');
    $name_gen3 = hexdec(uniqid()) . '.' . $image3->getClientOriginalName();
    Image::make($image3)
      ->resize(711, 960)
      ->save('upload/product_details/' . $name_gen3);
    $save_url3 = 'http://localhost/upload/product_details/' . $name_gen3;

    $image4 = $request->file('image_four');
    $name_gen4 = hexdec(uniqid()) . '.' . $image4->getClientOriginalName();
    Image::make($image4)
      ->resize(711, 960)
      ->save('upload/product_details/' . $name_gen4);
    $save_url4 = 'http://localhost/upload/product_details/' . $name_gen4;

    ProductDetail::insert([
      'product_id' => $product,
      'image_one' => $save_url1,
      'image_two' => $save_url2,
      'image_three' => $save_url3,
      'image_four' => $save_url4,
      'short_description' => $request->short_description,
      'color' => $request->color,
      'size' => $request->size,
      'long_description' => $request->long_description,
    ]);

    $notification = [
      'message' => 'Product Inserted Successfully',
      'alert-type' => 'success',
    ];

    return redirect()
      ->route('all.product')
      ->with($notification);
  }
}
```

- `product_lists`テーブルの `star` を `nullable` にする<br>
