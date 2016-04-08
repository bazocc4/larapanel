<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
		<!-- END META SECTION -->
		<title>
			{{ $title }}
		</title>
        <!-- CSS INCLUDE -->
		{{ HTML::style('css/theme-default.css') }}
        <!-- EOF CSS INCLUDE -->
        
        <!-- JS INCLUDE-->
        {{ HTML::script('js/plugins/jquery/jquery.min.js') }}
        {{ HTML::script('js/plugins/bootstrap/bootstrap.min.js') }}
        <!-- EOF JS INCLUDE -->
    </head>
    <body id="app-layout">
		@yield('content')
    </body>
</html>