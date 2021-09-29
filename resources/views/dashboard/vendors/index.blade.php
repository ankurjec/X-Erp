@extends('layouts.admin-master')

@section('breadcrumb')
<div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Manage Vendors</li>
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
                <h2>Vendors</h2>
            </div>
            <div class="float-right">
                @can('vendor-create')
                <a class="btn btn-success" href="{{ route('vendors.create') }}"> New Vendor</a>
                @endcan
            </div>
        </div>
    </div>



@livewire('search-vendors')

	      </div>
        </div>
    </div>
</div>

@endsection