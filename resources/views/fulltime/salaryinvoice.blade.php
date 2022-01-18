@extends('layouts.admin')

@section('title')
    
@endsection

@section('breadcrumb')
{{--    <ol class="breadcrumb float-sm-right">--}}
{{--        <li class="breadcrumb-item"><a href="#">Home</a></li>--}}

{{--    </ol>--}}
@endsection

@section('dashboard')
    <div class="card">
        <div class="card-header">
            @if($salary->payment_method == "transfer")

                <h3 class="card-title">Bank transfer invoice</h3>
            @else
                <h3 class="card-title">Cheques invoice</h3>
            @endif

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            invoice ID : {{$salary->id}}<br>
            invoice Date : {{$salary->created_at}}<br>
            Employee Name : {{$salary->user->name}}<br>
            Employee Type : {{$salary->user->user_type}} Employee<br>
            Payment Method :  @if($salary->payment_method == "transfer")

                Bank transfer
            @else
               Cheques
            @endif<br>
            Salary Amount : {{$salary->salary_amount}}<br>
            Tax : {{$salary->tax}}%<br>

        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            Total Salary is : {{$salary->total_salary}}<br>
        </div>
        <!-- /.card-footer-->
    </div>
@endsection
