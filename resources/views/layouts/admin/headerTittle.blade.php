<nav class="navbar navbar-light bg-light justify-content-between px-3">
    <span>
        <i class="fa-solid fa-bars"></i>
        <input type="text" placeholder="Tìm kiếm" class="form-control d-inline-block w-auto">
    </span>
    <div>
        @if (session('admin_name'))
            <div style="font-weight: bold">
                Chào mừng: <span style="color: red">{{ session('admin_name') }}</span>
            </div>
            <a href="{{ route('trangchu') }}" class="btn btn-success btn-sm" style="font-weight: bold">Home</a>
            <form action="{{ route('lvs_logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm" style="font-weight: bold">Đăng xuất</button>
            </form>
        @else
            <a href="{{ route('login.lvslog') }}" class="btn btn-primary btn-sm" style="font-weight: bold">Đăng nhập</a>
        @endif
        <span class="badge bg-info me-2"><i class="fa-solid fa-comments"></i> 3</span>
        <span class="badge bg-warning text-dark"><i class="fa-solid fa-bell"></i> 15</span>
    </div>
</nav>
