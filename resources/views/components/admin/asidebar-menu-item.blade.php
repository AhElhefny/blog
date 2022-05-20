@props(['value'])
<li class="menu-item">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div data-i18n="Layouts">{{$value}}</div>
    </a>

    <ul class="menu-sub">
        <li class="menu-item">
            <a href="{{url("admin/$value/all")}}" class="menu-link">
                <div data-i18n="Without menu">All {{$value}}</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{url("admin/$value/create")}}" class="menu-link">
                <div data-i18n="Horizontal Form">Add {{$value}}</div>
            </a>
        </li>

{{--        <li class="menu-item">--}}
{{--            <a href="{{url("admin/$value/edit")}}" class="menu-link">--}}
{{--                <div data-i18n="Horizontal Form">Edit {{$value}}</div>--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>
</li>
