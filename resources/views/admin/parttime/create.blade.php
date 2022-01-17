@extends('layouts.admin')


@section('title', 'Create New Part Time Employee')

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Part Time Employees</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@endsection

@section('content')

    <form action="{{ route('part-time.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        @include('admin.parttime._form', [
            'button' => 'Add',
        ])
    </form>

@endsection
