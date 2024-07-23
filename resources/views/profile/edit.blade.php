@extends('layouts.adminlte')

@section('page-title', 'Mahasiswa')
@section('breadcrumb', 'Students')

@section('content')
    <!-- Your custom content goes here -->
    <h1>Edit Profile</h1>
    <form method="POST" action="{{ route('profile.update', $user) }}">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $user->name }}">
        <input type="email" name="email" value="{{ $user->email }}">
        <button type="submit">Update</button>
    </form>
@endsection

@push('scripts')
    <!-- Additional scripts -->
@endpush

