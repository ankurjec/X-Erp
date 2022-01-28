@extends('layouts.admin-master')

@section('style')
    @parent
    <link rel="stylesheet" href="/vendor/select2/css/select2.min.css">
    <link rel="stylesheet" href="/vendor/select2/css/select2-bootstrap4.css">
@endsection

@section('breadcrumb')
<div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/expenses">Manage credit Notes</a></li>
            <li class="breadcrumb-item active">Edit credit Notes</li>
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
                <h2>Edit credit Notes</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('credit_note.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <form action="{{ route('credit_note.update',$credit_note->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="expense_row row">
		    <div class="col-xs-3 col-sm-3 col-md-3">
		        <div class="form-group">
		            <strong>Expense Type:</strong>
		            <select name="type" class="form-control entity_type_select">
		                <option value="" disabled selected="selected">Select</option>
		                <option value="general_expense" @if($credit_note->type == "general_expense") selected="selected" @endif>General Expense</option>
		                <option value="vendor_payment" @if($credit_note->type == "vendor_payment") selected="selected" @endif>Vendor Payment</option>
		                <option value="refunds" @if($credit_note->type == "refunds") selected="selected" @endif>Refunds</option>
		            </select>
		        </div>
		    </div>
		    
		    {{-- <div class="col-xs-3 col-sm-3 col-md-3 user_id_select_box" style="display:none">
		        <div class="form-group">
		            <strong>User:</strong>
		            <select name="user_id" class="form-control user_id_select">
		                <option value="" disabled selected="selected">Select</option>
		                @foreach($users as $user)
    		                @if($user->id > 1)
    		                <option value="{{$user->id}}" @if($expense->user_id == $user->id) selected="selected" @endif>{{$user->name}}</option>
    		                @endif
		                @endforeach
		            </select>
		        </div>
		    </div> --}}
		    <div class="col-xs-3 col-sm-3 col-md-3 vendor_id_select_box" style="display:none">
		        <div class="form-group">
		            <strong>Vendor:</strong>
		            <select name="vendor_id" class="form-control vendor_id_select select2">
		                <option value="" disabled selected="selected">Select</option>
		                @foreach($vendors as $vendor)
		                <option value="{{$vendor->id}}" @if($credit_note->vendor_id == $vendor->id) selected="selected" @endif>{{$vendor->name}}</option>
		                @endforeach
		            </select>
		        </div>
		    </div>
		    <div class="col-xs-3 col-sm-3 col-md-3 customer_id_select_box" style="display:none">
		        <div class="form-group">
		            <strong>Customer:</strong>
		            <select name="customer_id" class="form-control customer_id_select select2">
		                <option value="" disabled selected="selected">Select</option>
		                @foreach($customers as $customer)
		                <option value="{{$customer->id}}" @if($credit_note->customer_id == $customer->id) selected="selected" @endif>{{$customer->name}}</option>
		                @endforeach
		            </select>
		        </div>
		    </div>
		    
		    <div class="col-xs-2 col-sm-2 col-md-2">
		        <div class="form-group">
		            <strong>Amount (Rs.):</strong>
		            <input type="number" min="1" step="0.01" name="amount" class="form-control" placeholder="Amount" value="{{$credit_note->amount}}">
		        </div>
		    </div>
		    
		    <div class="col-xs-4 col-sm-4 col-md-4">
		        <div class="form-group">
		            <strong>Detail:</strong>
		            <textarea class="form-control" name="details" placeholder="Detail">{!!$credit_note->details!!}</textarea>
		        </div>
		    </div>
		   

			
		    
		    <div class="col-xs-4 col-sm-4 col-md-4">
		        <div class="form-check">
                  <input name="paid_flag" class="form-check-input" type="checkbox" value="1" id="paid_flag" @if($credit_note->paid_flag) checked="checked" @endif>
                  <label class="form-check-label" for="paid_flag">
                    Paid
                  </label>
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

@section('script')
    @parent
	<script src="/vendor/select2/js/select2.full.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.select2').select2({
		theme: 'bootstrap4'
	});

    entityVisibility();
    
    $(document).on('change','.entity_type_select',function(e){
        entityVisibility();
    });
    
    function entityVisibility() {
        var $this = $('.entity_type_select');
        //    var user_id_select = $this.closest('.expense_row').find('.user_id_select');
        //    var user_id_select_box = $this.closest('.expense_row').find('.user_id_select_box');
           
           var vendor_id_select = $this.closest('.expense_row').find('.vendor_id_select');
           var vendor_id_select_box = $this.closest('.expense_row').find('.vendor_id_select_box');
           
           var customer_id_select = $this.closest('.expense_row').find('.customer_id_select');
           var customer_id_select_box = $this.closest('.expense_row').find('.customer_id_select_box');
           
           if($this.val() == "general_expense") {
            //    user_id_select_box.show();
               
               vendor_id_select.val('')
               vendor_id_select_box.hide();
               
               customer_id_select.val('');
               customer_id_select_box.hide();
           } else if($this.val() == "vendor_payment") {
            //    user_id_select.val('');
            //    user_id_select_box.hide();
               
               vendor_id_select_box.show();
               
               customer_id_select.val('');
               customer_id_select_box.hide();
           } else if($this.val() == "refunds") {
            //    user_id_select.val('');
            //    user_id_select_box.hide();
               
               vendor_id_select.val('')
               vendor_id_select_box.hide();
               
               customer_id_select_box.show();
           } else {
            //    user_id_select.val('');
            //    user_id_select_box.hide();
               
               vendor_id_select.val('')
               vendor_id_select_box.hide();
               
               customer_id_select.val('');
               customer_id_select_box.hide();
           }
    }    
});
</script>
@endsection