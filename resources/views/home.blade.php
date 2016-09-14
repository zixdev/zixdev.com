@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <passport-clients></passport-clients>
        <passport-authorized-clients></passport-authorized-clients>
        <passport-personal-access-token></passport-personal-access-token>
    </div>
</div>
@endsection
