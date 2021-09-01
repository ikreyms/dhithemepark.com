@extends('layouts.master')
@section('title')
    <title>View bookings</title>
@endsection
@section('content')
    <ol class="breadcrumb bg-light">
        <li class="pr-2"><a href="/">Home</a> /</li>
        <li class="active">View bookings</li>
    </ol>
    <div class="jumbotron p-3">
        <p >Enter National ID card number to view bookings of the customer.</p>
        <form class="form" role="form" method="POST" action="{{ url('/viewbookings') }}">
        {{ csrf_field() }}
            <div class="form-group{{ $errors->has('nid')?'has-error':''}}">
                <label for="nid" class="control-label"><b>NID</b></label>
                <input class="form-control" name="nid" type="text" autocomplete="off">
                @if ($errors->has('nid'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nid') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Check">
            </div>
        </form>
    </div>
    @isset($bookings)
    @if($bookings->count() > 0)
    <h4>Bookings</h4>
    <table class="table table-striped table-hover table-bordered mb-3 table-responsive-sm">
        <thead>
            <th>Booking ref.</th>
            <th>NID</th>
            <th>Booking date</th>
            <th>Amount paid</th>
        </thead>
        <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td>000{{ $booking->id }}</td>
                <td>{{ $booking->cus_id }}</td>
                <td>{{ $booking->book_date }}</td>
                <td>{{ $booking->price }}.00</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
    <div>No bookings for this customer.</div>
    @endif
    <hr>
    @endisset
    @isset($ticketings)
    @if($ticketings->count() > 0)
    <h4>Tickets</h4>
    <table class="table table-striped table-hover table-bordered table-responsive-sm">
        <thead>
            <th>Tkt ref.</th>
            <th>Date</th>
            <th>Activity</th>
            <th>No. of tickets</th>
        </thead>
        <tbody>
        @foreach($ticketings as $ticketing)
            <tr>
                <td>000{{ $ticketing->id }}</td>
                <td>{{ $ticketing->tick_date }}</td>
                <td>{{ $ticketing->activity->name }}</td>
                <td>{{ $ticketing->no_of_ticks }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
    <div>No ticket purchases made by this customer.</div>
    @endif
    @endisset
@endsection