@extends('layouts.default')

@section('content')
    <div class="container">
        <h1>Наши контакты</h1>
        <div class="card mt-4">
            <div class="card-body">
                <p><strong>Адрес:</strong> {{ $contact_info['address'] }}</p>
                <p><strong>Индекс:</strong> {{ $contact_info['post_code'] }}</p>
                <p><strong>Email:</strong> {{ $contact_info['email'] }}</p>
                <p><strong>Телефон:</strong> {{ $contact_info['phone'] }}</p>

                @isset($contact_info['social_links']['github'])
                    <p><strong>GitHub:</strong>
                        <a href="{{ $contact_info['social_links']['github'] }}" target="_blank">
                            {{ $contact_info['social_links']['github'] }}
                        </a>
                    </p>
                @endisset
            </div>
        </div>
    </div>
@endsection
