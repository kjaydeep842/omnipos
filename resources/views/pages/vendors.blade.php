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
@foreach($vendors as $vendor)
@php
  $colors = ['teal', 'accent', 'coral', 'amber', 'purple', 'pink'];
  $color = $colors[$loop->index % count($colors)];
  $bgColor = 'var(--' . $color . '-bg)';
  $textColor = 'var(--' . $color . ')';
@endphp
<div class="vendor-card">
<div class="vendor-card-header">
<div class="vendor-avatar" style="background:{{ $bgColor }};color:{{ $textColor }}">{{ $vendor->initials }}</div>
<div>
<div class="vendor-card-name">{{ $vendor->name }}</div>
<div class="vendor-card-type">
  <span style="width:6px;height:6px;border-radius:50%;background:{{ $vendor->status == 'active' ? 'var(--teal)' : ($vendor->status == 'warning' ? 'var(--amber)' : 'var(--red)') }};display:inline-block"></span> 
  {{ $vendor->type }} · {{ $vendor->status }}
</div>
</div>
</div>
<div class="vendor-kpis">
<div class="kpi"><div class="kpi-val">₹{{ number_format($vendor->total_revenue) }}</div><div class="kpi-key">Total Revenue</div></div>
<div class="kpi"><div class="kpi-val">{{ $vendor->active_users }}</div><div class="kpi-key">Active Users</div></div>
<div class="kpi"><div class="kpi-val">{{ $vendor->commission }}</div><div class="kpi-key">Commission</div></div>
<div class="kpi"><div class="kpi-val">4.8 ★</div><div class="kpi-key">Rating</div></div>
</div>
<div class="vendor-footer">
<div><div class="commission-tag">Commission</div><div class="commission-val">{{ $vendor->commission }}</div></div>
<button class="mini-btn" onclick="showToast('Opening {{ addslashes($vendor->name) }} details…')">Manage →</button>
</div>
</div>
@endforeach
</div>
</div>
</div>
@endsection