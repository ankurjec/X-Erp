@extends('layouts.admin-master')

@section('breadcrumb')
<div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Manage Customers</li>
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
                <h2>Customers</h2>
            </div>
            <div class="float-right">
                @can('customer-create')
                <a class="btn btn-success" href="{{ route('customers.create') }}"> New Customer</a>
                @endcan
            </div>
        </div>
    </div>

    <div class="table100 ver1">
    <table class="table table-bordered table-striped table-condensed table-responsive-sm">
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

	      </div>
        </div>
    </div>
</div>    

@endsection