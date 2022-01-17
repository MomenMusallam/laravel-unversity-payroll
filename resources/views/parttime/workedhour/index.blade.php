@extends('layouts.admin')

@section('title')
    Hours <a href="{{ route('workinghours.create') }}">Create</a>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Working Hours </li>
    </ol>
@endsection

@section('content')



    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th>Date</th>
            <th>Hours Amount</th>
            <th>Status</th>
            <th>Adding date</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{ $task->date }}</td>
                <td>{{ $task->hours_amounts }}</td>
                <td>{{ $task->notes }}</td>
                <td>{{ $task->created_at }}</td>
                @if($task->notes == "not paid")
                <td><a href="{{ route('workinghours.destroy', $task->id) }}" class="btn btn-sm btn-danger">Delete</a></td>
                @else
                    <td><a href="" class="btn btn-sm btn-danger disabled">Delete</a></td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>


    {{ $tasks->links() }}


@endsection
