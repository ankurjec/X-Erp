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
            <div class="float-left">
                <h2>Payments</h2>
            </div>
            <div class="float-right">
                @can('payment-create')
                <a class="btn btn-success" href="{{ route('payments.create') }}"> New Payment</a>
                @endcan
            </div>
        </div>
    </div>

    @livewire('search-payments-made')
    

	      </div>
        </div>
    </div>
</div>
@endsection