@extends('layouts.admin-master')

@section('breadcrumb')
<div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/payments_received">Manage Payments Received</a></li>
            <li class="breadcrumb-item active">Add Payment Received</li>
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
                <h2>Add New Payment Received</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('payments_received.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <form action="{{ route('payments_received.store') }}" method="POST" enctype="multipart/form-data">
    	@csrf
		<input type="hidden" name="project_id" value="{{get_project_id()}}">

         <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Order:</strong>
		            <select name="order_id" class="form-control">
		                <option value="" disabled selected="selected">Select</option>
		                @foreach($orders as $order)
    		                <option value="{{$order->id}}">#{{$order->id}}-{{substr($order->name,0,20)}}</option>
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
		                <option value="{{$customer->id}}">{{$customer->name}}</option>
		                @endforeach
		            </select>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Received Date:</strong>
		            <input type="date" name="received_date" class="form-control" placeholder="Received Date">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Mode:</strong>
		            <select name="mode" class="form-control">
		                <option value="" disabled selected="selected">Select</option>
		                <option value="bank_transfer">Bank Transfer</option>
		                <option value="cash">Cash</option>
		            </select>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Invoice No:</strong>
		            <input type="text" name="invoice_no" class="form-control" placeholder="Invoice No">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Amount (Rs.):</strong>
		            <input type="number" min="1" step="0.01" name="amount" class="form-control" placeholder="Amount">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>GST No:</strong>
		            <input type="text" name="gst_no" class="form-control" placeholder="GST No">
		        </div>
		    </div>
		    
		    </div>
		 	<div class="col-xs-6 col-sm-6 col-md-6">
		 	
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>CGST Amount (Rs.):</strong>
		            <input type="number" min="1" step="0.01" name="cgst_amount" class="form-control" placeholder="CGST Amount">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>SGST Amount (Rs.):</strong>
		            <input type="number" min="1" step="0.01" name="sgst_amount" class="form-control" placeholder="SGST Amount">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>IGST Amount (Rs.):</strong>
		            <input type="number" min="1" step="0.01" name="igst_amount" class="form-control" placeholder="IGST Amount">
		        </div>
		    </div>
		     
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Bank/Transaction Reference No:</strong>
		            <input type="text" name="reference_no" class="form-control" placeholder="Reference No">
		        </div>
		    </div>
		    
		    
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Place of Supply:</strong>
    		      <?php $statelistarr = get_gst_state_list(); ?>
    		          <select name="place_of_supply" class="form-control customer_id_select">
		                <option value="" disabled selected="selected">Select</option>
		                 @foreach($statelistarr as $key=>$state)
		                <option value="{{$key}}">{{$state}} ({{$key}})</option>
		                @endforeach
		            </select>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Paid in Full/Partial/Advance:</strong>
		            <select name="full_partial_advance" class="form-control">
		                <option value="" disabled selected="selected">Select</option>
		                <option value="advance">Advance</option>
		                <option value="full">Full</option>
		                <option value="partial">Partial</option>
		            </select>
		        </div>
		    </div>
		    
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Details:</strong>
		            <textarea class="form-control" name="details" placeholder="Details"></textarea>
		        </div>
		    </div>
		  </div>
		  <div class="form-group col-xs-12 col-sm-12 col-md-12">
			<label for="exampleFormControlFile1"><strong>Upload Payment Received Document:</strong></label>
			{{-- <input type="file" class="form-control-file" id="fileUpload" name="photos[]" multiple
			
			  > --}}
			<input id="fileupload" type="file" name="photos[]" multiple="multiple" />

		</div>
		<div id="image-holder" style="width: 300px;height:500px;">
			<div class="col-md-12" class="gallery">
				<div id="dvPreview">
					{{-- <td> <p><button onclick="remove_img()" type="button" id="btn" class="btn btn-danger"> Remove
						File/Files</button></p></td> --}}
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
		 </div>


    </form>

	      </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script>
    $("#fileUpload").on('change', function () {
 
 if (typeof (FileReader) != "undefined") {
 
     var image_holder = $("#image-holder");
     image_holder.empty();
 
     var reader = new FileReader();
     reader.onload = function (e) {
         $("<img />", {
             "src": e.target.result,
             "class": "thumb-image",
             "height": "300px",
         }).appendTo(image_holder);
         ('#btn').appendTo(image_holder);

 
     }
     image_holder.show();
     reader.readAsDataURL($(this)[0].files[0]);
 } else {
     alert("This browser does not support FileReader.");
 }
 });
</script>
@endsection