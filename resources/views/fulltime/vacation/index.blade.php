@extends('layouts.admin')

@section('title')
    @if(\Illuminate\Support\Facades\Auth::user()->user_type =='fulltime')
    Vacation <a href="{{ route('vacation.create') }}">Create</a>
    @endif
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
            <th>resone</th>
            <th>Status</th>
            <th>Adding date</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($vacations as $vacation)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{ $vacation->date }}</td>
                <td>{{ $vacation->reason }}</td>
                <td>{{ $vacation->notes }}</td>
                <td>{{ $vacation->created_at }}</td>
                @if($vacation->notes == "pending")
                <td><a href="{{ route('vacation.destroy', $vacation->id) }}" class="btn btn-sm btn-danger">Delete</a></td>
                @else
                    <td><a href="" class="btn btn-sm btn-danger disabled">Delete</a></td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>


    {{ $vacations->links() }}


@endsection
