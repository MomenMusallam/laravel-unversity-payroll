@extends('layouts.admin')

@section('title')
    Employee <a href="{{ route('full-time.create') }}">Create</a>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Full-time Employee</li>
    </ol>
@endsection

@section('content')



    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Specialization</th>
            <th>Salary</th>
            <th>Num Vacations</th>
            <th>Tax</th>
            <th>Payment Method</th>
            <th>Vacations</th>
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
                <td>{{ $employee->salary_amount }}</td>
                <td>{{ $employee->number_of_vacations }}</td>
                <td>{{ $employee->tax }}</td>

            @if($employee->payment_method== "transfer")

                    <td>Bank transfer</td>
                @else
                    <td>Cheques</td>
                @endif
                <td><a href="{{ route('admin.vacation.history', $employee->user_id) }}" class="btn btn-sm btn-success">Vacations</a></td>

                <td><a href="{{ route('full-time.edit', $employee->user_id) }}" class="btn btn-sm btn-dark">Edit</a></td>
                <td><a href="{{ route('full-time.destroy', $employee->user_id) }}" class="btn btn-sm btn-danger">Delete</a></td>

            </tr>
        @endforeach
        </tbody>
    </table>


    {{ $employees->links() }}


@endsection
