@extends('layout.master')
@section('content')
<div class="row justify-content-center">
    <h2 class="text-center">Create Meeting</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card">
        <form method="post" action="{{route('event.store')}}">
            @csrf
            <div class="form-group">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="email" placeholder="Attendees email">
            </div>
            <div class="form-group">
                <label for="subject">Subject <span class="text-danger">*</span></label>
                <input type="subject" class="form-control" name="subject" placeholder="Subject">
            </div>

            <div class="form-group">
                <label for="date">Date <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="date" placeholder="Meeting Date">
            </div>

            <div class="form-group">
                <label for="time">Time <span class="text-danger">*</span></label>
                <input type="time" class="form-control" name="time" placeholder="Meeting Time">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
@endsection