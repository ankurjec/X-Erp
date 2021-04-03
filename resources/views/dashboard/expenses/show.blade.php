@extends('layouts.admin-master')

@section('breadcrumb')
<div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/expenses">Manage Expenses</a></li>
            <li class="breadcrumb-item active">Show Expense</li>
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
            <div class="pull-left">
                <h2> Show Expense</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('expenses.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="expense_row row">
		    <div class="col-xs-3 col-sm-3 col-md-3">
		        <div class="form-group">
		            <strong>Expense Type:</strong>
		            <select name="type" class="form-control entity_type_select" disabled="true">
		                <option value="" disabled selected="selected">Select</option>
		                <option value="general_expense" @if($expense->type == "general_expense") selected="selected" @endif>General Expense</option>
		                <option value="vendor_payment" @if($expense->type == "vendor_payment") selected="selected" @endif>Vendor Payment</option>
		                <option value="refunds" @if($expense->type == "refunds") selected="selected" @endif>Refunds</option>
		            </select>
		        </div>
		    </div>
		    
		    <div class="col-xs-3 col-sm-3 col-md-3 user_id_select_box" style="display:none">
		        <div class="form-group">
		            <strong>User:</strong>
		            <select name="user_id" class="form-control user_id_select" disabled="true">
		                <option value="" disabled selected="selected">Select</option>
		                @foreach($users as $user)
    		                @if($user->id > 1)
    		                <option value="{{$user->id}}" @if($expense->user_id == $user->id) selected="selected" @endif>{{$user->name}}</option>
    		                @endif
		                @endforeach
		            </select>
		        </div>
		    </div>
		    <div class="col-xs-3 col-sm-3 col-md-3 vendor_id_select_box" style="display:none">
		        <div class="form-group">
		            <strong>Vendor:</strong>
		            <select name="vendor_id" class="form-control vendor_id_select" disabled="true">
		                <option value="" disabled selected="selected">Select</option>
		                @foreach($vendors as $vendor)
		                <option value="{{$vendor->id}}" @if($expense->vendor_id == $vendor->id) selected="selected" @endif>{{$vendor->name}}</option>
		                @endforeach
		            </select>
		        </div>
		    </div>
		    <div class="col-xs-3 col-sm-3 col-md-3 customer_id_select_box" style="display:none">
		        <div class="form-group">
		            <strong>Customer:</strong>
		            <select name="customer_id" class="form-control customer_id_select" disabled="true">
		                <option value="" disabled selected="selected">Select</option>
		                @foreach($customers as $customer)
		                <option value="{{$customer->id}}" @if($expense->customer_id == $customer->id) selected="selected" @endif>{{$customer->name}}</option>
		                @endforeach
		            </select>
		        </div>
		    </div>
		    
		    <div class="col-xs-2 col-sm-2 col-md-2">
		        <div class="form-group">
		            <strong>Amount:</strong>
		            <input type="text" name="amount" class="form-control" placeholder="Amount" value="{{$expense->amount}}" readonly>
		        </div>
		    </div>
		    
		    <div class="col-xs-4 col-sm-4 col-md-4">
		        <div class="form-group">
		            <strong>Detail:</strong>
		            <textarea class="form-control" name="details" placeholder="Detail" readonly>{!!$expense->details!!}</textarea>
		        </div>
		    </div>
		</div>

	      </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    @parent
<script type="text/javascript">
$(document).ready(function(){
    entityVisibility();
    
    function entityVisibility() {
        var $this = $('.entity_type_select');
           var user_id_select = $this.closest('.expense_row').find('.user_id_select');
           var user_id_select_box = $this.closest('.expense_row').find('.user_id_select_box');
           
           var vendor_id_select = $this.closest('.expense_row').find('.vendor_id_select');
           var vendor_id_select_box = $this.closest('.expense_row').find('.vendor_id_select_box');
           
           var customer_id_select = $this.closest('.expense_row').find('.customer_id_select');
           var customer_id_select_box = $this.closest('.expense_row').find('.customer_id_select_box');
           
           if($this.val() == "general_expense") {
               user_id_select_box.show();
               
               vendor_id_select.val('')
               vendor_id_select_box.hide();
               
               customer_id_select.val('');
               customer_id_select_box.hide();
           } else if($this.val() == "vendor_payment") {
               user_id_select.val('');
               user_id_select_box.hide();
               
               vendor_id_select_box.show();
               
               customer_id_select.val('');
               customer_id_select_box.hide();
           } else if($this.val() == "refunds") {
               user_id_select.val('');
               user_id_select_box.hide();
               
               vendor_id_select.val('')
               vendor_id_select_box.hide();
               
               customer_id_select_box.show();
           } else {
               user_id_select.val('');
               user_id_select_box.hide();
               
               vendor_id_select.val('')
               vendor_id_select_box.hide();
               
               customer_id_select.val('');
               customer_id_select_box.hide();
           }
    }    
});
</script>
@endsection