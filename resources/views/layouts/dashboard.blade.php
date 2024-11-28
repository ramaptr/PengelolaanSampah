<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        /* Global Body Styling */
        body {
            background-color: #F7FAFC; /* Soft background for better readability */
            font-family: 'Nunito', sans-serif;
            color: #2D3748; /* Dark text for high contrast */
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 260px;
            background: linear-gradient(180deg, #4C6EF5, #3B82F6); /* Gradient effect for sidebar */
            color: white;
            position: fixed;
            height: 100%;
            transition: width 0.3s ease, background-color 0.3s ease;
            padding-top: 30px;
        }

        .sidebar:hover {
            width: 300px;
            background: linear-gradient(180deg, #3B82F6, #4C6EF5);
        }

        .sidebar .logo {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .sidebar .logo img {
            width: 40px;
            margin-right: 10px;
        }

        .sidebar .logo span {
            font-size: 1.5rem;
            font-weight: 700;
            color: #FFFFFF;
            text-transform: uppercase;
        }

        .sidebar nav a {
            display: flex;
            align-items: center;
            padding: 15px;
            font-size: 1.1rem;
            color: #E2E8F0;
            border-radius: 8px;
            transition: all 0.3s ease;
            margin: 10px 20px;
            text-decoration: none;
        }

        .sidebar nav a.active,
        .sidebar nav a:hover {
            background-color: #63B3ED; /* Light blue for hover/active state */
            color: white;
            transform: translateX(10px); /* Slight move to the right for hover effect */
            box-shadow: 3px 3px 12px rgba(0, 0, 0, 0.2);
        }

        .sidebar nav a i {
            margin-right: 15px;
            font-size: 1.3rem;
        }

        /* Content Area Styling */
        .content {
            margin-left: 260px;
            padding: 30px;
            width: 100%;
            background-color: #FFFFFF;
            overflow-y: auto;
            transition: margin-left 0.3s ease;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .sidebar:hover ~ .content {
            margin-left: 300px;
        }

        /* Page Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #F1F5F9;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .page-header .title {
            font-size: 1.8rem;
            color: #2D3748;
            font-weight: 700;
        }

        .page-header .actions {
            display: flex;
            align-items: center;
        }

        .page-header .actions button {
            background-color: #38BDF8;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .page-header .actions button:hover {
            background-color: #4C6EF5;
        }

        /* Card Styling */
        .card {
            background-color: #FFFFFF;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
        }

        .card h3 {
            font-size: 1.4rem;
            color: #2D3748;
            font-weight: 600;
        }

        .card p {
            font-size: 1rem;
            color: #4A5568;
            margin-top: 10px;
        }

        /* Footer Styling */
        footer {
            background-color: #2D3748;
            color: #E2E8F0;
            text-align: center;
            padding: 10px;
            margin-top: 30px;
            position: absolute;
            width: 100%;
            bottom: 0;
            font-size: 0.9rem;
        }

        footer a {
            color: #38BDF8;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .sidebar {
                width: 220px;
                padding-top: 10px;
            }

            .sidebar:hover {
                width: 250px;
            }

            .content {
                margin-left: 220px;
                padding: 15px;
            }

            .sidebar nav a {
                font-size: 0.95rem;
                padding: 12px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/wasten.png') }}" alt="Logo">
            <span>Waste Monitor</span>
        </div>
        <nav>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="{{ route('admin.peta') }}" class="{{ request()->is('admin/peta') ? 'active' : '' }}">
                <i class="fas fa-map-marker-alt"></i> Peta Tempat Sampah
            </a>
            <a href="{{ route('admin.laporan') }}" class="{{ request()->is('admin/laporan') ? 'active' : '' }}">
                <i class="fas fa-chart-bar"></i> Laporan
            </a>
            <a href="{{ route('admin.notifikasi') }}" class="{{ request()->is('admin/notifikasi') ? 'active' : '' }}">
                <i class="fas fa-bell"></i> Notifikasi
            </a>
            <a href="{{ route('admin.tempat_sampah') }}" class="{{ request()->is('admin/tempat_sampah') ? 'active' : '' }}">
                <i class="fas fa-trash"></i> Pengaturan Tempat Sampah
            </a>
            <a href="{{ route('admin.pengguna') }}" class="{{ request()->is('admin/pengguna') ? 'active' : '' }}">
                <i class="fas fa-users-cog"></i> Pengguna dan Hak Akses
            </a>
            <a href="{{ route('admin.pengaturan') }}" class="{{ request()->is('admin/pengaturan') ? 'active' : '' }}">
                <i class="fas fa-cog"></i> Pengaturan Sistem
            </a>
        </nav>
    </div>
    <!-- Content Area -->
    <div class="content">

        <!-- Main Content -->
        @yield('content')
    </div>


</body>
</html>
