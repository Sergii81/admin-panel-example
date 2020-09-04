@extends('layouts.main')

@section('title',  config('payment_system_admin.app.name') .' :: '.__('transactions.title'))

@section('content')

    <h3 class="page-title">@lang('transactions.page_title')</h3>

    @include('layouts.partial.page_breadcrumb',  [
        'breadcrumb_text'  => __('breadcrumbs.transactions'),
    ])

    <div class="row">
        <div class="col-xs-3">
            <div class="form-group">
                <label for="select_client">@lang('transactions.table.select_client')</label>
                <select id="select_client" multiple="multiple" class="form-control select_client" name="select_client[]" style="width: 100%">
                </select>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="select_outlet">@lang('transactions.table.select_outlet')</label>
                <select id="select_outlet" multiple="multiple" class="form-control select_outlet" name="select_outlet[]" style="width: 100%">
                </select>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="select_gateway">@lang('transactions.table.select_gateway')</label>
                <select id="select_gateway" multiple="multiple" class="form-control select_gateway" name="select_gateway[]" style="width: 100%">
                </select>
            </div>
        </div>
    </div>
    <div class="portlet box">
        <div class="portlet-body flip-scroll">
            <table id="table_transactions" class="table table-bordered table-striped table-condensed flip-content table-hover">
                <thead class="flip-content">
                <tr>
                    <th>@lang('transactions.table.table_header.th_1')</th>
                    <th>@lang('transactions.table.table_header.th_2')</th>
                    <th>@lang('transactions.table.table_header.th_3')</th>
                    <th>@lang('transactions.table.table_header.th_4')</th>
                    <th>@lang('transactions.table.table_header.th_5')</th>
                    <th>@lang('transactions.table.table_header.th_6')</th>
                    <th>@lang('transactions.table.table_header.th_7')</th>
                    <th>@lang('transactions.table.table_header.th_8')</th>
                    <th>@lang('transactions.table.table_header.th_9')</th>
                    <th>@lang('transactions.table.table_header.th_10')</th>
                    <th>@lang('transactions.table.table_header.th_11')</th>
                    <th>@lang('transactions.table.table_header.th_12')</th>
                    <th>@lang('transactions.table.table_header.th_13')</th>
                    <th>@lang('transactions.table.table_header.th_14')</th>
                    <th>@lang('transactions.table.table_header.th_15')</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($data['transactions'] as $k => $transaction)
                    <tr>
                        <td>{{$transaction->id}}</td>
                        <td>{{$transaction->gatawey_order_id}}</td>
                        <td>{{$transaction->client->name}}</td>
                        <td>{{$transaction->outlet->name}}</td>
                        <td>{{$transaction->gateway->name}}</td>
                        <td>{{$transaction->status}}</td>
                        <td>{{$transaction->user_first_name}} {{$transaction->user_last_name}}</td>
                        <td>{{$transaction->card_no}}</td>
                        <td>{{$transaction->email}}</td>
                        <td>{{$transaction->amount}}</td>
                        <td>{{$transaction->currency}}</td>
                        <td>@php echo $transaction->amount_to_balance*$transaction->gateway->transaction_percent/100; @endphp</td>
                        <td>@php echo $transaction->amount_to_balance*$transaction->gateway->our_percent/100; @endphp</td>
                        <td>@if ($transaction->status == 'completed') {{$transaction->hold->rolling_reserve}} @endif</td>
                        <td>
                            <a href="{{ route('payment_system_admin:transactions.show_details', $transaction->id) }}" class="btn blue btn-xs client_edit">
                                @lang('transactions.table.button_more_details')
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>


@endsection
