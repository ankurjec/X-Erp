@extends('layouts.admin-master')

@section('breadcrumb')
<div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Manage Loans</li>
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
                <h2>Loans</h2>
            </div>
            <div class="float-right">
                @can('loan-create')
                <a class="btn btn-success" href="{{ route('loans.create') }}"> New Loan</a>
                @endcan
            </div>
        </div>
    </div>

    <div class="table100 ver1">
    <table class="table table-bordered table-striped table-condensed table-responsive-sm">
        <tr>
            <th>No</th>
            <th>From</th>
            <th>Amount</th>
            <th>Total Repayment</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($loans as $loan)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $loan->vendor->name }}</td>
	        <td>{{ moneyFormatIndia($loan->amount) }}</td>
            <td>{{ moneyFormatIndia($loan->total_repayment) }}</td>
	        <td>
                <form class="delForm" action="{{ route('loans.destroy',$loan->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('loans.show',$loan->id) }}">Show</a>
                    @can('loan-edit')
                    <a class="btn btn-primary" href="{{ route('loans.edit',$loan->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('loan-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
    </div>

    {!! $loans->links() !!}
    
	      </div>
        </div>
    </div>
</div>
@endsection