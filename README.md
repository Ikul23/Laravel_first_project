📦 my_first_project
│
├── 📂 app
│ ├── 📂 Console
│ ├── 📂 Exceptions
│ ├── 📂 Http
│ │ ├── 📂 Controllers
│ │ │ └── FormProcessor.php # Контроллер формы
│ │ ├── 📂 Middleware
│ │ └── 📂 Requests
│ ├── 📂 Models
│ │ └── User.php # Модель пользователя
│ └── 📂 Providers
│
├── 📂 config
│ └── database.php # Конфиг БД
│
├── 📂 database
│ ├── 📂 migrations
│ │ └── 2014_10_12_000000_create_users_table.php # Миграция users
│ └── 📂 seeders
│
├── 📂 public
│ ├── 📂 css
│ └── 📂 js
│
├── 📂 resources
│ └── 📂 views
│ └── userform.blade.php
│ └── welcome_user.blade.php
│
├── 📂 routes
│ └── web.php # Роуты GET /userform и POST /store_form
│
├── 📂 storage
│ ├── 📂 framework
│ └── 📂 logs
│
├── .env # Настройки окружения
├── .env.example
├── artisan
├── composer.json
└── README.md
