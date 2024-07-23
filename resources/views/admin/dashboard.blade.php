@extends('layouts.adminlte')

@section('page-title', 'Dashboard')
@section('breadcrumb', 'Dashboard')

@section('content')
    <!-- Your custom content goes here -->
    <!-- Your custom content goes here -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Welcome to Admin Dashboard</h3>
                </div>
                <div class="card-body">
                    <p>Welcome to this beautiful admin panel.</p>
                    <a href="{{ route('vote') }}">Vote</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Additional scripts -->
@endpush


