@extends('admin.admin_master')

@section('admin')
<div class="page-wrapper">
  <div class="page-content">
    <div class="card radius-10">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div>
            <h5 class="mb-0">All Reviews</h5>
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
                <th>Product Name</th>
                <th>Reviewer Name</th>
                <th>Rating</th>
                <th>Comments</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php($i = 1)
              @foreach($reviews as $review)
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $review->product_name }}</td>
                <td>{{ $review->reviewer_name }}</td>
                <td>{{ $review->reviewer_rating }}</td>
                <td>{{ $review->reviewer_comments }}</td>
                <td>
                  <a href="{{-- route('message.delete', $message->id) --}}" id="delete" class="btn btn-danger">Delete</a>
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
