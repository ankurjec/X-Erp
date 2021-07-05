@extends('layouts.admin-master')

@section('breadcrumb')
<div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/orders">Manage Orders</a></li>
            <li class="breadcrumb-item active">Add Order</li>
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
                <h2>Add New Order</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('orders.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <form action="{{ route('orders.store') }}" method="POST">
    	@csrf
		<input type="hidden" name="project_id" value="{{get_project_id()}}">

         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" class="form-control" placeholder="Name">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Detail:</strong>
		            <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-6 col-md-4">
		        <div class="form-group">
		            <strong>Order Status:</strong>
		            <select name="order_status" class="form-control">
		                <option value="initial_requirements">Initial Requirements</option>
		                <option value="sent_quotation">Sent Quotation</option>
		                <option value="sampling">Sampling</option>
		                <option value="production_start">Production Start</option>
		                <option value="shipped">Shipped</option>
		                <option value="delivered">Delivered</option>
		                <option value="completed">Completed with Payment</option>
		                <option value="cancelled">Cancelled</option>
		                <option value="dispute">Dispute</option>
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