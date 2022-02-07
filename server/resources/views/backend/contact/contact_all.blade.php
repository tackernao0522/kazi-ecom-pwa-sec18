@extends('admin.admin_master')

@section('admin')
<div class="page-wrapper">
  <div class="page-content">
    <div class="card radius-10">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div>
            <h5 class="mb-0">All Message</h5>
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
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php($i = 1)
              @foreach($messages as $message)
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $message->name }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->message }}</td>
                <td>{{ $message->contact_date }}</td>
                <td>
                  <a href="{{-- route('category.delete', $category->id) --}}" id="delete" class="btn btn-danger">Delete</a>
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
