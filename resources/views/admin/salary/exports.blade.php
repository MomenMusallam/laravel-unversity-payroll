@extends('layouts.admin')

@section('title')

    <a href="{{ route('salary.index') }}" class="btn btn-sm btn-dark">Pay Salaries</a>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">exports</li>
    </ol>
@endsection

@section('content')



    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th>Date</th>
            <th>Name</th>
            <th>Payment Method</th>
            <th>salary_amount</th>
            <th>tax</th>
            <th>total_salary</th>
            <th>View Transaction</th>
        </tr>
        </thead>
        <tbody>
        @foreach($exports as $export)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{ $export->user->name }}</td>
                <td>{{ $export->created_at }}</td>
                    @if($export->payment_method == "transfer")
                        <td>Bank transfer</td>
                    @else
                        <td>Cheques</td>
                    @endif
                        <td>{{ $export->salary_amount }}</td>
                        <td>{{ $export->tax }}%</td>
                        <td>{{ $export->total_salary }}</td>
                        <th>View Transaction</th>


            </tr>
        @endforeach
        </tbody>
    </table>


    {{ $exports->links() }}


@endsection
