<!-- message --->
<?php 
	if(session()->has('msg')){ $msg = array_flatten(session('msg')); }
 ?>
 @if(!empty($msg))
<div class="alert alert-success alert-dismissable">
	<button aria-hidden="true" data-dismiss="alert" class="close" type="button"> x </button>
	<span class="msg">
		<p>{{ $msg }}</p>
	</span>
</div>
@endif
<!-- //message --->

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissable">
	<button aria-hidden="true" data-dismiss="alert" class="close" type="button"> x </button>
  <p>{{ $message }}</p>
</div>
@endif

@if (count($errors) > 0)
  <div class="alert alert-danger alert-dismissable">
  	<button aria-hidden="true" data-dismiss="alert" class="close" type="button"> x </button>
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif