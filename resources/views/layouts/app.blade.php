
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
     


    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

</head>
<body>

    <div class="min-vh-100 d-flex flex-column">

        @include('layouts.navigation')

        <main class="flex-grow-1 container my-4">
            @yield('content')
        </main>

        <footer class="text-center py-3 bg-light mt-5">
    @auth
        <small>{{ auth()->user()->sirketAyar->adres ?? 'Adres bilgisi eklenmemiş.' }}</small>
    @else
        <small>© 2025 Laravel</small>
    @endauth
</footer>

    </div>

    <!-- Bootstrap JS Bundle CDN (Popper dahil) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
