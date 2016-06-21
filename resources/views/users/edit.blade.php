@extends('layouts.cms_default')

@section('content')
<div class="page-title">                    
    <h2 class="margin0"><span class="fa fa-key"></span> {{ $content->name }}</h2>
    <p class="help-block help-block-indent">Last updated on {{ Helper::date_converter($content->updated_at, $mySetting['date_format'], $mySetting['time_format']) }}</p>
</div>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <?php
                if( $errors->any() )
                {
                    ?>      
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                {!! HTML::ul($errors->all()) !!}
            </div>
                    <?php
                }
            ?>
            {{ Form::model($content, [
              'class' => 'form-horizontal notif-change',
              'role' => 'form',
              'method' => 'PATCH',
              'accept-charset' => 'UTF-8',
              'route' => ['admin.users.update', $content->id],
               ]) }}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>User Profiles</strong></h3>
                    </div>
                    <div class="panel-body">
                        <p class="notes important">* Red input MUST NOT be empty.</p>
                        
                        <div class="form-group">
                            {{ Form::label('name','Full Name',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                    {{ Form::text('name',null,['class'=>'form-control', 'required'=>'required']) }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('user_metas[gender]','Gender',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">                                       
                                <label class="check">{{ Form::radio('user_metas[gender]','Male',null, ['class' => 'icheckbox', 'required' => 'required']) }} Male</label>
                                <label class="check">{{ Form::radio('user_metas[gender]','Female',null, ['class' => 'icheckbox', 'required' => 'required']) }} Female</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('user_metas[address]','Address',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-home"></span></span>
                                    {{ Form::text('user_metas[address]',null,['class'=>'form-control', 'required'=>'required']) }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('user_metas[city]','City',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-globe"></span></span>
                                    {{ Form::text('user_metas[city]',null,['class'=>'form-control', 'required'=>'required']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('user_metas[phone]','Phone Number',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                    {{ Form::text('user_metas[phone]',null,['class'=>'form-control', 'required'=>'required']) }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('user_metas[dob]','Date of Birth',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                    {{ Form::text('user_metas[dob]',null,['class'=>'form-control datepicker input-medium']) }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('user_metas[job]','Job Position',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-briefcase"></span></span>
                                    {{ Form::text('user_metas[job]',null,['class'=>'form-control']) }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('user_metas[company]','Company Name',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-group"></span></span>
                                    {{ Form::text('user_metas[company]',null,['class'=>'form-control']) }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('user_metas[company_address]','Company Address',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-building-o"></span></span>
                                    {{ Form::text('user_metas[company_address]',null,['class'=>'form-control']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Account Details</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            {{ Form::label('email','Login Email',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-envelope-o"></span></span>
                                    {{ Form::email('email',null,['class'=>'form-control input-large', 'required' => 'required']) }}
                                </div>                                            
                                <span class="help-block">Please enter a valid email address as login authentication.</span>
                            </div>
                        </div>
                        
                        <div class="form-group">                                        
                            {{ Form::label('password','New Password',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                    {{ Form::password('password',['class' => 'form-control input-large', 'pattern' => '.{5,}']) }}
                                </div>            
                                <span class="help-block">Password must be at least 5 characters long.</span>
                                <span class="help-block-important">NB: Ignore this field if you don't plan to change your current password.</span>
                            </div>
                        </div>
                        
                        <div class="form-group">                                        
                            {{ Form::label('password_confirmation','Password Confirm',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                    {{ Form::password('password_confirmation',['class' => 'form-control input-large']) }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('status','Status',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">
                                {{ Form::select('status',[
                                    '1' => 'Active',
                                    '0' => 'Disabled',
                                ],null, [
                                    'class' => 'form-control select input-large',
                                    'required' => 'required',
                                ]) }}
                            </div>
                        </div>
                        
                    </div>
                    <div class="panel-footer">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Save Changes</button>
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