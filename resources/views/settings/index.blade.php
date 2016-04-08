@extends('layouts.cms_default')

@section('content')
<div class="page-title">                    
    <h2><span class="fa fa-arrow-circle-o-left"></span> Layout Boxed</h2>
</div>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    Add class <code>page-container-boxed</code> to <code>body</code> tag to get boxed layout. Width of box can be changed to your own.
                    {{ Helper::dpr(Request::segments()) }}
                    
                    {{ Helper::dpr($user) }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        $(document).ready(function(){
            $('li#menu-settings').addClass('active');
        });
    </script>
@endsection