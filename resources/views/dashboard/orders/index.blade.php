@extends('layouts.admin-master')

@section('breadcrumb')
<div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Manage Orders</li>
            <!-- Breadcrumb Menu-->
          </ol>
</div>
@endsection

@section('content')
<div class="container-fluid">
            <div class="fade-in">
              <div class="card">
                <div class="card-body">
 
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Orders</h2>
            </div>
            <div class="float-right">
                @can('order-create')
                <a class="btn btn-success" href="{{ route('orders.create') }}"> New Order</a>
                @endcan
            </div>
        </div>
    </div>

    <div class="table100 ver1">
    <table class="table table-bordered table-striped table-condensed table-responsive-sm">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Status</th>
            <th>Total Order Value (Rs.)</th>
            <th>Total Received (Rs.)</th>
            <th>Total Balance (Rs.)</th>
            <th>Expenses (Rs.)</th>
            <th>Profit/Loss (Rs.)</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($orders as $order)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $order->name }}</td>
	        <td>
	            @if($order->order_status == 'delivered')
	            <span class="badge badge-primary">{{ ucfirst($order->order_status) }}</span>
	            @elseif($order->order_status == 'completed')
	            <span class="badge badge-success">Completed with Payment</span>
	            @elseif($order->order_status == 'cancelled')
	            <span class="badge badge-danger">{{ ucfirst($order->order_status) }}</span>
	            @elseif($order->order_status == 'production_start')
	            <span class="badge badge-warning">{{ ucfirst($order->order_status) }}</span>
	            @elseif($order->order_status == 'sampling')
	            <span class="badge badge-dark">{{ ucfirst($order->order_status) }}</span>
	            @elseif($order->order_status == 'sent_quotation')
	            <span class="badge badge-light">{{ ucfirst($order->order_status) }}</span>
	            @else
	            <span class="badge badge-secondary">{{ ucfirst($order->order_status) }}</span>
	            @endif
	        </td>
	        <td>{{ moneyFormatIndia($order->total_order_value) }}</td>
	        <td>{{ moneyFormatIndia($order->total_received) }}</td>
	        <td>{{ moneyFormatIndia($order->total_remaining) }}</td>
	        <td>{{ moneyFormatIndia($order->total_expense) }}</td>
	        <td>{{ moneyFormatIndia($order->balance) }}</td>
	        <td>
                <form class="delForm" action="{{ route('orders.destroy',$order->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('orders.show',$order->id) }}">Show</a>
                    @can('order-edit')
                    <a class="btn btn-primary" href="{{ route('orders.edit',$order->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('order-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
    </div>

    {!! $orders->links() !!}

	      </div>
        </div>
    </div>
</div>    

@endsection