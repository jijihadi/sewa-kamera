<div class="sidebar-body">
    <ul class="nav">
        <!-- <li class="nav-item nav-category">Main</li>
        <li class="nav-item {{ isActive('dashboard') }}">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="link-icon" data-feather="box"></i>
                <span class="link-title">Dashboard</span>
            </a>
        </li> -->
        <li class="nav-item nav-category">penyewaan</li>
        <li class="nav-item">
            <a href="{{route('sewa')}}" class="nav-link">
                <i class="link-icon" data-feather="calendar"></i>
                <span class="link-title">Jadwal penyewaan</span>
            </a>
        </li>
        <li class="nav-item {{ isActive('history') }}">
            <a href="{{route('sewa.history', 'm='.date('m'))}}" class="nav-link">
                <i class="link-icon" data-feather="clipboard"></i>
                <span class="link-title">Riwayat penyewaan</span>
            </a>
        </li>
        <li class="nav-item nav-category">Data data</li>
        <li class="nav-item" {{ isActive('kamera') }}>
            <a href="{{route('kamera')}}" class="nav-link">
                <i class="link-icon" data-feather="camera"></i>
                <span class="link-title">Data Produk</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('merk')}}" class="nav-link">
                <i class="link-icon" data-feather="tag"></i>
                <span class="link-title">Data Merk</span>
            </a>
        </li>
        <li class="nav-item {{ isActive('customer') }}">
            <a href="{{route('customer')}}" class="nav-link">
                <i class="link-icon" data-feather="user-check"></i>
                <span class="link-title">Data Customer</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('user')}}" class="nav-link">
                <i class="link-icon" data-feather="users"></i>
                <span class="link-title">Data User</span>
            </a>
        </li>
    </ul>
</div>
