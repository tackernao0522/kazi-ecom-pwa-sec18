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
            <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
      <div class="card-body p-4">
        <h5 class="card-title">Edit Product</h5>
        <hr>
        <div class="form-body mt-4">
          <form method="post" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-lg-8">
                <div class="border border-3 p-4 rounded">
                  <div class="mb-3">
                    <label for="inputProductTitle" class="form-label">Product Title</label>
                    <input type="text" name="title" class="form-control" id="inputProductTitle" value="{{ old('title', $product->title) }}" placeholder="Enter product title">
                  </div>

                  <div class="mb-3">
                    <label for="inputProductTitle" class="form-label">Product Code</label>
                    <input type="text" name="product_code" class="form-control" id="inputProductTitle" value="{{ old('product_code', $product->product_code) }}" placeholder="Enter product code">
                    @error('product_code')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="formFile" class="form-label">Product Thumbnail</label>
                    <input class="form-control" type="file" name="image" id="image">
                  </div>
                  <div class="mb-3">
                    <img id="showImage" src="{{ asset($product->image) }}" style="width: 100px; height: 100px">
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

                  @foreach($details as $detail)
                  <div class="mb-3">
                    <label for="inputProductDescription" class="form-label">Short Description</label>
                    <textarea name="short_description" class="form-control" id="inputProductDescription" rows="3">{{ old('short_description', $detail->short_description) }}</textarea>
                  </div>

                  <div class="mb-3">
                    <label for="inputProductDescription" class="form-label">Long Description</label>
                    <textarea id="mytextarea" name="long_description">{!! nl2br(e( old('long_description', $detail->long_description) )) !!}</textarea>
                  </div>
                  @endforeach
                </div>
              </div>
              <div class="col-lg-4">
                <div class="border border-3 p-4 rounded">
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label for="inputPrice" class="form-label">Price</label>
                      <input type="text" name="price" class="form-control" id="inputPrice" value="{{ old('price', $product->price) }}" placeholder="00.00">
                    </div>

                    <div class="col-md-6">
                      <label for="inputCompareatprice" class="form-label">Special Price</label>
                      <input type="text" name="special_price" class="form-control" id="inputCompareatprice" value="{{ old('special_price', $product->special_price) }}" placeholder="00.00">
                    </div>

                    <div class="col-12">
                      <label for="inputProductType" class="form-label">Product Category</label>
                      <select class="form-select" name="category" id="inputProductType">
                        <option selected="" disabled="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->category_name }}" {{ old('category', $product->category) == $category->category_name ? 'selected' : '' }}>{{ $category->category_name }}</option>
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
                        <option value="{{ $subCategory->subcategory_name }}" {{ old('subcategory', $product->subcategory) == $subCategory->subcategory_name ? 'selected' : '' }}>{{ $subCategory->subcategory_name }}</option>
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
                      @error('brand')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    @foreach($details as $detail)
                    <div class="mb-3">
                      <label class="form-label">Product Size</label>
                      <input type="text" name="size" class="form-control visually-hidden" data-role="tagsinput" value="{{ old('size', $detail->size) }}">
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Product Color</label>
                      <input type="text" name="color" class="form-control visually-hidden" data-role="tagsinput" value="{{ old('color', $detail->color) }}">
                    </div>
                    @endforeach

                    <div class="form-check">
                      <input class="form-check-input" name="remark" type="checkbox" value="FEATURED" {{ old('remark', $product->remark) ==
                        'FEATURED' ? 'checked' : ''}} id="flexCheckDefault1">
                      <label class="form-check-label" for="flexCheckDefault">FEATURED</label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" name="remark" type="checkbox" value="NEW" {{ old('remark', $product->remark) ==
                        'NEW' ? 'checked' : ''}} id="flexCheckDefault2">
                      <label class="form-check-label" for="flexCheckDefault">NEW</label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" name="remark" type="checkbox" value="COLLECTION" {{ old('remark', $product->remark) ==
                        'COLLECTION' ? 'checked' : ''}} id="flexCheckDefault3">
                      <label class="form-check-label" for="flexCheckDefault">COLLECTION</label>
                    </div>

                    <div class="col-12">
                      <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Update Product</button>
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
