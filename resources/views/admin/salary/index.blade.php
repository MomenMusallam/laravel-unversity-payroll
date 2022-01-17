@extends('layouts.admin')

@section('title')
    <a href="{{ route('payAll.index') }}" class="btn btn-sm btn-success">Pay The Monthly salary For All Employees</a>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Salaries</li>
    </ol>
@endsection

@section('content')



    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Type</th>
            <th>Salary</th>
            <th>Payment Method</th>
            <th>Tax</th>
            <th>Pay the monthly salary</th>
            <th>History</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{ $user->name }}</td>
                @if($user->user_type == 'fulltime')
                    <td>Full Time</td>
                    <td>{{ $user->fullTimeEmployee->salary_amount }}</td>
                @if($user->fullTimeEmployee->payment_method == "transfer")

                        <td>Bank transfer</td>
                    @else
                        <td>Cheques</td>
                        @endif

                <td>{{ $user->fullTimeEmployee->tax }}%</td>
                @elseif($user->user_type == 'parttime')
                    <td>Part Time</td>
                    <td>{{ $user->partTimeEmployee->hour_price }}  </td>
                    @if($user->partTimeEmployee->payment_method == "transfer")

                        <td>Bank transfer</td>
                    @else
                        <td>Cheques</td>
                    @endif
                    <td>{{ $user->partTimeEmployee->tax }}%</td>
                @endif
                <td><a href="{{ route('pays.index', $user->id) }}" class="btn btn-sm btn-dark">Pay the monthly salary</a></td>
                <td><a href="{{ route('history.view', $user->id)}}" class="btn btn-sm btn-secondary">History</a></td>

            </tr>
        @endforeach
        </tbody>
    </table>


    {{ $users->links() }}


@endsection
