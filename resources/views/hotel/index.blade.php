@extends('layouts.master')
@section('title')
    <title>Hotels</title>
@endsection
@section('content')
    <ol class="breadcrumb bg-light">
        <li class="pr-2"><a href="/">Home</a> /</li>
        <li class="active">Hotels</li>
    </ol>
    <h2>Hotels</h2>
    <hr>
    <a href="/hotel/create" class="btn btn-primary mb-2">Add hotel</a>
    @if($hotels->count() > 0)
    <table class="table table-bordered table-striped table-hover table-responsive-sm">
        <thead>
            <th>Hotel name</th>
        </thead>
        <tbody>
            @foreach($hotels as $hotel)
            <tr>
                <td>
                    <a href="hotel/{{$hotel->id}}/edit">{{$hotel->name}}</a>
                </td>
                <td>
                    <a href="hotel/{{$hotel->id}}/edit" class="btn btn-secondary btn-sm">Edit</a>
                </td>
                <td>
                    <div class="form-group">
                        <form class="form" role="form" method="POST" action="{{ url('/hotel/'.$hotel->id) }}"> 
                            <input type="hidden" name="_method" value="delete">
                            {{ csrf_field() }}
                            <input class="btn btn-danger btn-sm" type="submit" value="Delete">
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div>No hotels to show.</div>
    @endif
    {{ $hotels->links() }}
@endsection
