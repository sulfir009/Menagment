<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Partner Management System')</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Styles -->
        <style>
            body {
                font-family: 'Figtree', sans-serif;
                background-color: #f8f9fa;
                color: #343a40;
            }

            .header {
                background-color: #343a40;
                color: white;
                padding: 2rem 0;
            }

            .header h1 {
                font-weight: 700;
            }

            .main-container {
                padding: 3rem 0;
            }

            .card-custom {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                border: none;
                border-radius: 15px;
                overflow: hidden;
            }

            .card-custom:hover {
                transform: translateY(-5px);
                box-shadow: 0px 12px 24px rgba(0, 0, 0, 0.15);
            }

            .btn-custom {
                background-color: #343a40;
                color: white;
                transition: background-color 0.3s ease;
            }

            .btn-custom:hover {
                background-color: #495057;
            }

            footer {
                background-color: #343a40;
                color: white;
                padding: 1.5rem 0;
            }
        </style>
    </head>
    <body>
        <!-- Header Section -->
        <header class="header text-center">
            <div class="container">
                <h1 class="display-4">@yield('header-title', 'Partner Management System')</h1>
                <p class="lead">@yield('header-subtitle', 'Manage your business partnerships with ease and efficiency')</p>
            </div>
        </header>

        <!-- Main Content Section -->
        <div class="main-container">
            <div class="container">
                @yield('content')
            </div>
        </div>

        <!-- Footer Section -->
        <footer class="text-center">
            <div class="container">
                <p class="mb-0">Partner Management System v1.0 | PHP v{{ PHP_VERSION }}</p>
            </div>
        </footer>

        <!-- Bootstrap JS and dependencies -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
