@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-3">@include('shared.leftnav')</div>
    <div class="col-md-9">
        <form action="/applications/create" method="POST">

            @csrf

            <div class="form-group">
                <label for="">Applicant</label>
                <select name="applicant_id" class="form-control">
                    @foreach($applicants as $applicant)
                    <option value="{{ $applicant->id }}">{{ $applicant->fullname }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">Service</label>
                <select name="service_id" class="form-control">
                    @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">Plan</label>
                <select name="plan_id" class="form-control">
                    @foreach($plans as $plan)
                    <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- <div class="form-group">
                <label for="">Status</label>
                <select name="status" class="form-control">
                    <option value="">-- Select Status --</option>
                    @foreach($statuses as $status)
                    <option value="{{ $status }}">{{ $status }}</option>
                    @endforeach
                </select>
            </div> -->

            <div class="form-group">
                <label for="">Price</label>
                <input type="text" name="price" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control" name="description" rows="10"></textarea>
            </div>

            <p class="text-right">
                <a href="/applications" class="btn btn-link">CANCEL</a>
                <button type="submit" class="btn btn-primary">SAVE</button>
            </p>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

        </form>
    </div>
</div>
@stop
