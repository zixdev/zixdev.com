@extends(site()->partial('core::%s.layouts.default'))

@section('header')
    @include('core.zixdev.home.header')
@stop

@section('content')
    @include('core.zixdev.home.about-us')
@stop

@section('after-content')
    @include('core.zixdev.home.why-us')
@stop