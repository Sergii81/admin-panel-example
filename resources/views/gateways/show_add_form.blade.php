@extends('layouts.main')

@section('title',  config('payment_system_admin.app.name') .' :: '.__('gateways.add.title'))

@section('content')

    <h3 class="page-title">@lang('gateways.add.page_title')</h3>

    @include('layouts.partial.page_breadcrumb_add_edit',  [
        'route'                     => route('payment_system_admin:gateways.index'),
        'breadcrumb_text'           => __('breadcrumbs.gateways'),
        'breadcrumb_text_add_edit'  => __('breadcrumbs.add.gateways'),
    ])

    <div class="row">
        <div class="col-md-6 ">
            <div class="portlet-body form">
                <form class="form-horizontal" role="form" method="post" action="{{route('payment_system_admin:gateways.add')}}">
                    @csrf
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="name">@lang('gateways.add_edit.label_name')</label>
                            <div class="col-md-9">
                                <input type="text" id="name" class="form-control" name="name"
                                       placeholder="@lang('gateways.add_edit.placeholder_name')">
{{--                                <span class="help-block">--}}
{{--											A block of help text. </span>--}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="currency">@lang('gateways.add_edit.label_currency')</label>
                            <div class="col-md-9">
                                <select class="form-control" id="currency" name="currency">
                                    <option value="0">@lang('gateways.add_edit.options_select_one')</option>
                                    @foreach($data['currency'] as $currency)
                                        <option value="{{$currency->currency_name}}">{{$currency->currency_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="rolling">@lang('gateways.add_edit.label_rolling')</label>
                            <div class="col-md-9">
                                <input type="text" id="rolling" name="rolling" class="form-control" placeholder="@lang('gateways.add_edit.placeholder_rolling')">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="transaction_percent">@lang('gateways.add_edit.label_transaction_percent')</label>
                            <div class="col-md-9">
                                <input type="text" id="transaction_percent" name="transaction_percent" class="form-control" placeholder="@lang('gateways.add_edit.placeholder_transaction_percent')">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="our_percent">@lang('gateways.add_edit.label_our_percent')</label>
                            <div class="col-md-9">
                                <input type="text" id="our_percent" name="our_percent" class="form-control" placeholder="@lang('gateways.add_edit.placeholder_our_percent')">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="transaction_cost">@lang('gateways.add_edit.label_transaction_cost')</label>
                            <div class="col-md-9">
                                <input type="text" id="transaction_cost" name="transaction_cost" class="form-control" placeholder="@lang('gateways.add_edit.placeholder_transaction_cost')">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="refund">@lang('gateways.add_edit.label_refund')</label>
                            <div class="col-md-9">
                                <input type="text" id="refund" name="refund" class="form-control" placeholder="@lang('gateways.add_edit.placeholder_refund')">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="chargeback">@lang('gateways.add_edit.label_chargeback')</label>
                            <div class="col-md-9">
                                <input type="text" id="chargeback" name="chargeback" class="form-control" placeholder="@lang('gateways.add_edit.placeholder_chargeback')">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="hold">@lang('gateways.add_edit.label_hold')</label>
                            <div class="col-md-9">
                                <input type="text" id="hold" name="hold" class="form-control" placeholder="@lang('gateways.add_edit.placeholder_hold')">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="min_payout">@lang('gateways.add_edit.label_min_payout')</label>
                            <div class="col-md-9">
                                <input type="text" id="min_payout" name="min_payout" class="form-control" placeholder="@lang('gateways.add_edit.placeholder_min_payout')">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="payment_methods">@lang('gateways.add_edit.label_payment_methods')</label>
                            <div class="col-md-9">
                                <select class="form-control" id="payment_methods" name="payment_methods">
                                    <option value="0">@lang('gateways.add_edit.options_select_one_1')</option>
                                    @foreach($data['payment_methods'] as $payment_method)
                                        <option value="{{$payment_method->method}}">{{$payment_method->method}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="payout_cost">@lang('gateways.add_edit.label_payout_cost')</label>
                            <div class="col-md-9">
                                <input type="text" id="payout_cost" name="payout_cost" class="form-control" placeholder="@lang('gateways.add_edit.placeholder_payout_cost')">
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <a href="{{route('payment_system_admin:gateways.index')}}" type="button" class="btn default">@lang('gateways.add_edit.button_back')</a>
                                <button type="submit" class="btn green">@lang('gateways.add.button_save')</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
