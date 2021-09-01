@extends('layouts.master')
@section('title')
    <title>Add an activity</title>
@endsection
@section('content')
    <ol class="breadcrumb bg-light">
        <li class="pr-2"><a href="/">Home</a> /</li>
        <li class="pr-2"><a href="/activity">Activities</a> /</li>
        <li class="active">Add new activity</li>
    </ol>
    <h2>Add a new activity.</h2>
    <hr>
    <form class="form" role="form" method="POST" action="{{ url('/activity/') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('name')? 'has-error' : '' }}">
            <label for="name" class="control-label"><b>Activity name</b></label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @if($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('detail') ? 'has-error' : '' }}">
            <label for="detail" class="control-label"><b>Details</b></label>
            <input type="text" name="detail" class="form-control" value="{{ old('detail') }}">
            @if($errors->has('detail'))
                <span class="help-block">
                    <strong>{{ $errors->first('detail') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('price') ? 'has-error' : '' }}">
            <label for="price" class="control-label"><b>Price</b></label>
            <input type="text" name="price" class="form-control" value="{{ old('price') }}">
            @if($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add</button>
            <a href="/activity" class="btn btn-light">Cancel</a>
        </div>
    </form>
@endsection