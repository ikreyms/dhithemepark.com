@extends('layouts.master')
@section('title')
    <title>Add a room</title>
@endsection
@section('content')
    <ol class="breadcrumb bg-light">
        <li class="pr-2"><a href="/">Home</a> /</li>
        <li class="pr-2"><a href="/room">Rooms</a> /</li>
        <li class="active">Add new room</li>
    </ol>
    <h2>Add a new room.</h2>
    <hr>
    <form class="form" role="form" method="POST" action="{{ url('/room') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('hotel_id')?'has-error':''}}">
            <label class="control-label"><b>Hotel name</b></label>
                <select name="hotel_id" class="form-control">
                        <option disabled selected>--Select hotel--</option>
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                    @endforeach
                </select>
            @if($errors->has('hotel_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('hotel_id') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('roomno')?'has-error':''}}">
            <label class="control-label"><b>Room no.</b></label>
            <input type="text" name="roomno" class="form-control" value="{{ old('roomno') }}">
            @if($errors->has('roomno'))
                <span class="help-block">
                    <strong>{{ $errors->first('roomno') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('type')?'has-error':''}}">
            <label class="control-label"><b>Room type</b></label>
            <input type="text" name="type" class="form-control" value="{{ old('type') }}" list="RoomTypes">
            <datalist id="RoomTypes">
                @if($types->count() > 0)
                    @foreach($types as $type)
                        <option value="{{ $type }}">
                    @endforeach
                @endif
            </datalist>
            @if($errors->has('type'))
                <span class="help-block">
                    <strong>{{ $errors->first('type') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('price')?'has-error':''}}">
            <label class="control-label"><b>Price</b></label>
            <input type="text" name="price" class="form-control" value="{{ old('price') }}">
            @if($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add</button>
            <a href="/room" class="btn btn-light">Cancel</a>
        </div>
    </form>
@endsection