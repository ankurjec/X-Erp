@extends('layouts.admin-master')

@section('breadcrumb')
<div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/loan_repayments">Manage Loan Repayments</a></li>
            <li class="breadcrumb-item active">Show Loan Repayment</li>
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
                <h2> Show Loan Repayment</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('loan_repayments.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Loan:</strong>
                {{ $loan_repayment->loan->id }} ({{ $loan_repayment->loan->user->name }})
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Amount:</strong>
                {{ $loan_repayment->amount }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Repayment Date:</strong>
                {{ $loan_repayment->repayment_date }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $loan_repayment->details }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" id="img">
            <div class="form-group">
                @if( ($files =explode(",",$loan_repayment->filename) === NULL))
                <td>No Document Uploaded.</td>
                @else
                <td class="p-2"> <?php                                               
                        $files =explode(",",$loan_repayment->filename);
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