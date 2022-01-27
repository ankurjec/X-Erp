@extends('layouts.admin-master')

@section('breadcrumb')
<div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/payments_received">Manage Payments Received</a></li>
            <li class="breadcrumb-item active">Edit Payment Received</li>
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
                <h2>Edit Payments Received</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('payments_received.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <form action="{{ route('payments_received.update',$payment_received->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Order:</strong>
		            <select name="order_id" class="form-control">
		                <option value="" disabled selected="selected">Select</option>
		                @foreach($orders as $order)
    		                <option value="{{$order->id}}" @if($payment_received->order_id == $order->id) selected="selected" @endif>#{{$order->id}}-{{substr($order->name,0,20)}}</option>
		                @endforeach
		            </select>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Customer:</strong>
		            <select name="customer_id" class="form-control customer_id_select">
		                <option value="" disabled selected="selected">Select</option>
		                @foreach($customers as $customer)
		                <option value="{{$customer->id}}" @if($payment_received->customer_id == $customer->id) selected="selected" @endif>{{$customer->name}}</option>
		                @endforeach
		            </select>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Received Date:</strong>
		            <input type="date" name="received_date" class="form-control" placeholder="Received Date" value="{{$payment_received->received_date ? $payment_received->received_date->format('Y-m-d') : ''}}">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Mode:</strong>
		            <select name="mode" class="form-control">
		                <option value="" disabled selected="selected">Select</option>
						@foreach(config('settings.mode_of_payments') as $mode_of_payment)
		                <option value="{{ $mode_of_payment }}" @if($payment_received->mode == $mode_of_payment) selected="selected" @endif>{{ $mode_of_payment }}</option>
						@endforeach
		            </select>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Invoice No:</strong>
		            <input type="text" name="invoice_no" class="form-control" placeholder="Invoice No" value="{{$payment_received->invoice_no}}">
		        </div>
				<div class="form-group">
		            <strong>No Invoice Reason (Enter if there is no Invoice):</strong>
		            <input type="text" name="no_invoice_reason" class="form-control" placeholder="No Invoice Reason" value="{{$payment_received->no_invoice_reason}}">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Amount (Rs.):</strong>
		            <input type="number" min="1" step="0.01" name="amount" class="form-control" placeholder="Amount" value="{{$payment_received->amount}}">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>GST No:</strong>
		            <input type="text" name="gst_no" class="form-control" placeholder="GST No" value="{{$payment_received->gst_no}}">
		        </div>
		    </div>
		    
		    </div>
		 <div class="col-xs-6 col-sm-6 col-md-6">
		 	
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>CGST Amount (Rs.):</strong>
		            <input type="number" min="1" step="0.01" name="cgst_amount" class="form-control" placeholder="CGST Amount" value="{{$payment_received->cgst_amount}}">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>SGST Amount (Rs.):</strong>
		            <input type="number" min="1" step="0.01" name="sgst_amount" class="form-control" placeholder="SGST Amount" value="{{$payment_received->sgst_amount}}">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>IGST Amount (Rs.):</strong>
		            <input type="number" min="1" step="0.01" name="igst_amount" class="form-control" placeholder="IGST Amount" value="{{$payment_received->igst_amount}}">
		        </div>
		    </div>
		 
		     
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Bank/Transaction Reference No:</strong>
		            <input type="text" name="reference_no" class="form-control" placeholder="Reference No" value="{{$payment_received->reference_no}}">
		        </div>
		    </div>
		    
		    
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Place of Supply:</strong>
    		      <?php $statelistarr = get_gst_state_list(); ?>
    		          <select name="place_of_supply" class="form-control customer_id_select">
		                <option value="" disabled selected="selected">Select</option>
		                 @foreach($statelistarr as $key=>$state)
		                <option value="{{$key}}" @if($payment_received->place_of_supply == $key) selected="selected" @endif>{{$state}} ({{$key}})</option>
		                @endforeach
		            </select>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Paid in Full/Partial/Advance:</strong>
		            <select name="full_partial_advance" class="form-control">
		                <option value="" disabled selected="selected">Select</option>
		                <option value="advance" @if($payment_received->full_partial_advance == "advance") selected="selected" @endif>Advance</option>
		                <option value="full" @if($payment_received->full_partial_advance == "full") selected="selected" @endif>Full</option>
		                <option value="partial" @if($payment_received->full_partial_advance == "partial") selected="selected" @endif>Partial</option>
		            </select>
		        </div>
		    </div>
		    
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Details:</strong>
		            <textarea class="form-control" name="details" placeholder="Details">{!!$payment_received->details!!}</textarea>
		        </div>
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