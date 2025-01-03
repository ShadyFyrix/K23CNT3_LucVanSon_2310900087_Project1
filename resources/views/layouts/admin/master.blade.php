<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon"/>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main-container {
            display: flex;
            flex: 1;
            height: 100%; /* To ensure it stretches the full height */
            overflow: hidden;
        }

        .sideBar {
            flex: 0 0 250px; /* Fixed width of sidebar */
            background: linear-gradient(to bottom, #3a3a3a, #606060);
            color: white;
            height: 100%;
            overflow-y: auto; /* Scrollbar for long sidebar */
            transition: all 0.3s ease;
        }

        .sideBar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 12px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .sideBar a:hover {
            background: #6c757d;
            transform: scale(1.05);
        }

        .sideBar .active {
            background: #f8f9fa;
            color: #333;
        }

        .wrapper {
            flex: 1; /* Fills the remaining space */
            overflow-y: auto; /* Scrollable content */
            padding: 20px;
            background: #f8f9fa;
        }

        .content-body {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar {
            background: #ffffff;
            border-bottom: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar input[type="text"] {
            border-radius: 20px;
            border: 1px solid #ccc;
            padding: 5px 10px;
        }

        .badge {
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .badge:hover {
            transform: scale(1.2);
        }
    </style>
</head>
<body>
    <!-- Main Container -->
    <div class="main-container">
        <!-- Sidebar -->
        <nav class="sideBar">
            @include('layouts.admin.menu')
        </nav>

        <!-- Main Content -->
        <section class="wrapper">
            <!-- Header -->
            <header class="mb-3">
                @include('layouts.admin.headerTittle')
            </header>    

            <!-- Content Body -->
            <section class="content-body">
                @yield('content-body')
            </section>
        </section>
    </div>

    <!-- JS Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
