<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
</head>
<body>
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Форма обращения клиента -->
    <h2>Форма обращения клиента</h2>
    <form action="{{ route('contact.send') }}" method="POST">
        @csrf
        <div>
            <label for="first_name">Имя:</label>
            <input type="text" name="first_name" id="first_name" required>
        </div>
        <div>
            <label for="last_name">Фамилия:</label>
            <input type="text" name="last_name" id="last_name" required>
        </div>
        <div>
            <label for="phone">Номер телефона:</label>
            <input type="text" name="phone" id="phone" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="message">Текст обращения:</label>
            <textarea name="message" id="message" rows="5" required></textarea>
        </div>
        <div>
            <button type="submit">Отправить</button>
        </div>
    </form>

    <!-- Ссылки на авторизацию и регистрацию -->
    <div>
        <a href="{{ route('login') }}">Вход</a> |
        <a href="{{ route('register') }}">Регистрация</a>
    </div>

    <h1>Список лидов</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <p>Общее количество лидов: {{ $totalLeads }}</p>

    <p>Количество лидов по статусам:</p>
    <ul>
        @foreach($statuses as $status)
            <li>{{ $status->name }}: {{ $leadsByStatus[$status->id] ?? 0 }}</li>
        @endforeach
    </ul>
</body>
</html>
