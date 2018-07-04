@extends('layouts.app')

@section('title', $application->name)

@section('content')
<div class="container">

 <div class="row">
        <div class="col-md-3">
            @include('shared.leftnav')
        </div>
        <div class="col-md-9">

            @include('shared.breadcrumb', ['steps' => [
                '/applications' => 'Applications',
                'active' => $application->name
            ]])

            <h1>
                {{ $application->name }}
            </h1>



            <table class="table">
                <tr>
                    <th>Id</th>
                    <td>{{ $application->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $application->name }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $application->description }}</td>
                </tr>
                <tr>
                    <th>Branch</th>
                    <td>{{ $application->branch }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $application->status }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $application->created_at->format($dateFormat) }} ({{ $application->created_at->diffForHumans() }})</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $application->updated_at->format('j M') }}</td>
                </tr>
            </table>
        </div>




</div>
@stop
