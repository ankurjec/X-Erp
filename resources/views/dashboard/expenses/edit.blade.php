@extends('layouts.admin-master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Expense</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('expenses.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <form action="{{ route('expenses.update',$expense->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="expense_row row">
		    <div class="col-xs-3 col-sm-3 col-md-3">
		        <div class="form-group">
		            <strong>Expense Type:</strong>
		            <select name="type" class="form-control entity_type_select">
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
		            <select name="user_id" class="form-control user_id_select">
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
		            <select name="vendor_id" class="form-control vendor_id_select">
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
		            <select name="customer_id" class="form-control customer_id_select">
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
		            <input type="number" min="1" step="0.01" name="amount" class="form-control" placeholder="Amount" value="{{$expense->amount}}">
		        </div>
		    </div>
		    
		    <div class="col-xs-4 col-sm-4 col-md-4">
		        <div class="form-group">
		            <strong>Detail:</strong>
		            <textarea class="form-control" name="details" placeholder="Detail">{!!$expense->details!!}</textarea>
		        </div>
		    </div>
		    
		    
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


@endsection

@section('script')
    @parent
<script type="text/javascript">
$(document).ready(function(){
    entityVisibility();
    
    $(document).on('change','.entity_type_select',function(e){
        entityVisibility();
    });
    
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