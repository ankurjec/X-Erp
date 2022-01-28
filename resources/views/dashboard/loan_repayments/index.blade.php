@extends('layouts.admin-master')

@section('breadcrumb')
<div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Manage Loan Repayments</li>
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
                <h2>Loan Repayments</h2>
            </div>
            {{-- <div class="float-right">
                @can('loan-repayment-create')
                <a class="btn btn-success" href="{{ route('loan_repayments.create') }}"> New Loan Repayment</a>
                @endcan
            </div> --}}
        </div>
    </div>

    <div class="table100 ver1">
    <table class="table table-bordered table-striped table-condensed table-responsive-sm">
        <tr>
            <th>No</th>
            <th>From</th>
            <th>Amount</th>
            <th>Repayment/Generated Date</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($loan_repayments as $loan_repayment)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>#{{ $loan_repayment->loan->id }} ({{ $loan_repayment->loan->vendor->name }})</td>
	        <td>{{ moneyFormatIndia($loan_repayment->amount) }}</td>
            <td>{{ date_custom($loan_repayment->repayment_date) }}</td>
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
    
	      </div>
        </div>
    </div>
</div>
@endsection