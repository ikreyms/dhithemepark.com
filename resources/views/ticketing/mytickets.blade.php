@extends('layouts.master')
@section('title')
    <title>My tickets</title>
@endsection
@section('content')
    <ol class="breadcrumb bg-light">
        <li class="pr-2"><a href="/">Home</a> /</li>
        <li class="pr-2"><a href="/ticketing">Ticketing</a> /</li>
        <li class="active">My tickets</li>
    </ol>
    <h2>My tickets.</h2>
    <hr>
    @if($ticketings->count() > 0)
    <div class="card" style="width: 100%;">
        <div class="card-header">
            <h4 class="text-center">Customer</h4>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item text-center">{{ $customer->name }} ({{ $customer->nid }}) Contact: {{ $customer->phone }}</li>
        </ul>
    </div>
    <table class="table table-striped table-hover table-bordered mt-3 table-responsive-sm">
        <thead>
            <th>Tkt ref.</th>
            <th>Date</th>
            <th>Activity</th>
            <th>No. of tickets</th>
        </thead>
        <tbody>
        @foreach($ticketings as $ticketing)
            <tr>
                <td>000{{ $ticketing->id }}</td>
                <td>{{ $ticketing->tick_date }}</td>
                <td>{{ $ticketing->activity->name }}</td>
                <td>{{ $ticketing->no_of_ticks }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
    <div>You have no purchased tickets.</div>
    @endif
@endsection