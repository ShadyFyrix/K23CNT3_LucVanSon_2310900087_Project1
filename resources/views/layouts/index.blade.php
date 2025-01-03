<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiệm Tạp Hoá UnderTrade</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('layouts/styles.css') }}">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon"/>
    <style>
        /* Background image for the banner */
        .banner {
            background: url('{{ asset('images/bg2.jpg') }}') no-repeat center center/cover fixed;
        }
        .products {
            background: url('{{ asset('images/bg4.jpg') }}') no-repeat center center/cover fixed;
        }
        .contact {
            background: url('{{ asset('images/bg3.jpg') }}') no-repeat center center/cover fixed;
        }
        /* Add a logo image */
        .logo img {
            max-width: 70px; /* Adjust size */
        }

        /* Style for cart items */
        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding: 5px;
            border-bottom: 1px solid #ddd;
        }

        .cart-item img {
            max-width: 50px;
            margin-right: 10px;
        }

        /* Background for the page */
        body {
            background: url('{{ asset('images/bg5.jpg') }}') no-repeat center center/cover fixed;
            background-attachment: fixed;
        }
        /* Scroll-to-top button styles */
    .scroll-to-top-btn {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 50px;
        height: 50px;
        background-color: #f39c12; /* Màu cam nổi bật */
        color: white;
        border: none;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        transition: all 0.3s ease;
        z-index: 1000;
        display: none; /* Ẩn nút mặc định */
    }   

    .scroll-to-top-btn:hover {
        background-color: #e67e22; /* Màu đậm hơn khi hover */
        box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.3);
        transform: scale(1.1); /* Tăng kích thước một chút */
    }

    .scroll-to-top-btn i {
        font-size: 20px; /* Kích thước icon */
    }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="banner text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Tiệm Tạp Hoá UnderTrade"> Tiệm Tạp Hoá UnderTrade
            </div>
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a href="#home" class="nav-link text-white">Home</a></li>
                    <li class="nav-item"><a href="#products" class="nav-link text-white">Products</a></li>
                    <li class="nav-item"><a href="#about" class="nav-link text-white">About</a></li>
                    <li class="nav-item"><a href="#contact" class="nav-link text-white">Contact</a></li>
                    <li class="nav-item"><a href="#cart" id="view-cart" class="nav-link text-white"><i class="fas fa-shopping-cart"></i> Cart (<span id="cart-count">0</span>)</a></li>
                    <!-- Kiểm tra trạng thái đăng nhập -->
                    @if (session()->has('user'))
                        <!-- Hiển thị tên người dùng khi đã đăng nhập -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ session('user')->lvs_Hotenkhachhang }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('lvs_guestlogout') }}" 
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                       Logout
                                    </a>
                                </li>
                            </ul>
                            <form id="logout-form" action="{{ route('lvs_guestlogout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>                        
                    @else
                        <!-- Hiển thị nút đăng nhập / đăng ký khi chưa đăng nhập -->
                        <li class="nav-item">
                            <a href="{{ route('lvs_guestlogin') }}" class="nav-link text-white">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('lvs_guestsignup') }}" class="nav-link text-white">Sign Up</a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>    

    <!-- Banner Section -->
    <section id="home" class="banner text-center text-white py-5">
        <div class="container">
            <h1 class="display-4">Chào Mừng Đến Với Tiệm Tạp Hoá UnderTrade </h1>
            <p class="lead">Nơi Trao Đổi Những Sản Phẩm Chất Lượng Cao Với Giá Vô Cùng Hợp Lý!</p>
            <a href="#products" class="btn btn-warning btn-lg">Buy Now!!!</a>
        </div>
    </section>

    <!-- Filter Section -->
    <section id="filter" class="filter py-3 bg-light">
        <div class="container">
            <form method="GET" action="{{ url('/') }}">
                <select name="category" id="category" class="form-select w-50 mx-auto" onchange="this.form.submit()">
                    <option value="">Các Loại Sản Phẩm</option>
                    @foreach($lvs_loai_san_pham as $loai_san_pham)
                        <option value="{{ $loai_san_pham->id }}" {{ $selected_category == $loai_san_pham->id ? 'selected' : '' }}>
                            {{ $loai_san_pham->lvs_TenLoai}}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
    </section>
    
    <!-- Products Section -->
    <section id="products" class="products py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Sản Phẩm Của Bên Tôi</h2>
            <div class="row g-4">
                @foreach($lvs_san_pham as $san_pham)
                <div class="col-md-4">
                    <div class="card product shadow-sm">
                        <img src="{{ $san_pham->lvs_HinhAnh ? asset('images/' . $san_pham->lvs_HinhAnh) : 'https://via.placeholder.com/150' }}" 
                             class="card-img-top" 
                             alt="{{ $san_pham->lvs_TenSanPham }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $san_pham->lvs_TenSanPham }}</h5>
                            <p class="card-text text-success fw-bold">{{ number_format($san_pham->lvs_DonGia, 2) }}VND</p>
                            <button class="btn btn-primary add-to-cart" 
                                    data-id="{{ $san_pham->id }}" 
                                    data-name="{{ $san_pham->lvs_TenSanPham }}" 
                                    data-price="{{ $san_pham->lvs_DonGia }}">
                                Thêm Vào Cart
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>    

    <!-- About Section -->
    <section id="about" class="about py-5">
        <div class="container">
            <h2 class="text-center mb-4">About Us</h2>
            <p class="text-center">Chúng Tôi Buôn Bán Và Trao Đổi Những Sản Phẩm Chất Lượng Cao Với Giá Vô Cùng Hợp Lý!.</p>
            <p class="text-center"> Nếu Bạn Có Sản Phầm Muốn Bán Thì Bạn Có Thể Liên Hệ Đến Admin Để Được Trao Đổi Giá Cả</p>
            <p class="text-center">Mọi Sản Phẩm Được Kiểm Tra Kĩ Luôn, Nên Bạn Không Phải Lo Về Chất Lượng Sản Phầm </p>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact py-5 bg-light">
        <div class="container text-center">
            <h2 class="mb-4">Contact Us</h2>
            <p>Name: Lục Văn Sơn</p>
            <p>Id: 2310900087</p>
            <p>Phone: 0212313131</p>
            <p>Email: shadyfyrix@gmail.com</p>
            <p>Phone: 0212313131</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; Made in 2025, This is My First Project so hope you enjoy. Ý em là mong thầy thích :C </p>
    </footer>

    <!-- Scroll-to-top Button -->
    <button id="scroll-to-top" class="scroll-to-top-btn">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Modal for Cart -->
    <div id="cart-overlay" class="position-fixed w-100 h-100 top-0 start-0 bg-dark bg-opacity-50 d-none"></div>
    <div id="cart-modal" class="position-fixed top-50 start-50 translate-middle bg-white p-4 shadow rounded d-none" style="width: 90%; max-width: 400px;">
        <button id="close-cart" class="btn-close float-end"></button>
        <h2>Shopping Cart</h2>
        <div id="cart-items" class="my-3"></div>
        <div class="fw-bold">Total: $<span id="cart-total">0.00</span></div>
    </div>

    <!-- Scripts -->
    <script>
        const cart = [];

        // Add product to cart
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', () => {
                const productId = button.dataset.id;
                const productName = button.dataset.name;
                const productPrice = parseFloat(button.dataset.price);

                const existingProduct = cart.find(item => item.id === productId);

                if (existingProduct) {
                    existingProduct.quantity += 1;
                } else {
                    cart.push({
                        id: productId,
                        name: productName,
                        price: productPrice,
                        quantity: 1
                    });
                }

                updateCart();
            });
        });

        // Update cart
        function updateCart() {
            const cartItems = document.getElementById('cart-items');
            const cartTotal = document.getElementById('cart-total');
            const cartCount = document.getElementById('cart-count');

            cartItems.innerHTML = '';
            let total = 0;
            let count = 0;

            cart.forEach(item => {
                total += item.price * item.quantity;
                count += item.quantity;

                const cartItem = document.createElement('div');
                cartItem.className = 'cart-item';
                cartItem.innerHTML = `
                    <div class="d-flex align-items-center">
                        <img src="https://via.placeholder.com/50"  alt="${item.name}">
                        <span>${item.name} x ${item.quantity}</span>
                    </div>
                    <button class="btn btn-danger btn-sm remove-from-cart" data-id="${item.id}">Remove</button>
                `;
                cartItems.appendChild(cartItem);
            });

            cartTotal.textContent = total.toFixed(2);
            cartCount.textContent = count;

            document.querySelectorAll('.remove-from-cart').forEach(button => {
                button.addEventListener('click', () => {
                    const productId = button.dataset.id;
                    const index = cart.findIndex(item => item.id === productId);
                    if (index !== -1) cart.splice(index, 1);
                    updateCart();
                });
            });
        }

        // Open and close cart modal
        document.getElementById('view-cart').addEventListener('click', () => {
            document.getElementById('cart-modal').classList.remove('d-none');
            document.getElementById('cart-overlay').classList.remove('d-none');
        });

        document.getElementById('close-cart').addEventListener('click', () => {
            document.getElementById('cart-modal').classList.add('d-none');
            document.getElementById('cart-overlay').classList.add('d-none');
        });
        // Scroll-to-top functionality
const scrollToTopButton = document.getElementById('scroll-to-top');

// Hiển thị nút khi cuộn xuống
window.addEventListener('scroll', () => {
    if (window.scrollY > 200) { // Chỉ hiện nút khi cuộn hơn 200px
        scrollToTopButton.style.display = 'block';
    } else {
        scrollToTopButton.style.display = 'none';
    }
});

// Cuộn lên đầu khi bấm vào nút
scrollToTopButton.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth' // Hiệu ứng mượt mà
    });
});

    </script>
</body>
</html>
