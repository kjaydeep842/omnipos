@extends('layouts.app')
@section('content')
<div class="page" id="page-analytics">
<div style="padding:28px">
<div class="page-header">
<h1>Analytics &amp; Insights</h1>
<p>Platform-wide performance metrics across all vendors and service types</p>
</div>
<div class="analytics-stats">
<div class="stat-card blue">
<div class="stat-icon blue"><i class="fas fa-rupee-sign"></i></div>
<div class="stat-label">Monthly GMV</div>
<div class="stat-value">₹46.8L</div>
<div class="stat-delta delta-up"><i class="fas fa-arrow-up" style="font-size:10px"></i> +23% vs last month</div>
</div>
<div class="stat-card teal">
<div class="stat-icon teal"><i class="fas fa-hand-holding-usd"></i></div>
<div class="stat-label">Commission Earned</div>
<div class="stat-value">₹3.94L</div>
<div class="stat-delta delta-up"><i class="fas fa-arrow-up" style="font-size:10px"></i> Avg 8.4% rate</div>
</div>
<div class="stat-card amber">
<div class="stat-icon amber"><i class="fas fa-users"></i></div>
<div class="stat-label">Total Customers</div>
<div class="stat-value">12,480</div>
<div class="stat-delta delta-up"><i class="fas fa-arrow-up" style="font-size:10px"></i> +1,240 new this month</div>
</div>
<div class="stat-card purple">
<div class="stat-icon purple"><i class="fas fa-star"></i></div>
<div class="stat-label">Avg Platform Rating</div>
<div class="stat-value">4.72 ★</div>
<div class="stat-delta delta-up"><i class="fas fa-arrow-up" style="font-size:10px"></i> +0.08 vs last month</div>
</div>
</div>
<div class="analytics-grid">
<!-- Revenue by service -->
<div class="card">
<div class="card-header">
<div class="card-title">Revenue by Service Type</div>
</div>
<div class="donut-wrap">
<svg class="donut-svg" height="130" viewbox="0 0 120 120" width="130">
<circle cx="60" cy="60" fill="none" r="45" stroke="var(--bg3)" stroke-width="18"></circle>
<circle cx="60" cy="60" fill="none" r="45" stroke="var(--teal)" stroke-dasharray="113 170" stroke-dashoffset="0" stroke-width="18" transform="rotate(-90 60 60)"></circle>
<circle cx="60" cy="60" fill="none" r="45" stroke="var(--accent)" stroke-dasharray="71 212" stroke-dashoffset="-113" stroke-width="18" transform="rotate(-90 60 60)"></circle>
<circle cx="60" cy="60" fill="none" r="45" stroke="var(--coral)" stroke-dasharray="57 226" stroke-dashoffset="-184" stroke-width="18" transform="rotate(-90 60 60)"></circle>
<circle cx="60" cy="60" fill="none" r="45" stroke="var(--amber)" stroke-dasharray="42 241" stroke-dashoffset="-241" stroke-width="18" transform="rotate(-90 60 60)"></circle>
<text fill="var(--text2)" font-family="DM Sans" font-size="10" text-anchor="middle" x="60" y="57">Total</text>
<text fill="var(--text1)" font-family="DM Sans" font-size="13" font-weight="600" text-anchor="middle" x="60" y="70">₹46.8L</text>
</svg>
<div class="donut-legend">
<div class="legend-row"><div class="legend-color" style="background:var(--teal)"></div><div class="legend-name">Restaurant</div><div class="legend-pct">40%</div></div>
<div class="legend-row" style="margin-left:0"><div class="legend-val" style="margin-left:18px;font-size:11px;color:var(--text3)">₹18.7L this month</div></div>
<div class="legend-row"><div class="legend-color" style="background:var(--accent)"></div><div class="legend-name">Hotel</div><div class="legend-pct">25%</div></div>
<div class="legend-row"><div class="legend-color" style="background:var(--coral)"></div><div class="legend-name">Hospital</div><div class="legend-pct">20%</div></div>
<div class="legend-row"><div class="legend-color" style="background:var(--amber)"></div><div class="legend-name">Bus Booking</div><div class="legend-pct">15%</div></div>
</div>
</div>
</div>
<!-- Top Vendors leaderboard -->
<div class="card">
<div class="card-header">
<div class="card-title">Vendor Leaderboard — May</div>
</div>
<div style="display:flex;flex-direction:column;gap:10px">
<div style="display:flex;align-items:center;gap:10px">
<div style="font-size:14px;font-weight:700;color:var(--amber);width:24px">#1</div>
<div class="mini-avatar" style="background:var(--accent-glow);color:var(--accent)">SI</div>
<div style="flex:1"><div style="font-size:13px;font-weight:500;color:var(--text1)">Sunrise Inn</div><div style="font-size:11px;color:var(--text3)">Hotel</div></div>
<div style="font-size:14px;font-weight:700;color:var(--text1)">₹14.5L</div>
</div>
<div style="display:flex;align-items:center;gap:10px">
<div style="font-size:14px;font-weight:700;color:var(--text3);width:24px">#2</div>
<div class="mini-avatar" style="background:var(--teal-bg);color:var(--teal)">SG</div>
<div style="flex:1"><div style="font-size:13px;font-weight:500;color:var(--text1)">Spice Garden</div><div style="font-size:11px;color:var(--text3)">Restaurant</div></div>
<div style="font-size:14px;font-weight:700;color:var(--text1)">₹8.2L</div>
</div>
<div style="display:flex;align-items:center;gap:10px">
<div style="font-size:14px;font-weight:700;color:var(--text3);width:24px">#3</div>
<div class="mini-avatar" style="background:var(--pink-bg);color:var(--pink)">CH</div>
<div style="flex:1"><div style="font-size:13px;font-weight:500;color:var(--text1)">City Hospital</div><div style="font-size:11px;color:var(--text3)">Hospital</div></div>
<div style="font-size:14px;font-weight:700;color:var(--text1)">₹9.3L</div>
</div>
<div style="display:flex;align-items:center;gap:10px">
<div style="font-size:14px;font-weight:700;color:var(--text3);width:24px">#4</div>
<div class="mini-avatar" style="background:var(--purple-bg);color:var(--purple)">PD</div>
<div style="flex:1"><div style="font-size:13px;font-weight:500;color:var(--text1)">Punjabi Dhaba</div><div style="font-size:11px;color:var(--text3)">Restaurant</div></div>
<div style="font-size:14px;font-weight:700;color:var(--text1)">₹5.4L</div>
</div>
<div style="display:flex;align-items:center;gap:10px">
<div style="font-size:14px;font-weight:700;color:var(--text3);width:24px">#5</div>
<div class="mini-avatar" style="background:var(--coral-bg);color:var(--coral)">MC</div>
<div style="flex:1"><div style="font-size:13px;font-weight:500;color:var(--text1)">MedCare Clinic</div><div style="font-size:11px;color:var(--text3)">Hospital</div></div>
<div style="font-size:14px;font-weight:700;color:var(--text1)">₹6.1L</div>
</div>
</div>
</div>
</div>
<!-- Peak hour heatmap -->
<div class="card" style="margin-bottom:20px">
<div class="card-header">
<div class="card-title">Peak Hour Heatmap — Orders This Week</div>
</div>
<div id="heatmap-container"></div>
</div>
</div>
</div>
@endsection