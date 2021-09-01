@extends('layouts.master')
@section('title')
    <title>Edit event</title>
@endsection
@section('content')
    <ol class="breadcrumb bg-light">
        <li class="pr-2"><a href="/">Home</a> /</li>
        <li class="pr-2"><a href="/event">Events</a> /</li>
        <li class="active">Edit event</li>
    </ol>
    <h2>Edit event details.</h2>
    <hr>
    <form class="form" role="form" method="POST" action="{{ url('/event/'.$event->id) }}">
        <input type="hidden" name="_method" value="patch">
        {{ csrf_field() }}
        <div class="form-group{{$errors->has('date') ? ' has-error' : '' }}">
            <label class="control-label"><b>Date</b></label>
            <input type="date" class="form-control" name="date" value="{{$event->date}}">
            @if ($errors->has('date'))
                <span class="help-block">
                    <strong>{{$errors->first('date')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{$errors->has('title') ? ' has-error' : '' }}">
            <label class="control-label"><b>Title</b></label>
            <input type="text" class="form-control" name="title" value="{{$event->title}}">
            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{$errors->first('title')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{$errors->has('comment') ? ' has-error' : '' }}">
            <label class="control-label"><b>Comments</b></label>
            <input type="text" class="form-control" name="comment" value="{{$event->comment}}">
            @if ($errors->has('comment'))
                <span class="help-block">
                    <strong>{{$errors->first('comment')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update">
            <a href="/event" class="btn btn-light">Cancel</a>
        </div>
    </form>
@endsection