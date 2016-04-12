@extends('layouts.login')

@section('content')
<div class="login-container">
    <div class="login-box animated fadeInDown">
        <br/>
        <div class="login-header text-center">
            {!! HTML::image('images/logo.png') !!}
        </div>
        <br/>
        <div class="login-body">
            <?php
                if( $errors->has('email') || $errors->has('password') )
                {
                    ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ $errors->first('email').' '.$errors->first('password') }}
            </div>        
                    <?php
                }
                else if(session('auth_error'))
                {
                    ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('auth_error') }}
            </div>        
                    <?php
                }
                else if(session('logout_response'))
                {
                    ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('logout_response') }}
            </div>                
                    <?php
                }
            ?>
            <div class="login-title"><strong>Log In</strong> to your account</div>
               
            {!! Form::open(['class' => 'form-horizontal', 'role' => 'form']) !!}
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <div class="col-md-12">
                        {!! Form::email('email',null,
                                array('required', 
                                      'class'=>'form-control', 
                                      'placeholder'=>'E-Mail Address')) !!}
                    </div>
                </div>
                
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <div class="col-md-12">
                        {!! Form::password('password', 
                                array('required', 
                                      'class'=>'form-control', 
                                      'placeholder'=>'Password')) !!}
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-6">
                        <div class="checkbox login-footer">
                            <label>
                                {{ Form::checkbox('remember') }} Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        {{ Form::submit('Log In', ['class' => 'btn btn-info btn-block']) }}
                    </div>
                    
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
