@extends('layouts.dashboard')

@section('content')
<div class="page-header mb-6">
    <div class="title text-2xl font-semibold text-gray-700">Dashboard</div>
    <p class="text-gray-500">Selamat datang, berikut adalah statistik pengelolaan sampah terbaru.</p>
</div>

<!-- Filter for selecting month -->
<form method="GET" action="{{ route('admin.dashboard') }}" class="mb-6">
    <label for="month" class="block text-sm font-medium text-gray-700">Pilih Bulan:</label>
    <input type="month" id="month" name="month" value="{{ $selectedMonth }}" class="mt-1 block pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
    <button type="submit" class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-md">Tampilkan</button>
</form>

<!-- Main Layout Grid -->
<div class="grid grid-cols-2 gap-6">
    <!-- Left Column -->
    <div class="space-y-6">
        <!-- Daily Activity Chart -->
        <div class="card bg-white p-5 rounded-lg shadow-lg transition duration-300 hover:shadow-xl">
            <h3 class="text-md font-semibold text-gray-700 mb-3">Statistik Sampah Harian (Minggu Ini)</h3>
            <canvas id="dailyChart"></canvas>
        </div>

        <!-- Weekly Activity Chart -->
        <div class="card bg-white p-5 rounded-lg shadow-lg transition duration-300 hover:shadow-xl">
            <h3 class="text-md font-semibold text-gray-700 mb-3">Statistik Sampah Mingguan (Bulan Ini)</h3>
            <canvas id="weeklyChart"></canvas>
        </div>
    </div>

    <!-- Right Column -->
    <div class="space-y-6">
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
// Daily Bar Chart
const dailyData = @json($dailyData);
const dailyCtx = document.getElementById('dailyChart').getContext('2d');
new Chart(dailyCtx, {
    type: 'bar',
    data: {
        labels: dailyData.map(data => data.tanggal),
        datasets: [{
            label: 'Sampah per Hari',
            data: dailyData.map(data => data.jumlah),
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

// Weekly Line Chart
const weeklyData = @json($weeklyData);
const weeklyCtx = document.getElementById('weeklyChart').getContext('2d');
new Chart(weeklyCtx, {
    type: 'line',
    data: {
        labels: weeklyData.map(data => `Minggu ${data.minggu}`),
        datasets: [{
            label: 'Sampah per Minggu',
            data: weeklyData.map(data => data.total),
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
