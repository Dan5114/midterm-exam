<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Laravel Features')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        h1 {
            font-size: 24px;
        }
        .features-link {
            margin-bottom: 20px;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="features-link">
        <a href="{{ route('features.index') }}">Features</a>
    </div>

    @yield('content')

    <div class="footer">
        &copy;2025 Web Development Technologies - Midterm Exam
    </div>
</body>
</html>