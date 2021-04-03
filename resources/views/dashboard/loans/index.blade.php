@extends('layouts.admin-master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Loans</h2>
            </div>
            <div class="pull-right">
                @can('loan-create')
                <a class="btn btn-success" href="{{ route('loans.create') }}"> New Loan</a>
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
	    @foreach ($loans as $loan)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $loan->user->name }}</td>
	        <td>{{ $loan->amount }}</td>
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
    

@endsection