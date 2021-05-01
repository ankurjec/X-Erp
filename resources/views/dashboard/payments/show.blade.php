@extends('layouts.admin-master')

@section('breadcrumb')
<div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/payments">Manage Payments</a></li>
            <li class="breadcrumb-item active">Show Payment</li>
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
                <h2> Show Payment</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('payments.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Expenses:</strong>
                {{ json_encode($payment->expense_ids,true) }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Paid to Name:</strong>
                {{$payment->paid_to_name}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Paid to Entity:</strong>
                {{ $payment->paid_entity }}
            </div>
        </div>
        @if($payment->paid_entity == 'user')
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>User:</strong>
                {{ $payment->user->name }}
            </div>
        </div>
        @elseif($payment->paid_entity == 'vendor')
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Vendor:</strong>
                {{ $payment->vendor->name }}
            </div>
        </div>
        @elseif($payment->paid_entity == 'customer')
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Customer:</strong>
                {{ $payment->customer->name }}
            </div>
        </div>
        @endif
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Amount (Rs.):</strong>
                {{ moneyFormatIndia($payment->amount) }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Payment Date:</strong>
                {{ $payment->payment_date->format('d M Y') }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bank/Transaction Reference No:</strong>
                {{ $payment->reference_no }}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $payment->details }}
            </div>
        </div>
    </div>

	      </div>
        </div>
    </div>
</div>
@endsection