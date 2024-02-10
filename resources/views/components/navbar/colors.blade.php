@if (!isset($extracss))
    @php
    $extracss="";
    @endphp
@endif

<i class="my-2 text-left pl-6 {{$extracss}}" sidenav-colors>
    <x-navbar.coloritem color="zinc" setting="{{$setting}}" />
    <x-navbar.coloritem color="yellow" setting="{{$setting}}" />
    <x-navbar.coloritem color="amber" setting="{{$setting}}" />
    <x-navbar.coloritem color="orange" setting="{{$setting}}" />
    <x-navbar.coloritem color="red" setting="{{$setting}}" />
    <x-navbar.coloritem color="emerald" setting="{{$setting}}" />
    <x-navbar.coloritem color="green" setting="{{$setting}}" />
    <x-navbar.coloritem color="cyan" setting="{{$setting}}" />
    <x-navbar.coloritem color="blue" setting="{{$setting}}" />
    <x-navbar.coloritem color="purple" setting="{{$setting}}" />
</i>
