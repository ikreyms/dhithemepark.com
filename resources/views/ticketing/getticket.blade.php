@extends('layouts.master')
@section('title')
    <title>Get tickets</title>
@endsection
@section('content')
    <ol class="breadcrumb bg-light">
        <li class="pr-2"><a href="/">Home</a> /</li>
        <li class="pr-2"><a href="/ticketing">Ticketing</a> /</li>
        <li class="active">Get tickets</li>
    </ol>
    <h2>Get tickets.</h2>
    <hr>
    <form class="form" role="form" method="POST" action="{{ url('/ticketing/pay') }}">
    {{ csrf_field() }}
        <div class="form-group{{ $errors->has('nid')?'has-error':''}}" style="display:none">
            <label class="control-label"><b>NID</b></label>
            <input type="text" name="nid" class="form-control" value="{{ $nid }}" readonly>
        </div>
        @if($errors->has('nid'))
            <span class="help-block mb-2">
                <strong style="color:red">You must have a room booked to buy tickets.</strong> Click here to <a href="/booking">Book room</a>
            </span> 
        @endif
        <div class="form-group">
            <label class="control-label"><b>Event</b></label>
            <select class="form-control" name="event_id" readonly>
                <option value="{{ $event->id }}" selected>{{ $event->title }}</option>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label"><b>Event date <small>(Ticket valid until the end of the weekend)</small></b></label>
            <input type="text" name="date" class="form-control" value="{{ $event->date }}" readonly>
        </div>
        <div class="form-group {{ $errors->has('act_id')?'has-error':''}}">
            <label class="control-label"><b>Activity</b></label>
            <select class="form-control" name="act_id" id="activitySelect">
                <option disabled selected>--Select activity--</option>
            @foreach($activities as $activity)
                <option value="{{ $activity->id }}">{{ $activity->name }}</option>
            @endforeach
            </select>
            @if($errors->has('act_id'))
            <span class="help-block">
                <strong style="color:red">You must select an activity.</strong>
            </span> 
            @endif
        </div>
        <div class="form-group {{ $errors->has('no_of_tick')?'has-error':''}}">
            <label class="control-label"><b>No. of tickets</b> <small>(max no. of tickets: 10)</small></label>
            <select class="form-control" id="no_of_tickets" name="no_of_tick">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            @if($errors->has('no_of_tick'))
            <span class="help-block">
                <strong style="color:red">{{ $errors->first('no_of_tick') }}</strong>
            </span> 
            @endif
        </div>
        <div class="form-group {{ $errors->has('no_of_tick')?'has-error':''}}">
            <label class="control-label"><b>Price per ticket</b></label>
            <input type="text" id="price_per_ticket" name="price_per_ticket" class="form-control" readonly>
            @if($errors->has('price_per_ticket'))
            <span class="help-block">
                <strong style="color:red">We can view the price once an activity is selected.</strong>
            </span> 
            @endif
        </div>
        <div class="form-group" style="display:none" id="total_div">
            <label class="control-label"><b>Total price</b></label>
            <input type="text" id="total_price" name="total_price" class="form-control" readonly>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Buy tickets">
            <a class="btn btn-light" href="/">Cancel</a>
        </div>
    </form>
    <script>

        let activitySelect = document.getElementById('activitySelect');
        let activityArray = @json($activities);
        
        activitySelect.addEventListener('change',()=>{
            let activityId = activitySelect.value;
            let price_per_ticket = document.getElementById('price_per_ticket');

            price_per_ticket.value = activityArray[activityId-1]['price'];
        });

        let body = document.querySelector('body');
        
        body.addEventListener('click',()=>{
            let no_of_tickets = document.getElementById('no_of_tickets').value;
            let price_per_ticket = document.getElementById('price_per_ticket').value;
            let total_price = document.getElementById('total_price');
            let total_div = document.getElementById('total_div');

            total_price.value = "MVR " + no_of_tickets * price_per_ticket +".00";
            total_div.style.display='block';
            
        });
    </script>
@endsection