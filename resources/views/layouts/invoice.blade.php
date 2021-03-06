<html>

<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script> --}}
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js" crossorigin="anonymous"></script>

    
    @livewireStyles

</head>

<body>
    @yield('content')    
    @livewireScripts


<script>
    $("#saveInvoice").click(function() {
        $.ajax({
            url: "{{route('invoice.store')}}",
            method: "POST",
            data: $("#invoice-data").serialize(),
            dataType: "json",
            success: function(data) {
                console.log(data);
            }
        });
    });
</script>
<script>
    // Get City List 

    $(document).ready(function() {
        $('#customer').change(function() {
            var state = $('#customer').val();
            $('#company_details').html('');
            $.ajax({
                url: 'getDetail/{id}',
                type: 'GET',
                data: {
                    myID: customer
                },
                dataType: "json",
                success: function(data) {
                    console.log('okk');
                    // $.each(data, function(key, company_details)
                    //  {     

                    //   $('#company_details').prop('disabled', false).css('background','aliceblue').append('<option value="'+company_details.id+'">'+company_details.detail+'</option>');
                    // });
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>
@auth
<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
@endauth

@yield('js')
</body>
</html>