@extends('layouts.app')
@section('content')
<div class="page" id="page-settings">
<div style="padding:28px">
<div class="page-header">
<h1>Settings</h1>
<p>Configure platform, billing preferences, and integrations</p>
</div>
<div class="settings-grid">
<div class="settings-nav">
<div class="settings-nav-item active" onclick="selectSettingsNav(this)"><i class="fas fa-user-circle"></i> Account</div>
<div class="settings-nav-item" onclick="selectSettingsNav(this)"><i class="fas fa-store"></i> Platform</div>
<div class="settings-nav-item" onclick="selectSettingsNav(this)"><i class="fas fa-file-invoice"></i> Invoice Config</div>
<div class="settings-nav-item" onclick="selectSettingsNav(this)"><i class="fas fa-credit-card"></i> Payments</div>
<div class="settings-nav-item" onclick="selectSettingsNav(this)"><i class="fas fa-bell"></i> Notifications</div>
<div class="settings-nav-item" onclick="selectSettingsNav(this)"><i class="fas fa-shield-alt"></i> Security</div>
<div class="settings-nav-item" onclick="selectSettingsNav(this)"><i class="fas fa-code"></i> API &amp; Webhooks</div>
<div class="settings-nav-item" onclick="selectSettingsNav(this)"><i class="fas fa-crown"></i> Subscription</div>
</div>
<div class="settings-content">
<div class="settings-section">
<h3>Account Details</h3>
<div class="sec-desc">Your personal and business account information</div>
<div class="form-grid">
<div class="form-group"><label>Full Name</label><input class="form-control" value="Rajesh Kumar"/></div>
<div class="form-group"><label>Email</label><input class="form-control" value="rajesh@omnipos.in"/></div>
<div class="form-group"><label>Mobile</label><input class="form-control" value="+91 98765 43210"/></div>
<div class="form-group"><label>Business Name</label><input class="form-control" value="Kumar Enterprises Pvt Ltd"/></div>
<div class="form-group"><label>GSTIN</label><input class="form-control" value="24AAACK1234A1Z5"/></div>
<div class="form-group"><label>State</label><select class="form-control"><option selected="">Gujarat</option><option>Maharashtra</option><option>Rajasthan</option></select></div>
</div>
<button class="btn-primary" onclick="showToast('Account details saved successfully!')" style="margin-top:14px">Save changes</button>
</div>
<div class="settings-section">
<h3>Platform Preferences</h3>
<div class="sec-desc">Configure platform-wide defaults for all vendors</div>
<div class="settings-toggle">
<div class="toggle-info">
<div class="toggle-title">Auto-send invoice via WhatsApp</div>
<div class="toggle-desc">Automatically send paid invoices to customer via WhatsApp</div>
</div>
<button class="switch on" onclick="toggleSwitch(this)"><div class="switch-thumb"></div></button>
</div>
<div class="settings-toggle">
<div class="toggle-info">
<div class="toggle-title">Shop-wise data isolation</div>
<div class="toggle-desc">Vendors can only see their own outlet data</div>
</div>
<button class="switch on" onclick="toggleSwitch(this)"><div class="switch-thumb"></div></button>
</div>
<div class="settings-toggle">
<div class="toggle-info">
<div class="toggle-title">AI demand forecasting</div>
<div class="toggle-desc">Use AI to predict peak hours and inventory needs</div>
</div>
<button class="switch off" onclick="toggleSwitch(this)"><div class="switch-thumb"></div></button>
</div>
<div class="settings-toggle">
<div class="toggle-info">
<div class="toggle-title">Auto GST calculation</div>
<div class="toggle-desc">Apply GST rates automatically based on item HSN codes</div>
</div>
<button class="switch on" onclick="toggleSwitch(this)"><div class="switch-thumb"></div></button>
</div>
<div class="settings-toggle">
<div class="toggle-info">
<div class="toggle-title">Commission auto-deduction</div>
<div class="toggle-desc">Deduct platform commission before vendor payouts</div>
</div>
<button class="switch on" onclick="toggleSwitch(this)"><div class="switch-thumb"></div></button>
</div>
</div>
<div class="settings-section">
<h3>Current Subscription</h3>
<div class="sec-desc">Pro Plan — active, billed monthly</div>
<div style="display:flex;align-items:center;justify-content:space-between;padding:14px;background:var(--bg3);border-radius:var(--radius-sm);margin-bottom:14px">
<div>
<div style="font-size:15px;font-weight:600;color:var(--purple)">⭐ Pro Plan</div>
<div style="font-size:12px;color:var(--text3);margin-top:4px">₹4,999/month · Next billing: 29 June 2026</div>
</div>
<span class="status-pill active">Active</span>
</div>
<div style="display:flex;gap:10px">
<a href="{{ route('plans') }}" class="btn-primary" style="text-decoration:none; display:inline-block; text-align:center;" onclick="showToast('Viewing Enterprise upgrade options…')">Upgrade to Enterprise</a>
<button class="btn-ghost" onclick="showToast('Billing history downloaded!')">Download invoices</button>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection