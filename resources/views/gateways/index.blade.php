@extends('layouts.main')

@section('title',  config('payment_system_admin.app.name') .' :: '.__('gateways.title'))

@section('content')

    <h3 class="page-title">@lang('gateways.page_title')</h3>

    @include('layouts.partial.page_breadcrumb',  [
        'breadcrumb_text'  => __('breadcrumbs.gateways'),
    ])
    <div>
        <p>
            <a href="{{route('payment_system_admin:gateways.show_add_form')}}" type="button" class="btn blue-madison">@lang('gateways.button_add_new')</a>
        </p>
        <div class="portlet box">
            <div class="portlet-body flip-scroll">
                <table id="table_gateways" class="table table-bordered table-striped table-condensed flip-content table-hover">
                    <thead class="flip-content">
                    <tr>
                        <th>@lang('gateways.table.table_header.th_1')</th>
                        <th>@lang('gateways.table.table_header.th_2')</th>
                        <th>@lang('gateways.table.table_header.th_3')</th>
                        <th>@lang('gateways.table.table_header.th_4')</th>
                        <th>@lang('gateways.table.table_header.th_5')</th>
                        <th>@lang('gateways.table.table_header.th_6')</th>
                        <th>@lang('gateways.table.table_header.th_7')</th>
                        <th>@lang('gateways.table.table_header.th_8')</th>
                        <th>@lang('gateways.table.table_header.th_9')</th>
                        <th>@lang('gateways.table.table_header.th_10')</th>
                        <th>@lang('gateways.table.table_header.th_11')</th>
                        <th>@lang('gateways.table.table_header.th_12')</th>
                        <th>@lang('gateways.table.table_header.th_13')</th>
                        <th>@lang('gateways.table.table_header.th_14')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data['gateways'] as $k => $gateway)
                        <tr>
                            <td>{{++$k}}</td>
                            <td><a href="{{route('payment_system_admin:gateways.show_edit_form', $gateway->id)}}">{{$gateway->name}}</a></td>
                            <td>{{$gateway->currency}}</td>
                            <td>{{$gateway->rolling}}</td>
                            <td>{{$gateway->transaction_percent}}</td>
                            <td>{{$gateway->transaction_cost}}</td>
                            <td>{{$gateway->refund}}</td>
                            <td>{{$gateway->chargeback}}</td>
                            <td>{{$gateway->hold}}</td>
                            <td>{{$gateway->min_payout}}</td>
                            <td>{{$gateway->payment_methods}}</td>
                            <td>{{$gateway->payout_cost}}</td>
                            <td>{{$gateway->our_percent}}</td>
                            <td>
                                <a href="{{route('payment_system_admin:gateways.show_edit_form', $gateway->id)}}" class="btn blue btn-xs gateway_edit">
                                    @lang('gateways.table.button_edit')
                                </a>
                                <button class="btn btn-xs btn-danger gateway-delete" gateway="{{$gateway->id}}" gateway_name="{{$gateway->name}}" data-toggle="modal" data-target="#gateway-delete-modal">
                                    @lang('gateways.table.button_delete')
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    {{--                <tfoot>--}}
                    {{--                <tr>--}}
                    {{--                    <th>@lang('gateways.table.table_footer.th_1')</th>--}}
                    {{--                    <th>@lang('gateways.table.table_footer.th_2')</th>--}}
                    {{--                    <th>@lang('gateways.table.table_footer.th_3')</th>--}}
                    {{--                    <th>@lang('gateways.table.table_footer.th_4')</th>--}}
                    {{--                    <th>@lang('gateways.table.table_footer.th_5')</th>--}}
                    {{--                    <th>@lang('gateways.table.table_footer.th_6')</th>--}}
                    {{--                    <th>@lang('gateways.table.table_footer.th_7')</th>--}}
                    {{--                    <th>@lang('gateways.table.table_footer.th_8')</th>--}}
                    {{--                    <th>@lang('gateways.table.table_footer.th_9')</th>--}}
                    {{--                    <th>@lang('gateways.table.table_footer.th_10')</th>--}}
                    {{--                    <th>@lang('gateways.table.table_footer.th_11')</th>--}}
                    {{--                    <th>@lang('gateways.table.table_footer.th_12')</th>--}}
                    {{--                    <th>@lang('gateways.table.table_footer.th_13')</th>--}}
                    {{--                    <th>@lang('gateways.table.table_footer.th_14')</th>--}}
                    {{--                </tr>--}}
                    {{--                </tfoot>--}}
                </table>
            </div>
        </div>

    </div>
{{--Modal gateway delete --}}
    <div class="modal fade" id="gateway-delete-modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">@lang('gateways.modal.modal_title')</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('payment_system_admin:gateways.delete')}}" method="get" id="form_gateway_delete">
                        @csrf
                        <input type="hidden" name="gateway_id">
                        <h4>@lang('gateways.modal.modal_body')<b><span id="gateway_name_span"></span></b></h4>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">@lang('gateways.modal.button_delete')</button>
                            <button type="button" class="btn default" data-dismiss="modal">@lang('gateways.modal.button_close')</button>
                        </div>

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
{{--End Modal gateway delete --}}

@endsection
