<ul class="list-group my-1 p-2">
    <li class="list-group-item active d-flex align-items-center">
        <i class="fas fa-cogs me-2"></i>Quản trị nội dung
    </li>
    @if(session('admin_name'))
        <li class="list-group-item">
            <img src="{{ asset('images/logo.png') }}" alt="Tiệm Tạp Hoá UnderTrade" style="width: 200px; height: auto;">
            <p>Xin chào, <strong>{{ session('admin_name') }}</strong></p>
            <form action="{{ route('lvs_logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-sm btn-danger">Đăng Xuất</button>
            </form>
        </li>
    @else
        <li class="list-group-item">
            <img src="{{ asset('images/logo.png') }}" alt="Tiệm Tạp Hoá UnderTrade" style="width: 200px; height: auto;">
            <a href="{{ route('login.lvslog') }}" class="text-decoration-none">
                <i class="fas fa-sign-in-alt"></i> Đăng Nhập
            </a>
        </li>
    @endif
    <li class="list-group-item">
        <a href="{{ route('trangchu') }}" class="text-decoration-none d-flex align-items-center">
            <i class="fas fa-home me-2"></i>Trang chủ
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('lvs.listquantri') }}" class="text-decoration-none d-flex align-items-center">
            <i class="fas fa-users me-2"></i>Danh sách quản trị
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('lvs-admin.lvs_loai_san_pham') }}" class="text-decoration-none d-flex align-items-center">
            <i class="fas fa-box-open me-2"></i>Loại sản phẩm
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{route('san_pham.index')}}" class="text-decoration-none d-flex align-items-center">
            <i class="fas fa-clipboard-list me-2"></i>Sản phẩm
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{route('lvs.listkhachhang')}}" class="text-decoration-none d-flex align-items-center">
            <i class="fas fa-user me-2"></i>Khách hàng
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('lvs.listHD') }}" class="text-decoration-none d-flex align-items-center">
            <i class="fas fa-receipt me-2"></i>Đơn hàng
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('lvs_listCTHD') }}" class="text-decoration-none d-flex align-items-center">
            <i class="fas fa-info-circle me-2"></i>Chi tiết đơn hàng
        </a>
    </li>
</ul>
