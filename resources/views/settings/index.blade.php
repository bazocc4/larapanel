@extends('layouts.cms_default')

@section('content')
<div class="page-title">                    
    <h2 class="margin0"><span class="fa fa-cogs"></span> Settings</h2>
    <p class="help-block help-block-cog">All kinds of web settings.</p>
</div>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <?php
                if(session('success'))
                {
                    ?>      
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                {{ session('success') }}
            </div>
                    <?php
                }
            ?>
            {{ Form::open([
              'class' => 'form-horizontal',
              'role' => 'form',
              'method' => 'PUT',
              'accept-charset' => 'UTF-8',
              'route' => ['admin.settings.update', 1],
               ]) }}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Basic Settings</strong></h3>
                    </div>
                    <div class="panel-body">
                        <p class="notes important">* Red input MUST NOT be empty.</p>
                        
                        <div class="form-group">
                            {{ Form::label('title','Title',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-globe"></span></span>
                                    {{ Form::text('title',$mySetting['title'],['class'=>'form-control', 'required'=>'required']) }}
                                </div>                                            
                                <span class="help-block">Website Title</span>
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('keywords','Keywords',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">                                            
                                {{ Form::textarea('keywords',$mySetting['keywords'],['class' => 'form-control', 'rows' => 5]) }}
                                <span class="help-block">Tagline for improving website SEO (Search Engine Optimization).</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('description','Description',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">                                            
                                {{ Form::textarea('description',$mySetting['description'],['class' => 'form-control', 'rows' => 5]) }}
                                <span class="help-block">About 150 words recommended.</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('date_format','Date Format',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">
                                {{ Form::select('date_format',[
                                    'Y-m-d' => date('Y-m-d'),
                                    'd-m-Y' => date('d-m-Y'),
                                    'm-d-Y' => date('m-d-Y'),
                                    'Y M d' => date('Y M d'),
                                    'd M Y' => date('d M Y'),
                                    'M d, Y' => date('M d, Y'),
                                ],$mySetting['date_format'], [
                                    'class' => 'form-control select',
                                    'required' => 'required',
                                ]) }}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('time_format','Time Format',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">
                                {{ Form::select('time_format',[
                                    'H:i:s' => date('H:i:s'),
                                    'H:i' => date('H:i'),
                                    'h:i:s A' => date('h:i:s A'),
                                    'h:i A' => date('h:i A'),
                                ],$mySetting['time_format'], [
                                    'class' => 'form-control select',
                                    'required' => 'required',
                                ]) }}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('language[]','Language',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">
                                <?php
                                    $default_language = [];
                                    foreach(['en_english', 'id_indonesia', 'zh_chinese'] as $key => $value)
                                    {
                                        $show_value = Helper::parse_lang($value)[0];
                                        $default_language[$value] = $show_value;
                                        
                                        echo '<label class="check">'.Form::checkbox('language[]',$value, in_array($show_value, $mySetting['language']), ['class' => 'icheckbox'] ).' '.$show_value.'</label>';
                                    }
                                ?>
                                <span class="help-block">Language(s) that will be used for website content.</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('default_language','Default Language',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">
                                {{ Form::select('default_language',$default_language,Helper::unparse_lang($mySetting['language'][0]), [
                                    'class' => 'form-control select',
                                    'required' => 'required',
                                ]) }}
                                <span class="help-block">Default language from above checked language.</span>
                            </div>
                        </div>
                        
@section('script')
    @parent
    <script type="text/javascript">
        $(document).ready(function(){
            $('select#default_language').change(function(){
                $('input[name="language[]"]').iCheck('enable');
                $('input[name="language[]"][value="'+$(this).val()+'"]').iCheck('check').iCheck('disable');
            }).trigger('change');
        });
    </script>
@endsection
                        
                        <div class="form-group">
                            {{ Form::label('google_analytics_code','Google Analytics Code',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-stats"></span></span>
                                    {{ Form::text('google_analytics_code',$mySetting['google_analytics_code'],['class'=>'form-control']) }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('homepage_share','Homepage Share',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    {{ Form::text('homepage_share',$mySetting['homepage_share'],['class'=>'form-control']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Media Settings</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                <!-- Display Image Settings -->
                                <div class="form-group">
                                    {{ Form::label('display_width','Display Image Width',['class'=>'col-md-4 col-xs-12 control-label']) }}
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group dimension">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-resize-horizontal"></span>
                                            </span>
                                            {{ Form::number('display_width',$mySetting['display_width'],['class'=>'form-control', 'required'=>'required']) }}
                                            <span class="input-tail">px</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('display_height','Display Image Height',['class'=>'col-md-4 col-xs-12 control-label']) }}
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group dimension">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-resize-vertical"></span>
                                            </span>
                                            {{ Form::number('display_height',$mySetting['display_height'],['class'=>'form-control', 'required'=>'required']) }}
                                            <span class="input-tail">px</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('display_crop','Display Image Crop',['class'=>'col-md-4 col-xs-12 control-label']) }}
                                    <div class="col-md-6 col-xs-12">
                                        <label class="check">{{ Form::checkbox('display_crop','1', !empty($mySetting['display_crop']) , ['class' => 'icheckbox'] ) }} Enable Cropping</label>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    {{ Form::label('overwrite_image','Overwrite Image',['class'=>'col-md-4 col-xs-12 control-label']) }}
                                    <div class="col-md-8 col-xs-12">
                                        <label class="check">{{ Form::checkbox('overwrite_image','enable', !empty($mySetting['overwrite_image']) , ['class' => 'icheckbox'] ) }} Enable Overwriting</label>
                                        <span class="help-block">Uploaded image will overwrite other image with the same filename.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                <!-- Thumb Image Settings -->
                                <div class="form-group">
                                    {{ Form::label('thumb_width','Thumbnail Image Width',['class'=>'col-md-5 col-xs-12 control-label']) }}
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group dimension">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-resize-horizontal"></span>
                                            </span>
                                            {{ Form::number('thumb_width',$mySetting['thumb_width'],['class'=>'form-control', 'required'=>'required']) }}
                                            <span class="input-tail">px</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('thumb_height','Thumbnail Image Height',['class'=>'col-md-5 col-xs-12 control-label']) }}
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group dimension">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-resize-vertical"></span>
                                            </span>
                                            {{ Form::number('thumb_height',$mySetting['thumb_height'],['class'=>'form-control', 'required'=>'required']) }}
                                            <span class="input-tail">px</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('thumb_crop','Thumbnail Image Crop',['class'=>'col-md-5 col-xs-12 control-label']) }}
                                    <div class="col-md-6 col-xs-12">
                                        <label class="check">{{ Form::checkbox('thumb_crop','1', !empty($mySetting['thumb_crop']) , ['class' => 'icheckbox'] ) }} Enable Cropping</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Additional Info</strong></h3>
                    </div>
                    <div class="panel-body">
                        <?php
                            foreach ($mySetting as $key10 => $value10)
                            {
                                if(substr($key10, 0,7) == 'custom-')
                                {
                                    $shortkey = substr($key10, 7);
                                    ?>
                        <div class="form-group">
                            {{ Form::label($key10,Helper::string_unslug($shortkey),['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    {{ Form::text($key10,$value10,['class'=>'form-control']) }}
                                </div>
                            </div>
                            <button alt="{{ $key10 }}" type="button" class="btn btn-danger del_setting">Remove</button>
                        </div>            
                                    <?php
                                }
                            }
                        ?>
                        
                        <!-- Dynamic custom settings -->
                        <div class="form-group">
                            {{ Form::label(null,'(New Key)',['class'=>'col-md-3 col-xs-12 control-label']) }}
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    {{ Form::text(null,null,[
                                        'class'=>'form-control input-medium input_add_setting',
                                        'style' => 'display: none;',
                                        'placeholder' => 'Key',
                                    ]) }}
                                    &nbsp;
                                    {{ HTML::link('#', 'Add More Settings...', ['class' => 'btn btn-info add_setting']) }}
                                    &nbsp;
                                    {{ HTML::link('#', 'Cancel', [
                                        'class' => 'btn btn-default cancel_setting',
                                        'style' => 'display: none;',
                                    ]) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="reset" class="btn btn-default">Reset Form</button>
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
            $('li#menu-settings').addClass('active');
            
            // DELETE SETTINGS !!
            $(document).on("click",'button.del_setting',function(){                
                $.ajaxSetup({cache: false});
                var myobj = $(this);
                if (confirm('Are you sure want to delete this info setting ?'))
                {
                    $.get('{{ url("settings/delete") }}/'+$(this).attr('alt'),function(){
                        myobj.closest("div.form-group").animate({opacity : 0 , height : 0, marginBottom : 0},1000,function(){
                            $(this).detach();
                        });
                    });
                }
            });

            // ADD SETTINGS !!
            $('a.add_setting').click(function(e){
                e.preventDefault();
                
                if( ! $(this).next('a.cancel_setting').is(':visible') )
                {
                    $(this).prev('input[type=text]').val('').show();
                    $(this).html('Save');
                    $(this).next('a.cancel_setting').show();
                }
                else
                {
                    var key = $.trim($(this).prev('input[type=text]').val());
                    if(key.length <= 0 || !isNaN(key))
                    {
                        alert('Invalid Key! Please try again..');
                        return;
                    }

                    var myobj = $(this);
                    $.ajaxSetup({cache: false});
                    $.post('{{ url("settings/add") }}',{
                        key: key,
                        _token: CSRF_TOKEN
                    },function(data){
                        
                        var contents = `
<div class="form-group">
    <label for="`+data.name+`" class="col-md-3 col-xs-12 control-label">`+data.slug_key+`</label>
    <div class="col-md-6 col-xs-12">                                            
        <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
            <input class="form-control" name="`+data.name+`" type="text" id="`+data.name+`">
        </div>
    </div>
    <button alt="`+data.name+`" type="button" class="btn btn-danger del_setting">Remove</button>
</div>
`;
                        myobj.closest('div.form-group').before(contents);
                        myobj.html('Add More Settings...');
                        myobj.prev('input[type=text]').hide();
                        myobj.next('a.cancel_setting').hide();

                    },'json');
                }
            });

            // CANCEL SETTINGS !!
            $('a.cancel_setting').click(function(e){
                e.preventDefault();
                
                var myobj = $(this).prev('a.add_setting');

                myobj.html('Add More Settings...');
                myobj.prev('input[type=text]').hide();
                myobj.next('a.cancel_setting').hide();
            });

            // instantly add setting while pressing Enter on Input Field !!
            $('input[type=text].input_add_setting').keypress(function(event){
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if (keycode == 13) 
                {
                    $('a.add_setting').click();
                    return false;
                }
            });
        });
    </script>
@endsection