@extends('layouts.cms_default')

@section('content')
<div class="page-title">                    
    <h2><span class="fa fa-key"></span> Add User Account</h2>
</div>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <?php
                if( count($errors) )
                {
                    ?>      
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
                    <?php
                }
            ?>
            {{ Form::open([
              'class' => 'form-horizontal notif-change',
              'role' => 'form',
              'method' => 'POST',
              'accept-charset' => 'UTF-8',
              'route' => ['admin.users.store'],
               ]) }}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>User Profiles</strong></h3>
                    </div>
                    <div class="panel-body">
                        <p class="notes important">* Red input MUST NOT be empty.</p>
                        
                        <div class="form-group">
                            {{ Form::label('data[User][name]','Full Name',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                    {{ Form::text('data[User][name]',null,['class'=>'form-control', 'required'=>'required']) }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('data[UserMeta][gender]','Gender',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">                                       
                                <label class="check">{{ Form::radio('data[UserMeta][gender]','Male',null, ['class' => 'icheckbox', 'required' => 'required']) }} Male</label>
                                <label class="check">{{ Form::radio('data[UserMeta][gender]','Female',null, ['class' => 'icheckbox', 'required' => 'required']) }} Female</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('data[UserMeta][address]','Address',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-home"></span></span>
                                    {{ Form::text('data[UserMeta][address]',null,['class'=>'form-control', 'required'=>'required']) }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('data[UserMeta][city]','City',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-globe"></span></span>
                                    {{ Form::text('data[UserMeta][city]',null,['class'=>'form-control', 'required'=>'required']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('data[UserMeta][phone]','Phone Number',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                    {{ Form::text('data[UserMeta][phone]',null,['class'=>'form-control', 'required'=>'required']) }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('data[UserMeta][dob]','Date of Birth',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                    {{ Form::text('data[UserMeta][dob]',null,['class'=>'form-control datepicker input-medium']) }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('data[UserMeta][job]','Job Position',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-briefcase"></span></span>
                                    {{ Form::text('data[UserMeta][job]',null,['class'=>'form-control']) }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('data[UserMeta][company]','Company Name',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-group"></span></span>
                                    {{ Form::text('data[UserMeta][company]',null,['class'=>'form-control']) }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('data[UserMeta][company_address]','Company Address',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-building-o"></span></span>
                                    {{ Form::text('data[UserMeta][company_address]',null,['class'=>'form-control']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Account Details</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            {{ Form::label('data[User][email]','Login Email',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-envelope-o"></span></span>
                                    {{ Form::email('data[User][email]',null,['class'=>'form-control input-large', 'required' => 'required']) }}
                                </div>                                            
                                <span class="help-block">Please enter a valid email address as login authentication.</span>
                            </div>
                        </div>
                        
                        <div class="form-group">                                        
                            {{ Form::label('data[User][password]','Password',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                    {{ Form::password('data[User][password]',['class' => 'form-control input-large', 'required' => 'required', 'pattern' => '.{5,}']) }}
                                </div>            
                                <span class="help-block">Password must be at least 5 characters long.</span>
                            </div>
                        </div>
                        
                        <div class="form-group">                                        
                            {{ Form::label('data[User][password_confirmation]','Password Confirm',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                    {{ Form::password('data[User][password_confirmation]',['class' => 'form-control input-large', 'required' => 'required']) }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('data[User][role]','Role',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">
                                {{ Form::select('data[User][role]',[
                                    'admin' => 'Administrator',
                                    'regular_user' => 'Regular User',
                                ],null, [
                                    'class' => 'form-control select input-large',
                                    'required' => 'required',
                                ]) }}
                            </div>
                        </div>
                        
                    </div>
                    <div class="panel-footer">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Add New</button>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        $(document).ready(function(){
            $('li#menu-users').addClass('active');
        });
    </script>
@endsection