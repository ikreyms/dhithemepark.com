@extends('layouts.master')
@section('title')
    <title>Add an event</title>
@endsection
@section('content')
    <ol class="breadcrumb bg-light">
        <li class="pr-2"><a href="/">Home</a> /</li>
        <li class="pr-2"><a href="/event">Events</a> /</li>
        <li class="active">Add new event</li>
    </ol>
    <h2>Add a new event.</h2>
    <hr>
    <form class="form" role="form" method="POST" action="{{ url('/event/') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('date')? 'has-error' : '' }}">
            <label for="date" class="control-label"><b>Date</b></label>
            <input type="date" name="date" class="form-control" value="{{ old('date') }}">
            @if($errors->has('date'))
                <span class="help-block">
                    <strong>{{ $errors->first('date') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('title')? 'has-error' : '' }}">
            <label for="title" class="control-label"><b>Title</b></label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
            @if($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('comment')? 'has-error' : '' }}">
            <label for="comment" class="control-label"><b>Comments</b></label>
            <input type="text" name="comment" class="form-control" value="{{ old('comment') }}">
            @if($errors->has('comment'))
                <span class="help-block">
                    <strong>{{ $errors->first('comment') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add</button>
            <a href="/event" class="btn btn-light">Cancel</a>
        </div>
    </form>
@endsection