@extends('layouts.admin-master')

@section('breadcrumb')
<div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/vendors">Manage Vendors</a></li>
            <li class="breadcrumb-item active">Show Vendor</li>
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
                <h2> Show Vendor</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('vendors.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $vendor->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $vendor->detail }}
            </div>
        </div>
    </div>

	      </div>
        </div>
    </div>
</div>

@endsection