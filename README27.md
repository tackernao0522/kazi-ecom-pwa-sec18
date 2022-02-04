## 453 Add Store Product Part2

- `resources/views/admin/admin_master.blade.php`を編集<br>

```html:admin_master.blade.php
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
      href="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}"
      rel="stylesheet"
    />
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
    <!-- Theme Style CSS -->
    <link
      rel="stylesheet"
      href="{{ asset('backend/assets/css/dark-theme.css') }}"
    />
    <link
      rel="stylesheet"
      href="{{ asset('backend/assets/css/semi-dark.css') }}"
    />
    <link
      rel="stylesheet"
      href="{{ asset('backend/assets/css/header-colors.css') }}"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
    />
    // 追記
    <link
      href="{{ asset('backend/assets/plugins/input-tags/css/tagsinput.css') }}"
      rel="stylesheet"
    />
    <title>Easy Shop Admin Dashboard</title>
  </head>

  <body>
    <!--wrapper-->
    <div class="wrapper">
      <!--sidebar wrapper -->
      @include('admin.body.sidebar')
      <!--end sidebar wrapper -->
      <!--start header -->
      @include('admin.body.header')
      <!--end header -->
      <!--start page wrapper -->
      @yield('admin')
      <!--end page wrapper -->
      <!--start overlay-->
      <div class="overlay toggle-icon"></div>
      <!--end overlay-->
      <!--Start Back To Top Button-->
      <a href="javaScript:;" class="back-to-top">
        <i class="bx bxs-up-arrow-alt"></i>
      </a>
      <!--End Back To Top Button-->
      @include('admin.body.footer')
    </div>
    <!--end wrapper-->
    <!--start switcher-->

    <!--end switcher-->
    <!-- Bootstrap JS -->
    <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/chartjs/js/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/jquery-knob/excanvas.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
    <script>
      $(function () {
        $('.knob').knob()
      })
    </script>
    <script src="{{ asset('backend/assets/js/index.js') }}"></script>
    <!--app JS-->
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>

    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    ></script>

    <script>
      @if(Session::has('message'))
      var type = "{{ Session::get('alert-type','info') }}"
      switch (type) {
        case 'info':
          toastr.info(" {{ Session::get('message') }} ");
          break;
        case 'success':
          toastr.success(" {{ Session::get('message') }} ");
          break;
        case 'warning':
          toastr.warning(" {{ Session::get('message') }} ");
          break;
        case 'error':
          toastr.error(" {{ Session::get('message') }} ");
          break;
      }
      @endif
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script type="text/javascript">
      $(function () {
        $(document).on('click', '#delete', function (e) {
          e.preventDefault()
          var link = $(this).attr('href')

          Swal.fire({
            title: 'Are you sure?',
            text: 'Delete This Data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = link
              Swal.fire('Deleted!', 'Your file has been deleted.', 'success')
            }
          })
        })
      })
    </script>
    // 追記
    <script src="{{ asset('backend/assets/plugins/input-tags/js/tagsinput.js') }}"></script>
  </body>
</html>
```

- `resources/views/backend/product/product_add.blade.php`を編集<br>

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
                </div>

                <div class="mb-3">
                  <label for="image" class="form-label">Product Thumbnail</label>
                  <input class="form-control" type="file" name="image" id="image">
                </div>
                <div class="mb-3">
                  <img id="showImage" src="{{ url('upload/no_image.jpg') }}" style="width: 100px; height: 100px">
                </div>

                <div class="mb-3">
                  <label for="image_one" class="form-label">Image One</label>
                  <input class="form-control" type="file" name="image_one">
                </div>

                <div class="mb-3">
                  <label for="image_two" class="form-label">Image Two</label>
                  <input class="form-control" type="file" name="image_two">
                </div>

                <div class="mb-3">
                  <label for="image_three" class="form-label">Image Three</label>
                  <input class="form-control" type="file" name="image_three">
                </div>

                <div class="mb-3">
                  <label for="image_four" class="form-label">Image Four</label>
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
                    @error('subcategorye')
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
                      <button type="button" class="btn btn-primary">Save Product</button>
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
