@extends('layouts.master')
@section('title')
    <title>My bookings</title>
@endsection
@section('content')
    <ol class="breadcrumb bg-light">
        <li class="pr-2"><a href="/">Home</a> /</li>
        <li class="pr-2"><a href="/booking">Bookings</a> /</li>
        <li class="active">My bookings</li>
    </ol>
    <h2>My Bookings.</h2>
    <hr>
    @if($bookings->count() >0)
    <div class="card" style="width: 100%;">
        <div class="card-header">
            <h4 class="text-center">Customer</h4>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item text-center">{{ $customer->name }} ({{ $customer->nid }}) Contact: {{ $customer->phone }}</li>
        </ul>
    </div>

    <table class="table table-striped table-hover table-bordered mt-3 table-responsive-sm">
        <thead>
            <th>Booking ref.</th>
            <th>Hotel</th>
            <th>Room no.</th>
            <th>Room type</th>
            <th>Price</th>
            <th>Event</th>
            <th>Date</th>
        </thead>
        <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td>000{{ $booking->id }}</td>
                <td>{{ $room->hotel->name }}</td>
                <td>{{ $room->roomno }}</td>
                <td>{{ $room->type }}</td>
                <td>{{ $room->price }}</td>
                <td>{{ $event->title }}</td>
                <td>{{ $event->date }}</td>
                <td><a class="btn btn-outline-primary" href="/ticketing/event/{{ $event->id }}">Get tickets</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
    <div>You don't have any bookings.</div>
    @endif
@endsection