@extends('layouts.master')
@section('title')
    <title>Choose event</title>
@endsection
@section('content')
    <ol class="breadcrumb bg-light">
        <li class="pr-2"><a href="/">Home</a> /</li>
        <li class="pr-2"><a href="/booking">Bookings</a> /</li>
        <li class="active">Choose event</li>
    </ol>
    <h2>Choose event.</h2>
    <hr>
    @if($events->count() > 0)
    <p>For what event do you want to make bookings for?</p>
    <div class="row d-flex justify-content-around">
    @foreach($events as $event)
        <div class="card my-2 border border-secondary" style="width: 22rem;">
            <div class="card-body">
                <h4 class="card-title">{{ $event->title }}</h4>
                <p>{{ $event->comment }}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Event date: {{ $event->date }}</li>
            </ul>
            <div class="card-body">
                <a href="/booking/event/{{ $event->id }}/bookroom/" class="btn btn-outline-primary">Select</a>
            </div>
        </div>
    @endforeach
    </div>
    @else
    <div>No events scheduled.</div>
    @endif
@endsection
