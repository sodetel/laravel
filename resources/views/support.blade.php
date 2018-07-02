@extends('layout')

@section('styles')
@parent
<style>
body {
    background:red;
}
</style>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('shared.leftnav')
        </div>
        <div class="col-md-9">
            <img src="https://tse1.mm.bing.net/th?id=OIP.jnyUtMD8u530jGa7MHmRQQHaC5&pid=Api" alt="">
        </div>
    </div>
</div>
@stop
