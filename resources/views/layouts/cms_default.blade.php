<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>{{ $title }}</title>
       
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1" />        
        <meta name="author" content="{{ $mySetting['title'] }}">
        <meta name="keywords" content="{{ $mySetting['keywords'] }}">
        <meta name="description" content="{{ $mySetting['description'] }}">
        
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- CMS ENGINE ONLY -->
        <meta name="robots" content="noindex">
        
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->
        {{ HTML::style('css/theme-default.css') }}
        {{ HTML::style('css/admin/style.css') }}
        <!-- EOF CSS INCLUDE -->
        
        <!-- JS INCLUDE (CORE PLUGINS) -->
        {{ HTML::script('js/plugins/jquery/jquery.min.js') }}
        {{ HTML::script('js/plugins/jquery/jquery-ui.min.js') }}
        {{ HTML::script('js/plugins/bootstrap/bootstrap.min.js') }}
        <!-- EOF JS INCLUDE -->
        
        <!-- GLOBAL JAVASCRIPT VARIABLE -->
        <script type="text/javascript">
			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		</script>
    </head>
    <body class="page-container-boxed">
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="{{ route('admin.settings.index') }}">
                            {{ HTML::image('images/logo.png', 'website logo') }}
                        </a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="{{ $profile_image }}" alt="{{ $user['name'] }}"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="{{ $profile_image }}" alt="{{ $user['name'] }}"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">{{ $user['name'] }}</div>
                                <div class="profile-data-title">{{ Helper::string_unslug($user['role']) }}</div>
                            </div>
                        </div>                                                                        
                    </li>
                    @include('elements.sidebar')
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right last">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                    <!-- MESSAGES -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-comments"></span></a>
                        <div class="informer informer-danger">4</div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>                                
                                <div class="pull-right">
                                    <span class="label label-danger">4 new</span>
                                </div>
                            </div>
                            <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-online"></div>
                                    <img src="{{ url('img/users/user2.jpg') }}" class="pull-left" alt="John Doe"/>
                                    <span class="contacts-title">John Doe</span>
                                    <p>Praesent placerat tellus id augue condimentum</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-away"></div>
                                    <img src="{{ url('img/users/user.jpg') }}" class="pull-left" alt="Dmitry Ivaniuk"/>
                                    <span class="contacts-title">Dmitry Ivaniuk</span>
                                    <p>Donec risus sapien, sagittis et magna quis</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-away"></div>
                                    <img src="{{ url('img/users/user3.jpg') }}" class="pull-left" alt="Nadia Ali"/>
                                    <span class="contacts-title">Nadia Ali</span>
                                    <p>Mauris vel eros ut nunc rhoncus cursus sed</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-offline"></div>
                                    <img src="{{ url('img/users/user6.jpg') }}" class="pull-left" alt="Darth Vader"/>
                                    <span class="contacts-title">Darth Vader</span>
                                    <p>I want my money back!</p>
                                </a>
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="pages-messages.html">Show all messages</a>
                            </div>                            
                        </div>                        
                    </li>
                    <!-- END MESSAGES -->
                    <!-- TASKS -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-tasks"></span></a>
                        <div class="informer informer-warning">3</div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-tasks"></span> Tasks</h3>                                
                                <div class="pull-right">
                                    <span class="label label-warning">3 active</span>
                                </div>
                            </div>
                            <div class="panel-body list-group scroll" style="height: 200px;">                                
                                <a class="list-group-item" href="#">
                                    <strong>Phasellus augue arcu, elementum</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 25 Sep 2014 / 50%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Aenean ac cursus</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">80%</div>
                                    </div>
                                    <small class="text-muted">Dmitry Ivaniuk, 24 Sep 2014 / 80%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Lorem ipsum dolor</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">95%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 23 Sep 2014 / 95%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Cras suscipit ac quam at tincidunt.</strong>
                                    <div class="progress progress-small">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 21 Sep 2014 /</small><small class="text-success"> Done</small>
                                </a>                                
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="pages-tasks.html">Show all tasks</a>
                            </div>                            
                        </div>                        
                    </li>
                    <!-- END TASKS -->
                    <!-- LIVEDATE -->
                    <li class="pull-right">
                        <div class="live-time">
                            <?php echo date($mySetting['date_format']); ?>
                            &nbsp;<span class="fa fa-clock-o"></span>&nbsp;
                            <span id="clock"></span>
                        </div>
					</li>
                   <!-- END LIVEDATE -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     
                
                <!-- START BREADCRUMB -->
                @include('elements.breadcrumb')
                <!-- END BREADCRUMB -->
                
                <!-- PAGE CONTENT WRAPPER -->
                @yield('content')
                <!-- END PAGE CONTENT WRAPPER -->
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="{{ url('admin/logout') }}" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->
        
    <!-- START SCRIPTS -->
        <!-- THIS PAGE PLUGINS -->
        {{ HTML::script('js/plugins/icheck/icheck.min.js') }}
        {{ HTML::script('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}
        
        {{ HTML::script('js/plugins/bootstrap/bootstrap-datepicker.js') }}
        {{ HTML::script('js/plugins/bootstrap/bootstrap-file-input.js') }}
        {{ HTML::script('js/plugins/bootstrap/bootstrap-select.js') }}
        {{ HTML::script('js/plugins/tagsinput/jquery.tagsinput.min.js') }}
        
        {{ HTML::script('js/livedate.js') }}
        <!-- END PAGE PLUGINS -->
        
        <!-- START TEMPLATE -->
        {{ HTML::script('js/plugins.js') }}
        {{ HTML::script('js/actions.js') }}
        {{ HTML::script('js/admin.js') }}
        <!-- END TEMPLATE -->
        
        @yield('script')
        <script type="text/javascript">
            $(document).ready(function(){
                // set active to sidebar parent menu !!
                var $childMenuActive = $('ul.x-navigation > li.xn-openable > ul > li.active');
                if( $childMenuActive.length )
                {
                    $childMenuActive.closest('li.xn-openable').addClass('active');
                }
                
                // give red font to required field !!
                if($('[required="required"]').length)
                {
                    $('[required="required"]').each(function(){
                        var $label = $(this).closest('.form-group').find('label:first');
                        if($label.length)
                        {
                            $label.css('color', 'red');
                        }
                    });
                }
                
                // callback function after reset form !!
                $(document).on('click', 'form [type="reset"]', function(){
                    var $form = $(this).closest('form');
                    $form[0].reset();
                    $form.find('.icheckbox,.iradio').iCheck('update');
                    $form.find(".select").selectpicker('refresh').trigger('change');
                });
            });
        </script>
    <!-- END SCRIPTS -->         
    </body>
</html>