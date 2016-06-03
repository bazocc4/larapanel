@extends('layouts.cms_default')

@section('content')
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
                {{ session('flash_message') }}
            </div>
                    <?php
                }
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-5 col-sm-6 col-sm-offset-4 col-xs-12">
                        {{ Form::open(['route' => 'admin.users.index', 'method' => 'GET']) }}
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">
                                        <span class="fa fa-m0 fa-search"></span>
                                    </button>
                                </span>
                                {{ Form::text('search', null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'search item here ...',
                                    'required' => 'required',
                                ]) }}
                            </div>
                        {{ Form::close() }}
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12 text-right">
                            {{ HTML::link( route('admin.users.create') , 'Add Account', ['class' => 'btn btn-info btn-block']) }}
                        </div>
                    </div>
                </div>

                <div class="panel-body panel-body-table">
                    <div class="table-responsive">
                        <table class="table table-striped table-actions table-hover list">
                            <thead>
                                <tr>
                                    <th>EMAIL ACCOUNT</th>
                                    <th>ROLE</th>
                                    <th>GENDER</th>
                                    <th>ADDRESS</th>
                                    <th>CITY</th>
                                    <th>PHONE NUMBER</th>
                                    <th>LAST LOGIN</th>
                                    <th>LAST MODIFIED</th>
                                    <th>STATUS</th>
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
                                        <strong>{{ link_to_route('admin.users.edit', $value['email'], ['id' => $value['id'] ]) }}</strong>
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
            
            $('form.form-delete').submit(function(){
                return confirm('Are you sure want to delete '+$(this).data('title')+'?');
            });
        });
    </script>
@endsection