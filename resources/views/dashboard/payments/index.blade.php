@extends('layouts.admin-master')

@section('breadcrumb')
<div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Manage Payments</li>
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
                <h2>Payments</h2>
            </div>
            <div class="pull-right">
                @can('payment-create')
                <a class="btn btn-success" href="{{ route('payments.create') }}"> New Payment</a>
                @endcan
            </div>
        </div>
    </div>

    <div class="table100 ver1">
    <table class="table table-bordered table-striped table-condensed">
        <tr>
            <th>No</th>
            <th>Expense Ids</th>
            <th>Amount</th>
            <th>Payment Date</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($payments as $payment)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ json_encode($payment->expense_ids,true) }}</td>
	        <td>{{ $payment->amount }}</td>
	        <td>{{ $payment->payment_date->format('d M Y') }}</td>
	        <td>
                <form class="delForm" action="{{ route('payments.destroy',$payment->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('payments.show',$payment->id) }}">Show</a>
                    @can('payment-edit')
                    <a class="btn btn-primary" href="{{ route('payments.edit',$payment->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('payment-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
    </div>

    {!! $payments->links() !!}
    

	      </div>
        </div>
    </div>
</div>
@endsection