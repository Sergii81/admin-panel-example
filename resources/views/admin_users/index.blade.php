@extends('layouts.main')

@section('title',  config('payment_system_admin.app.name') .' :: '.__('admin_users.title'))

@section('content')

    <h3 class="page-title">@lang('admin_users.page_title')</h3>

    @include('layouts.partial.page_breadcrumb',  [
        'breadcrumb_text'  => __('breadcrumbs.admin_users'),
    ])

    <div class="portlet box">
        <div class="portlet-body flip-scroll">
            <table id="table_admin_users" class="table table-bordered table-striped table-condensed flip-content table-hover">
                <thead class="flip-content">
                <tr>
                    <th>@lang('admin_users.table.table_header.th_1')</th>
                    <th>@lang('admin_users.table.table_header.th_2')</th>
                    <th>@lang('admin_users.table.table_header.th_3')</th>
                    <th>@lang('admin_users.table.table_header.th_4')</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($data['admin_users'] as $k => $admin_user)
                    <tr>
                        <td>{{$admin_user->id}}</td>
                        <td>{{$admin_user->name}}</td>
                        <td>{{$admin_user->email}}</td>
                        <td>
                            <button class="btn btn-xs @if($admin_user->do_mailing == 1) btn-danger @else btn-success @endif admin_user-mailing" admin_user="{{$admin_user->id}}" admin_user_name="{{$admin_user->name}}" admin_user_mailing="{{$admin_user->do_mailing}}" data-toggle="modal" data-target="#admin_user-mailing-modal">
                                @if($admin_user->do_mailing == 1) @lang('admin_users.table.button_delete') @else @lang('admin_users.table.button_add') @endif
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>

    {{--Modal admin user mailing --}}
    <div class="modal fade" id="admin_user-mailing-modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">@lang('admin_users.modal.modal_title')</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('payment_system_admin:admin_users.do_mailing')}}" method="get" id="form_admin_user_do_mailing">
                        @csrf
                        <input type="hidden" name="admin_user_id">
                        <input type="hidden" name="admin_user_do_mailing">
                        <h4>@lang('admin_users.modal.modal_body')<b><span id="admin_user_name_span"></span></b></h4>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">@lang('admin_users.modal.button_do_mailing')</button>
                            <button type="button" class="btn default" data-dismiss="modal">@lang('admin_users.modal.button_close')</button>
                        </div>

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{--End Modal client delete --}}

@endsection
