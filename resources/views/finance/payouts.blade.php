@extends('layouts.main')

@section('title',  config('payment_system_admin.app.name') .' :: '.__('payouts.title'))

@section('content')

    <h3 class="page-title">@lang('payouts.page_title')</h3>

    @include('layouts.partial.page_breadcrumb',  [
        'breadcrumb_text'  => __('breadcrumbs.payouts'),
    ])

    <div class="row">
        <div class="col-xs-3">
            <div class="form-group">
                <label for="select_client">@lang('payouts.table.select_client')</label>
                <select id="select_client" multiple="multiple" class="form-control select_client" name="select_client[]" style="width: 100%">
                </select>
            </div>
        </div>
    </div>
    <div class="portlet box">
        <div class="portlet-body flip-scroll">
            <table id="table_payouts" class="table table-bordered table-striped table-condensed flip-content table-hover">
                <thead class="flip-content">
                <tr>
                    <th>@lang('payouts.table.table_header.th_1')</th>
                    <th>@lang('payouts.table.table_header.th_2')</th>
                    <th>@lang('payouts.table.table_header.th_3')</th>
                    <th>@lang('payouts.table.table_header.th_4')</th>
                    <th>@lang('payouts.table.table_header.th_5')</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($data['payouts'] as $k => $payout)
                    <tr>
                        <td>{{++$k}}</td>
                        <td>{{$payout->client->name}}</td>
                        <td>{{$payout->gateway->name}}</td>
                        <td>{{$payout->amount}}</td>
                        <td>{{$payout->currency}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
