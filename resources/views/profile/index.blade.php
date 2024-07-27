@extends('layouts.adminlte')

@section('page-title', 'Profile')
@section('breadcrumb', 'My Profile')
@push('styles')
    <style>
        .dynamic-width-card {
            display: inline-block;
            min-width: 300px; /* Minimum width to ensure it's not too small */
            max-width: 100%;
        }
    </style>
@endpush
@section('content')
    <!-- Your custom content goes here -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="dynamic-width-card">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>My Profile</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editProfileModal">Edit</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('profile.edit')
@endsection

@push('scripts')

@endpush

