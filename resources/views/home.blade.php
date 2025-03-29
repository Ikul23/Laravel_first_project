@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-hover shadow">
                    <div class="card-header bg-primary text-white">
                        <h2 class="h4 mb-0"><i class="bi bi-map me-2"></i>Наши контакты</h2>
                    </div>
                    <div class="card-body">
                        <!-- Основная контактная информация -->
                        <div class="row g-4 mb-5">
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <div class="me-3 text-primary">
                                        <i class="bi bi-geo-alt" style="font-size: 2rem;"></i>
                                    </div>
                                    <div>
                                        <h3 class="h5">Адрес</h3>
                                        <p class="mb-0">{{ $contact_info['address'] }}</p>
                                        <small class="text-muted">Почтовый индекс: {{ $contact_info['post_code'] }}</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="d-flex">
                                    <div class="me-3 text-primary">
                                        <i class="bi bi-envelope" style="font-size: 2rem;"></i>
                                    </div>
                                    <div>
                                        <h3 class="h5">Email</h3>
                                        <p class="mb-0">
                                            <a href="mailto:{{ $contact_info['email'] }}">{{ $contact_info['email'] }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="d-flex">
                                    <div class="me-3 text-primary">
                                        <i class="bi bi-telephone" style="font-size: 2rem;"></i>
                                    </div>
                                    <div>
                                        <h3 class="h5">Телефон</h3>
                                        <p class="mb-0">
                                            <a href="tel:{{ preg_replace('/[^0-9]/', '', $contact_info['phone']) }}">
                                                {{ $contact_info['phone'] }}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="d-flex">
                                    <div class="me-3 text-primary">
                                        <i class="bi bi-github" style="font-size: 2rem;"></i>
                                    </div>
                                    <div>
                                        <h3 class="h5">GitHub</h3>
                                        <p class="mb-0">
                                            @if (isset($contact_info['github']))
                                                <a href="{{ $contact_info['github'] }}" target="_blank">
                                                    Профиль на GitHub
                                                </a>
                                            @else
                                                <span class="text-muted">Не указан</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Форма обратной связи -->
                        <div class="mt-5">
                            <h3 class="h4 mb-4"><i class="bi bi-send me-2"></i>Форма обратной связи</h3>
                            <form action="{{ route('form.store') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" placeholder="Ваше имя"
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            required>
                                    </div>
                                    <div class="col-12">
                                        <textarea name="message" class="form-control" rows="4" placeholder="Сообщение" required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-send-fill me-1"></i> Отправить
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
