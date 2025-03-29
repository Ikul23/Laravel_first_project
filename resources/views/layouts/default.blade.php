<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Кастомные стили -->
    <style>
        .hero-section {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            color: white;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <!-- Навбар -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                <i class="bi bi-code-slash me-2"></i>
                {{ config('app.name') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="bi bi-house-door me-1"></i> Главная
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('userform') ? 'active' : '' }}"
                            href="{{ route('userform') }}">
                            <i class="bi bi-person-form me-1"></i> Форма
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contacts') ? 'active' : '' }}"
                            href="{{ route('contacts') }}">
                            <i class="bi bi-envelope me-1"></i> Контакты
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Основное содержимое -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Футер -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>О компании</h5>
                    <p>Профессиональная разработка веб-приложений с 2023 года</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <h5>Контакты</h5>
                    <a href="mailto:contact@example.com" class="text-white">contact@example.com</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Кастомные скрипты -->
    @stack('scripts')
</body>

</html>
