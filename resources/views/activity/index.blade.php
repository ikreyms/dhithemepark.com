@extends('layouts.master')
@section('title')
    <title>Activities</title>
@endsection
@section('content')
    <ol class="breadcrumb bg-light">
        <li class="pr-2"><a href="/">Home</a> /</li>
        <li class="active">Activities</li>
    </ol>
    <h2>Activities</h2>
    <hr>
    <a href="/activity/create" class="btn btn-primary mb-2">Add activity</a>
        @if($activities->count() > 0)
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <th>Activity name</th>
                    <th>Details</th>
                    <th>Price</th>
                </thead>
                <tbody>
                    @foreach($activities as $activity)
                        <tr>
                            <td><a href="/activity/{{ $activity->id }}/edit">{{ $activity->name }}</a></td>
                            <td>{{ $activity->detail }}</td>
                            <td>{{ $activity->price }}</td>
                            <td><a href="/activity/{{ $activity->id }}/edit" class="btn btn-secondary btn-sm">Edit</a></td>
                            <td>
                                <form class="form" role="form" action="{{ url('/activity/'.$activity->id) }}" method="POST">
                                    <input type="hidden" name="_method" value="delete">
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div>No activities to show.</div>
        @endif
        {{ $activities->links() }}
@endsection