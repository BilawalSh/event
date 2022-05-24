@extends('layout.master ')

@section('content')
<div class="row justify-content-center">
    <h2 class="text-center">All Meetings</h2>
    <div class="card">
        <div class="text-right  p-1"><a class="btn btn-primary" href="{{route('event.create')}}">Add Event</a></div>
        <table class="table table-strip">
            <tr>
                <td>Email</td>
                <td>Subject</td>
                <td>Date</td>
                <td>Time</td>
                <td>Action</td>
            </tr>
            @foreach($events as $event)
            <tr>
                <td> {{$event->email}}</td>
                <td> {{$event->subject}}</td>
                <td> {{$event->date}}</td>
                <td> {{$event->time}}</td>
                <td>
                    <a href="{{route('event.edit', $event->id)}}">Edit</a> |
                    <form action="{{route('event.destroy',$event->id)}}" method="post">
                        @method('delete')

                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    {{-- <a href="{{route('event.destroy', $event->id)}}">Delete</a> --}}
                </td>
            </tr>
            @endforeach
            </th>
        </table>
    </div>
</div>
@endsection