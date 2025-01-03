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
            background: linear-gradient(135deg, rgb(129, 255, 98), rgb(180, 0, 141));
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

        /* Custom style for the "sign-up" link */
        .sign-up-link {
            text-align: center;
            margin-top: 10px;
        }

        .sign-up-link a {
            color: #d9534f;
            font-weight: bold;
            text-decoration: none;
        }

        .sign-up-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Login Form -->
    <div class="container">
        <h2><i class="fas fa-sign-in-alt"></i> Đăng nhập</h2>
        <form method="POST" action="{{ route('lvs_guestloginsubmit') }}">
            @csrf
            <div class="form-group">
                <label><i class="fas fa-envelope"></i> Email</label>
                <input type="email" name="lvs_Email" class="form-control" placeholder="Nhập email của bạn" required>
            </div>
            <div class="form-group">
                <label><i class="fas fa-lock"></i> Mật khẩu</label>
                <input type="password" name="lvs_MatKhau" class="form-control" placeholder="Nhập mật khẩu" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-right"></i> Đăng nhập</button>
        </form>

        <div class="sign-up-link">
            <p>Chưa có tài khoản? <a href="{{ route('lvs_guestsignup') }}">Tạo ngay!</a></p>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
