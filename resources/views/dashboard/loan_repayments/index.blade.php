@extends('layouts.admin-master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Loan Repayments</h2>
            </div>
            <div class="pull-right">
                @can('loan-repayment-create')
                <a class="btn btn-success" href="{{ route('loan_repayments.create') }}"> New Loan Repayment</a>
                @endcan
            </div>
        </div>
    </div>

    <div class="table100 ver1">
    <table class="table table-bordered table-striped table-condensed">
        <tr>
            <th>No</th>
            <th>From</th>
            <th>Amount</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($loan_repayments as $loan_repayment)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $loan_repayment->loan->id }} ({{ $loan_repayment->loan->user->name }})</td>
	        <td>{{ $loan_repayment->amount }}</td>
	        <td>
                <form class="delForm" action="{{ route('loan_repayments.destroy',$loan_repayment->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('loan_repayments.show',$loan_repayment->id) }}">Show</a>
                    @can('loan-repayment-edit')
                    <a class="btn btn-primary" href="{{ route('loan_repayments.edit',$loan_repayment->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('loan-repayment-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
    </div>

    {!! $loan_repayments->links() !!}
    

@endsection