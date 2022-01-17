@extends('layouts.admin')


@section('title', 'Add Working Hours')

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Working hours</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@endsection

@section('content')

    <form action="{{ route('workinghours.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        @include('parttime.workedhour._form', [
            'button' => 'Add',
        ])
    </form>

@endsection
