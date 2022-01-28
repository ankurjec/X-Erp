@extends('layouts.admin-master')

@section('breadcrumb')
<div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/customers">Manage Employees</a></li>
            <li class="breadcrumb-item active">Add Employee</li>
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
                <h2>Add New Employee</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
    	@csrf
		<input type="hidden" name="project_id" value="{{get_project_id()}}">

         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="employee_name" class="form-control" placeholder="Name">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Detail:</strong>
		            <textarea class="form-control" style="height:150px" name="details" placeholder="Detail"></textarea>
		        </div>
                <div class="form-group">
		            <strong>Address:</strong>
		            <textarea class="form-control" style="height:150px" name="address" placeholder="Address"></textarea>
		        </div>
				<div class="form-group">
		            <strong>Date of Birth:</strong>
		            <input type="date" class="form-control"  name="dob" placeholder="Date of Birth">
		        </div>
                <div class="form-group">
		            <strong>Phone:</strong>
		            <textarea class="form-control" style="height:40px" name="phone" placeholder="Phone"></textarea>
		        </div>
			<div class="form-group">
				<strong>Email:</strong>
				<textarea class="form-control" style="height:40px" name="email" placeholder="Email"></textarea>
			</div>
		</div>
           


                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

    </form>

	      </div>
        </div>
    </div>
</div>

@endsection
@section('script')

<script>
    $("#fileUpload").on('change', function () {
 
 if (typeof (FileReader) != "undefined") {
 
     var image_holder = $("#image-holder");
     image_holder.empty();
 
     var reader = new FileReader();
     reader.onload = function (e) {
         $("<img />", {
             "src": e.target.result,
             "class": "thumb-image",
             "height": "300px",
         }).appendTo(image_holder);
         ('#btn').appendTo(image_holder);

 
     }
     image_holder.show();
     reader.readAsDataURL($(this)[0].files[0]);
 } else {
     alert("This browser does not support FileReader.");
 }
 });
</script>
@endsection