@extends('layout')

@section('title', $plan->name)

@section('content')
<div class="container">

 <div class="row">
        <div class="col-md-3">
            @include('shared.leftnav')
        </div>
        <div class="col-md-9">

            @include('shared.breadcrumb', ['steps' => [
                '/plans' => 'Plans',
                'active' => $plan->name
            ]])

            <h1>
                {{ $plan->name }}

                @if($plan->applications->count() > 0)
                <div style="float:right">
                    <a class="btn btn-primary" href="/plans/{{ $plan->id }}/applications">View Applications ({{ $plan->applications->count() }})</a>
                </div>
                @endif
            </h1>



            <table class="table">
                <tr>
                    <th>Id</th>
                    <td>{{ $plan->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $plan->name }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $plan->description }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $plan->created_at->format($dateFormat) }} ({{ $plan->created_at->diffForHumans() }})</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $plan->updated_at->format('j M') }}</td>
                </tr>
            </table>
        </div>




</div>
@stop
