<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.pengembalian.*') ? 'active' : '' }}" href="{{ route('admin.pengembalian.index') }}">
        <i class="bi bi-arrow-return-left"></i>
        <span>Kelola Pengembalian</span>
    </a>
</li>