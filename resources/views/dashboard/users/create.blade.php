@extends('layouts.admin-master')

@section('style')
	@parent
<link rel="stylesheet" href="/vendor/bootstrap4-multiselect/css/BsMultiSelect.min.css">
@endsection

@section('breadcrumb')
<div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/users">Manage Users</a></li>
            <li class="breadcrumb-item active">Add User</li>
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
        <div class="pull-left">
            <h2>Create New User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>



{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Confirm Password:</strong>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','id' => 'select-roles','multiple')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}


	      </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    @parent
<script src="/js/popper.min.js"></script>
<script src="/vendor/bootstrap4-multiselect/js/BsMultiSelect.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
       
       $("#select-roles").bsMultiSelect({
  cssPatch: {
    choices: {
      listStyleType: 'none'
    },
    picks: {
      listStyleType: 'none',
      display: 'flex',
      flexWrap: 'wrap',
      height: 'auto',
      marginBottom: '0'
    },
    choice: 'px-md-2 px-1',
    choice_hover: 'text-primary bg-light',
    filterInput: {
      border: '0px',
      height: 'auto',
      boxShadow: 'none',
      padding: '0',
      margin: '0',
      outline: 'none',
      backgroundColor: 'transparent',
      backgroundImage: 'none' // otherwise BS .was-vali<a href="https://www.jqueryscript.net/time-clock/">date</a>d set its image

    },
    filterInput_empty: 'form-control',
    // need for placeholder, TODO test form-control-plaintext
    // used in staticContentGenerator
    picks_disabled: {
      backgroundColor: '#e9ecef'
    },
    picks_focus: {
      borderColor: '#80bdff',
      boxShadow: '0 0 0 0.2rem rgba(0, 123, 255, 0.25)'
    },
    picks_focus_valid: {
      borderColor: '',
      boxShadow: '0 0 0 0.2rem rgba(40, 167, 69, 0.25)'
    },
    picks_focus_invalid: {
      borderColor: '',
      boxShadow: '0 0 0 0.2rem rgba(220, 53, 69, 0.25)'
    },
    // used in BsAppearance
    picks_def: {
      minHeight: 'calc(2.25rem + 2px)'
    },
    picks_lg: {
      minHeight: 'calc(2.875rem + 2px)'
    },
    picks_sm: {
      minHeight: 'calc(1.8125rem + 2px)'
    },
    // used in pickContentGenerator
    pick: {
      paddingLeft: '0px',
      lineHeight: '1.5em'
    },
    pickButton: {
      fontSize: '1.5em',
      lineHeight: '.9em',
      float: "none"
    },
    pickContent_disabled: {
      opacity: '.65'
    },
    // used in choiceContentGenerator
    choiceContent: {
      justifyContent: 'initial'
    },
    // BS problem: without this on inline form menu items justified center
    choiceLabel: {
      color: 'inherit'
    },
    // otherwise BS .was-validated set its color
    choiceCheckBox: {
      color: 'inherit'
    },
    choiceLabel_disabled: {
      opacity: '.65'
    }
  }
});

    });
</script>
@endsection