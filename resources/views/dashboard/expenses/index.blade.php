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
            <th>Id #</th>
            <th>Type</th>
            <th>Payee</th>
            <th>Amount (Rs.)</th>
            <th>Paid/Unpaid</th>
            <!--<th>Total Paid (Rs.) <i class="fas fa-info-circle" title="This may include multiple expenses"></i></th>-->
            <th width="280px">Action</th>
        </tr>
	    @foreach ($expenses as $expense)
	    <tr>
	        <td>{{ $expense->id }}</td>
	        <td>{{ $expense->type_string }}</td>
	        <td>
	            @if($expense->type == 'general_expense')
	            {{ $expense->user ? $expense->user->name : '' }}
	            @elseif($expense->type == 'vendor_payment')
	            {{ $expense->vendor ? $expense->vendor->name : '' }}
	            @elseif($expense->type == 'refunds')
	            {{ $expense->customer ? $expense->customer->name : '' }}
	            @endif
	           </td>
	        <td>{{ moneyFormatIndia($expense->amount) }}</td>
	        <td>{!! $expense->paid_flag ? '<span class="badge badge-success">Paid</span>' : '<span class="badge badge-secondary">Unpaid</span>'!!}</td>
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