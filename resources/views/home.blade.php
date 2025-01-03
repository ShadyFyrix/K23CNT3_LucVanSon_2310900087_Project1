<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon"/>
    <title>Home</title>
    <style>
        body {
            background: linear-gradient(120deg, #34b720, #ad1398);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-family: 'Arial', sans-serif;
        }

        .card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: none;
            border-radius: 15px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
        }

        .card h1 {
            font-size: 50px;
            font-weight: bold;
        }
        .card h2 {
            font-size: 36px;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            font-size: 18px;
            padding: 10px 20px;
            border-radius: 30px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .btn-primary:hover {
            transform: scale(1.1);
            box-shadow: 0px 4px 10px rgba(0, 123, 255, 0.4);
        }

        .text-center h5 {
            margin-top: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .fa {
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card text-center p-5 animate__animated animate__fadeIn">
            <h1 class="animate__animated animate__fadeInDown">
                <i class="fa fa-handshake"></i> Chào Mừng Bạn Đến Với LVS Admin Panel
            </h1>
            <div class="mt-4">
                @auth
                    <p class="animate__animated animate__fadeInUp">
                        Bạn đã đăng nhập! 
                        <a href="{{ route('lvs.listquantri') }}" class="btn btn-primary">
                            <i class="fa fa-arrow-right"></i> Đi đến Admin Panel
                        </a>
                    </p>
                @else
                    <h2 class="animate__animated animate__fadeInUp">
                        Vui Lòng Đăng Nhập Để Vào Hệ Thống.
                    </h2>
                    <h5 class="animate__animated animate__fadeInUp">
                        Nếu Bạn Không Có Trong Danh Sách, Hãy Liên Hệ Với Admin Để Được Cấp Quyền Đăng Nhập.
                    </h5>
                    <a href="{{ route('login.lvslog') }}" class="btn btn-primary animate__animated animate__pulse animate__infinite">
                        <i class="fa fa-sign-in-alt"></i> Đăng Nhập
                    </a>
                    
                @endauth
            </div>
        </div>
    </div>
</body>
</html>
