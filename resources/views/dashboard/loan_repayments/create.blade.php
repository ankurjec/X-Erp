@extends('layouts.admin-master')

@section('breadcrumb')
<div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/loan_repayments">Manage Loan Repayments</a></li>
            <li class="breadcrumb-item active">Add Loan Repayment</li>
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
                <h2>Add New Loan Repayment</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('loan_repayments.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <form action="{{ route('loan_repayments.store') }}" method="POST">
    	@csrf
		<input type="hidden" name="project_id" value="{{get_project_id()}}">

         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Loan Id:</strong>
		            <select name="loan_id" class="form-control">
		                <option value="" disabled selected="selected">Select</option>
		                @foreach($loans as $loan)
    		                <option value="{{$loan->id}}">{{$loan->id}} ({{$loan->user->name}})</option>
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
		            <strong>Repayment Date:</strong>
		            <input type="date" name="repayment_date" class="form-control">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Details:</strong>
		            <textarea class="form-control" style="height:150px" name="details" placeholder="Details"></textarea>
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