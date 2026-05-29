import re
import os
from bs4 import BeautifulSoup

html_file = 'omnipos-billing-platform.html'
with open(html_file, 'r', encoding='utf-8') as f:
    html_content = f.read()

soup = BeautifulSoup(html_content, 'html.parser')

# Extract CSS
css_content = ''
for style in soup.find_all('style'):
    if style.string:
        css_content += style.string + '\n'
    style.decompose()

os.makedirs('public/css', exist_ok=True)
with open('public/css/style.css', 'w', encoding='utf-8') as f:
    f.write(css_content)

# Extract JS
js_content = ''
for script in soup.find_all('script'):
    if script.string:
        js_content += script.string + '\n'
    script.decompose()

os.makedirs('public/js', exist_ok=True)
with open('public/js/script.js', 'w', encoding='utf-8') as f:
    f.write(js_content)

# Extract Layout and Pages
pages_divs = soup.find_all('div', class_=lambda c: c and 'page' in c.split())
pages_content = {}
for page in pages_divs:
    page_id = page.get('id', '')
    if page_id.startswith('page-'):
        page_name = page_id[5:]
        pages_content[page_name] = str(page)
        page.decompose() # Remove from main layout
    else:
        print('Unknown page id:', page_id)

# The remaining body in soup is the layout
# We will inject @yield('content') where the pages were
content_container = soup.find('div', class_='main') # Adjust if necessary based on HTML
if content_container:
    # We need to find where pages were originally, they are probably inside .main
    pass

layout_html = str(soup)

os.makedirs('resources/views/layouts', exist_ok=True)
with open('resources/views/layouts/app.blade.php', 'w', encoding='utf-8') as f:
    f.write(layout_html)

os.makedirs('resources/views/pages', exist_ok=True)
for name, content in pages_content.items():
    with open(f'resources/views/pages/{name}.blade.php', 'w', encoding='utf-8') as f:
        f.write(f"@extends('layouts.app')\n@section('content')\n{content}\n@endsection")

print('Extraction completed.')
