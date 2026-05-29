@extends('layouts.app')
@section('content')
<div class="page" id="page-plans">
<div style="padding:28px">
<div class="plans-hero">
<h1>Simple, <span>transparent</span> pricing<br/>for every scale</h1>
<p>One platform for restaurants, hotels, hospitals, bus booking and more. Unlock services as your business grows.</p>
</div>
<div class="billing-toggle-wrap">
<span class="toggle-lbl active" id="toggle-lbl-monthly">Monthly</span>
<button class="toggle-track" id="billing-toggle" onclick="toggleBilling()">
<div class="toggle-thumb"></div>
</button>
<span class="toggle-lbl" id="toggle-lbl-yearly">Yearly <span class="save-tag">Save 20%</span></span>
</div>
<div class="plans-grid">
<!-- Starter -->
<div class="plan-card">
<div class="plan-icon-wrap" style="background:var(--bg3)">🌱</div>
<div class="plan-card-name">Starter</div>
<div class="plan-card-desc">Single outlet for small cafes, kiosks &amp; shops</div>
<div class="plan-price-block">
<div class="plan-price-main" data-monthly="₹0" data-yearly="₹0">₹0</div>
<div class="plan-price-period">/ month, forever free</div>
<div class="plan-price-sub">1 vendor · 1 outlet</div>
</div>
<ul class="plan-features-list">
<li><i class="fas fa-check feat-icon-yes"></i>Restaurant / café POS billing</li>
<li><i class="fas fa-check feat-icon-yes"></i>GST-compliant invoices</li>
<li><i class="fas fa-check feat-icon-yes"></i>Basic inventory tracking</li>
<li><i class="fas fa-check feat-icon-yes"></i>Payment gateway (UPI, card)</li>
<li><i class="fas fa-check feat-icon-yes"></i>Basic reports &amp; exports</li>
<li><i class="fas fa-times feat-icon-no"></i>Hotel / bus / hospital modules</li>
<li><i class="fas fa-times feat-icon-no"></i>Multi-vendor dashboard</li>
<li><i class="fas fa-times feat-icon-no"></i>Advanced analytics</li>
</ul>
<button class="plan-cta" onclick="showToast('Starter plan selected — setting up your free account!')">Get started free</button>
</div>
<!-- Growth -->
<div class="plan-card">
<div class="plan-icon-wrap" style="background:var(--teal-bg)">⚡</div>
<div class="plan-card-name">Growth</div>
<div class="plan-card-desc">Multi-service, multi-outlet for growing operations</div>
<div class="plan-price-block">
<div class="plan-price-main" data-monthly="₹1,999" data-yearly="₹1,599">₹1,999</div>
<div class="plan-price-period">/ month</div>
<div class="plan-price-sub">5 vendors · 3 outlets each</div>
</div>
<ul class="plan-features-list">
<li><i class="fas fa-check feat-icon-yes"></i>All Starter features</li>
<li><i class="fas fa-check feat-icon-yes"></i>Hotel room booking module</li>
<li><i class="fas fa-check feat-icon-yes"></i>Bus / transport booking</li>
<li><i class="fas fa-check feat-icon-yes"></i>Hospital OPD/IPD billing</li>
<li><i class="fas fa-check feat-icon-yes"></i>Multi-vendor dashboard</li>
<li><i class="fas fa-check feat-icon-yes"></i>Advanced reports</li>
<li><i class="fas fa-times feat-icon-no"></i>Custom roles &amp; permissions</li>
<li><i class="fas fa-times feat-icon-no"></i>White label / API access</li>
</ul>
<button class="plan-cta" onclick="showToast('Starting 14-day Growth trial — no card required!')">Start 14-day trial</button>
</div>
<!-- Pro (featured) -->
<div class="plan-card featured">
<div class="featured-badge">⭐ Most Popular</div>
<div class="plan-icon-wrap" style="background:var(--purple-bg)">🚀</div>
<div class="plan-card-name">Pro</div>
<div class="plan-card-desc">Full platform access for established multi-service operators</div>
<div class="plan-price-block">
<div class="plan-price-main" data-monthly="₹4,999" data-yearly="₹3,999">₹4,999</div>
<div class="plan-price-period">/ month</div>
<div class="plan-price-sub">Unlimited vendors · Unlimited outlets</div>
</div>
<ul class="plan-features-list">
<li><i class="fas fa-check feat-icon-yes"></i>All Growth features</li>
<li><i class="fas fa-check feat-icon-yes"></i>Advanced analytics &amp; AI insights</li>
<li><i class="fas fa-check feat-icon-yes"></i>Custom roles &amp; permissions</li>
<li><i class="fas fa-check feat-icon-yes"></i>Commission management</li>
<li><i class="fas fa-check feat-icon-yes"></i>Webhook integrations</li>
<li><i class="fas fa-check feat-icon-yes"></i>Bulk invoice export</li>
<li><i class="fas fa-check feat-icon-yes"></i>Priority support (SLA 4h)</li>
<li><i class="fas fa-times feat-icon-no"></i>White label / dedicated API</li>
</ul>
<button class="plan-cta primary" onclick="showToast('Starting 14-day Pro trial — full access, cancel anytime!')">Start 14-day trial</button>
</div>
<!-- Enterprise -->
<div class="plan-card">
<div class="plan-icon-wrap" style="background:var(--amber-bg)">🏢</div>
<div class="plan-card-name">Enterprise</div>
<div class="plan-card-desc">White-label, API, dedicated infra for large platforms</div>
<div class="plan-price-block">
<div class="plan-price-main" data-monthly="Custom" data-yearly="Custom">Custom</div>
<div class="plan-price-period">contact for pricing</div>
<div class="plan-price-sub">Unlimited · SLA-backed · Custom contract</div>
</div>
<ul class="plan-features-list">
<li><i class="fas fa-check feat-icon-yes"></i>All Pro features</li>
<li><i class="fas fa-check feat-icon-yes"></i>White label branding</li>
<li><i class="fas fa-check feat-icon-yes"></i>Full REST API + webhooks</li>
<li><i class="fas fa-check feat-icon-yes"></i>Dedicated infrastructure</li>
<li><i class="fas fa-check feat-icon-yes"></i>Custom integrations</li>
<li><i class="fas fa-check feat-icon-yes"></i>Dedicated onboarding manager</li>
<li><i class="fas fa-check feat-icon-yes"></i>99.99% SLA uptime guarantee</li>
<li><i class="fas fa-check feat-icon-yes"></i>Custom contract &amp; billing</li>
</ul>
<button class="plan-cta" onclick="showToast('Our team will reach out within 24 hours!')">Contact sales →</button>
</div>
</div>
<!-- Modules Grid -->
<div class="modules-section">
<h2>Platform Modules</h2>
<p>Each module unlocks at a specific plan tier. Mix and match services for your exact business needs.</p>
<div class="modules-grid">
<div class="module-card">
<div class="mod-icon" style="background:var(--teal-bg);color:var(--teal)"><i class="fas fa-utensils"></i></div>
<div class="mod-info">
<div class="mod-name">Restaurant POS</div>
<div class="mod-desc">Table management, KOT printing, split billing, menu builder, GST invoicing</div>
<span class="mod-plan-tag tag-free">Free — all plans</span>
</div>
</div>
<div class="module-card">
<div class="mod-icon" style="background:var(--accent-glow);color:var(--accent)"><i class="fas fa-bed"></i></div>
<div class="mod-info">
<div class="mod-name">Hotel Booking</div>
<div class="mod-desc">Room management, check-in/out, housekeeping, F&amp;B billing, folios</div>
<span class="mod-plan-tag tag-growth">Growth+</span>
</div>
</div>
<div class="module-card">
<div class="mod-icon" style="background:var(--amber-bg);color:var(--amber)"><i class="fas fa-bus"></i></div>
<div class="mod-info">
<div class="mod-name">Bus Booking</div>
<div class="mod-desc">Seat layout, route management, passenger manifests, real-time ticketing</div>
<span class="mod-plan-tag tag-growth">Growth+</span>
</div>
</div>
<div class="module-card">
<div class="mod-icon" style="background:var(--coral-bg);color:var(--coral)"><i class="fas fa-heartbeat"></i></div>
<div class="mod-info">
<div class="mod-name">Hospital Billing</div>
<div class="mod-desc">OPD/IPD billing, pharmacy, lab reports, doctor fee tracking, insurance</div>
<span class="mod-plan-tag tag-growth">Growth+</span>
</div>
</div>
<div class="module-card">
<div class="mod-icon" style="background:var(--purple-bg);color:var(--purple)"><i class="fas fa-users"></i></div>
<div class="mod-info">
<div class="mod-name">Multi-Vendor Hub</div>
<div class="mod-desc">Shop-wise data isolation, commission tracking, consolidated dashboard</div>
<span class="mod-plan-tag tag-growth">Growth+</span>
</div>
</div>
<div class="module-card">
<div class="mod-icon" style="background:var(--pink-bg);color:var(--pink)"><i class="fas fa-chart-bar"></i></div>
<div class="mod-info">
<div class="mod-name">Advanced Analytics</div>
<div class="mod-desc">AI demand forecasting, heatmaps, cohort analysis, custom dashboards</div>
<span class="mod-plan-tag tag-pro">Pro+</span>
</div>
</div>
<div class="module-card">
<div class="mod-icon" style="background:var(--bg4);color:var(--text2)"><i class="fas fa-paint-brush"></i></div>
<div class="mod-info">
<div class="mod-name">White Label Branding</div>
<div class="mod-desc">Custom domain, logo, colors, email templates, custom receipts</div>
<span class="mod-plan-tag tag-enterprise">Enterprise</span>
</div>
</div>
<div class="module-card">
<div class="mod-icon" style="background:var(--bg4);color:var(--text2)"><i class="fas fa-code"></i></div>
<div class="mod-info">
<div class="mod-name">REST API Access</div>
<div class="mod-desc">Full API for custom integrations, ERP connectivity, mobile app backends</div>
<span class="mod-plan-tag tag-enterprise">Enterprise</span>
</div>
</div>
<div class="module-card">
<div class="mod-icon" style="background:var(--green-bg);color:var(--green)"><i class="fas fa-credit-card"></i></div>
<div class="mod-info">
<div class="mod-name">Payment Gateway</div>
<div class="mod-desc">UPI, cards, wallets, BNPL, payment links, split payments, refunds</div>
<span class="mod-plan-tag tag-free">Free — all plans</span>
</div>
</div>
</div>
</div>
<!-- Feature Matrix -->
<div class="matrix-section">
<h2>Full Feature Comparison</h2>
<div class="matrix-wrap">
<table class="matrix-table">
<thead>
<tr>
<th>Feature</th>
<th>Starter</th>
<th>Growth</th>
<th>Pro</th>
<th>Enterprise</th>
</tr>
</thead>
<tbody>
<tr class="matrix-cat"><td colspan="5">Billing &amp; POS</td></tr>
<tr><td>Restaurant / café POS</td><td><i class="fas fa-check yes-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td></tr>
<tr><td>GST invoices &amp; e-invoicing</td><td><i class="fas fa-check yes-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td></tr>
<tr><td>Split billing &amp; table management</td><td><i class="fas fa-times no-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td></tr>
<tr><td>KOT / kitchen display system</td><td><i class="fas fa-times no-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td></tr>
<tr class="matrix-cat"><td colspan="5">Booking Services</td></tr>
<tr><td>Hotel room &amp; housekeeping</td><td><i class="fas fa-times no-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td></tr>
<tr><td>Bus booking &amp; seat layout</td><td><i class="fas fa-times no-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td></tr>
<tr><td>Hospital OPD / IPD billing</td><td><i class="fas fa-times no-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td></tr>
<tr><td>Online booking portal</td><td><i class="fas fa-times no-icon"></i></td><td><i class="fas fa-times no-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td></tr>
<tr class="matrix-cat"><td colspan="5">Vendor Management</td></tr>
<tr><td>Number of vendors</td><td style="color:var(--text1);font-weight:600">1</td><td style="color:var(--text1);font-weight:600">5</td><td style="color:var(--text1);font-weight:600">Unlimited</td><td style="color:var(--text1);font-weight:600">Unlimited</td></tr>
<tr><td>Shop-wise data isolation</td><td><i class="fas fa-times no-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td></tr>
<tr><td>Commission &amp; payout management</td><td><i class="fas fa-times no-icon"></i></td><td><i class="fas fa-times no-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td></tr>
<tr class="matrix-cat"><td colspan="5">Analytics &amp; Integrations</td></tr>
<tr><td>Advanced analytics &amp; AI insights</td><td><i class="fas fa-times no-icon"></i></td><td><i class="fas fa-times no-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td></tr>
<tr><td>REST API access</td><td><i class="fas fa-times no-icon"></i></td><td><i class="fas fa-times no-icon"></i></td><td><i class="fas fa-times no-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td></tr>
<tr><td>White label branding</td><td><i class="fas fa-times no-icon"></i></td><td><i class="fas fa-times no-icon"></i></td><td><i class="fas fa-times no-icon"></i></td><td><i class="fas fa-check yes-icon"></i></td></tr>
<tr><td>Uptime SLA</td><td style="color:var(--text1)">99%</td><td style="color:var(--text1)">99.5%</td><td style="color:var(--text1)">99.9%</td><td style="color:var(--text1)">99.99%</td></tr>
<tr><td>Support response time</td><td style="color:var(--text1)">48h email</td><td style="color:var(--text1)">12h chat</td><td style="color:var(--text1)">4h priority</td><td style="color:var(--text1)">1h dedicated</td></tr>
</tbody>
</table>
</div>
</div>
<!-- Add-ons -->
<div class="addons-section">
<h2>Optional Add-ons</h2>
<p>Enhance any plan with these powerful extras. Add or remove anytime.</p>
<div class="addons-grid">
<div class="addon-card">
<div class="addon-icon" style="background:var(--teal-bg);color:var(--teal)"><i class="fas fa-comment-dots"></i></div>
<div class="addon-name">SMS &amp; WhatsApp Alerts</div>
<div class="addon-price">₹499/mo</div>
<div class="addon-desc">Booking confirmations, payment receipts, reminders via SMS &amp; WhatsApp Business API</div>
<button class="addon-btn" onclick="toggleAddon(this)">+ Add to plan</button>
</div>
<div class="addon-card">
<div class="addon-icon" style="background:var(--purple-bg);color:var(--purple)"><i class="fas fa-mobile-alt"></i></div>
<div class="addon-name">Customer App</div>
<div class="addon-price">₹999/mo</div>
<div class="addon-desc">White-labelled iOS &amp; Android app for your customers to book &amp; pay online</div>
<button class="addon-btn" onclick="toggleAddon(this)">+ Add to plan</button>
</div>
<div class="addon-card">
<div class="addon-icon" style="background:var(--green-bg);color:var(--green)"><i class="fas fa-robot"></i></div>
<div class="addon-name">AI Demand Forecasting</div>
<div class="addon-price">₹1,499/mo</div>
<div class="addon-desc">Predict inventory needs, peak hours, staffing, and revenue with ML models</div>
<button class="addon-btn" onclick="toggleAddon(this)">+ Add to plan</button>
</div>
<div class="addon-card">
<div class="addon-icon" style="background:var(--accent-glow);color:var(--accent)"><i class="fas fa-print"></i></div>
<div class="addon-name">Cloud KOT Printing</div>
<div class="addon-price">₹299/mo</div>
<div class="addon-desc">Kitchen order tickets printed to multiple stations in real-time via cloud</div>
<button class="addon-btn" onclick="toggleAddon(this)">+ Add to plan</button>
</div>
<div class="addon-card">
<div class="addon-icon" style="background:var(--coral-bg);color:var(--coral)"><i class="fas fa-gift"></i></div>
<div class="addon-name">Loyalty &amp; CRM</div>
<div class="addon-price">₹799/mo</div>
<div class="addon-desc">Points, rewards, customer segmentation, birthday offers, re-engagement campaigns</div>
<button class="addon-btn" onclick="toggleAddon(this)">+ Add to plan</button>
</div>
<div class="addon-card">
<div class="addon-icon" style="background:var(--amber-bg);color:var(--amber)"><i class="fas fa-chart-pie"></i></div>
<div class="addon-name">Executive Reports</div>
<div class="addon-price">₹599/mo</div>
<div class="addon-desc">Auto-generated daily, weekly, monthly PDF reports emailed to stakeholders</div>
<button class="addon-btn" onclick="toggleAddon(this)">+ Add to plan</button>
</div>
<div class="addon-card">
<div class="addon-icon" style="background:var(--pink-bg);color:var(--pink)"><i class="fas fa-warehouse"></i></div>
<div class="addon-name">Advanced Inventory</div>
<div class="addon-price">₹699/mo</div>
<div class="addon-desc">Multi-warehouse, auto-reorder, supplier management, wastage tracking, FIFO</div>
<button class="addon-btn" onclick="toggleAddon(this)">+ Add to plan</button>
</div>
<div class="addon-card">
<div class="addon-icon" style="background:var(--bg4);color:var(--text2)"><i class="fas fa-shield-alt"></i></div>
<div class="addon-name">Premium Support</div>
<div class="addon-price">₹999/mo</div>
<div class="addon-desc">Dedicated account manager, phone support, on-site training, priority queue</div>
<button class="addon-btn" onclick="toggleAddon(this)">+ Add to plan</button>
</div>
</div>
</div>
<!-- CTA Banner -->
<div class="cta-banner">
<div>
<h3>Need a custom setup for your platform?</h3>
<p>Talk to our team for custom vendor limits, SLA, white-label pricing, and dedicated infrastructure.</p>
</div>
<div class="cta-btns">
<button class="btn-ghost" onclick="showToast('Opening demo booking calendar…')">Book a demo</button>
<button class="btn-primary" onclick="showToast('Connecting you to our enterprise sales team!')">Talk to sales →</button>
</div>
</div>
</div>
</div>
@endsection