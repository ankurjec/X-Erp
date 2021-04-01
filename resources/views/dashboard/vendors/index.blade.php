@extends('layouts.admin-master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Vendors</h2>
            </div>
            <div class="pull-right">
                @can('vendor-create')
                <a class="btn btn-success" href="{{ route('vendors.create') }}"> New Vendor</a>
                @endcan
            </div>
        </div>
    </div>

<div class="table100 ver1">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($vendors as $vendor)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $vendor->name }}</td>
	        <td>{{ $vendor->detail }}</td>
	        <td>
                <form class="delForm" action="{{ route('vendors.destroy',$vendor->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('vendors.show',$vendor->id) }}">Show</a>
                    @can('vendor-edit')
                    <a class="btn btn-primary" href="{{ route('vendors.edit',$vendor->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('vendor-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
</div>

    {!! $vendors->links() !!}


@endsection