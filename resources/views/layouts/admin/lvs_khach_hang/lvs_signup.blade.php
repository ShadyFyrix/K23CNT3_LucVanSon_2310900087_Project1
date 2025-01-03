<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Sign Up</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon"/>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, rgb(188, 0, 122), rgb(126, 227, 121));
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            max-width: 400px;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            animation: fadeIn 1s ease-out;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn {
            width: 100%;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            position: relative;
            margin-bottom: 15px;
        }

        /* Hover animation for button */
        .btn:hover {
            background-color: #563d7c !important;
            color: white !important;
            transition: all 0.3s;
        }

        /* Fade-in animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Custom style for the "login" link */
        .login-link {
            text-align: center;
            margin-top: 10px;
        }

        .login-link a {
            color: #007bff;
            font-weight: bold;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Sign Up Form -->
    <div class="container mt-4">
        <h2><i class="fas fa-user-plus"></i> Đăng ký</h2>
        <form method="POST" action="{{ route('lvs_guestsignupsubmit') }}">
            @csrf
            <div class="form-group">
                <label><i class="fas fa-id-card"></i> Mã khách hàng</label>
                <input type="text" name="lvs_Makhachhang" class="form-control" placeholder="Nhập mã khách hàng" required>
            </div>
            <div class="form-group">
                <label><i class="fas fa-user"></i> Họ tên</label>
                <input type="text" name="lvs_Hotenkhachhang" class="form-control" placeholder="Nhập họ tên" required>
            </div>
            <div class="form-group">
                <label><i class="fas fa-envelope"></i> Email</label>
                <input type="email" name="lvs_Email" class="form-control" placeholder="Nhập email" required>
            </div>
            <div class="form-group">
                <label><i class="fas fa-lock"></i> Mật khẩu</label>
                <input type="password" name="lvs_MatKhau" class="form-control" placeholder="Nhập mật khẩu" required>
            </div>
            <div class="form-group">
                <label><i class="fas fa-phone"></i> Số điện thoại</label>
                <input type="text" name="lvs_DienThoai" class="form-control" placeholder="Nhập số điện thoại" required>
            </div>
            <div class="form-group">
                <label><i class="fas fa-map-marker-alt"></i> Địa chỉ</label>
                <input type="text" name="lvs_DiaChi" class="form-control" placeholder="Nhập địa chỉ" required>
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-user-check"></i> Đăng ký</button>
        </form>

        <div class="login-link">
            <p>Đã có tài khoản? <a href="{{ route('lvs_guestlogin') }}">Đăng nhập</a></p>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https
