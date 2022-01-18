@extends('layouts.admin')

@section('title')

@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Incomes</li>
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
        @foreach($incomes as $income)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{ $income->created_at }}</td>
                    @if($income->payment_method == "transfer")
                        <td>Bank transfer</td>
                    @else
                        <td>Cheques</td>
                    @endif
                        <td>{{ $income->salary_amount }}</td>
                        <td>{{ $income->tax }}%</td>
                        <td>{{ $income->total_salary }}</td>
                <td><a href="{{ route('fulltime.salary.invoice', $income->id) }}" class="btn btn-sm btn-dark">View Transaction</a></td>


            </tr>
        @endforeach
        </tbody>
    </table>


    {{ $incomes->links() }}


@endsection
