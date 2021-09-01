@extends('layouts.master')
@section('title')
    <title>Bookings</title>
@endsection
@section('content')
    <ol class="breadcrumb bg-light">
        <li class="pr-2"><a href="/">Home</a> /</li>
        <li class="active">Bookings</li>
    </ol>
    <h2>Bookings</h2>
    <hr>
    <p >Enter National ID card number to continue. You must be registered with us to make bookings.<br>To view your bookings go to <a href="/booking/rooms/pay/mybookings/">My bookings</a></p>
    <form class="form" role="form" method="POST" action="{{ url('/booking/') }}">
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
            <input type="submit" class="btn btn-primary" value="Continue">
        </div>
    </form>
@endsection