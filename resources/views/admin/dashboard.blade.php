@extends('layouts.dashboard')

@section('content')
<div class="page-header mb-6">
    <div class="title text-2xl font-semibold text-gray-700">Dashboard</div>
    <p class="text-gray-500">Selamat datang, berikut adalah statistik pengelolaan sampah terbaru.</p>
</div>

<!-- Main Layout Grid -->
<div class="grid grid-cols-2 gap-6">
    <!-- Left Column -->
    <div class="space-y-6">
        <!-- Weekly Activity Chart -->
        <div class="card bg-white p-5 rounded-lg shadow-lg transition duration-300 hover:shadow-xl">
            <h3 class="text-md font-semibold text-gray-700 mb-3">Statistik Sampah Harian (Minggu Ini)</h3>
            <canvas id="weeklyChart"></canvas>
        </div>
    </div>

    <!-- Right Column -->
    <div class="space-y-6">
        <!-- Monthly Statistics Chart -->
        <div class="card bg-white p-5 rounded-lg shadow-lg transition duration-300 hover:shadow-xl">
            <h3 class="text-md font-semibold text-gray-700 mb-3">Statistik Sampah Bulanan (Tahun Ini)</h3>
            <canvas id="monthlyChart"></canvas>
        </div>

        <!-- Expense Statistics Pie Chart -->
        <div class="card bg-white p-5 rounded-lg shadow-lg transition duration-300 hover:shadow-xl">
            <h3 class="text-md font-semibold text-gray-700 mb-3">Kategori Sampah</h3>
            <canvas id="pieChart"></canvas>
        </div>

    </div>
</div>

<!-- Add Chart.js from CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Weekly Bar Chart
const weeklyData = @json($weeklyData);
const weeklyCtx = document.getElementById('weeklyChart').getContext('2d');
new Chart(weeklyCtx, {
    type: 'bar',
    data: {
        labels: weeklyData.map(data => data.tanggal),
        datasets: [{
            label: 'Sampah per Hari',
            data: weeklyData.map(data => data.jumlah),
            backgroundColor: 'rgba(76, 110, 245, 0.8)',
            hoverBackgroundColor: '#5A67D8',
            borderRadius: 8,
            borderWidth: 1,
            borderColor: '#4C6EF5'
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false },
            tooltip: { enabled: true }
        },
        scales: {
            y: { beginAtZero: true, grid: { color: '#E5E7EB' }, ticks: { color: '#4B5563' }},
            x: { grid: { display: false }, ticks: { color: '#4B5563' }}
        }
    }
});

// Monthly Line Chart
const monthlyData = @json($monthlyData);
const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
new Chart(monthlyCtx, {
    type: 'line',
    data: {
        labels: monthlyData.map(data => `Bulan ${data.bulan}`),
        datasets: [{
            label: 'Sampah per Bulan',
            data: monthlyData.map(data => data.total),
            borderColor: '#3B82F6',
            backgroundColor: 'rgba(59, 130, 246, 0.15)',
            fill: true,
            tension: 0.3,
            pointBackgroundColor: '#3B82F6',
            pointBorderColor: '#FFFFFF',
            pointBorderWidth: 2
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false },
            tooltip: { enabled: true }
        },
        scales: {
            y: { beginAtZero: true, grid: { color: '#E5E7EB' }, ticks: { color: '#4B5563' }},
            x: { grid: { display: false }, ticks: { color: '#4B5563' }}
        }
    }
});

// Pie Chart for Categories
const pieData = @json($pieData);
const pieCtx = document.getElementById('pieChart').getContext('2d');
new Chart(pieCtx, {
    type: 'doughnut',
    data: {
        labels: pieData.map(data => data.kategori),
        datasets: [{
            data: pieData.map(data => data.total),
            backgroundColor: ['#4CAF50', '#FFC107', '#FF5722', '#607D8B'],
            borderColor: '#FFFFFF',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: true, position: 'right' },
            tooltip: { enabled: true }
        },
        cutout: '70%'
    }
});
</script>
@endsection
