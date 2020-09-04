@extends('layouts.main')

@section('title',  config('payment_system_admin.app.name') .' :: '.__('balance.title'))

@section('content')

    <h3 class="page-title">@lang('balance.page_title')</h3>

    @include('layouts.partial.page_breadcrumb',  [
        'breadcrumb_text'  => __('breadcrumbs.balance'),
    ])

    <div class="row">
        <div class="col-xs-3">
            <div class="form-group">
                <label for="select_client">@lang('balance.table.select_client')</label>
                <select id="select_client" multiple="multiple" class="form-control select_client" name="select_client[]" style="width: 100%">
                </select>
            </div>
        </div>
{{--        <div class="col-xs-3">--}}
{{--            <div class="form-group">--}}
{{--                <label for="select_outlet">@lang('balance.table.select_outlet')</label>--}}
{{--                <select id="select_outlet" multiple="multiple" class="form-control select_outlet" name="select_outlet[]" style="width: 100%">--}}
{{--                </select>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="col-xs-3">
            <div class="form-group">
                <label for="select_gateway">@lang('balance.table.select_gateway')</label>
                <select id="select_gateway" multiple="multiple" class="form-control select_gateway" name="select_gateway[]" style="width: 100%">
                </select>
            </div>
        </div>
    </div>
    <div class="portlet box">
        <div class="portlet-body flip-scroll">
            <table id="table_balance" class="table table-bordered table-striped table-condensed flip-content table-hover">
                <thead class="flip-content">
                <tr>
                    <th>@lang('balance.table.table_header.th_1')</th>
                    <th>@lang('balance.table.table_header.th_2')</th>
{{--                    <th>@lang('balance.table.table_header.th_3')</th>--}}
                    <th>@lang('balance.table.table_header.th_4')</th>
                    <th>@lang('balance.table.table_header.th_5')</th>
                    <th>@lang('balance.table.table_header.th_6')</th>
                    <th>@lang('balance.table.table_header.th_7')</th>
                    <th>@lang('balance.table.table_header.th_8')</th>
                    <th>@lang('balance.table.table_header.th_9')</th>
                    <th>@lang('balance.table.table_header.th_10')</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($data['balances'] as $k => $balance)
                    <tr>
                        <td>{{++$k}}</td>
                        <td>{{$balance->client->name}}</td>
{{--                        <td>--}}
{{--                            --}}{{--$balance->outlet->name--}}
{{--                        </td>--}}
                        <td>{{$balance->gateway->name}}</td>
                        <td>{{$balance->sum}}</td>
                        <td>{{$balance->available_for_payout - $balance->payout_amount}}</td>
                        <td>{{$balance->currency}}</td>
                        <td>{{$balance->gateway->transaction_percent}}</td>
                        <td>{{$balance->rolling_reserve}}</td>
                        <td>{{$balance->rolling_reserve_to_payout}}</td>
                    </tr>

                @endforeach
                </tbody>

            </table>
        </div>
    </div>


@endsection
