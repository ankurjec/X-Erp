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
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Total Order Value:</strong>
		            <input type="number" min="0" step="0.01" name="total_order_value" class="form-control">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-6 col-md-4">
		        <div class="form-group">
		            <strong>Order Status:</strong>
		            <input list="status_list" name="order_status" class="form-control">
		            <datalist id="status_list">
						<option value="Initial Requirements">
						<option value="Sent Quotation">
						<option value="Sampling">
						<option value="Order Confirmed">
						<option value="Order Inprocess">
						<option value="Shipped">
						<option value="Delivered">
						<option value="Completed with Payment">
						<option value="Cancelled">
						<option value="Dispute">
					</datalist>
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