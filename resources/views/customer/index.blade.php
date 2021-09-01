@extends('layouts.master')
@section('title')
    <title>Customers</title>
@endsection
@section('content')
    <ol class="breadcrumb bg-light">
        <li class="pr-2"><a href="/">Home</a> /</li>
        <li class="active">Customers</li>
    </ol>
    <h2>Customers</h2>
    <hr>
    <a href="/customer/create" class="btn btn-primary mb-2">Register</a>
    @if($customers->count() > 0)
    <table class="table table-bordered table-striped table-hover table-responsive-sm">
        <thead>
            <th>NID</th>
            <th>Name</th>
            <th>Phone</th>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td>
                    <a href="/customer/{{$customer->id}}/edit">{{$customer->nid}}</a>
                </td>
                <td>
                    <a href="/customer/{{$customer->id}}/edit">{{$customer->name}}</a>
                </td>
                <td>
                    <a href="/customer/{{$customer->id}}/edit">{{$customer->phone}}</a>
                </td>
                <td>
                    <a href="/customer/{{$customer->id}}/edit" class="btn btn-secondary btn-sm">Edit</a>
                </td>
                <td>
                    <div class="form-group">
                        <form class="form" role="form" method="POST" action="{{ url('/customer/'.$customer->id) }}">
                            <input type="hidden" name="_method" value="delete">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div>No customers registered.</div>
    @endif
    {{ $customers->links() }}
@endsection