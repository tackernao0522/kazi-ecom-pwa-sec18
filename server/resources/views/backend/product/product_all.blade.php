@extends('admin.admin_master')

@section('admin')
<div class="page-wrapper">
  <div class="page-content">
    <div class="card radius-10">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div>
            <h5 class="mb-0">All Product</h5>
          </div>
          <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
          </div>
        </div>
        <hr>
        <div class="table-responsive">
          <table class="table align-middle mb-0">
            <thead class="table-light">
              <tr>
                <th>SL</th>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Product Code</th>
                <th>Product Category</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php($i = 1)
              @foreach($products as $product)
              <tr>
                <td>{{ $i++ }}</td>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="recent-product-img">
                      <img src="{{ $product->image }}" alt="">
                    </div>
                  </div>
                </td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->product_code }}</td>
                <td>{{ $product->category }}</td>
                <td>
                  <a href="{{ route('product.edit', $product->id) }}" class="btn btn-info">Edit</a>
                  <a href="{{-- route('category.delete', $category->id) --}}" id="delete" class="btn btn-danger">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    {{ $products->links('vendor.pagination.custom') }}
  </div>
</div>
@endsection
