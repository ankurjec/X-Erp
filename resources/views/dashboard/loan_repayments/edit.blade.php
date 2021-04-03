@extends('layouts.admin-master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Loan Repayment</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('loan_repayments.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <form action="{{ route('loan_repayments.update',$loan_repayment->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Loan:</strong>
		            <select name="user_id" class="form-control">
		                <option value="" disabled selected="selected">Select</option>
		                @foreach($loans as $loan)
    		                <option value="{{$loan_repayment->id}}" @if($loan_repayment->loan_id == $loan->id) selected="selected" @endif>{{$loan->id}} ({{$loan->user->name}})</option>
		                @endforeach
		            </select>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Amount:</strong>
		            <input type="number" min="1" step="0.01" name="amount" class="form-control" value="{{$loan_repayment->amount}}">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Repayment Date:</strong>
		            <input type="date" name="repayment_date" class="form-control" value="{{$loan_repayment->repayment_date}}">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Details:</strong>
		            <textarea class="form-control" style="height:150px" name="details" placeholder="Details">{!!$loan_repayment->details!!}</textarea>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


@endsection