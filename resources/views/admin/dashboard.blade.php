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
                    <h3>44</h3>
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
                    <h3>44</h3>
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
                    <h3>440</h3>
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
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kandidat</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1; // Initialize a counter for sequential IDs
                        @endphp
                            <tr>
                                <td>1</td>
                                <td>Saya</td>
                                <td>2024-07-20 16:00:45</td>
                            </tr>
                            @php
                                $counter++; // Increment counter for next iteration
                            @endphp
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
        // Sample data for demonstration
        var areaChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Digital Goods',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                borderWidth: 1,
                data: [28, 48, 40, 19, 86, 27, 90]
            },
            {
                label: 'Electronics',
                backgroundColor: 'rgba(210, 214, 222, 1)',
                borderColor: 'rgba(210, 214, 222, 1)',
                borderWidth: 1,
                data: [65, 59, 80, 81, 56, 55, 40]
            }]
        };

        var barChartCanvas = document.getElementById('barChart').getContext('2d');

        var barChartData = {
            labels: areaChartData.labels,
            datasets: areaChartData.datasets.map(function(dataset) {
                return {
                    label: dataset.label,
                    backgroundColor: dataset.backgroundColor,
                    borderColor: dataset.borderColor,
                    borderWidth: dataset.borderWidth,
                    data: dataset.data
                };
            })
        };

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Bar Chart Example'
                }
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
