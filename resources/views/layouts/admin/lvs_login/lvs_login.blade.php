<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon"/>
    <style>
        /* Toàn bộ body */
        body {
            background: linear-gradient(135deg, #b00f3a, #ea6a15);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }

        /* Card form đăng nhập */
        .login-card {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
            padding: 30px;
            width: 100%;
            max-width: 400px;
            animation: fadeIn 0.8s ease-out;
        }

        /* Tiêu đề */
        .login-card h1 {
            font-size: 26px;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Form nhóm */
        .form-group {
            margin-bottom: 20px;
        }

        /* Input trường nhập */
        .form-control {
            border: 2px solid #ddd;
            border-radius: 25px;
            padding: 10px 15px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #2575fc;
            box-shadow: 0px 4px 10px rgba(37, 117, 252, 0.3);
        }

        /* Icon trong input */
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 16px;
            color: #8159ac;
        }

        .form-control.input-with-icon {
            padding-left: 40px;
        }

        /* Nút đăng nhập */
        .btn-primary {
            background-color: #7b8ba6;
            border: none;
            border-radius: 25px;
            padding: 10px 15px;
            width: 100%;
            font-size: 16px;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #6a11cb;
            box-shadow: 0px 4px 10px rgba(106, 17, 203, 0.3);
            transform: translateY(-2px);
        }

        /* Keyframe animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h1><i class="fas fa-user-shield"></i> Đăng Nhập Admin</h1>
        <form action="{{ route('login.lvslogsubmit') }}" method="post">
            @csrf
            <!-- Tên tài khoản -->
            <div class="form-group">
                <label for="lvs_TaiKhoan" class="form-label">Tài khoản</label>
                <div style="position: relative;">
                    <i class="fas fa-user input-icon"></i>
                    <input 
                        type="text" 
                        name="lvs_TaiKhoan" 
                        id="lvs_TaiKhoan" 
                        class="form-control input-with-icon" 
                        placeholder="Nhập tên tài khoản"
                    >
                </div>
                @error('lvs_TaiKhoan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Mật khẩu -->
            <div class="form-group">
                <label for="lvs_MatKhau" class="form-label">Mật khẩu</label>
                <div style="position: relative;">
                    <i class="fas fa-lock input-icon"></i>
                    <input 
                        type="password" 
                        name="lvs_MatKhau" 
                        id="lvs_MatKhau" 
                        class="form-control input-with-icon" 
                        placeholder="Nhập mật khẩu"
                    >
                </div>
                @error('lvs_MatKhau')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Nút gửi -->
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-sign-in-alt"></i> Đăng nhập
            </button>
        </form>
    </div>
</body>
</html>
