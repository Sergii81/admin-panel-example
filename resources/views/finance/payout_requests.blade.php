@extends('layouts.main')

@section('title',  config('payment_system_admin.app.name') .' :: '.__('payout_requests.title'))

@section('content')

    <h3 class="page-title">@lang('payout_requests.page_title')</h3>

    @include('layouts.partial.page_breadcrumb',  [
        'breadcrumb_text'  => __('breadcrumbs.payout_requests'),
    ])


    <div class="portlet box">
        <div class="portlet-body flip-scroll">
            <table id="table_payout_requests" class="table table-bordered table-striped table-condensed flip-content table-hover">
                <thead class="flip-content">
                <tr>
                    <th>@lang('payout_requests.table.table_header.th_1')</th>
                    <th>@lang('payout_requests.table.table_header.th_2')</th>
                    <th>@lang('payout_requests.table.table_header.th_3')</th>
                    <th>@lang('payout_requests.table.table_header.th_4')</th>
                    <th>@lang('payout_requests.table.table_header.th_5')</th>
                    <th>@lang('payout_requests.table.table_header.th_6')</th>
                    <th>@lang('payout_requests.table.table_header.th_7')</th>
                    <th>@lang('payout_requests.table.table_header.th_8')</th>

                </tr>
                </thead>
                <tbody>

                @foreach ($data['payout_requests'] as $k => $payout)
                    <tr>
                        <td>{{++$k}}</td>
                        <td>{{$payout->client->name}}</td>
                        <td>{{$payout->gateway->name}}</td>
                        <td>{{$payout->amount}}</td>
                        <td>{{$payout->available_for_payout->available_for_payout}}</td>
                        <td>{{$payout->currency}}</td>
                        <td>
                            @if($payout->gateway->id == 1)
                                {{$payout->card_no}}
                            @else
                                {{$payout->iban}}
                                {{$payout->benificiar}}<br>
                                {{$payout->country}}<br>
                                {{$payout->city}}<br>
                                {{$payout->address}}<br>
                                {{$payout->bank_name}}<br>
                                {{$payout->swift}}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('payment_system_admin:finance.payout_requests_process', $payout->id) }}" class="btn blue btn-xs client_edit">
                                @lang('payout_requests.table.button_process')
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

