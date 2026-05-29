@extends('layouts.app')
@section('content')
<div class="page" id="page-billing">
<div style="padding:28px">
<div class="page-header">
<h1>Billing &amp; Invoices</h1>
<p>Create invoices across all service types — restaurant, hotel, hospital, bus booking</p>
</div>
<div class="service-tabs">
<button class="service-tab active" onclick="switchServiceTab(this)">🍽 Restaurant</button>
<button class="service-tab" onclick="switchServiceTab(this)">🏨 Hotel</button>
<button class="service-tab" onclick="switchServiceTab(this)">🚌 Bus</button>
<button class="service-tab" onclick="switchServiceTab(this)">🏥 Hospital</button>
</div>
<div class="billing-grid">
<div class="invoice-builder">
<div class="ib-header">
<div class="ib-title">New Invoice — Restaurant POS</div>
<span style="font-size:12px;color:var(--accent);font-weight:600">#INV-2026-0428</span>
</div>
<div class="invoice-meta">
<div class="form-group">
<label>Vendor / Shop</label>
<select class="form-control">
<option>Spice Garden</option>
<option>The Punjabi Dhaba</option>
<option>City Restaurant</option>
</select>
</div>
<div class="form-group">
<label>Table / Section</label>
<select class="form-control">
<option>Table #7</option>
<option>Table #3</option>
<option>Takeaway</option>
<option>Delivery</option>
</select>
</div>
<div class="form-group">
<label>Customer Name</label>
<input class="form-control" placeholder="Walk-in customer" type="text"/>
</div>
<div class="form-group">
<label>Mobile</label>
<input class="form-control" placeholder="+91 98765 43210" type="text"/>
</div>
<div class="form-group">
<label>Invoice Date</label>
<input class="form-control" type="date" value="2026-05-29"/>
</div>
<div class="form-group">
<label>Payment Mode</label>
<select class="form-control">
<option>UPI / QR</option>
<option>Cash</option>
<option>Card</option>
<option>Wallet</option>
</select>
</div>
</div>
<div class="items-table-wrap">
<table class="items-table" id="items-table">
<thead>
<tr>
<th style="width:38%">Item</th>
<th style="width:12%">Qty</th>
<th style="width:20%">Rate (₹)</th>
<th style="width:20%">Amount</th>
<th style="width:10%"></th>
</tr>
</thead>
<tbody id="items-body">
<tr>
<td><input oninput="calcTotal()" type="text" value="Butter Chicken"/></td>
<td><input min="1" oninput="calcTotal()" style="width:100%" type="number" value="2"/></td>
<td><input oninput="calcTotal()" type="number" value="380"/></td>
<td class="amt" style="color:var(--text1);font-weight:500">₹760</td>
<td><button class="del-btn" onclick="delItem(this)"><i class="fas fa-trash"></i></button></td>
</tr>
<tr>
<td><input oninput="calcTotal()" type="text" value="Garlic Naan"/></td>
<td><input min="1" oninput="calcTotal()" style="width:100%" type="number" value="4"/></td>
<td><input oninput="calcTotal()" type="number" value="60"/></td>
<td class="amt" style="color:var(--text1);font-weight:500">₹240</td>
<td><button class="del-btn" onclick="delItem(this)"><i class="fas fa-trash"></i></button></td>
</tr>
<tr>
<td><input oninput="calcTotal()" type="text" value="Lassi (Sweet)"/></td>
<td><input min="1" oninput="calcTotal()" style="width:100%" type="number" value="2"/></td>
<td><input oninput="calcTotal()" type="number" value="80"/></td>
<td class="amt" style="color:var(--text1);font-weight:500">₹160</td>
<td><button class="del-btn" onclick="delItem(this)"><i class="fas fa-trash"></i></button></td>
</tr>
</tbody>
</table>
<button class="add-item-btn" onclick="addItem()">
<i class="fas fa-plus"></i> Add item
            </button>
</div>
<div class="invoice-totals">
<div class="total-row"><span>Subtotal</span><span class="total-val" id="subtotal">₹1,160</span></div>
<div class="total-row"><span>CGST (2.5%)</span><span class="total-val" id="cgst">₹29</span></div>
<div class="total-row"><span>SGST (2.5%)</span><span class="total-val" id="sgst">₹29</span></div>
<div class="total-row"><span>Discount</span><span class="total-val" style="color:var(--teal)">− ₹0</span></div>
<div class="total-row grand"><span>Grand Total</span><span id="grand-total">₹1,218</span></div>
</div>
<div class="invoice-actions">
<button class="btn-ghost" onclick="showToast('Invoice saved as draft!')"><i class="fas fa-save" style="margin-right:6px"></i>Save Draft</button>
<button class="btn-primary" onclick="showToast('Invoice printed &amp; sent to customer via WhatsApp!')"><i class="fas fa-print" style="margin-right:6px"></i>Print &amp; Generate</button>
</div>
</div>
<!-- Recent Invoices sidebar -->
<div class="invoice-summary">
<div class="summary-title">Recent Invoices</div>
<div class="recent-inv">
<div class="inv-item">
<div><div class="inv-num">#INV-0427</div><div class="inv-vendor">Spice Garden · Table 5</div></div>
<div><div class="inv-amount">₹2,340</div><div class="inv-status"><span class="status-pill active" style="font-size:10px"><span class="status-dot2"></span>Paid</span></div></div>
</div>
<div class="inv-item">
<div><div class="inv-num">#INV-0426</div><div class="inv-vendor">Sunrise Inn · Room 204</div></div>
<div><div class="inv-amount">₹5,200</div><div class="inv-status"><span class="status-pill active" style="font-size:10px"><span class="status-dot2"></span>Paid</span></div></div>
</div>
<div class="inv-item">
<div><div class="inv-num">#INV-0425</div><div class="inv-vendor">MedCare · OPD</div></div>
<div><div class="inv-amount">₹850</div><div class="inv-status"><span class="status-pill active" style="font-size:10px"><span class="status-dot2"></span>Paid</span></div></div>
</div>
<div class="inv-item">
<div><div class="inv-num">#INV-0424</div><div class="inv-vendor">Gujarat Express</div></div>
<div><div class="inv-amount">₹9,500</div><div class="inv-status"><span class="status-pill active" style="font-size:10px"><span class="status-dot2"></span>Paid</span></div></div>
</div>
<div class="inv-item">
<div><div class="inv-num">#INV-0423</div><div class="inv-vendor">Punjabi Dhaba · Table 9</div></div>
<div><div class="inv-amount">₹3,200</div><div class="inv-status"><span class="status-pill warning" style="font-size:10px"><span class="status-dot2"></span>Pending</span></div></div>
</div>
<div class="inv-item">
<div><div class="inv-num">#INV-0422</div><div class="inv-vendor">City Hospital · IPD</div></div>
<div><div class="inv-amount">₹18,400</div><div class="inv-status"><span class="status-pill active" style="font-size:10px"><span class="status-dot2"></span>Paid</span></div></div>
</div>
<div class="inv-item">
<div><div class="inv-num">#INV-0421</div><div class="inv-vendor">Sunrise Inn · Room 110</div></div>
<div><div class="inv-amount">₹7,800</div><div class="inv-status"><span class="status-pill inactive" style="font-size:10px"><span class="status-dot2"></span>Draft</span></div></div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection