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
            <button class="notification-btn">
                <i class="fas fa-bell"></i>
                <span class="notification-badge">3</span>
            </button>
            <div class="user-avatar">
                JD
            </div>
        </div>
    </header>

    <!-- Dashboard Content -->
    <div class="dashboard-content">
        <!-- Stats Grid -->
        <div class="stats-grid fade-in">
            <div class="stat-card">
                <div class="stat-header">
                    <div>
                        <div class="stat-title">Total Users</div>
                        <div class="stat-value">12,847</div>
                        <div class="stat-change positive">+2.5% from last month</div>
                    </div>
                    <div class="stat-icon users">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div>
                        <div class="stat-title">Total Orders</div>
                        <div class="stat-value">3,264</div>
                        <div class="stat-change positive">+8.1% from last month</div>
                    </div>
                    <div class="stat-icon orders">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div>
                        <div class="stat-title">Revenue</div>
                        <div class="stat-value">$94,567</div>
                        <div class="stat-change positive">+12.3% from last month</div>
                    </div>
                    <div class="stat-icon revenue">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div>
                        <div class="stat-title">Growth Rate</div>
                        <div class="stat-value">15.2%</div>
                        <div class="stat-change negative">-1.4% from last month</div>
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
                <h3 class="chart-title">Revenue Overview</h3>
                <p class="chart-subtitle">Monthly revenue trends for the current year</p>
            </div>
            <div class="chart-placeholder">
                <i class="fas fa-chart-area" style="font-size: 3rem; margin-right: 1rem;"></i>
                Chart will be rendered here
            </div>
        </div>
    </div>
@endsection
