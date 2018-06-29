@extends('layout')

@section('title', 'Applications')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-3">
            @include('shared.leftnav')
        </div>
        <div class="col-md-9">

            @include('shared.breadcrumb', ['steps' => [
                'active' => 'Applications',
            ]])

            <h1>Applications</h1>

            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Applicant Name</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Created At</th>
                </tr>

                @foreach($applications as $application)
                    <tr>
                        <td>{{ $application->id }}</td>
                        <td>{{ $application->applicant_id }}</td>
                        <td>{{ $application->service_id }}</td>
                        <td>{{ $application->date->format($dateFormat) }} - {{ $application->date->diffForHumans() }}</td>
                        <td>{{ $application->description }}</td>
                        <td>{{ $application->status }}</td>
                        <td>{{ $currency }} {{ $application->price }}</td>
                        <td>{{ $application->created_at->format($dateFormat) }}</td>
                    </tr>
                @endforeach

            </table>


        </div>
    </div>




</div>
@stop