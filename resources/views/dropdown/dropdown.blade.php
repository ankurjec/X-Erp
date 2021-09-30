<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
 
<div class="container">
  <h3 class="text-center mt-4 text-secondary">Ajax Type Dependent Dropdown</h3>
  <div class="row mt-5">
 
    <div class="col-sm-2">
      <h5 class="text-info mb-4">Choose State List</h5>
      <select name="" id="state" class="form-control">
        <option><h1>Select State</h1></option>
         @foreach($states as $row)
            <option value={{$row->id}}>{{$row->state_name}}</option>
         @endforeach  
      </select>
    </div>
  
    <div class="col-sm-3">
        <h5 class="text-info  mb-4"> City List</h5>
        <select  id="city" class="form-control" disabled >
          <option>City List</option>
       </select>
    </div>
    <div class="col-sm-3">
        <h5 class="text-info  mb-4">Stadiums List</h5>
        <select  id="stadium" class="form-control" disabled>
       </select>
    </div>
    <div class="col-sm-4">
        <h5 class="text-info  mb-4">Stadiums Address</h5>
        <select id="address" class="form-control" disabled>
       </select>
    </div>
    <div class="col-sm-4 offset-sm-4 mt-4">
        <h5 class="text-info  mb-4">Stadium Details</h5>
        <textarea id="details"  cols="30" class="p-4" disabled></textarea>
    </div>
  </div>
</div>
 
</body>
</html>

 
<script>
    // Get City List 
     
      $(document).ready(function(){
        $('#state').change(function(){
           var state = $('#state').val();
           $('#city').html('');
            $.ajax({
              url:'getCity/{id}',
              type:'GET',
              data:{myID:state},
              dataType: "json",
              success:function(data)
              {
                
                $.each(data, function(key, city)
                 {     
                  // alert(city.city_name)
                  $('#city').prop('disabled', false).css('background','aliceblue').append('<option value="'+city.id+'">'+city.city_name+'</option>');
                });
              }
          });
        });
      });
     
      // Get STADIUM and ADDRESS by CITY
     
      $(document).ready(function(){
        $('#city').change(function(){
           var city = $('#city').val();
           $.ajax({
              url:'getStadiumDetail/{id}',
              type:'GET',
              data:{id:city},
              dataType: "json",
              success:function(data)
              {
                $.each(data, function(key, city)
                 {     
                  $('#stadium').prop('disabled', false).css('background','aliceblue').html('<option>'+city.stadium_name+'</option>');
                  $('#address').prop('disabled', false).css('background','aliceblue').html('<option>'+city.stadium_add+'</option>');
                  $('#details').prop('disabled', false).css('background','aliceblue').html(city.stadium_details);
                });
              }
          });
        });
      });
    </script>