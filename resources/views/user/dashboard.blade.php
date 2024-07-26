@extends('layouts.adminlte')

@section('page-title', 'Vote')
@section('breadcrumb', 'Vote')

@section('content')
<h1>Choose Your Candidate</h1>
<ul>
    @foreach ($candidates as $candidate)
        <li>
            <img src="{{ asset('storage/' . $candidate->image_path) }}" alt="{{ $candidate->name }}" width="100">
            <h2>{{ $candidate->name }}</h2>
            <p>Vote count: {{ $candidate->votes_count }}</p>
            <form action="{{ route('vote.store') }}" method="POST">
                @csrf
                <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                <button type="submit">Vote</button>
            </form>
        </li>
    @endforeach
</ul>

@endsection

@push('scripts')
    <!-- Additional scripts -->
@endpush
