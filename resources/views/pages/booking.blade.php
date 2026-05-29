@extends('layouts.app')
@section('content')
<div class="page" id="page-booking">
<div style="padding:28px">
<div class="page-header">
<h1>Booking Management</h1>
<p>Hotel rooms, bus seats, hospital appointments — all in one place</p>
</div>
<div class="booking-tabs">
<button class="booking-tab active" onclick="switchBookingTab(this)">🏨 Hotel</button>
<button class="booking-tab" onclick="switchBookingTab(this)">🚌 Bus</button>
<button class="booking-tab" onclick="switchBookingTab(this)">🏥 Hospital</button>
</div>
<div class="stat-grid" style="margin-bottom:20px">
<div class="stat-card blue">
<div class="stat-icon blue"><i class="fas fa-bed"></i></div>
<div class="stat-label">Rooms Available</div>
<div class="stat-value">9 / 28</div>
<div class="stat-delta" style="color:var(--amber)">68% occupancy today</div>
</div>
<div class="stat-card teal">
<div class="stat-icon teal"><i class="fas fa-calendar-check"></i></div>
<div class="stat-label">Check-ins Today</div>
<div class="stat-value">6</div>
<div class="stat-delta delta-up">3 more expected</div>
</div>
<div class="stat-card amber">
<div class="stat-icon amber"><i class="fas fa-sign-out-alt"></i></div>
<div class="stat-label">Check-outs Today</div>
<div class="stat-value">4</div>
<div class="stat-delta" style="color:var(--text3)">2 early checkouts</div>
</div>
<div class="stat-card purple">
<div class="stat-icon purple"><i class="fas fa-rupee-sign"></i></div>
<div class="stat-label">Room Revenue Today</div>
<div class="stat-value">₹62,000</div>
<div class="stat-delta delta-up">+12% vs yesterday</div>
</div>
</div>
<div class="card" style="margin-bottom:20px">
<div class="card-header">
<div class="card-title">Room Map — Sunrise Inn</div>
<button class="btn-primary" onclick="showToast('New booking form opening…')" style="font-size:12px;padding:7px 16px">
<i class="fas fa-plus" style="margin-right:5px"></i>New booking
          </button>
</div>
<div class="booking-legend">
<div class="legend-item2"><div class="legend-box" style="background:var(--teal-bg);border:1px solid rgba(34,201,154,0.3)"></div>Available</div>
<div class="legend-item2"><div class="legend-box" style="background:var(--coral-bg);border:1px solid rgba(245,107,78,0.3)"></div>Occupied</div>
<div class="legend-item2"><div class="legend-box" style="background:var(--purple-bg);border:1px solid rgba(159,124,245,0.3)"></div>Reserved</div>
<div class="legend-item2"><div class="legend-box" style="background:var(--amber-bg);border:1px solid rgba(245,166,35,0.3)"></div>Maintenance</div>
</div>
<div class="rooms-grid" id="rooms-grid"></div>
</div>
<div class="card">
<div class="card-header">
<div class="card-title">Today's Booking Queue</div>
</div>
<table class="data-table">
<thead>
<tr>
<th>Booking ID</th>
<th>Guest / Party</th>
<th>Service</th>
<th>Check-in</th>
<th>Check-out</th>
<th>Amount</th>
<th>Status</th>
</tr>
</thead>
<tbody>
<tr>
<td style="color:var(--accent);font-weight:500">#BK-5821</td>
<td>Mehta Family (3 pax)</td>
<td>Room 204 — Deluxe</td>
<td>Today 2:00 PM</td>
<td>31 May</td>
<td style="color:var(--text1);font-weight:600">₹5,200</td>
<td><span class="status-pill active"><span class="status-dot2"></span>Checked in</span></td>
</tr>
<tr>
<td style="color:var(--accent);font-weight:500">#BK-5820</td>
<td>Rahul Sharma (1 pax)</td>
<td>Room 108 — Standard</td>
<td>Today 3:00 PM</td>
<td>30 May</td>
<td style="color:var(--text1);font-weight:600">₹2,800</td>
<td><span class="status-pill warning"><span class="status-dot2"></span>Expected</span></td>
</tr>
<tr>
<td style="color:var(--accent);font-weight:500">#BK-5818</td>
<td>Patel Corp (8 pax)</td>
<td>Room 301, 302 — Suite</td>
<td>29 May</td>
<td>31 May</td>
<td style="color:var(--text1);font-weight:600">₹18,400</td>
<td><span class="status-pill active"><span class="status-dot2"></span>Checked in</span></td>
</tr>
<tr>
<td style="color:var(--accent);font-weight:500">#BK-5815</td>
<td>Joshi Group (2 pax)</td>
<td>Room 205 — Deluxe</td>
<td>28 May</td>
<td>Today</td>
<td style="color:var(--text1);font-weight:600">₹7,600</td>
<td><span class="status-pill inactive"><span class="status-dot2"></span>Due checkout</span></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
@endsection