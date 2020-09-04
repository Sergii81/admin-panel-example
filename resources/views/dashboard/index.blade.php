@extends('layouts.main')

@section('title',  config('payment_system_admin.app.name') .' :: '.__('dashboard.title'))

@section('content')

    <h3 class="page-title">@lang('dashboard.page_title')</h3>

    @include('layouts.partial.page_breadcrumb',  [
        'breadcrumb_text'  => __('breadcrumbs.dashboard'),
    ])
    <!-- END PAGE HEADER-->
    <!-- BEGIN DASHBOARD STATS -->
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat blue-madison">
                <div class="visual">
                    <i class="fa fa-users"></i>
                </div>
                <div class="details">
                    <div class="number">
                        {{$data['clients'] ?? ''}}
                    </div>
                    <div class="desc">
                        @lang('dashboard.number_clients')
                    </div>
                </div>
                <a class="more" href="{{route('payment_system_admin:clients.index')}}">
                    @lang('dashboard.view_more') <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat red-intense">
                <div class="visual">
                    <i class="fa fa-exchange"></i>
                </div>
                <div class="details">
                    <div class="number">
                        {{$data['gateways']}}
                    </div>
                    <div class="desc">
                        @lang('dashboard.gateways')
                    </div>
                </div>
                <a class="more" href="{{route('payment_system_admin:gateways.index')}}">
                    @lang('dashboard.view_more') <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat green-haze">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        {{$data['transactions']}}
                    </div>
                    <div class="desc">
                        @lang('dashboard.transactions')
                    </div>
                </div>
                <a class="more" href="{{route('payment_system_admin:transactions.index')}}">
                    @lang('dashboard.view_more') <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
{{--        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">--}}
{{--            <div class="dashboard-stat purple-plum">--}}
{{--                <div class="visual">--}}
{{--                    <i class="fa fa-globe"></i>--}}
{{--                </div>--}}
{{--                <div class="details">--}}
{{--                    <div class="number">--}}
{{--                        +89%--}}
{{--                    </div>--}}
{{--                    <div class="desc">--}}
{{--                        Brand Popularity--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <a class="more" href="javascript:;">--}}
{{--                    @lang('dashboard.view_more') <i class="m-icon-swapright m-icon-white"></i>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
    <!-- END DASHBOARD STATS -->
@endsection
