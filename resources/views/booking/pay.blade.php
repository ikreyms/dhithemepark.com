@extends('layouts.master')
@section('title')
    <title>Book room</title>
@endsection
@section('content')
    <ol class="breadcrumb bg-light">
        <li class="pr-2"><a href="/">Home</a> /</li>
        <li class="pr-2"><a href="/booking">Bookings</a> /</li>
        <li class="active">Book room</li>
    </ol>
    <h2>Booking details.</h2>
    <p>Please Verify the following details before proceeding.<br>Note that once bookings are made it cannot be cancelled.</p>
    @if($errors->has('roomId'))
            <div class="well">
                <p><span style="color:red;font-weight:bold">Room already booked.</span> Return to <a href="/booking/rooms/pay/mybookings/">My bookings</a>.</p>
            </div>
        @endif
    <hr>
    <form class="form" role="form" method="POST" action="{{ url('booking/mybookings/') }}">
        {{ csrf_field() }}
        <h4>Customer details</h3>
        <div class="form-group">
            <label class="control-label control-label-sm"><b>NID</b></label>
            <input class="form-control form-control-sm" type="text" name="nid" value="{{ $customer->nid }}" readonly>
        </div>
        <div class="form-group">
            <label class="control-label control-label-sm"><b>Name</b></label>
            <input class="form-control form-control-sm" type="text" name="name" value="{{ $customer->name }}" readonly>
        </div>
        <div class="form-group">
            <label class="control-label control-label-sm"><b>Contact no.</b></label>
            <input class="form-control form-control-sm" type="text" name="phone" value="{{ $customer->phone }}" readonly>
        </div>
        <h4>Room details</h3>
        <div></div>
        <div style="display: none"class="form-group">
            <input class="form-control form-control-sm" type="text" name="roomId" value="{{ $room->id }}">
        </div>
        <div class="form-group">
            <label class="control-label control-label-sm"><b>Hotel</b></label>
            <input class="form-control form-control-sm" type="text" name="hotel_id" value="{{ $room->hotel->name }}" readonly>
        </div>
        <div class="form-group">
            <label class="control-label control-label-sm"><b>Room no.</b></label>
            <input class="form-control form-control-sm" type="text" name="roomno" value="{{ $room->roomno }}" readonly>
        </div>
        <div class="form-group">
            <label class="control-label control-label-sm"><b>Room type</b></label>
            <input class="form-control form-control-sm" type="text" name="type" value="{{ $room->type }}" readonly>
        </div>
        <div class="form-group">
            <label class="control-label control-label-sm"><b>Price</b></label>
            <input class="form-control form-control-sm" type="text" name="price" value="MVR {{ $room->price }}.00 per day" readonly>
        </div>
        <h4>Event details</h4>
        <div class="form-group">
            <label class="control-label control-label-sm"><b>Event title</b></label>
            <input class="form-control form-control-sm" type="text" name="title" value="{{ $event->title }}" readonly>
        </div>
        <div class="form-group">
            <label class="control-label control-label-sm"><b>Event date</b></label>
            <input class="form-control form-control-sm" type="date" name="date" value="{{ $event->date }}" readonly>
        </div>
        <br>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Pay and Continue">
            <a href="/booking" class="btn btn-light">Cancel</a>
        </div>

    </form>
@endsection