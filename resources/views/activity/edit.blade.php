@extends('layouts.master')
@section('title')
    <title>Edit activity</title>
@endsection
@section('content')
    <ol class="breadcrumb bg-light">
        <li class="pr-2"><a href="/">Home</a> /</li>
        <li class="pr-2"><a href="/activity">activities</a> /</li>
        <li class="active">Edit activity</li>
    </ol>
    <h2>Edit activity details.</h2>
    <hr>
    <form class="form" role="form" method="POST" action="{{ url('/activity/'.$activity->id) }}">
        <input type="hidden" name="_method" value="patch">
        {{ csrf_field() }}
        <div class="form-group{{$errors->has('name') ? ' has-error' : '' }}">
            <label class="control-label"><b>Activity name</b></label>
            <input type="text" class="form-control" name="name" value="{{$activity->name}}">
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{$errors->first('name')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{$errors->has('detail') ? ' has-error' : '' }}">
            <label class="control-label"><b>Details</b></label>
            <input type="text" class="form-control" name="detail" value="{{$activity->detail}}">
            @if ($errors->has('detail'))
                <span class="help-block">
                    <strong>{{$errors->first('detail')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{$errors->has('price') ? ' has-error' : '' }}">
            <label class="control-label"><b>Price</b></label>
            <input type="text" class="form-control" name="price" value="{{$activity->price}}">
            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{$errors->first('price')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update">
            <a href="/activity" class="btn btn-light">Cancel</a>
        </div>
    </form>
@endsection