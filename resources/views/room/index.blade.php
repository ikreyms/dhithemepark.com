@extends('layouts.master')
@section('title')
    <title>Rooms</title>
@endsection
@section('content')
    <ol class="breadcrumb bg-light">
        <li class="pr-2"><a href="/">Home</a> /</li>
        <li class="active">Rooms</li>
    </ol>
    <h2>Rooms</h2>
    <hr>
    <a href="/room/create" class="btn btn-primary mb-2">Add room</a>
    @if($rooms->count() > 0)
    <table class="table table-bordered table-striped table-hover table-responsive-sm">
        <thead>
            <th>Hotel Name</th>
            <th>Room no.</th>
            <th>Room type</th>
            <th>Status</th>
            <th>Price</th>
        </thead>
        <tbody>
            @foreach($rooms as $room)
                <tr>
                    <td>
                        <a href="/room/{{ $room->id }}/edit">{{ $room->hotel->name}}</a>
                    </td>
                    <td>
                        <a href="/room/{{ $room->id }}/edit">{{ $room->roomno }}</a>
                    </td>
                    <td>
                        <a href="/room/{{ $room->id }}/edit">{{ $room->type }}</a>
                    </td>
                    <td>
                        <a href="/room/{{ $room->id }}/edit">{{ $room->status }}</a>
                    </td>
                    <td>
                        <a href="/room/{{ $room->id }}/edit">{{ $room->price }}</a>
                    </td>
                    <td>
                        <a href="/room/{{ $room->id }}/edit" class="btn btn-secondary btn-sm">Edit</a>
                    </td>
                    <td>
                    @if($room->status == 'Booked')
                    <div></div>
                    @else
                        <div class="form-group">
                            <form role="form" class="form" method="POST" action="{{ url('/room/'.$room->id) }}">
                                <input type="hidden" name="_method" value="delete">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                            </form>
                        </div>
                    @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div>No rooms to show.</div>
    @endif
    {{ $rooms->links() }}
@endsection