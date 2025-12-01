<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auth</title>
    <link rel="stylesheet" href="{{ asset('css/Auth.css') }}">
</head>
<body>
    <main>
        <form class="blockRegForm" action="#">
            <section class="formInputs">
                <input class="formInput" placeholder="логин" type="text" minlength="6" required>
                <input class="formInput" placeholder="пароль" type="password" minlength="8" required>
            </section>
            <button type="submit" id="formBTN">Войти </button>
            <a class="formLink" href="{{ route('Reg') }}">я уже зарегистрирован</a>
        </form>
    </main>
</body>
</html>