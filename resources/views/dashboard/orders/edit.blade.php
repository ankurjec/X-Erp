@extends('layouts.admin-master')

@section('breadcrumb')
<div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/orders">Manage Orders</a></li>
            <li class="breadcrumb-item active">Edit Order</li>
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
                <h2>Edit Order</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('orders.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <form action="{{ route('orders.update',$order->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" class="form-control" placeholder="Name" value="{{$order->name}}">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Detail:</strong>
		            <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{!!$order->detail!!}</textarea>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-6 col-md-4">
		        <div class="form-group">
		            <strong>Order Status:</strong>
		            <select name="order_status" class="form-control">
		                <option value="initial_requirements" @if($order->order_status == 'initial_requirements') selected="selected" @endif>Initial Requirements</option>
		                <option value="sent_quotation" @if($order->order_status == 'sent_quotation') selected="selected" @endif>Sent Quotation</option>
		                <option value="sampling" @if($order->order_status == 'sampling') selected="selected" @endif>Sampling</option>
		                <option value="production_start" @if($order->order_status == 'production_start') selected="selected" @endif>Production Start</option>
		                <option value="shipped" @if($order->order_status == 'shipped') selected="selected" @endif>Shipped</option>
		                <option value="delivered" @if($order->order_status == 'delivered') selected="selected" @endif>Delivered</option>
		                <option value="completed" @if($order->order_status == 'completed') selected="selected" @endif>Completed with Payment</option>
		                <option value="cancelled" @if($order->order_status == 'cancelled') selected="selected" @endif>Cancelled</option>
		                <option value="dispute" @if($order->order_status == 'dispute') selected="selected" @endif>Dispute</option>
		            </select>
		        </div>
		    </div>
		    
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>

	      </div>
        </div>
    </div>
</div>

@endsection