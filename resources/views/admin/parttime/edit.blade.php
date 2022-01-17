@extends('layouts.admin')


@section('title', 'Edit Employee')

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Employees</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection

@section('content')

    <form action="{{ route('part-time.update', $employee->id) }}" method="post" enctype="multipart/form-data">
        @csrf


        @include('admin.partTime._form', [
            'button' => 'Update'
        ])
    </form>

@endsection
