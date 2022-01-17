@extends('layouts.admin')

@section('title')
    Employee <a href="{{ route('part-time.create') }}">Create</a>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Part-time Employee</li>
    </ol>
@endsection

@section('content')



    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Specialization</th>
            <th>Hour Price</th>
            <th>Total Hours</th>
            <th>Tax</th>
            <th>Payment Method</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->specialization }}</td>
                <td>{{ $employee->hour_price }}</td>
                <td>{{ $employee->total_hours }}</td>
                <td>{{ $employee->tax }}</td>
                <td>{{ $employee->payment_method }}</td>
                <td><a href="{{ route('part-time.edit', $employee->user_id) }}" class="btn btn-sm btn-dark">Edit</a></td>
                <td><a href="{{ route('part-time.destroy', $employee->user_id) }}" class="btn btn-sm btn-danger">Delete</a></td>

            </tr>
        @endforeach
        </tbody>
    </table>


    {{ $employees->links() }}


@endsection
