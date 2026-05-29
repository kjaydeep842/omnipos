
// ── Navigation
function showPage(id, navEl) {
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
  document.getElementById('page-' + id).classList.add('active');
  const titles = {dashboard:'Dashboard',plans:'Plans & Pricing',vendors:'Vendors & Shops',billing:'Billing & Invoices',analytics:'Analytics',booking:'Bookings',settings:'Settings'};
  document.getElementById('topbar-title').textContent = titles[id] || id;
  if (navEl) navEl.classList.add('active');
  else {
    document.querySelectorAll('.nav-item').forEach(n => {
      if (n.getAttribute('onclick') && n.getAttribute('onclick').includes(id)) n.classList.add('active');
    });
  }
  window.scrollTo(0,0);
}

// ── Dashboard chart
function buildChart() {
  const days = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
  const rev = [82000,95000,110000,88000,139600,145000,102000];
  const comm = [8200,9500,11000,8800,13960,14500,10200];
  const max = Math.max(...rev);
  const chartEl = document.getElementById('revenue-chart');
  const labelsEl = document.getElementById('chart-labels');
  if (!chartEl) return;
  chartEl.innerHTML = '';
  labelsEl.innerHTML = '';
  days.forEach((d,i) => {
    const grp = document.createElement('div');
    grp.className = 'chart-bar-group';
    const b1 = document.createElement('div');
    b1.className = 'bar b1';
    b1.style.height = (rev[i]/max*100)+'%';
    b1.title = '₹'+rev[i].toLocaleString('en-IN');
    const b2 = document.createElement('div');
    b2.className = 'bar b2';
    b2.style.height = (comm[i]/max*100)+'%';
    b2.title = 'Comm: ₹'+comm[i].toLocaleString('en-IN');
    grp.appendChild(b1); grp.appendChild(b2);
    chartEl.appendChild(grp);
    const lbl = document.createElement('div');
    lbl.className = 'chart-label'; lbl.textContent = d;
    labelsEl.appendChild(lbl);
  });
}

// ── Billing toggle
let isYearly = false;
function toggleBilling() {
  isYearly = !isYearly;
  const btn = document.getElementById('billing-toggle');
  btn.classList.toggle('yearly', isYearly);
  document.getElementById('toggle-lbl-monthly').classList.toggle('active', !isYearly);
  document.getElementById('toggle-lbl-yearly').classList.toggle('active', isYearly);
  document.querySelectorAll('.plan-price-main').forEach(el => {
    el.textContent = isYearly ? el.dataset.yearly : el.dataset.monthly;
  });
}

// ── Invoice calculator
function calcTotal() {
  const rows = document.querySelectorAll('#items-body tr');
  let sub = 0;
  rows.forEach(row => {
    const qty = parseFloat(row.cells[1]?.querySelector('input')?.value) || 0;
    const rate = parseFloat(row.cells[2]?.querySelector('input')?.value) || 0;
    const amt = qty * rate;
    const amtCell = row.querySelector('.amt');
    if (amtCell) amtCell.textContent = '₹' + amt.toLocaleString('en-IN');
    sub += amt;
  });
  const cgst = Math.round(sub * 0.025);
  const sgst = Math.round(sub * 0.025);
  const grand = sub + cgst + sgst;
  document.getElementById('subtotal').textContent = '₹' + sub.toLocaleString('en-IN');
  document.getElementById('cgst').textContent = '₹' + cgst.toLocaleString('en-IN');
  document.getElementById('sgst').textContent = '₹' + sgst.toLocaleString('en-IN');
  document.getElementById('grand-total').textContent = '₹' + grand.toLocaleString('en-IN');
}

function addItem() {
  const tbody = document.getElementById('items-body');
  const tr = document.createElement('tr');
  tr.innerHTML = `<td><input type="text" placeholder="Item name" oninput="calcTotal()"></td><td><input type="number" value="1" min="1" style="width:100%" oninput="calcTotal()"></td><td><input type="number" value="0" oninput="calcTotal()"></td><td style="color:var(--text1);font-weight:500" class="amt">₹0</td><td><button class="del-btn" onclick="delItem(this)"><i class="fas fa-trash"></i></button></td>`;
  tbody.appendChild(tr);
}

function delItem(btn) {
  btn.closest('tr').remove();
  calcTotal();
}

// ── Addon toggle
function toggleAddon(btn) {
  if (btn.classList.contains('added')) {
    btn.classList.remove('added');
    btn.textContent = '+ Add to plan';
    showToast('Add-on removed from plan');
  } else {
    btn.classList.add('added');
    btn.textContent = '✓ Added to plan';
    showToast('Add-on added successfully!');
  }
}

// ── Toast
let toastTimer;
function showToast(msg) {
  const toast = document.getElementById('toast');
  document.getElementById('toast-msg').textContent = msg;
  toast.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => toast.classList.remove('show'), 3000);
}

