@extends('layouts.admin-master')

@section('style')
    @parent
    <link rel="stylesheet" href="/vendor/select2/css/select2.min.css">
    <link rel="stylesheet" href="/vendor/select2/css/select2-bootstrap4.css">
@endsection

@section('breadcrumb')
<div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/loans">Manage Loans</a></li>
            <li class="breadcrumb-item active">Add Loan</li>
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
                <h2>Add New Loan</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('loans.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <form action="{{ route('loans.store') }}" method="POST" enctype="multipart/form-data">
    	@csrf
		<input type="hidden" name="project_id" value="{{get_project_id()}}">

         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Vendor:</strong>
		            <select name="vendor_id" class="form-control select2">
		                <option value="" disabled selected="selected">Select</option>
		                @foreach($vendors as $vendor)
    		                @if($vendor->id > 1)
    		                <option value="{{$vendor->id}}">{{$vendor->name}}</option>
    		                @endif
		                @endforeach
		            </select>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Amount:</strong>
		            <input type="number" min="1" step="0.01" name="amount" class="form-control">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Received Date:</strong>
		            <input type="date" name="received_date" class="form-control">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Details:</strong>
		            <textarea class="form-control" style="height:150px" name="details" placeholder="Details"></textarea>
		        </div>
		    </div>
		    <div class="form-group col-xs-12 col-sm-12 col-md-12">
				<label for="exampleFormControlFile1"><strong>Upload Loans Document:</strong></label>
				{{-- <input type="file" class="form-control-file" id="fileUpload" name="photos[]" multiple
				
				  > --}}
				<input id="fileupload" type="file" name="photos[]" multiple="multiple" />
	
			</div>
			<div id="image-holder" style="width: 300px;height:500px;">
				<div class="col-md-12" class="gallery">
					<div id="dvPreview">
						{{-- <td> <p><button onclick="remove_img()" type="button" id="btn" class="btn btn-danger"> Remove
							File/Files</button></p></td> --}}
					</div>
				</div>
	
				<div class="col-xs-12 col-sm-12 col-md-12 text-center">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
			 </div>
	
	
		</form>
	

	      </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    @parent
    <script src="/vendor/select2/js/select2.full.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
			$('.select2').select2({
			theme: 'bootstrap4'
			});
		});
	</script>
@endsection