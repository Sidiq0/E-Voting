@extends('layouts.adminlte')

@section('page-title', 'Dashboard')
@section('breadcrumb', 'Dashboard')

@section('content')
    <!-- Your custom content goes here -->
    <!-- Your custom content goes here -->
    <div class="row">
        <div class="col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$candidatesCount}}</h3>
                    <p>Kandidat</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-tie"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$userCount}}</h3>
                    <p>Pemilih</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$voteCount}}</h3>
                    <p>Jumlah Suara Terkumpul</p>
                </div>
                <div class="icon">
                    <i class="fas fa-vote-yea"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Perolehan Suara Kandidat</h3>
        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
        </button>
        </div>
        </div>
        <div class="card-body" style="display: block;">
            <div class="chart">
                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 336px;" width="672" height="500" class="chartjs-render-monitor"></canvas>
            </div>
        </div>
        </div>

        <div class="card">
        <div class="card-header border-0">
        <h3 class="card-title">Riwayat Vote</h3>
        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
        </button>
        </div>
        </div>
        <div class="card-body" style="display: block;">
            <div class="table-responsive p-0">
                <div class="d-flex justify-content-end mb-2">
                    <a href="?sort=asc" class="btn btn-sm btn-primary mr-2">Sort Ascending</a>
                    <a href="?sort=desc" class="btn btn-sm btn-primary">Sort Descending</a>
                </div>
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kandidat</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($voteLogs as $index => $voteLog)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $voteLog->candidate->name }}</td>
                            <td>{{ $voteLog->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>

@endsection

@push('scripts')
    <!-- Additional scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js" integrity="sha512-ZwR1/gSZM3ai6vCdI+LVF1zSq/5HznD3ZSTk7kajkaj4D292NLuduDCO1c/NT8Id+jE58KYLKT7hXnbtryGmMg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
$(function () {
            var labels = [];
            var data = [];

            @foreach($candidatesVoteCount as $candidate)
                labels.push('{{ $candidate->name }}');
                data.push({{ $candidate->votes_count }});
            @endforeach

            var barChartCanvas = document.getElementById('barChart').getContext('2d');

            var barChartData = {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Suara',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    borderWidth: 1,
                    data: data
                }]
            };

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true
                    }
                }
            };

            // Initialize the bar chart
            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            });
        });
    </script>


@endpush
