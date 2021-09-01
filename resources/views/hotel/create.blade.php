@extends('layouts.master')
@section('title')
    <title>Add a Hotel</title>
@endsection
@section('content')
    <ol class="breadcrumb bg-light">
        <li class="pr-2"><a href="/">Home</a> /</li>
        <li class="pr-2"><a href="/hotel">Hotels</a> /</li>
        <li class="active">Add new hotel</li>
    </ol>
    <h2>Add a new hotel.</h2>
    <hr>
    <form class="form" role="form" method="POST" action="{{ url('/hotel') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('name')?'has-error':''}}">
            <label class="control-label"><b>Hotel name</b></label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}">
            @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add</button>
            <a href="/customer" class="btn btn-light">Cancel</a>
        </div>
    </form>
@endsection
