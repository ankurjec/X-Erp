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
                        <div class="float-left">
                            <h2> Show Vendor</h2>
                        </div>
                        <div class="float-right">
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
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Vendor Document:</strong>

                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12" id="img">
                            <div class="form-group">
                                @if( ($files =explode(",",$vendor->filename) === NULL))
                                <td>No Document Uploaded.</td>
                                @else
                                <td class="p-2"> <?php                                               
                                        $files =explode(",",$vendor->filename);
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