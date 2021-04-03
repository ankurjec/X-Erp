@extends('layouts.admin-master')

@section('style')
	@parent
<link rel="stylesheet" href="/vendor/bootstrap4-multiselect/css/BsMultiSelect.min.css">
@endsection

@section('breadcrumb')
<div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/payments">Manage Payments</a></li>
            <li class="breadcrumb-item active">Add Payment</li>
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
                <h2>Add New Payment</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('payments.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <form action="{{ route('payments.store') }}" method="POST">
    	@csrf
		<input type="hidden" name="project_id" value="{{get_project_id()}}">

         <div class="row">
         	<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Expenses:</strong>
		            <select id="expense_ids" name="expense_ids[]" class="form-control" multiple="multiple">
		                @foreach($expenses as $expense)
		                <option value="{{$expense->id}}">#{{$expense->id}} (Rs.{{$expense->amount}})</option>
		                @endforeach
		            </select>
		        </div>
		    </div>
		    
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Paid to Name:</strong>
		            <input type="text" name="paid_to_name" class="form-control">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Paid to Entity:</strong>
		            <select name="paid_entity" class="form-control entity_type_select">
		                <option value="" disabled selected="selected">Select</option>
		                <option value="user">User</option>
		                <option value="vendor">Vendor</option>
		                <option value="customer">Customer</option>
		            </select>
		        </div>
		    </div>
		    
		    <div class="col-xs-12 col-sm-12 col-md-12 user_id_select_box" style="display:none">
		        <div class="form-group">
		            <strong>User:</strong>
		            <select name="user_id" class="form-control user_id_select">
		                <option value="" disabled selected="selected">Select</option>
		                @foreach($users as $user)
    		                @if($user->id > 1)
    		                <option value="{{$user->id}}">{{$user->name}}</option>
    		                @endif
		                @endforeach
		            </select>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 vendor_id_select_box" style="display:none">
		        <div class="form-group">
		            <strong>Vendor:</strong>
		            <select name="vendor_id" class="form-control vendor_id_select">
		                <option value="" disabled selected="selected">Select</option>
		                @foreach($vendors as $vendor)
		                <option value="{{$vendor->id}}">{{$vendor->name}}</option>
		                @endforeach
		            </select>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 customer_id_select_box" style="display:none">
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
		            <strong>Amount:</strong>
		            <input type="number" min="1" step="0.01" name="amount" class="form-control">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Payment Date:</strong>
		            <input type="date" name="payment_date" class="form-control">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Bank/Transaction Reference No:</strong>
		            <input type="text" name="reference_no" class="form-control">
		        </div>
		    </div>
		    
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Detail:</strong>
		            <textarea class="form-control" style="height:150px" name="details" placeholder="Detail"></textarea>
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
<script src="/js/popper.min.js"></script>
<script src="/vendor/bootstrap4-multiselect/js/BsMultiSelect.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
       $(document).on('change','.entity_type_select',function(e){
           var $this = $(this);
           var user_id_select = $this.closest('.row').find('.user_id_select');
           var user_id_select_box = $this.closest('.row').find('.user_id_select_box');
           
           var vendor_id_select = $this.closest('.row').find('.vendor_id_select');
           var vendor_id_select_box = $this.closest('.row').find('.vendor_id_select_box');
           
           var customer_id_select = $this.closest('.row').find('.customer_id_select');
           var customer_id_select_box = $this.closest('.row').find('.customer_id_select_box');
           
           if($this.val() == "user") {
               user_id_select_box.show();
               
               vendor_id_select.val('')
               vendor_id_select_box.hide();
               
               customer_id_select.val('');
               customer_id_select_box.hide();
           } else if($this.val() == "vendor") {
               user_id_select.val('');
               user_id_select_box.hide();
               
               vendor_id_select_box.show();
               
               customer_id_select.val('');
               customer_id_select_box.hide();
           } else if($this.val() == "customer") {
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
       
       $("#expense_ids").bsMultiSelect({
  cssPatch: {
    choices: {
      listStyleType: 'none'
    },
    picks: {
      listStyleType: 'none',
      display: 'flex',
      flexWrap: 'wrap',
      height: 'auto',
      marginBottom: '0'
    },
    choice: 'px-md-2 px-1',
    choice_hover: 'text-primary bg-light',
    filterInput: {
      border: '0px',
      height: 'auto',
      boxShadow: 'none',
      padding: '0',
      margin: '0',
      outline: 'none',
      backgroundColor: 'transparent',
      backgroundImage: 'none' // otherwise BS .was-vali<a href="https://www.jqueryscript.net/time-clock/">date</a>d set its image

    },
    filterInput_empty: 'form-control',
    // need for placeholder, TODO test form-control-plaintext
    // used in staticContentGenerator
    picks_disabled: {
      backgroundColor: '#e9ecef'
    },
    picks_focus: {
      borderColor: '#80bdff',
      boxShadow: '0 0 0 0.2rem rgba(0, 123, 255, 0.25)'
    },
    picks_focus_valid: {
      borderColor: '',
      boxShadow: '0 0 0 0.2rem rgba(40, 167, 69, 0.25)'
    },
    picks_focus_invalid: {
      borderColor: '',
      boxShadow: '0 0 0 0.2rem rgba(220, 53, 69, 0.25)'
    },
    // used in BsAppearance
    picks_def: {
      minHeight: 'calc(2.25rem + 2px)'
    },
    picks_lg: {
      minHeight: 'calc(2.875rem + 2px)'
    },
    picks_sm: {
      minHeight: 'calc(1.8125rem + 2px)'
    },
    // used in pickContentGenerator
    pick: {
      paddingLeft: '0px',
      lineHeight: '1.5em'
    },
    pickButton: {
      fontSize: '1.5em',
      lineHeight: '.9em',
      float: "none"
    },
    pickContent_disabled: {
      opacity: '.65'
    },
    // used in choiceContentGenerator
    choiceContent: {
      justifyContent: 'initial'
    },
    // BS problem: without this on inline form menu items justified center
    choiceLabel: {
      color: 'inherit'
    },
    // otherwise BS .was-validated set its color
    choiceCheckBox: {
      color: 'inherit'
    },
    choiceLabel_disabled: {
      opacity: '.65'
    }
  }
});

    });
</script>
@endsection