@extends('layouts.master')
@section('title')
    <title>Events</title>
@endsection
@section('content')
    <ol class="breadcrumb bg-light">
        <li class="pr-2"><a href="/">Home</a> /</li>
        <li class="active">Events</li>
    </ol>
    <h2>Events</h2>
    <hr>
    <a class="btn btn-primary mb-2" href="/event/create">Add event</a>
    @if($events->count() > 0)
        <table class="table table-striped table-bordered table-hover table-responsive-sm">
            <thead>
                <th>Date</th>
                <th>Title</th>
                <th>Comments</th>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td><a href="/event/{{$event->id}}/edit">{{$event->date}}</a></td>
                        <td>{{$event->title}}</td>
                        <td>{{$event->comment}}</td>
                        <td><a href="/event/{{$event->id}}/edit" class="btn btn-secondary btn-sm">Edit</a></td>
                        <td>
                            <div class="form-group">
                                <form role="form" class="form" method="POST" action="{{ url('/event/'.$event->id) }}">
                                    <input type="hidden" name="_method" value="delete">
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
    <div>No events to show.</div>
    @endif
    {{ $events->links() }}
@endsection