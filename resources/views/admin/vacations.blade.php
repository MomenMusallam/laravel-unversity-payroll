@extends('layouts.admin')

@section('title')

@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Vacations</li>
    </ol>
@endsection

@section('content')



    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th>Date</th>
            <th>Name</th>
            <th>vacation in</th>
            <th>reason</th>
            <th>Vacation Amount </th>
            <th>Approve</th>
        </tr>
        </thead>
        <tbody>
        @foreach($vacations as $vacation)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{ $vacation->created_at }}</td>
                <td>{{ $vacation->name }}</td>
                <td>{{ $vacation->date }}</td>
                <td>{{ $vacation->reason }}</td>
                <td>{{ $vacation->vacations_amounts}}%</td>
                <td><a href="{{ route('admin.vacation.approve', $vacation->id)}}" class="btn btn-sm btn-success">Approve</a></td>


            </tr>
        @endforeach
        </tbody>
    </table>


    {{ $vacations->links() }}


@endsection
