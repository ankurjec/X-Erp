@extends('layouts.admin-master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Customers</h2>
            </div>
            <div class="pull-right">
                @can('vendor-create')
                <a class="btn btn-success" href="{{ route('customers.create') }}"> New Customer</a>
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
	    @foreach ($customers as $customer)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $customer->name }}</td>
	        <td>{{ $customer->detail }}</td>
	        <td>
                <form class="delForm" action="{{ route('customers.destroy',$customer->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('customers.show',$customer->id) }}">Show</a>
                    @can('customer-edit')
                    <a class="btn btn-primary" href="{{ route('customers.edit',$customer->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('customer-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
    </div>

    {!! $customers->links() !!}
    

@endsection