@extends('layouts.admin-master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Expenses</h2>
            </div>
            <div class="pull-right">
                @can('expense-create')
                <a class="btn btn-success" href="{{ route('expenses.create') }}"> New Expense</a>
                @endcan
            </div>
        </div>
    </div>

<div class="table100 ver1">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Type</th>
            <th>Payee</th>
            <th>Amount</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($expenses as $expense)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $expense->type_string }}</td>
	        <td>
	            @if($expense->type == 'general_expense')
	            {{ $expense->user->name }}
	            @elseif($expense->type == 'vendor_payment')
	            {{ $expense->vendor->name }}
	            @elseif($expense->type == 'refunds')
	            {{ $expense->customer->name }}
	            @endif
	           </td>
	        <td>{{ $expense->amount }}</td>
	        <td>
                <form class="delForm" action="{{ route('expenses.destroy',$expense->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('expenses.show',$expense->id) }}">Show</a>
                    @can('expense-edit')
                    <a class="btn btn-primary" href="{{ route('expenses.edit',$expense->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('expense-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
</div>

    {!! $expenses->links() !!}


@endsection