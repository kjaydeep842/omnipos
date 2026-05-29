@extends('layouts.app')
@section('content')
<div class="page" id="page-vendors">
<div style="padding:28px">
<div class="page-header">
<h1>Vendors &amp; Shops</h1>
<p>Manage all vendor accounts, shop-wise data, commissions and performance</p>
</div>
<div class="vendors-toolbar">
<div class="search-box">
<i class="fas fa-search"></i>
<input placeholder="Search vendors, outlets…" type="text"/>
</div>
<div class="filter-pills">
<button class="filter-pill active" onclick="filterVendors(this,'all')">All (12)</button>
<button class="filter-pill" onclick="filterVendors(this,'restaurant')">Restaurant (5)</button>
<button class="filter-pill" onclick="filterVendors(this,'hotel')">Hotel (3)</button>
<button class="filter-pill" onclick="filterVendors(this,'hospital')">Hospital (2)</button>
<button class="filter-pill" onclick="filterVendors(this,'bus')">Bus (2)</button>
</div>
<button class="btn-primary ml-auto" onclick="showToast('Add vendor panel opening...')" style="padding:8px 18px;font-size:13px">
<i class="fas fa-plus" style="margin-right:6px"></i>Add vendor
        </button>
</div>
<div class="vendors-grid">
<div class="vendor-card">
<div class="vendor-card-header">
<div class="vendor-avatar" style="background:var(--teal-bg);color:var(--teal)">SG</div>
<div>
<div class="vendor-card-name">Spice Garden</div>
<div class="vendor-card-type"><span style="width:6px;height:6px;border-radius:50%;background:var(--teal);display:inline-block"></span> Restaurant · Gandhinagar</div>
</div>
</div>
<div class="vendor-kpis">
<div class="kpi"><div class="kpi-val">₹48,200</div><div class="kpi-key">Today's sales</div></div>
<div class="kpi"><div class="kpi-val">142</div><div class="kpi-key">Orders today</div></div>
<div class="kpi"><div class="kpi-val">₹8.2L</div><div class="kpi-key">This month</div></div>
<div class="kpi"><div class="kpi-val">4.8 ★</div><div class="kpi-key">Rating</div></div>
</div>
<div class="vendor-footer">
<div><div class="commission-tag">Commission</div><div class="commission-val">12% · ₹5,784</div></div>
<button class="mini-btn" onclick="showToast('Opening Spice Garden details…')">Manage →</button>
</div>
</div>
<div class="vendor-card">
<div class="vendor-card-header">
<div class="vendor-avatar" style="background:var(--accent-glow);color:var(--accent)">SI</div>
<div>
<div class="vendor-card-name">Sunrise Inn</div>
<div class="vendor-card-type"><span style="width:6px;height:6px;border-radius:50%;background:var(--teal);display:inline-block"></span> Hotel · Ahmedabad</div>
</div>
</div>
<div class="vendor-kpis">
<div class="kpi"><div class="kpi-val">₹62,000</div><div class="kpi-key">Today's revenue</div></div>
<div class="kpi"><div class="kpi-val">19/28</div><div class="kpi-key">Rooms occupied</div></div>
<div class="kpi"><div class="kpi-val">₹14.5L</div><div class="kpi-key">This month</div></div>
<div class="kpi"><div class="kpi-val">68%</div><div class="kpi-key">Occupancy</div></div>
</div>
<div class="vendor-footer">
<div><div class="commission-tag">Commission</div><div class="commission-val">8% · ₹4,960</div></div>
<button class="mini-btn" onclick="showToast('Opening Sunrise Inn details…')">Manage →</button>
</div>
</div>
<div class="vendor-card">
<div class="vendor-card-header">
<div class="vendor-avatar" style="background:var(--coral-bg);color:var(--coral)">MC</div>
<div>
<div class="vendor-card-name">MedCare Clinic</div>
<div class="vendor-card-type"><span style="width:6px;height:6px;border-radius:50%;background:var(--amber);display:inline-block"></span> Hospital · Gandhinagar</div>
</div>
</div>
<div class="vendor-kpis">
<div class="kpi"><div class="kpi-val">₹29,400</div><div class="kpi-key">Today's bills</div></div>
<div class="kpi"><div class="kpi-val">67</div><div class="kpi-key">Patients today</div></div>
<div class="kpi"><div class="kpi-val">₹6.1L</div><div class="kpi-key">This month</div></div>
<div class="kpi"><div class="kpi-val">4.6 ★</div><div class="kpi-key">Rating</div></div>
</div>
<div class="vendor-footer">
<div><div class="commission-tag">Commission</div><div class="commission-val">5% · ₹1,470</div></div>
<button class="mini-btn" onclick="showToast('Opening MedCare details…')">Manage →</button>
</div>
</div>
<div class="vendor-card">
<div class="vendor-card-header">
<div class="vendor-avatar" style="background:var(--amber-bg);color:var(--amber)">GX</div>
<div>
<div class="vendor-card-name">Gujarat Express</div>
<div class="vendor-card-type"><span style="width:6px;height:6px;border-radius:50%;background:var(--teal);display:inline-block"></span> Bus · Surat</div>
</div>
</div>
<div class="vendor-kpis">
<div class="kpi"><div class="kpi-val">₹9,500</div><div class="kpi-key">Today's sales</div></div>
<div class="kpi"><div class="kpi-val">38/42</div><div class="kpi-key">Seats booked</div></div>
<div class="kpi"><div class="kpi-val">₹2.8L</div><div class="kpi-key">This month</div></div>
<div class="kpi"><div class="kpi-val">90%</div><div class="kpi-key">Occupancy</div></div>
</div>
<div class="vendor-footer">
<div><div class="commission-tag">Commission</div><div class="commission-val">10% · ₹950</div></div>
<button class="mini-btn" onclick="showToast('Opening Gujarat Express details…')">Manage →</button>
</div>
</div>
<div class="vendor-card">
<div class="vendor-card-header">
<div class="vendor-avatar" style="background:var(--purple-bg);color:var(--purple)">PD</div>
<div>
<div class="vendor-card-name">The Punjabi Dhaba</div>
<div class="vendor-card-type"><span style="width:6px;height:6px;border-radius:50%;background:var(--red);display:inline-block"></span> Restaurant · Surat</div>
</div>
</div>
<div class="vendor-kpis">
<div class="kpi"><div class="kpi-val">₹0</div><div class="kpi-key">Today's sales</div></div>
<div class="kpi"><div class="kpi-val">Offline</div><div class="kpi-key">Status</div></div>
<div class="kpi"><div class="kpi-val">₹5.4L</div><div class="kpi-key">Last month</div></div>
<div class="kpi"><div class="kpi-val">4.5 ★</div><div class="kpi-key">Rating</div></div>
</div>
<div class="vendor-footer">
<div><div class="commission-tag">Commission</div><div class="commission-val">12% · —</div></div>
<button class="mini-btn" onclick="showToast('Sending re-activation ping to Punjabi Dhaba…')">Re-activate</button>
</div>
</div>
<div class="vendor-card">
<div class="vendor-card-header">
<div class="vendor-avatar" style="background:var(--pink-bg);color:var(--pink)">CH</div>
<div>
<div class="vendor-card-name">City Hospital</div>
<div class="vendor-card-type"><span style="width:6px;height:6px;border-radius:50%;background:var(--teal);display:inline-block"></span> Hospital · Vadodara</div>
</div>
</div>
<div class="vendor-kpis">
<div class="kpi"><div class="kpi-val">₹41,800</div><div class="kpi-key">Today's bills</div></div>
<div class="kpi"><div class="kpi-val">112</div><div class="kpi-key">Patients today</div></div>
<div class="kpi"><div class="kpi-val">₹9.3L</div><div class="kpi-key">This month</div></div>
<div class="kpi"><div class="kpi-val">4.7 ★</div><div class="kpi-key">Rating</div></div>
</div>
<div class="vendor-footer">
<div><div class="commission-tag">Commission</div><div class="commission-val">5% · ₹2,090</div></div>
<button class="mini-btn" onclick="showToast('Opening City Hospital details…')">Manage →</button>
</div>
</div>
</div>
</div>
</div>
@endsection