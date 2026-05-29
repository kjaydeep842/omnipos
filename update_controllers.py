import os

controllers = ['Dashboard', 'Analytics', 'Billing', 'Vendor', 'Booking', 'Plan', 'Settings']

for ctrl in controllers:
    file_path = f'app/Http/Controllers/{ctrl}Controller.php'
    view_name = ctrl.lower()
    if view_name == 'vendor':
        view_name = 'vendors'
    elif view_name == 'plan':
        view_name = 'plans'
        
    content = f'''<?php

namespace App\\Http\\Controllers;

use Illuminate\\Http\\Request;

class {ctrl}Controller extends Controller
{{
    public function index()
    {{
        return view('pages.{view_name}');
    }}
}}
'''
    with open(file_path, 'w') as f:
        f.write(content)
