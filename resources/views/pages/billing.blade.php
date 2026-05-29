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
<span style="font-size:12px;color:var(--accent);font-weight:600">Draft</span>
</div>
<form action="{{ route('billing.store') }}" method="POST">
@csrf
<div class="invoice-meta">
<div class="form-group">
<label>Vendor / Shop</label>
<select class="form-control" name="vendor_id" required>
@foreach($vendors as $vendor)
<option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
@endforeach
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
<input class="form-control" type="date" name="date" value="{{ date('Y-m-d') }}" required/>
<input type="hidden" name="amount" id="formAmount" value="1218">
<input type="hidden" name="status" value="Paid">
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
<button type="button" class="btn-ghost" onclick="showToast('Invoice saved as draft!')"><i class="fas fa-save" style="margin-right:6px"></i>Save Draft</button>
<button type="submit" class="btn-primary"><i class="fas fa-print" style="margin-right:6px"></i>Generate Invoice</button>
</div>
</form>
</div>
<!-- Recent Invoices sidebar -->
<div class="invoice-summary">
<div class="summary-title">Recent Invoices</div>
<div class="recent-inv">
@foreach($invoices as $invoice)
<div class="inv-item" style="justify-content: space-between;">
<div><div class="inv-num">{{ $invoice->invoice_number }}</div><div class="inv-vendor">{{ $invoice->vendor->name ?? 'Unknown Vendor' }}</div></div>
<div style="display:flex;align-items:center;gap:10px;"><div class="inv-amount">₹{{ number_format($invoice->amount) }}</div><div class="inv-status"><span class="status-pill {{ $invoice->status == 'Paid' ? 'active' : 'warning' }}" style="font-size:10px"><span class="status-dot2"></span>{{ $invoice->status }}</span></div>
<form action="{{ route('billing.destroy', $invoice->id) }}" method="POST" style="margin:0;" onsubmit="return confirm('Delete this invoice?');">@csrf @method('DELETE')<button type="submit" style="background:none;border:none;color:var(--red);cursor:pointer;font-size:12px;"><i class="fas fa-trash"></i></button></form>
</div>
</div>
@endforeach
</div>
</div>
</div>
</div>
</div>
@endsection