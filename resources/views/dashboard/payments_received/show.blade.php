@extends('layouts.admin-master')

@section('breadcrumb')
<div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/payments_received">Manage Payments Received</a></li>
            <li class="breadcrumb-item active">Show Payment Received</li>
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
                <h2> Show Payment Received</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('payments_received.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Order:</strong>
                @if($payment_received->order)
	            #{{ $payment_received->order->id }} - {{ $payment_received->order->name }}
	            @else
	            NA
	            @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Customer:</strong>
                {{ $payment_received->customer ? $payment_received->customer->name : 'Not Available' }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Received Date:</strong>
                {{ $payment_received->received_date }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mode:</strong>
                {{ $payment_received->mode }}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Invoice No:</strong>
                {{ $payment_received->invoice_no }}
            </div>
            <div class="form-group">
                <strong>No Invoice Reason (Enter if there is no Invoice):</strong>
                {{$payment_received->no_invoice_reason}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Amount (Rs.):</strong>
                {{ moneyFormatIndia($payment_received->amount) }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>GST No:</strong>
                {{ $payment_received->gst_no }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>CGST Amount (Rs.):</strong>
                {{ $payment_received->cgst_amount }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>SGST Amount (Rs.):</strong>
                {{ $payment_received->sgst_amount }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>IGST Amount (Rs.):</strong>
                {{ $payment_received->igst_amount }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bank/Transaction Reference No:</strong>
                {{ $payment_received->reference_no }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Place of Supply:</strong>
                {{ $payment_received->place_of_supply }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Paid in Full/Partial/Advance:</strong>
                {{ $payment_received->full_partial_advance }}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $payment_received->details }}
            </div>
        </div>
    </div>

	      {{-- </div>
        </div>
    </div>
</div>
@endsection --}}
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Vendor Document:</strong>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-12" id="img">
        <div class="form-group">
            @if( ($files =explode(",",$payment_received->filename) === NULL))
            <td>No Document Uploaded.</td>
            @else
            <td class="p-2"> <?php                                               
                    $files =explode(",",$payment_received->filename);
                    $files_show = [];
                    foreach ($files as $file) {
                        $images_extentions = array("jpg","JPG","jpeg","JPEG","png","PNG");
                        $image_end_part = pathinfo($file, PATHINFO_EXTENSION);;
                       
                        if(in_array($image_end_part,$images_extentions ) == true){
                            $files_show[] = [
                                'file' => $file,
                                'type' => 'img'
                            ];
                        }else{
                            $files_show[] = [
                                'file' => $file,
                                'type' => 'file'
                            ]; 
                        }
                    }
                    ?>
                @foreach ($files_show as $item)
                @if($item['type'] == 'img')
                <img width="100%" src="{{asset('storage/'.$item['file'])}}" /> <br>
                @else
                Link To View Document:  <a href="{{asset('storage/'.$item['file'])}}">{{$item['file']}}</a> <br>
                @endif
                @endforeach
            </td>
            <td>

            </td>
            @endif

        </div>


    </div>
</div>

</div>
</div>
</div>
</div>
@endsection