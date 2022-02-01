@extends('admin.admin_master')

@section('admin')
<div class="page-wrapper">
  <div class="page-content">
    <div class="card radius-10">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div>
            <h5 class="mb-0">All SubCategory</h5>
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
                <th>Category Name</th>
                <th>SubCategory Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php($i = 1)
              @foreach($subCategories as $subCategory)
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $subCategory->category_name}}</td>
                <td>{{ $subCategory->subcategory_name }}</td>
                <td>
                  <a href="{{ route('subcategory.edit', $subCategory->id) }}" class="btn btn-info">Edit</a>
                  <a href="{{ route('subcategory.delete', $subCategory->id) }}" id="delete" class="btn btn-danger">Delete</a>
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
