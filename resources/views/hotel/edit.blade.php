@extends('layouts.master')
@section('title')
    <title>Edit hotel</title>
@endsection
@section('content')
    <ol class="breadcrumb bg-light">
        <li class="pr-2"><a href="/">Home</a> /</li>
        <li class="pr-2"><a href="/hotel">Hotels</a> /</li>
        <li class="active">Edit hotel</li>
    </ol>
    <h2>Edit hotel information</h2>
    <hr>
    <form class="form" role="form" method="POST" action="{{ url('/hotel/'.$hotel->id) }}">
        <input type="hidden" name="_method" value="patch">
        {{ csrf_field() }}
        <div class="form-group{{$errors->has('name') ? ' has-error' : '' }}">
            <label class="control-label"><b>Hotel name</b></label>
            <input type="text" class="form-control" name="name" value="{{$hotel->name}}">
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{$errors->first('name')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/hotel" class="btn btn-light">Cancel</a>
        </div>
    </form>
@endsection