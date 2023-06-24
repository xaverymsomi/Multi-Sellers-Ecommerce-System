@extends('user-dashboard.user_dashboard')
@section('index')
<div class="breadcrumb">
    <div class="container">
      <div class="breadcrumb-inner">
        <ul class="list-inline list-unstyled">
          <li><a href="{{ route('dashboard') }}">Home</a></li>
        </ul>
      </div>
      <!-- /.breadcrumb-inner --> 
 
    <!-- /.container --> 
  </div>
  <!-- /.breadcrumb -->
  <div class="body-content outer-top-xs">
  
      <div class='row'>
         @include('user-dashboard.components.user-sidebar')
        <div class="col-xs-9 col-sm-12 col-md-9 rht-col">
                                        <table id="example" class="table table-striped table-bordered" style="width:100%; background: whitesmock;">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Date</th>
                                                    <th>Invoice</th>
                                                    <th>Payment</th>
                                                    <th>Amount</th>
                                                    <th>Order Status</th>
                                                    <th>Action</th>
                                                </tr>  
                                            </thead>
                                            <tbody>
                    
                                                @foreach ($orders as $items)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $items->order_date }}</td>
                                                    <td>{{ $items->invoice_number }}</td>
                                                    <td>{{ $items->payment_method }}</td>
                                                    <td>{{ $items->amount }}/=</td>
                    
                                                    <td>
                                                        @if ($items->order_status == 'pending')
                                                            <span class="badge rounded-pill bg-warning" style="color: #fff">Pending</span>

                                                        @elseif ($items->order_status == 'confirm')
                                                            <span class="badge rounded-pill bg-info" style="color: #fff">Confirm</span>

                                                        @elseif ($items->order_status == 'processing')
                                                            <span class="badge rounded-pill bg-dark" style="color: #fff">Processing</span>

                                                        @elseif ($items->order_status == 'delivered')
                                                            <span class="badge rounded-pill bg-success" style="color: #fff">Delivered</span>
                                                        @if ($items->return_order == 1)
                                                        <span class="badge rounded-pill" style="color: #fff; background: red">Return</span>
                                                        @endif
                                                        @endif
                                                        
                                                    </td>
                    
                                                    <td>
                                                        <a title="view" href="{{ route('user.order_details',$items->id) }}" class="btn text-danger btn-success btn-sm btn-circle shadow-sm">
                                                          <b><i style="color: blue" class="fa fa-eye"></i></b>
                                                        </a><a title="Download" href="{{ route('user.invoice_download',$items->id) }}"  class="btn text-danger btn-success btn-sm btn-circle shadow-sm">
                                                            <b><i style="color: red" class="fa fa-download"></i></b>
                                                            </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                    
                                        </table>
		</div>
          </div>
          <!-- /.sidebar-module-container --> 
        </div>
  </div>          


@endsection