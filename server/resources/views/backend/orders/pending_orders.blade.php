@extends('admin.admin_master')

@section('admin')
<div class="page-wrapper">
  <div class="page-content">
    <div class="card radius-10">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div>
            <h5 class="mb-0">All Pending Order</h5>
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
                <th>Invoice No</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Order Date</th>
                <th>Order Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php($i = 1)
              @foreach($orders as $order)
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $order->product_name}}</td>
                <td>{{ $order->invoice_no }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->total_price }}</td>
                <td>{{ $order->order_date }}</td>
                <td><strong><span class="text-danger">{{ $order->order_status }}</span></strong></td>
                <td>
                  <a href="{{ route('order.details', $order->id) }}" class="btn btn-info">Details</a>
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
