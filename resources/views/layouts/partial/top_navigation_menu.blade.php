<div class="top-menu">
    <ul class="nav navbar-nav pull-right">
        <!-- BEGIN USER LOGIN DROPDOWN -->
        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
        <li class="dropdown dropdown-extended dropdown-notification">
            <a href="{{route('payment_system_admin:finance.payout_requests')}}" class="dropdown-toggle" title="Запросы на выплаты">
                <i class="icon-wallet"></i>
                @if(App\Models\Payout::countPayoutsRequest() != 0)
                <span class="badge badge-info">@php echo App\Models\Payout::countPayoutsRequest(); @endphp </span>
                @endif
            </a>
        </li>
        <li class="dropdown dropdown-user dropdown-dark">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <span class="username ">{{auth()->user()->name}}</span>
                <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-default">
{{--                <li>--}}
{{--                    <a href="extra_profile.html">--}}
{{--                        <i class="icon-user"></i> My Profile </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="page_calendar.html">--}}
{{--                        <i class="icon-calendar"></i> My Calendar </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="inbox.html">--}}
{{--                        <i class="icon-envelope-open"></i> My Inbox <span class="badge badge-danger">--}}
{{--							3 </span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="page_todo.html">--}}
{{--                        <i class="icon-rocket"></i> My Tasks <span class="badge badge-success">--}}
{{--							7 </span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="divider">--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="extra_lock.html">--}}
{{--                        <i class="icon-lock"></i> Lock Screen </a>--}}
{{--                </li>--}}
                <li>
                    <a href="{{ route('logout') }}">
                        <i class="icon-key"></i>@lang('header.logout')</a>
                </li>
            </ul>
        </li>
        <!-- END USER LOGIN DROPDOWN -->

    </ul>
</div>
