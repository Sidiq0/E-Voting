@extends('layouts.adminlte')

@section('page-title', 'Mahasiswa')
@section('breadcrumb', 'Students')

@section('content')
    <!-- Your custom content goes here -->
    <h1>My Profile</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('profile.edit', $user) }}">Edit</a>
                    </td>
                </tr>
        </tbody>
    </table>
@endsection

@push('scripts')
    <!-- Additional scripts -->
@endpush

