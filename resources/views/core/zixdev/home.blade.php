@extends(site()->partial('core::%s.layouts.default'))

@section('header')
    @include('core.zixdev.partials._home-header')
@stop

@section('content')
    @include('core.zixdev.partials._home-about-us')

@stop