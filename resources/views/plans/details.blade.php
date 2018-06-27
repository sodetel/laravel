@extends('shared.layout')

@section('content')
<div class="container">

    @include('shared.breadcrumb', ['steps' => [
        '/plans' => 'Plans',
        'active' => $plan->name
    ]])

    <h1>{{ $plan->name }}</h1>

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
            <td>{{ $plan->created_at }} ({{ $plan->created_at->diffForHumans() }})</td>
        </tr>
        <tr>
            <th>Updated At</th>
            <td>{{ $plan->updated_at->format('j M') }}</td>
        </tr>
    </table>




</div>
@stop
