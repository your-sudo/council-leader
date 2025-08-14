@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <!-- Header -->
    <header class="header">
        <div style="display: flex; align-items: center; gap: 1rem;">
            <button class="menu-toggle" id="menuToggle">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="header-title">Dashboard</h1>
        </div>
        <div class="header-actions">

        </div>
    </header>

    <!-- Dashboard Content -->
    <div class="dashboard-content">
        <!-- Stats Grid -->
        <div class="stats-grid fade-in">
            <div class="stat-card">
                <div class="stat-header">
                    <div>
                        <div class="stat-title">Total Siswa</div>
                        <div class="stat-value">{{$jumlahuser - 1}}</div>
                        <div class="stat-change positive">Jumlah siswa</div>
                    </div>
                    <div class="stat-icon users">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div>
                        <div class="stat-title">Persentase vote</div>
                        <div class="stat-value">{{$jumlahsudahvote}}%</div>
                        <div class="stat-change positive">Persentase siswa yang sudah voting</div>
                    </div>
                    <div class="stat-icon orders">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div>
                        <div class="stat-title">total siswa sudah vote</div>
                        <div class="stat-value">{{$jumlahsudahvote}}</div>
                        
                    </div>
                    <div class="stat-icon revenue">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div>
                        <div class="stat-title">Paslon unggul sementara</div>

                        
                        <div class="stat-value">Paslon {{$kandidatunggul}}</div>
                        <div class="stat-change positive">Paslon yang sementara unggul</div>
                    </div>
                    <div class="stat-icon growth">
                        <i class="fas fa-chart-line"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart -->
        <div class="chart-container slide-in-left">
            <div class="chart-header">
                <h3 class="chart-title">Statistik Paslon</h3>
                <p class="chart-subtitle">Statistik paslon unggul sementara</p>
            </div>
            <div class="chart-placeholder">
                
                 <canvas id="voteChart"></canvas>
            </div>
        </div>
    </div>

     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const paslonchart = @json($paslonchart);

        const ctx = document.getElementById('voteChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Paslon "+paslonchart.id],
                datasets: [{
                    label: 'Total Suara',
                    data: [paslonchart.suara],
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
@endsection
