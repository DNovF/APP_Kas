<div>
    <a href="{{ route('home') }}" 
       class="btn {{ request()->routeIs('home') ? 'btn-primary' : 'btn-outline-primary' }}">
       Semua Pengguna
    </a>

    <a href="{{ route('user') }}" 
       class="btn {{ request()->routeIs('user') ? 'btn-primary' : 'btn-outline-primary' }}">
       Tambah Pengguna
    </a>
</div>
