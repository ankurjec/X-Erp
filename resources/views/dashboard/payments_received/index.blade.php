@extends('layouts.admin-master')

@section('breadcrumb')
<div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Manage Payments Received</li>
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
                <h2>Payments Received</h2>
            </div>
            <div class="pull-right">
                @can('payments-received-create')
                <a class="btn btn-success" href="{{ route('payments_received.create') }}"> New Payments Received</a>
                @endcan
            </div>
        </div>
    </div>

    <div class="table100 ver1">
    <table class="table table-bordered table-striped table-condensed">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Amount</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($payments_received as $payment_received)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $payment_received->customer ? $payment_received->customer->name : 'Not Available' }}</td>
	        <td>{{ $payment_received->amount }}</td>
	        <td>
                <form class="delForm" action="{{ route('payments_received.destroy',$payment_received->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('payments_received.show',$payment_received->id) }}">Show</a>
                    @can('payments-received-edit')
                    <a class="btn btn-primary" href="{{ route('payments_received.edit',$payment_received->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('payments-received-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
    </div>

    {!! $payments_received->links() !!}
    
	      </div>
        </div>
    </div>
</div>
@endsection