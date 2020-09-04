@extends('layouts.main')

@section('title',  config('payment_system_admin.app.name') .' :: '.__('clients.edit.title'))

@section('content')

    <h3 class="page-title">@lang('clients.edit.page_title')</h3>

    @include('layouts.partial.page_breadcrumb_add_edit',  [
        'route'                     => route('payment_system_admin:clients.index'),
        'breadcrumb_text'           => __('breadcrumbs.clients'),
        'breadcrumb_text_add_edit'  => __('breadcrumbs.edit.clients'),
    ])

    <div class="row">
        <div class="col-md-6 ">
            <div class="portlet-body form">
                <form class="form-horizontal" role="form" method="post" action="{{route('payment_system_admin:clients.edit')}}">
                    @csrf
                    <input type="hidden" name="client_id" value="{{$data['client']->id}}">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="name">@lang('clients.add_edit.label_name')</label>
                            <div class="col-md-9">
                                <input type="text" id="name" class="form-control" name="name"
                                       placeholder="@lang('clients.add_edit.placeholder_name')" value="{{ $data['client']->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="email">@lang('clients.add_edit.label_login')</label>
                            <div class="col-md-9">
                                <input type="email" id="email"
                                       name="email" class="form-control" placeholder="@lang('clients.add_edit.placeholder_login')" required value="{{ $data['client']->email }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="password">@lang('clients.add_edit.label_password')</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input id="password" class="form-control" type="text"
                                           name="password" placeholder="@lang('clients.add_edit.placeholder_password')">
                                    <span class="input-group-btn">
                                        <button id="genpassword" class="btn btn-success" type="button"
                                                onclick="$('#password').val(str_rand());return false;">
                                            <i class="fa fa-arrow-left fa-fw"></i> @lang('clients.add_edit.generate')
                                        </button>
                                    </span>
                                </div>
                                <span class="help-block help-block_password">
                                    @lang('clients.edit.dont_want_to_change_password')
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="email">@lang('clients.add_edit.label_payment_gateways')</label>
                            <div class="col-md-9 payment_gateways">
                                @php @endphp
                                @foreach($data['gateways'] as $gateway)
                                    <div class="checkbox-list">
                                        <label>
                                            <div class="checker">
                                                <span class="">
                                                    <input type="checkbox" name="gateway_{{$gateway->id}}" id="gateway_{{$gateway->id}}" onchange="fun_check()"
                                                        @if($data['client']->gateway_1 == $gateway->id || $data['client']->gateway_2 == $gateway->id) checked="checked" @endif>
                                                    <input type="hidden" name="gateway_id_{{$gateway->id}}" value="{{$gateway->id}}">
                                                </span>
                                            </div>
                                            {{$gateway->name}}
                                        </label>
                                    </div>

                                    <div class="portlet-body box yellow gateway_table_{{$gateway->id}}" style="display: none">
                                        <div class="table-scrollable">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th>@lang('clients.add_edit.settings')</th>
                                                    <th>@lang('clients.add_edit.values')</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>@lang('clients.add_edit.currency')</td>
                                                    <td>{{$gateway->currency}}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('clients.add_edit.rolling')</td>
                                                    <td>{{$gateway->rolling}}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('clients.add_edit.transaction_percent')</td>
                                                    <td>{{$gateway->transaction_percent}}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('clients.add_edit.transaction_cost')</td>
                                                    <td>{{$gateway->transaction_cost}}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('clients.add_edit.refund')</td>
                                                    <td>{{$gateway->refund}}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('clients.add_edit.chargeback')</td>
                                                    <td>{{$gateway->chargeback}}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('clients.add_edit.hold')</td>
                                                    <td>{{$gateway->hold}}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('clients.add_edit.min_payout')</td>
                                                    <td>{{$gateway->min_payout}}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('clients.add_edit.payment_methods')</td>
                                                    <td>{{$gateway->payment_methods}}</td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('clients.add_edit.payout_cost')</td>
                                                    <td>{{$gateway->payout_cost}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <a href="{{route('payment_system_admin:clients.index')}}" type="button" class="btn default">@lang('clients.add_edit.button_back')</a>
                                <button type="submit" class="btn green">@lang('clients.edit.button_edit')</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
