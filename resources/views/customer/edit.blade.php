@extends('layouts.master')
@section('title')
    <title>Edit customer</title>
@endsection
@section('content')
    <ol class="breadcrumb bg-light">
        <li class="pr-2"><a href="/">Home</a> /</li>
        <li class="pr-2"><a href="/customer">Customers</a> /</li>
        <li class="active">Edit customer</li>
    </ol>
    <h2>Edit customer information</h2>
    <hr>
    <form class="form" role="form" method="POST" action="{{ url('/customer/'.$customer->id) }}">
        <input type="hidden" name="_method" value="patch">
        {{ csrf_field() }}
        <div class="form-group{{$errors->has('nid') ? ' has-error' : '' }}">
            <label class="control-label"><b>NID</b></label>
            <input type="text" class="form-control" name="nid" value="{{$customer->nid}}">
            @if ($errors->has('nid'))
                <span class="help-block">
                    <strong>{{$errors->first('nid')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{$errors->has('name') ? ' has-error' : '' }}">
            <label class="control-label"><b>Name</b></label>
            <input type="text" class="form-control" name="name" value="{{$customer->name}}">
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{$errors->first('name')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{$errors->has('phone') ? ' has-error' : '' }}">
            <label class="control-label"><b>Phone</b></label>
            <input type="text" class="form-control" name="phone" value="{{$customer->phone}}">
            @if ($errors->has('phone'))
                <span class="help-block">
                    <strong>{{$errors->first('phone')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update">
            <a href="/customer" class="btn btn-light">Cancel</a>
        </div>
    </form>
@endsection