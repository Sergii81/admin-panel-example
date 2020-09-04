@extends('layouts.main')

@section('title',  config('payment_system_admin.app.name') .' :: '.__('clients.title'))

@section('content')

    <h3 class="page-title">@lang('clients.page_title')</h3>

    @include('layouts.partial.page_breadcrumb',  [
        'breadcrumb_text'  => __('breadcrumbs.clients'),
    ])


        <p>
            <a href="{{route('payment_system_admin:clients.show_add_form')}}" type="button" class="btn blue-madison">@lang('clients.button_add_new')</a>
        </p>
        <div class="portlet box">
            <div class="portlet-body flip-scroll">
                <table id="table_clients" class="table table-bordered table-striped table-condensed flip-content table-hover">
                    <thead class="flip-content">
                    <tr>
                        <th>@lang('clients.table.table_header.th_1')</th>
                        <th>@lang('clients.table.table_header.th_2')</th>
                        <th>@lang('clients.table.table_header.th_3')</th>
                        <th>@lang('clients.table.table_header.th_4')</th>
                        <th>@lang('clients.table.table_header.th_5')</th>
                        <th>@lang('clients.table.table_header.th_6')</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($data['clients'] as $k => $client)
                        <tr>
                            <td>{{++$k}}</td>
                            <td><a href="{{route('payment_system_admin:clients.show_edit_form', $client->id)}}">{{$client->name}}</a></td>

                            <td>{{$client->email}}</td>
                            <td>{{$client->gateway1->name ?? ''}}</td>
                            <td>{{$client->gateway2->name ?? ''}}</td>
                            <td>
                                <a href="{{route('payment_system_admin:clients.show_edit_form', $client->id)}}" class="btn blue btn-xs client_edit">
                                    @lang('clients.table.button_edit')
                                </a>
                                <button class="btn btn-xs btn-danger client-delete" client="{{$client->id}}" client_name="{{$client->name}}" data-toggle="modal" data-target="#client-delete-modal">
                                    @lang('clients.table.button_delete')
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>



        {{--Modal client delete --}}
    <div class="modal fade" id="client-delete-modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">@lang('clients.modal.modal_title')</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('payment_system_admin:clients.delete')}}" method="get" id="form_client_delete">
                        @csrf
                        <input type="hidden" name="client_id">
                        <h4>@lang('clients.modal.modal_body')<b><span id="client_name_span"></span></b></h4>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">@lang('clients.modal.button_delete')</button>
                            <button type="button" class="btn default" data-dismiss="modal">@lang('clients.modal.button_close')</button>
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
