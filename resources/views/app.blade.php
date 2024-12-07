<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title> <!-- Default title if not set -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <!-- Your header content, such as navigation links -->
        <nav>
            <ul>
                <!-- More links as needed -->
            </ul>
        </nav>
    </header>

    <main>
        @yield('content') <!-- This is where content from other views will be inserted -->
    </main>

    <footer>
        <!-- Your footer content -->
        <p>&copy; 2024 Your Company</p>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
