@extends('layouts.admin')


@section('title', 'Add Working Hours')

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">vacation</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@endsection

@section('content')

    <form action="{{ route('vacation.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        @include('fulltime.vacation._form', [
            'button' => 'Add',
        ])
    </form>

@endsection
