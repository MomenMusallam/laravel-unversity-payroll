@extends('layouts.admin')


@section('title', 'Edit Profile')

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Profile</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection

@section('content')

    <form action="{{ route('full-time.updateProfile') }}" method="post" enctype="multipart/form-data">
        @csrf


        @include('fullTime._form', [
            'button' => 'Update'
        ])
    </form>

@endsection
