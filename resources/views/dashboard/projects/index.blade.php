@extends('layouts.admin-master')

@section('breadcrumb')
<div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Manage Projects</li>
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
                <h2>Projects</h2>
            </div>
            <div class="pull-right">
                @can('project-create')
                <a class="btn btn-success" href="{{ route('projects.create') }}"> New Project</a>
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
	    @foreach ($projects as $project)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $project->name }}</td>
	        <td>{{ $project->detail }}</td>
	        <td>
                <form class="delForm" action="{{ route('projects.destroy',$project->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('projects.show',$project->id) }}">Show</a>
                    @can('project-edit')
                    <a class="btn btn-primary" href="{{ route('projects.edit',$project->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('project-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
    </div>

    {!! $projects->links() !!}
    
	      </div>
        </div>
    </div>
</div>
@endsection