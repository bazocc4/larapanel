<div class="dataTables_info">
    Showing {{ $content['from'] }} to {{ $content['to'] }} of {{ $content['total'] }} entries
</div>
<div class="dataTables_paginate paging_simple_numbers">
    {{ $pagination['content'] }}
</div>
@section('script')
    @parent
    <script type="text/javascript">
        $(document).ready(function(){
            var $pagination = $('.dataTables_paginate.paging_simple_numbers ul.pagination');
            if( $pagination.length )
            {
                // FIRST PAGE LINK !!
                $pagination.prepend(`
{!!
    empty($pagination['first']) ?
    '<li class="disabled"><span>First</span></li>' :
    '<li><a href="'.$pagination['first'].'">First</a></li>'
!!}
`);
                
                // LAST PAGE LINK !!
                $pagination.append(`
{!!
    empty($pagination['last']) ?
    '<li class="disabled"><span>Last</span></li>' :
    '<li><a href="'.$pagination['last'].'">Last</a></li>'
!!}
`);
            }
        });
    </script>
@endsection