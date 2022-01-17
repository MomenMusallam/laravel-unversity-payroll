@extends('layouts.admin')

@section('title')
    @if($employee->user_type == 'fulltime')
        <a>Name : {{$employee->name}}   </a><br>
        <a>Type : Full Time</a><br>
        <a>Email: {{$employee->email}}</a><br>
        <a>Salary : {{$fulltime->salary_amount}}</a><br>
        <a>Tax : {{$fulltime->tax}}</a><br>
        <br>
    <a href="{{ route('full-time.edit' , $employee->id) }}" class="btn btn-sm btn-dark">View All Employee Data</a>


    @elseif($employee->user_type == 'parttime')
        <a>Name : {{$employee->name}}   </a><br>
        <a>Type : Full Time</a><br>
        <a>Email: {{$employee->email}}</a><br>
        <a>Salary : {{$parttime->hour_price}}</a><br>
        <a>Tax : {{$parttime->tax}}</a><br>
        <br>
        <a href="{{ route('part-time.edit' , $employee->id) }}" class="btn btn-sm btn-dark">View All Employee Data</a>
    @endif
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Salaries</li>
        <li class="breadcrumb-item active">{{$employee->name}}</li>
    </ol>
@endsection

@section('content')



    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th>Date</th>
            <th>Payment Method</th>
            <th>salary_amount</th>
            <th>tax</th>
            <th>total_salary</th>
            <th>View Transaction</th>
        </tr>
        </thead>
        <tbody>
        @foreach($salaries as $salary)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{ $salary->created_at }}</td>
                @if($employee->user_type == 'fulltime')
                    @if($employee->fullTimeEmployee->payment_method == "transfer")

                        <td>Bank transfer</td>
                    @else
                        <td>Cheques</td>
                        @endif
                        <td>{{ $salary->salary_amount }}</td>
                        <td>{{ $salary->tax }}%</td>
                        <td>{{ $salary->total_salary }}</td>
                        <th>View Transaction</th>
                @elseif($employee->user_type == 'parttime')
{{--                    <td>{{ $user->partTimeEmployee->hour_price }}  </td>--}}
                    @if($employee->partTimeEmployee->payment_method == "transfer")
                        <td>Bank transfer</td>
                    @else
                        <td>Cheques</td>
                    @endif

                    <td>{{ $salary->salary_amount }}</td>
                    <td>{{ $salary->tax }}%</td>
                    <td>{{ $salary->total_salary }}</td>
                    <th>View Transaction</th>

                @endif

            </tr>
        @endforeach
        </tbody>
    </table>


{{--    {{ $salaries->links() }}--}}


@endsection
