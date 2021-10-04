@extends('layouts.admin-master')

@section('breadcrumb')
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item"><a href="/vendors">Manage Vendors</a></li>
        <li class="breadcrumb-item active">Add Vendor</li>
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
                            <h2>Add New Vendor</h2>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('vendors.index') }}"> Back</a>
                        </div>
                    </div>
                </div>


                <form action="{{ route('vendors.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="project_id" value="{{get_project_id()}}">

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Detail:</strong>
                                <textarea class="form-control" style="height:150px" name="detail"
                                    placeholder="Detail"></textarea>
                            </div>
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12">
                            <label for="exampleFormControlFile1"><strong>Upload Vendor Document:</strong></label>
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


                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script>
    $("#fileUpload").on('change', function (e) {
 console.log(e.target.result);
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


//  $(function() {
//     // Multiple images preview in browser
//     var imagesPreview = function(input, placeToInsertImagePreview) {
//         if (input.files) {
//             var filesAmount = input.files.length;
//             for (i = 0; i < filesAmount; i++) {
//                 var reader = new FileReader();
//                 reader.onload = function(event) {
//                     $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
//                 }
//                 reader.readAsDataURL(input.files[i]);
//             }
//         }
//     };

//     $('#fileUpload').on('change', function() {
//         imagesPreview(this, 'div.gallery');
//     });
// });
// $(function () {
//     $("#fileupload").change(function () {
//         if (typeof (FileReader) != "undefined") {
//             var dvPreview = $("#dvPreview");
//             dvPreview.html("");
//             var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.png|.PNG|.pdf|.doc|.docx)$/;
//             $($(this)[0].files).each(function () {
//                 var file = $(this);
//                 if (regex.test(file[0].name.toLowerCase())) {
//                     var reader = new FileReader();
//                     reader.onload = function (e) {
//                         var img = $("<img />");
//                         img.attr("style", "height:100px;width: 100px");
//                         img.attr("src", e.target.result);
//                         dvPreview.append(img);
//                     }
//                     reader.readAsDataURL(file[0]);
//                 } else {
//                     alert(file[0].name + " is not a valid image file.");
//                     dvPreview.html("");
//                     return false;
//                 }
//             });
//         } else {
//             alert("This browser does not support HTML5 FileReader.");
//         }
//     });
// });

</script>

@endsection
{{-- <script>
$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };

    $('#fileUpload').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});
</script> --}}