@extends('layouts.adminlte')

@section('page-title', 'Vote')
@section('breadcrumb', 'Vote')

@section('content')
<div class="container">
    <div class="alert alert-warning" role="alert">
        You have already voted!
    </div>
</div>
@endsection

@push('scripts')
@endpush
