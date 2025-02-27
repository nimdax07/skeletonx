{{-- Sidebar Menu --}}
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    {{-- Dashboard --}}
    <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>Dashboard</p>
        </a>
    </li>

    {{-- Admin Only: Kelola User --}}
    @if(Auth::user()->role === 'admin')
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Kelola User</p>
            </a>
        </li>
    @endif

    {{-- Admin & Marketing: Data Penjualan --}}
    <li class="nav-item">
        <a href="{{ route('sales.index') }}" class="nav-link">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>Data Penjualan</p>
        </a>
    </li>

    {{-- Logout --}}
    <li class="nav-item">
        <a href="#" class="nav-link"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>

</ul>
