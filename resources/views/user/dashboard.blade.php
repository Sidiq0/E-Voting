@extends('layouts.adminlte')

@section('page-title', 'Dashboard')
@section('breadcrumb', 'Dashboard')

@section('content')
    <!-- Your custom content goes here -->
    <p>USER.</p>
    <a href="{{ route('vote') }}">Vote</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection

@push('scripts')
    <!-- Additional scripts -->
@endpush
