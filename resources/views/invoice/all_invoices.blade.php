<!DOCTPE html>
<html>
<head>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<title>View Invoice Records</title>
</head>
<body>
   <center><h4>Generated Invoices</h4></center>

<table border = "1" style="width: 100%"  class="table table-striped">

<tr>
<td>Id</td>
<td> Name</td>
<td>Description</td>
<td>Rate</td>
<td>Quantity</td>
<td colspan="2">Action</td>

</tr>
@foreach ($items as $item)
<tr>
<td>{{ $item->id }}</td>
<td>{{ $item->item_name }}</td>
<td>{{ $item->description }}</td>
<td>{{ $item->rate }}</td>
<td>{{ $item->quantity }}</td>
<td colspan="2"><button onclick="location.href='{{ route('view-invoice',['id' =>$item->id]) }}'" type="button" class="btn btn-primary">view</button>&nbsp;&nbsp;<button type="button" class="btn btn-success">Edit</button></td>

</tr> 
@endforeach
</table>