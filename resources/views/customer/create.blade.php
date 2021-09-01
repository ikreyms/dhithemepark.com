@extends('layouts.master')
@section('title')
    <title>Register a customer</title>
@endsection
@section('content')
    <ol class="breadcrumb bg-light">
        <li class="pr-2"><a href="/">Home</a> /</li>
        <li class="pr-2"><a href="/customer">Customers</a> /</li>
        <li class="active">Register</li>
    </ol>
    <h2>Register customer</h2>
    <hr>
    <form class="form" role="form" method="POST" action="{{ url('/customer') }}">
        {{ csrf_field() }}
        <div class="form-group {{ $errors->has('nid')?'has-error':''}}">
            <label class="control-label"><b>NID</b></label>
            <input type="text" class="form-control" name="nid" value="{{ old('nid') }}">
            @if ($errors->has('nid'))
            <span class="help-block">
                <strong>{{ $errors->first('nid') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('name')?'has-error':''}}">
            <label class="control-label"><b>Name</b></label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('phone')?'has-error':''}}">
            <label class="control-label"><b>Phone</b></label>
            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
            @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Register</button>
            <a href="/customer" class="btn btn-light">Cancel</a>
        </div>
    </form>
@endsection