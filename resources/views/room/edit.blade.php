@extends('layouts.master')
@section('title')
    <title>Edit room</title>
@endsection
@section('content')
    <ol class="breadcrumb bg-light">
        <li class="pr-2"><a href="/">Home</a> /</li>
        <li class="pr-2"><a href="/hotel">Rooms</a> /</li>
        <li class="active">Edit room</li>
    </ol>
    <h2>Edit room details</h2>
    <hr>
    <form class="form" role="form" method="POST" action="{{ url('/room/'.$room->id) }}">
        <input type="hidden" name="_method" value="patch">
        {{ csrf_field() }}
        <div class="form-group{{$errors->has('hotel_id') ? ' has-error' : '' }}">
            <label class="control-label"><b>Hotel name</b></label>
            <select name="hotel_id" class="form-control">
                @foreach($hotels as $hotel)
                    <option value="{{ $hotel->id }}" @if($room->hotel_id==$hotel->id) selected @endif> {{ $hotel->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('hotel_id'))
                <span class="help-block">
                    <strong>{{$errors->first('hotel_id')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{$errors->has('roomno') ? ' has-error' : '' }}">
            <label class="control-label"><b>Room no.</b></label>
            <input type="text" class="form-control" name="roomno" value="{{$room->roomno}}">
            @if ($errors->has('roomno'))
                <span class="help-block">
                    <strong>{{$errors->first('roomno')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('type') ? 'has-error' : '' }}">
        <label class="control-label"><b>Room type</b></label>
            <input type="text" class="form-control" name="type" value="{{ $room->type }}" list="roomTypes">
            <datalist id="roomTypes">
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
        <div class="form-group{{$errors->has('price') ? ' has-error' : '' }}">
            <label class="control-label"><b>Price</b></label>
            <input type="text" class="form-control" name="price" value="{{$room->price}}">
            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{$errors->first('price')}}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/room" class="btn btn-light">Cancel</a>
        </div>
        
    </form>
@endsection