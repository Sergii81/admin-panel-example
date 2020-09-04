<div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu page-sidebar-menu-light" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <li @if(in_array($data['route'], [
                'payment_system_admin:dashboard.index',
                ])) class="active"@endif>
                @php
                    $href = ('payment_system_admin:dashboard.index' === $data['route'])
                    ? route('payment_system_admin:dashboard.index') . $data['query']
                    : route('payment_system_admin:dashboard.index') ;
                @endphp
                <a href="{{ $href }}">
                    <i class="icon-home"></i>
                    <span class="title">@lang('sidebar.dashboard')</span>
                </a>
            </li>
            <li @if(in_array($data['route'], [
                    'payment_system_admin:clients.index',
                    'payment_system_admin:clients.show_add_form',
                    'payment_system_admin:clients.show_edit_form',
                    ])) class="active"@endif>
                @php
                    $href = ('payment_system_admin:clients.index' === $data['route'])
                    ? route('payment_system_admin:clients.index') . $data['query']
                    : route('payment_system_admin:clients.index') ;
                @endphp
            <a href="{{ $href }}">
                    <i class="icon-users"></i>
                    <span class="title">@lang('sidebar.clients')</span>
                </a>
            </li>
            <li @if(in_array($data['route'], [
                    'payment_system_admin:gateways.index',
                    'payment_system_admin:gateways.show_add_form',
                    'payment_system_admin:gateways.show_edit_form',
                    ])) class="active"@endif>
                @php
                    $href = ('payment_system_admin:gateways.index' === $data['route'])
                    ? route('payment_system_admin:gateways.index') . $data['query']
                    : route('payment_system_admin:gateways.index') ;
                @endphp
                <a href="{{ $href }}">
                    <i class="icon-directions"></i>
                    <span class="title">@lang('sidebar.gateways')</span>
{{--                    <span class="arrow "></span>--}}
                </a>
{{--                <ul class="sub-menu">--}}
{{--                    <li>--}}
{{--                        <a href="#">Platio</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="#">Neobanq</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
            </li>
            <li @if(in_array($data['route'], [
                    'payment_system_admin:transactions.index',
                    'payment_system_admin:transactions.show_details',
                    ])) class="active"@endif>
                @php
                    $href = ('payment_system_admin:transactions.index' === $data['route'])
                    ? route('payment_system_admin:transactions.index') . $data['query']
                    : route('payment_system_admin:transactions.index') ;
                @endphp
                <a href="{{ $href }}">
                    <i class="icon-basket"></i>
                    <span class="title">@lang('sidebar.transactions')</span>
                </a>

            </li>
            <li @if(in_array($data['route'], [
                'payment_system_admin:finance.payouts',
                'payment_system_admin:finance.payout_requests',
                'payment_system_admin:finance.balance',
                ])) class="active open"@endif>
                <a href="javascript:;">
                    <i class="icon-wallet"></i>
                    <span class="title">@lang('sidebar.finance')</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li @if(in_array($data['route'], [
                        'payment_system_admin:finance.payouts',
                        ])) class="active"@endif>
                        @php
                            $href = ('payment_system_admin:finance.payouts' === $data['route'])
                            ? route('payment_system_admin:finance.payouts') . $data['query']
                            : route('payment_system_admin:finance.payouts') ;
                        @endphp
                        <a href="{{ $href }}">@lang('sidebar.payouts')</a>
                    </li>
                    <li @if(in_array($data['route'], [
                        'payment_system_admin:finance.payouts_request',
                        ])) class="active"@endif>
                        @php
                            $href = ('payment_system_admin:finance.payout_requests' === $data['route'])
                            ? route('payment_system_admin:finance.payout_requests') . $data['query']
                            : route('payment_system_admin:finance.payout_requests') ;
                        @endphp
                        <a href="{{ $href }}">@lang('sidebar.payouts_requests')
                            @if(App\Models\Payout::countPayoutsRequest() != 0)
                            <span class="badge badge-roundless badge-info">new</span>
                            @endif
                        </a>
                    </li>
                    <li @if(in_array($data['route'], [
                        'payment_system_admin:finance.balance',
                        ])) class="active"@endif>
                        @php
                            $href = ('payment_system_admin:finance.balance' === $data['route'])
                            ? route('payment_system_admin:finance.balance') . $data['query']
                            : route('payment_system_admin:finance.balance') ;
                        @endphp
                        <a href="{{ $href }}">@lang('sidebar.balance')</a>
                    </li>
                </ul>
            </li>
            <li @if(in_array($data['route'], [
                    'payment_system_admin:admin_users.index',
                    ])) class="active"@endif>
                @php
                    $href = ('payment_system_admin:admin_users.index' === $data['route'])
                    ? route('payment_system_admin:admin_users.index') . $data['query']
                    : route('payment_system_admin:admin_users.index') ;
                @endphp
                <a href="{{ $href }}">
                    <i class="icon-star"></i>
                    <span class="title">@lang('sidebar.admin_users')</span>
                </a>

            </li>


        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
