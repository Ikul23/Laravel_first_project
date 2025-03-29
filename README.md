📦 my_first_project
│
├── 📂 app
│ ├── 📂 Console
│ ├── 📂 Exceptions
│ ├── 📂 Http
│ │ ├── 📂 Controllers
│ │ │ └── FormProcessor.php # Контроллер формы
│ │ │ └── Controller.php
│ │ │ └── HomeController.php
│ │ │ └── ProductController.php
│ │ ├── 📂 Middleware
│ │ └── 📂 Requests
│ ├── 📂 Models
│ │ └── User.php # Модель пользователя
│ └── 📂 Providers

├── 📂 config
│ └── database.php # Конфиг БД

├── 📂 database
│ ├── 📂 migrations
│ │ └── 2014_10_12_000000_create_users_table.php # Миграция users
│ └── 📂 seeders
│ ├── 📂 factories
│ │ └── UserFactory.php
├── 📂 public
│ ├── 📂 css
│ └── 📂 js

├── 📂 resources
│ └── 📂 views
│ └── userform.blade.php
│ └── welcome_user.blade.php
│ ├── 📂 layouts
│ └── default.blade.php
│ └── app.blade.php.php

│ ├── 📂 includes
│ └── footer.blade.php
│ └── head.blade.php.php
│ └── header.blade.php

│ └── contacts.blade.php
│ └── home.blade.php
│ └── userform.blade.php
│ └── welcome_user.blade.php

├── 📂 routes
│ └── web.php
│ └── console.php

├── 📂 storage
│ ├── 📂 framework
│ └── 📂 logs

├── .env
├── .env.example
├── artisan
├── composer.json
└── README.md
