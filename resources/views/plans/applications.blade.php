@extends('layout')

@section('title', $plan->name . ' applications')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-3">
            @include('shared.leftnav')
        </div>
        <div class="col-md-9">

            @include('shared.breadcrumb', ['steps' => [
                '/plans' => 'Plans',
                '/plans/' . $plan->id => $plan->name,
                'active' => 'Applications'
            ]])

            <h1>Plan Subscriptions</h1>

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

                @foreach($plan->applications as $application)
                    <tr>
                        <td>{{ $application->id }}</td>
                        <td>{{ $application->applicant_id }}</td>
                        <td>{{ $application->service_id }}</td>
                        <td>{{ $application->date }}</td>
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
