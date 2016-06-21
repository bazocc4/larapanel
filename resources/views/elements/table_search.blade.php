{{ Form::open([
      'route' => Route::currentRouteName(),
      'method' => 'GET',
      'accept-charset' => 'UTF-8',
      'id' => 'table-search-form',
   ]) }}
    <div class="input-group">
        <span class="input-group-btn">
            <button class="btn btn-primary" type="submit">
                <span class="fa fa-m0 fa-search"></span>
            </button>
        </span>
        {{ Form::text('search', $search, [
            'class' => 'form-control',
            'placeholder' => 'search item here ...',
        ]) }}
        
<!--    These var will be filled through javascript for ajaxing purpose.    -->
        {{ Form::hidden('sort') }}
        {{ Form::hidden('direction') }}
        {{ Form::hidden('child_table') }}
    </div>
{{ Form::close() }}

@section('script')
    @parent
    <script type="text/javascript">
        $(document).ready(function(){
            
            $('form#table-search-form').submit(function(e){
                e.preventDefault();
                
                var $form = $(this);
                var url = $form.attr('action');
                $.each(['search', 'sort', 'direction', 'child_table'], function(index, value){
                    
                    var result = $.trim( $form.find('input[name="'+value+'"]').val() );
                    if(result.length)
                    {
                        url += ( url.indexOf('?') >= 0 ? '&' : '?' ) + value +'='+encodeURIComponent(result);
                    }
                });
                
                $('<a href="'+url+'"></a>').ajax_mylink('div.panel-body.panel-body-table');
            });
            
        });
    </script>
@endsection