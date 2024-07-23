
@extends('layouts.adminlte')

@section('page-title', 'Mahasiswa')
@section('breadcrumb', 'Students')

@section('content')
    <!-- Your custom content goes here -->
    <h1>Candidate Vote Count</h1>
    <ul>
        @foreach ($candidates as $candidate)
            <li>
                <img src="{{ asset('storage/' . $candidate->image_path) }}" alt="{{ $candidate->name }}" width="100">
                <h2>{{ $candidate->name }}</h2>
                <p>Vote count: {{ $candidate->votes_count }}</p>
            </li>
        @endforeach
    </ul>

@endsection

@push('scripts')
    <!-- Additional scripts -->
@endpush
