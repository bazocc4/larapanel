@extends( Request::ajax() ? 'layouts.plain' : 'layouts.cms_default')

@section('content')
<?php
    if( ! Request::ajax() )
    {
        ?>
<div class="page-title">                    
    <h2><span class="fa fa-key"></span> User Accounts</h2>
</div>

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                

    <!-- START RESPONSIVE TABLES -->
    <div class="row">
        <div class="col-md-12">
            <?php
                if(session('flash_message'))
                {
                    ?>
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                {!! session('flash_message') !!}
            </div>
                    <?php
                }
                else if(session('error_message'))
                {
                    ?>
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                {!! session('error_message') !!}
            </div>        
                    <?php
                }
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-5 col-sm-6 col-sm-offset-4 col-xs-12">
                            @include('elements.table_search')
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12 text-right">
                            <a href="{{ route('admin.users.create') }}" class="btn btn-info btn-block">
                                <span class="fa fa-plus"></span> Add Account
                            </a>
                        </div>
                    </div>
                </div>

                <div class="panel-body panel-body-table">        
        <?php
    }

    if(count($content['data']) <= 0)
    {
        ?>
                    @include('elements.not_found')        
        <?php
    }
    else
    {
        ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-actions table-hover list">
                            <thead>
                                <tr>
                                    <th>
                                        @include('elements.toggle_sort', [
                                            'name' => 'EMAIL ACCOUNT',
                                            'column'      => 'email',
                                            'child_table' => '',
                                        ])
                                    </th>
                                    <th>
                                        @include('elements.toggle_sort', [
                                            'name'        => 'ROLE',
                                            'column'      => 'role',
                                            'child_table' => '',
                                        ])
                                    </th>
                                    <th>
                                        @include('elements.toggle_sort', [
                                            'name'        => 'GENDER',
                                            'column'      => 'gender',
                                            'child_table' => 'user_metas',
                                        ])
                                    </th>
                                    <th>
                                        @include('elements.toggle_sort', [
                                            'name'        => 'ADDRESS',
                                            'column'      => 'address',
                                            'child_table' => 'user_metas',
                                        ])
                                    </th>
                                    <th>
                                        @include('elements.toggle_sort', [
                                            'name'        => 'CITY',
                                            'column'      => 'city',
                                            'child_table' => 'user_metas',
                                        ])
                                    </th>
                                    <th>
                                        @include('elements.toggle_sort', [
                                            'name'        => 'PHONE NUMBER',
                                            'column'      => 'phone',
                                            'child_table' => 'user_metas',
                                        ])
                                    </th>
                                    <th>
                                        @include('elements.toggle_sort', [
                                            'name'        => 'LAST LOGIN',
                                            'column'      => 'last_login',
                                            'child_table' => '',
                                        ])
                                    </th>
                                    <th>
                                        @include('elements.toggle_sort', [
                                            'name'        => 'LAST MODIFIED',
                                            'column'      => 'updated_at',
                                            'child_table' => '',
                                        ])
                                    </th>
                                    <th>
                                        @include('elements.toggle_sort', [
                                            'name'        => 'STATUS',
                                            'column'      => 'status',
                                            'child_table' => '',
                                        ])
                                    </th>
                                    <th class="action">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($content['data'] as $key => $value)
                                    {
                                        ?>
                                <tr>
                                    <td>
                                        <strong>{{ link_to_route('admin.users.edit', $value['email'], ['id' => $value['id'] ], ['data-toggle' => 'tooltip', 'title' => 'CLICK TO EDIT / VIEW DETAIL']) }}</strong>
                                        <p class="help-block">{{ $value['name'] }}</p>
                                    </td>                                    
                                    <td>{{ Helper::string_unslug($value['role']) }}</td>
                                    <td><span class="fa fa-3x fa-{{ strtolower($value['user_metas']['gender']) }}"></span></td>                                    
                                    <td>{{ empty($value['user_metas']['address'])?'-':$value['user_metas']['address'] }}</td>                                    
                                    <td>{{ empty($value['user_metas']['city'])?'-':$value['user_metas']['city'] }}</td>
                                    <td>{{ empty($value['user_metas']['phone'])?'-':$value['user_metas']['phone'] }}</td>
                                    <td>{{ empty($value['last_login'])?'-':Helper::date_converter($value['last_login'], $mySetting['date_format'], $mySetting['time_format']) }}</td>
                                    <td>{{ Helper::date_converter($value['updated_at'], $mySetting['date_format'], $mySetting['time_format']) }}</td>
                                    <td>@include('elements.status', ['status' => $value['status'] ])</td>
                                    <td>
                                        {{ Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['admin.users.destroy', $value['id']],
                                            'data-title' => $value['email'],
                                            'class' => 'form-delete',
                                        ]) }}
                                        <a href="{{ route('admin.users.edit', ['id' => $value['id'] ]) }}" class="btn btn-rounded btn-info btn-sm" data-toggle="tooltip" title="CLICK TO EDIT / VIEW DETAIL">
                                            <span class="fa fa-m0 fa-edit"></span>
                                        </a>
                                        <button type="submit" class="btn btn-rounded btn-danger btn-sm" data-toggle="tooltip" title="CLICK TO DELETE">
                                            <span class="fa fa-m0 fa-trash-o"></span>
                                        </button>
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- START PAGINATION -->
                    <div class="row">
                        <div class="col-md-12">
                            @include('elements.pagination')
                        </div>
                    </div>
                    <!-- END PAGINATION -->
        <?php
    }

    ?>
<script type="text/javascript">
    $(document).ready(function(){
        var $form = $('form#table-search-form');
        if( $form.length )
        {
            $form.find('input[type=hidden][name="sort"]').val('{{ $sort }}');
            $form.find('input[type=hidden][name="direction"]').val('{{ $direction }}');
            $form.find('input[type=hidden][name="child_table"]').val('{{ $child_table }}');
        }
    });
</script>    
    <?php

    if( ! Request::ajax() )
    {
        ?>
                </div>
            </div>                                                

        </div>
    </div>
    <!-- END RESPONSIVE TABLES -->

</div>
<!-- PAGE CONTENT WRAPPER -->
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        $(document).ready(function(){
            $('li#menu-users').addClass('active');
            
            $(document).on('submit', 'form.form-delete', function(){
                return confirm('Are you sure want to delete '+$(this).data('title')+'?');
            });
        });
    </script>
        <?php
    }
?>
@endsection