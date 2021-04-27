@extends('layouts.admin-master')

@section('breadcrumb')
<div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/expenses">Manage Expenses</a></li>
            <li class="breadcrumb-item active">Add Expense</li>
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
            <!--<div class="pull-left">
                <h2>Add Expenses</h2>
            </div>-->
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('expenses.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <form action="{{ route('expenses.store') }}" method="POST">
    	@csrf
		<input type="hidden" name="project_id" value="{{get_project_id()}}">

        <div class="input_fields_wrap">
        <div class="card bg-light mb-3 expense-card">
            <div class="card-header">Expense 
            <a class="delBtn btn btn-danger btn-sm float-right" href="#" role="button" title="Delete">
                Delete
			</a>
		    </div>
        <div class="card-body">
         <div class="expense_row row">
		    <div class="col-xs-3 col-sm-3 col-md-3">
		        <div class="form-group">
		            <strong>Expense Type:</strong>
		            <select name="type[]" class="form-control entity_type_select">
		                <option value="" disabled selected="selected">Select</option>
		                <option value="general_expense">General Expense</option>
		                <option value="vendor_payment">Vendor Payment</option>
		                <option value="refunds">Refunds</option>
		            </select>
		        </div>
		    </div>
		    
		    <div class="col-xs-3 col-sm-3 col-md-3 user_id_select_box" style="display:none">
		        <div class="form-group">
		            <strong>User:</strong>
		            <select name="entity_id[]" class="form-control user_id_select">
		                <option value="" disabled selected="selected">Select</option>
		                @foreach($users as $user)
    		                @if($user->id > 1)
    		                <option value="{{$user->id}}">{{$user->name}}</option>
    		                @endif
		                @endforeach
		            </select>
		        </div>
		    </div>
		    <div class="col-xs-3 col-sm-3 col-md-3 vendor_id_select_box" style="display:none">
		        <div class="form-group">
		            <strong>Vendor:</strong>
		            <select name="entity_id[]" class="form-control vendor_id_select">
		                <option value="" disabled selected="selected">Select</option>
		                @foreach($vendors as $vendor)
		                <option value="{{$vendor->id}}">{{$vendor->name}}</option>
		                @endforeach
		            </select>
		        </div>
		    </div>
		    <div class="col-xs-3 col-sm-3 col-md-3 customer_id_select_box" style="display:none">
		        <div class="form-group">
		            <strong>Customer:</strong>
		            <select name="entity_id[]" class="form-control customer_id_select">
		                <option value="" disabled selected="selected">Select</option>
		                @foreach($customers as $customer)
		                <option value="{{$customer->id}}">{{$customer->name}}</option>
		                @endforeach
		            </select>
		        </div>
		    </div>
		    
		    <div class="col-xs-2 col-sm-2 col-md-2">
		        <div class="form-group">
		            <strong>Amount (Rs.):</strong>
		            <input type="number" min="1" step="0.01" name="amount[]" class="form-control" placeholder="Amount">
		        </div>
		    </div>
		    
		    <div class="col-xs-4 col-sm-4 col-md-4">
		        <div class="form-group">
		            <strong>Detail:</strong>
		            <textarea class="form-control" name="details[]" placeholder="Detail"></textarea>
		        </div>
		    </div>
		    
		</div>
		</div>
		</div>
		</div>
		
		<button id="add_prod" class="btn btn-info float-right" type="button"> ADD MORE</button>
		<div class="clearfix"></div>
		<hr/>
		<div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		</div>


    </form>

	      </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    @parent
<script type="text/javascript">
    $(document).ready(function(){
       $(document).on('change','.entity_type_select',function(e){
           var $this = $(this);
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
       });
       
       /*----------Add more product fields------------*/
	
    	var max_fields      = 10; /*maximum input boxes allowed*/
        var wrapper         = $(".input_fields_wrap"); /*Fields wrapper*/
        var add_button      = $("#add_prod"); /*Add button ID*/
        const fields_box = $('.input_fields_wrap').html();
        
        var x = 1; /*initlal text box count*/
        $(add_button).click(function(e){ /*on add input button click*/
            e.preventDefault();
            if(x < max_fields){ /*max input box allowed*/
                x++; /*text box increment*/
                $(wrapper).append(fields_box); /*add input box*/
            } else {
            	alert('Maximum ' + max_fields + ' expense rows allowed.');
            }
        });
        
        $(document).on('click', '.delBtn', function(event){
			event.preventDefault();
			$(this).closest('.expense-card').remove();
    	});
    });
</script>
@endsection