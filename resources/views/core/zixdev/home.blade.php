@extends(site()->partial('core::%s.layouts.default'))

@section('header')
    @include('core.zixdev.home.header')
@stop

@section('content')
    @include('core.zixdev.home.our-services')
@stop

@section('after-content')
    @include('core.zixdev.home.about-us')
    @include('core.zixdev.home.contact-us')
@stop