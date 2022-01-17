@extends('layouts.admin')


@section('title', 'Create New Full Time Employee')

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Full Time Employees</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@endsection

@section('content')

    <form action="{{ route('full-time.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        @include('admin.fulltime._form', [
            'button' => 'Add',
        ])
    </form>

@endsection
