@extends('layouts.admin-master')

@section('breadcrumb')
<div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Manage Expenses</li>
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

	      </div>
        </div>
    </div>
</div>
@endsection