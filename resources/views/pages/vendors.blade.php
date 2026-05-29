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
<button class="btn-primary ml-auto" onclick="openVendorModal()" style="padding:8px 18px;font-size:13px">
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
<button class="mini-btn" onclick="openVendorModal({{ $vendor }})">Manage →</button>
<form action="{{ route('vendors.destroy', $vendor->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Are you sure you want to delete this vendor?');">
  @csrf
  @method('DELETE')
  <button type="submit" class="mini-btn" style="color:var(--red);border-color:var(--red);margin-left:4px;">Delete</button>
</form>
</div>
</div>
@endforeach
</div>
</div>

<!-- Vendor Modal -->
<div class="modal-overlay" id="vendorModal">
  <div class="modal">
    <div class="modal-header">
      <div class="modal-title" id="vendorModalTitle">Add Vendor</div>
      <button class="modal-close" onclick="closeVendorModal()"><i class="fas fa-times"></i></button>
    </div>
    <form id="vendorForm" action="{{ route('vendors.store') }}" method="POST">
      @csrf
      <input type="hidden" name="_method" id="vendorMethod" value="POST">
      <div class="modal-body">
        <div class="form-group">
          <label>Vendor Name</label>
          <input class="form-control" type="text" name="name" id="vendorName" required>
        </div>
        <div class="form-group">
          <label>Type</label>
          <select class="form-control" name="type" id="vendorType" required>
            <option value="Restaurant POS">Restaurant POS</option>
            <option value="Hotel Billing">Hotel Billing</option>
            <option value="Hospital Billing">Hospital Billing</option>
            <option value="Bus Booking">Bus Booking</option>
          </select>
        </div>
        <div class="form-group">
          <label>Status</label>
          <select class="form-control" name="status" id="vendorStatus" required>
            <option value="active">Active</option>
            <option value="warning">Warning</option>
            <option value="inactive">Inactive</option>
          </select>
        </div>
        <div class="form-group">
          <label>Commission</label>
          <input class="form-control" type="text" name="commission" id="vendorCommission" placeholder="e.g. 2.5%" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-ghost" onclick="closeVendorModal()">Cancel</button>
        <button type="submit" class="btn-primary">Save Vendor</button>
      </div>
    </form>
  </div>
</div>

<script>
function openVendorModal(vendor = null) {
  const modal = document.getElementById('vendorModal');
  const form = document.getElementById('vendorForm');
  const method = document.getElementById('vendorMethod');
  const title = document.getElementById('vendorModalTitle');

  if (vendor) {
    title.textContent = 'Edit Vendor';
    form.action = `/vendors/${vendor.id}`;
    method.value = 'PUT';
    document.getElementById('vendorName').value = vendor.name;
    document.getElementById('vendorType').value = vendor.type;
    document.getElementById('vendorStatus').value = vendor.status;
    document.getElementById('vendorCommission').value = vendor.commission;
  } else {
    title.textContent = 'Add Vendor';
    form.action = '{{ route('vendors.store') }}';
    method.value = 'POST';
    form.reset();
  }
  
  modal.classList.add('show');
}

function closeVendorModal() {
  document.getElementById('vendorModal').classList.remove('show');
}
</script>
</div>
@endsection