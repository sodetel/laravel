@extends('shared.layout')

@section('content')
<div class="container">

    @include('shared.breadcrumb', ['steps' => [
        'active' => 'Plans'
    ]])

    <h1>Plans Section</h1>

    <h2>Total Balance ${{ number_format($totalBalance) }}</h2>

    <table class="table">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th></th>
        </tr>

        @foreach($plans as $plan)
            <tr>
                <td>{{ $plan->id }}</td>
                <td>{{ $plan->name }}</td>
                <td>{{ $plan->description }}</td>
                <td>@include('plans.plan-button')</td>
            </tr>
        @endforeach

    </table>


</div>
@stop
