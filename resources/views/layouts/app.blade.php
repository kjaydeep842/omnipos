<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>OmniPOS — Multi-Vendor Billing Platform</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&amp;family=DM+Serif+Display:ital@0;1&amp;display=swap" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<!-- ═══════════════════════ SIDEBAR ═══════════════════════ -->
<nav class="sidebar">
<div class="sidebar-brand">
<div class="brand-icon"><i class="fas fa-layer-group"></i></div>
<div class="brand-text">
<div class="brand-name">OmniPOS</div>
<div class="brand-tag">Multi-Vendor Platform</div>
</div>
</div>
<div class="sidebar-section">Overview</div>
<a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
<i class="fas fa-th-large"></i> Dashboard
    <span class="badge green">Live</span>
</a>
<a href="{{ route('analytics') }}" class="nav-item {{ request()->routeIs('analytics') ? 'active' : '' }}">
<i class="fas fa-chart-line"></i> Analytics
  </a>
<div class="sidebar-section">Commerce</div>
<a href="{{ route('billing') }}" class="nav-item {{ request()->routeIs('billing') ? 'active' : '' }}">
<i class="fas fa-file-invoice-dollar"></i> Billing &amp; Invoices
  </a>
<a href="{{ route('vendors') }}" class="nav-item {{ request()->routeIs('vendors') ? 'active' : '' }}">
<i class="fas fa-store"></i> Vendors &amp; Shops
    <span class="badge">12</span>
</a>
<a href="{{ route('booking') }}" class="nav-item {{ request()->routeIs('booking') ? 'active' : '' }}">
<i class="fas fa-calendar-check"></i> Bookings
  </a>
<div class="sidebar-section">Platform</div>
<a href="{{ route('plans') }}" class="nav-item {{ request()->routeIs('plans') ? 'active' : '' }}">
<i class="fas fa-crown"></i> Plans &amp; Pricing
  </a>
<a href="{{ route('settings') }}" class="nav-item {{ request()->routeIs('settings') ? 'active' : '' }}">
<i class="fas fa-cog"></i> Settings
  </a>
<div class="sidebar-plan">
<div class="plan-label">CURRENT PLAN</div>
<div class="plan-name-tag"><i class="fas fa-star" style="font-size:11px"></i> Pro Plan</div>
<div class="plan-usage-bar"><div class="plan-usage-fill"></div></div>
<div class="plan-usage-text"><span>8 / 13 vendors</span><span>62%</span></div>
<a href="{{ route('plans') }}" class="upgrade-btn" style="display:block; text-align:center; text-decoration:none;">
      Upgrade to Enterprise
    </a>
</div>
</nav>
<!-- ═══════════════════════ MAIN ═══════════════════════ -->
<div class="main">
<header class="topbar">
<div class="topbar-title" id="topbar-title">@yield('title', 'Dashboard')</div>
<div class="topbar-search">
<i class="fas fa-search"></i>
<input placeholder="Search vendors, invoices, bookings…" type="text"/>
</div>
<div class="topbar-actions">
<div class="icon-btn notif-wrap">
<i class="fas fa-bell"></i>
<div class="notif-count">3</div>
</div>
<div class="icon-btn"><i class="fas fa-question-circle"></i></div>
<div class="avatar">RK</div>
</div>
</header>
@yield('content')

</div><!-- /main -->
<!-- Toast -->
<div class="toast" id="toast">
<i class="fas fa-check-circle toast-icon green"></i>
<span id="toast-msg">Action completed</span>
</div>
<script src="{{ asset('js/script.js') }}"></script>
@if(session('success'))
<script>
  document.addEventListener('DOMContentLoaded', function() {
    showToast('{{ session('success') }}');
  });
</script>
@endif
@if($errors->any())
<script>
  document.addEventListener('DOMContentLoaded', function() {
    showToast('Error: {{ $errors->first() }}');
  });
</script>
@endif
</body>
</html>
