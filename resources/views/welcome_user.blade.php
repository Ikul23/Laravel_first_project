<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Приветствие</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow">
                    <div class="card-body text-center p-4">
                        <h2 class="mb-4">Приветствие</h2>
                        <p class="lead">Привет, Дружок!<strong>{{ $user['first_name'] }}
                                {{ $user['last_name'] }}</strong>!</p>
                        <p>Мы отправили тебе приветственное письмо на <strong>{{ $user['email'] }}</strong></p>
                        <a href="/userform" class="btn btn-primary mt-3">Вернуться к форме</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
