<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .sideBar {
            width: 250px;
            background: gray;
            color: white;
            height: 100vh;
            position: fixed;
        }
        .sideBar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
        }
        .sideBar a:hover {
            background: #6c757d; /* Bootstrap's gray dark hover color */
        }
        .wrapper {
            margin-left: 250px; /* Match sidebar width */
            padding: 20px;
            background: #f8f9fa; /* Bootstrap's light background */
            min-height: 100vh;
        }
        .content-body {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <section class="container-fluid d-flex">
        <!-- Sidebar -->
        <nav class="sideBar">
            @include('layouts.admin.menu')
        </nav>

        <!-- Main Content Wrapper -->
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
    </section>

    <!-- JS Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
