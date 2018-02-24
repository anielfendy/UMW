@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"> User Management</h3>
		<ol class="breadcrumb">
			<li><a href="{{ url('/home') }}">Home</a></li>
			<li><a href="{{ url('/group-dashboard') }}">Dashboard</a></li>
	        <li class="active">User Management</li>
        </ol>
    </div>
</div>

<div class="row">
	<div class="col-md-8 col-md-offset-2 form-horizontal">
		<div class="page-header">
			<h3>Edit User</h3>
		</div>

    	<div class="col-md-8 col-md-offset-2">
        {!! Form::model($user, ['method' => 'PATCH','action' =>  ['UsersController@update', $user->id], 'files' => true]) !!}

            <div class="form-group">
            <label for="company_name" class="col-sm-3 control-label">Company</label>
                <div class="col-sm-9">
                    <select name="company_id" class="form-control">
                        @foreach($companies as $id => $company_name)
                            <option value="{{ $id }}">{{ $company_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        	<div class="form-group">
        		<label for="username" class="col-sm-3 control-label">Username</label>
        		<div class="col-sm-9">
        			{!! Form::text('username', null, array('placeholder' => 'Username','class' => 'form-control')) !!}
        		</div>
    		</div>

            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-9">
                    {!! Form::text('password', null, array('placeholder' => 'Password','class' => 'form-control')) !!}
                </div>
            </div>

    		<div class="form-group">
    			<div class = "col-sm-offset-3 col-sm-9">
    				<a href="{{ action('UsersController@index') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Cancel</a>
    				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Save</button>
    			</div>
    		</div>
		{!! Form::close() !!}
    	</div>

    </div>
</div>
@endsection