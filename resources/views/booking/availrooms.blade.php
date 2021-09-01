@extends('layouts.master')
@section('title')
    <title>Available rooms</title>
@endsection
@section('content')
    <ol class="breadcrumb bg-light">
        <li class="pr-2"><a href="/">Home</a> /</li>
        <li class="pr-2"><a href="/booking">Bookings</a> /</li>
        <li class="active">Available rooms</li>
    </ol>
    <h2>Available rooms.</h2>
    <p>The rooms can only be booked for a maximaum of 2 days.<br>Room will be booked from Event start date 7am to next day 9pm.</p>
    <hr>
    @if($rooms->count() > 0)
    <table class="table table-bordered table-striped table-hover table-responsive-sm">
        <thead>
            <th>Hotel Name</th>
            <th>Room no.</th>
            <th>Room type</th>
            <th>Price</th>
        </thead>
        <tbody>
            @foreach($rooms as $room)
                <tr>
                    <td>{{ $room->hotel->name}}</td>
                    <td>{{ $room->roomno }}</td>
                    <td>{{ $room->type }}</td>
                    <td>{{ $room->price }}</td>
                    <td><a class="btn btn-outline-primary btn-sm" href="/booking/rooms/{{ $room->id }}/pay/">Book</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div>Sorry. No rooms are currently available.</div>
    @endif
@endsection