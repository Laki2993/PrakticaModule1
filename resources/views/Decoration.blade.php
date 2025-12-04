<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>decoration</title>
    <link rel="stylesheet" href="{{ asset('css/Decoration.css') }}">
</head>
<body>
    <main>
        <section class="Massage">
            <article class="MainMassage">
                <img src="{{ asset('uploads/icondecoration.png') }}" alt="decoration">
                <h1>Ваша заявка отправлена на обработку</h1>
            </article>
            <a class="MassageLink" href="{{ route('dashboard') }}">Вернуться на главную</a>
        </section>
    </main>
</body>
</html>