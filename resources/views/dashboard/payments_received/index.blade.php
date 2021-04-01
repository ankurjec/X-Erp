@extends('layouts.admin-master')


@section('content')
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
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($payments_received as $payment_received)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $payment_received->from }}</td>
	        <td>{{ $payment_received->details }}</td>
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
    

@endsection