// ── Filter pills
function filterVendors(el, type) {
  document.querySelectorAll('.filter-pill').forEach(p => p.classList.remove('active'));
  el.classList.add('active');
}

// ── Service tabs (billing)
function switchServiceTab(btn) {
  document.querySelectorAll('.service-tab').forEach(t => t.classList.remove('active'));
  btn.classList.add('active');
  const types = {'🍽 Restaurant':'Restaurant POS','🏨 Hotel':'Hotel Billing','🚌 Bus':'Bus Booking','🏥 Hospital':'Hospital Billing'};
  const title = types[btn.textContent] || btn.textContent;
  document.querySelector('.ib-title').textContent = 'New Invoice — ' + title;
}

// ── Booking tabs
function switchBookingTab(btn) {
  document.querySelectorAll('.booking-tab').forEach(t => t.classList.remove('active'));
  btn.classList.add('active');
}

// ── Settings nav
function selectSettingsNav(el) {
  document.querySelectorAll('.settings-nav-item').forEach(n => n.classList.remove('active'));
  el.classList.add('active');
}

// ── Toggle switches
function toggleSwitch(sw) {
  if (sw.classList.contains('on')) { sw.classList.remove('on'); sw.classList.add('off'); }
  else { sw.classList.remove('off'); sw.classList.add('on'); }
}

// ── Heatmap
function buildHeatmap() {
  const container = document.getElementById('heatmap-container');
  if (!container) return;
  const days = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
  const hours = ['6am','8am','10am','12pm','2pm','4pm','6pm','8pm','10pm','11pm','12am','1am'];
  const intensities = [
    [1,2,4,8,6,4,3,7,9,5,2,1],
    [1,2,5,9,7,5,4,8,10,6,2,1],
    [1,3,6,8,7,5,4,7,9,5,2,1],
    [1,2,4,7,6,4,3,6,8,4,2,1],
    [2,3,5,8,7,6,5,9,10,6,3,2],
    [3,4,6,9,8,7,6,10,10,7,4,3],
    [2,3,5,8,7,6,5,9,9,6,3,2],
  ];
  const colors = ['var(--bg4)','rgba(34,201,154,0.1)','rgba(34,201,154,0.2)','rgba(34,201,154,0.35)','rgba(34,201,154,0.5)','rgba(34,201,154,0.65)','rgba(34,201,154,0.75)','rgba(34,201,154,0.85)','rgba(34,201,154,0.9)','var(--teal)','var(--teal)'];

  let html = '<div style="overflow-x:auto"><table style="border-collapse:collapse;font-size:11px;width:100%"><thead><tr><th style="color:var(--text3);padding:4px 8px;text-align:left;width:40px">Day</th>';
  hours.forEach(h => { html += `<th style="color:var(--text3);padding:4px 6px;text-align:center;font-weight:400">${h}</th>`; });
  html += '</tr></thead><tbody>';
  days.forEach((day, di) => {
    html += `<tr><td style="color:var(--text2);padding:4px 8px;font-weight:500">${day}</td>`;
    intensities[di].forEach(v => {
      html += `<td style="padding:3px"><div style="height:26px;border-radius:4px;background:${colors[v]};cursor:default" title="${v*10}% activity"></div></td>`;
    });
    html += '</tr>';
  });
  html += '</tbody></table></div>';
  container.innerHTML = html;
}

// ── Room map
function buildRooms() {
  const el = document.getElementById('rooms-grid');
  if (!el) return;
  const rooms = [
    {n:'101',s:'available'},{n:'102',s:'occupied'},{n:'103',s:'available'},{n:'104',s:'reserved'},{n:'105',s:'available'},
    {n:'201',s:'occupied'},{n:'202',s:'occupied'},{n:'203',s:'maintenance'},{n:'204',s:'occupied'},{n:'205',s:'occupied'},
    {n:'206',s:'available'},{n:'207',s:'reserved'},{n:'208',s:'occupied'},{n:'209',s:'available'},{n:'210',s:'occupied'},
    {n:'301',s:'occupied'},{n:'302',s:'occupied'},{n:'303',s:'available'},{n:'304',s:'reserved'},{n:'305',s:'available'},
    {n:'306',s:'maintenance'},{n:'307',s:'occupied'},{n:'308',s:'occupied'},{n:'309',s:'available'},{n:'310',s:'occupied'},
    {n:'401',s:'available'},{n:'402',s:'occupied'},{n:'403',s:'available'}
  ];
  el.innerHTML = rooms.map(r => `<div class="room-card ${r.s}" onclick="showToast('Room ${r.n} — ${r.s}')"><div class="room-num">${r.n}</div><div class="room-status">${r.s}</div></div>`).join('');
}

// ── Init
buildChart();
buildHeatmap();
// buildRooms(); // Disabled to allow Blade dynamic rendering
calcTotal();

