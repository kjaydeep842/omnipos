@extends('layouts.app')
@section('content')
<div class="page active" id="page-dashboard">
<div style="padding:28px">
<div class="page-header">
<h1>Good morning, Rajesh 👋</h1>
<p>Here's what's happening across your platform today — Friday, 29 May 2026</p>
</div>
<div class="stat-grid">
<div class="stat-card blue">
<div class="stat-icon blue"><i class="fas fa-rupee-sign"></i></div>
<div class="stat-label">Total Revenue Today</div>
<div class="stat-value">₹1,39,600</div>
<div class="stat-delta delta-up"><i class="fas fa-arrow-up" style="font-size:10px"></i> +18.4% vs yesterday</div>
</div>
<div class="stat-card teal">
<div class="stat-icon teal"><i class="fas fa-receipt"></i></div>
<div class="stat-label">Total Invoices</div>
<div class="stat-value">428</div>
<div class="stat-delta delta-up"><i class="fas fa-arrow-up" style="font-size:10px"></i> +52 new today</div>
</div>
<div class="stat-card amber">
<div class="stat-icon amber"><i class="fas fa-store"></i></div>
<div class="stat-label">Active Vendors</div>
<div class="stat-value">12 / 13</div>
<div class="stat-delta" style="color:var(--amber)"><i class="fas fa-circle" style="font-size:8px"></i> 1 vendor offline</div>
</div>
<div class="stat-card purple">
<div class="stat-icon purple"><i class="fas fa-calendar-check"></i></div>
<div class="stat-label">Active Bookings</div>
<div class="stat-value">86</div>
<div class="stat-delta delta-up"><i class="fas fa-arrow-up" style="font-size:10px"></i> Hotel+Bus+Hospital</div>
</div>
</div>
<div class="grid-3">
<!-- Chart -->
<div class="card">
<div class="card-header">
<div class="card-title">Revenue — Last 7 Days</div>
<div class="card-action">View full report →</div>
</div>
<div class="chart-bars" id="revenue-chart"></div>
<div class="chart-labels" id="chart-labels"></div>
<div class="chart-legend">
<div class="legend-item"><div class="legend-dot" style="background:var(--accent)"></div>Billing revenue</div>
<div class="legend-item"><div class="legend-dot" style="background:var(--teal);opacity:0.6"></div>Commissions</div>
</div>
</div>
<!-- Activity -->
<div class="card">
<div class="card-header">
<div class="card-title">Recent Activity</div>
<div class="card-action">View all</div>
</div>
<div class="activity-list">
<div class="activity-item">
<div class="activity-icon" style="background:var(--teal-bg);color:var(--teal)"><i class="fas fa-utensils"></i></div>
<div class="activity-info">
<div class="activity-title">Table #7 — Spice Garden</div>
<div class="activity-sub">3 mins ago · 4 guests</div>
</div>
<div class="activity-amount">₹1,840</div>
</div>
<div class="activity-item">
<div class="activity-icon" style="background:var(--blue-bg,#e6f1fb);color:var(--accent)"><i class="fas fa-bed"></i></div>
<div class="activity-info">
<div class="activity-title">Room 204 Check-in — Sunrise Inn</div>
<div class="activity-sub">12 mins ago · 2 nights</div>
</div>
<div class="activity-amount">₹5,200</div>
</div>
<div class="activity-item">
<div class="activity-icon" style="background:var(--coral-bg);color:var(--coral)"><i class="fas fa-heartbeat"></i></div>
<div class="activity-info">
<div class="activity-title">OPD Bill — MedCare Clinic</div>
<div class="activity-sub">28 mins ago · Dr. Sharma</div>
</div>
<div class="activity-amount">₹850</div>
</div>
<div class="activity-item">
<div class="activity-icon" style="background:var(--amber-bg);color:var(--amber)"><i class="fas fa-bus"></i></div>
<div class="activity-info">
<div class="activity-title">Bus GJ-01 · Ahmedabad→Surat</div>
<div class="activity-sub">1 hr ago · 38 seats booked</div>
</div>
<div class="activity-amount">₹9,500</div>
</div>
<div class="activity-item">
<div class="activity-icon" style="background:var(--purple-bg);color:var(--purple)"><i class="fas fa-utensils"></i></div>
<div class="activity-info">
<div class="activity-title">Table #3 — The Punjabi Dhaba</div>
<div class="activity-sub">2 hrs ago · 6 guests</div>
</div>
<div class="activity-amount">₹3,200</div>
</div>
</div>
</div>
</div>
<!-- Vendor table -->
<div class="card" style="margin-bottom:0">
<div class="card-header">
<div class="card-title">Top Performing Vendors</div>
<a href="{{ route('vendors') }}" class="card-action" style="text-decoration:none;">Manage all vendors →</a>
</div>
<table class="data-table">
<thead>
<tr>
<th>Vendor</th>
<th>Type</th>
<th>Today's Sales</th>
<th>Orders</th>
<th>Commission</th>
<th>Status</th>
</tr>
</thead>
<tbody>
<tr>
<td><div class="vendor-name-cell"><div class="mini-avatar" style="background:var(--teal-bg);color:var(--teal)">SG</div><div><div class="vendor-cell-name">Spice Garden</div><div class="vendor-cell-type">Gandhinagar, GJ</div></div></div></td>
<td>Restaurant</td>
<td style="color:var(--text1);font-weight:600">₹48,200</td>
<td>142</td>
<td style="color:var(--amber);font-weight:600">₹5,784</td>
<td><span class="status-pill active"><span class="status-dot2"></span>Active</span></td>
</tr>
<tr>
<td><div class="vendor-name-cell"><div class="mini-avatar" style="background:var(--accent-glow);color:var(--accent)">SI</div><div><div class="vendor-cell-name">Sunrise Inn</div><div class="vendor-cell-type">Ahmedabad, GJ</div></div></div></td>
<td>Hotel</td>
<td style="color:var(--text1);font-weight:600">₹62,000</td>
<td>19 rooms</td>
<td style="color:var(--amber);font-weight:600">₹4,960</td>
<td><span class="status-pill active"><span class="status-dot2"></span>Active</span></td>
</tr>
<tr>
<td><div class="vendor-name-cell"><div class="mini-avatar" style="background:var(--coral-bg);color:var(--coral)">MC</div><div><div class="vendor-cell-name">MedCare Clinic</div><div class="vendor-cell-type">Gandhinagar, GJ</div></div></div></td>
<td>Hospital</td>
<td style="color:var(--text1);font-weight:600">₹29,400</td>
<td>67 patients</td>
<td style="color:var(--amber);font-weight:600">₹1,470</td>
<td><span class="status-pill active"><span class="status-dot2"></span>Active</span></td>
</tr>
<tr>
<td><div class="vendor-name-cell"><div class="mini-avatar" style="background:var(--amber-bg);color:var(--amber)">GX</div><div><div class="vendor-cell-name">Gujarat Express</div><div class="vendor-cell-type">Surat, GJ</div></div></div></td>
<td>Bus Booking</td>
<td style="color:var(--text1);font-weight:600">₹9,500</td>
<td>38 seats</td>
<td style="color:var(--amber);font-weight:600">₹950</td>
<td><span class="status-pill warning"><span class="status-dot2"></span>Low seats</span></td>
</tr>
<tr>
<td><div class="vendor-name-cell"><div class="mini-avatar" style="background:var(--purple-bg);color:var(--purple)">PD</div><div><div class="vendor-cell-name">The Punjabi Dhaba</div><div class="vendor-cell-type">Surat, GJ</div></div></div></td>
<td>Restaurant</td>
<td style="color:var(--text1);font-weight:600">₹31,200</td>
<td>94</td>
<td style="color:var(--amber);font-weight:600">₹3,744</td>
<td><span class="status-pill inactive"><span class="status-dot2"></span>Offline</span></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
@endsection