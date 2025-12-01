<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>order</title>
    <link rel="stylesheet" href="{{ asset('css/Order.css') }}">
</head>
<body>
    <main>
        <section class="Block_Order">
            <section class="writer">
                <article class="inputs">
                    <input type="text" class="input" placeholder="период обучения" required>
                    <input type="text" class="input" placeholder="формат обучения" required>
                    <input type="date" class="input" placeholder="дата/время начала" required>
                    <input type="text" class="input" placeholder="номер карты" required>
                    <input type="password" class="input" placeholder="cvc" required>
                </article>
                <nav class="btns">
                    <button class="BtnOrder">Подать заявку</button>
                    <input class="BtnPromo" placeholder="промокод">
                </nav>
            </section>
            <section class="Descriptions">
                <article class="Description">
                    <h1>Fullstack-разработчик</h1>
                    <p>Мечтаете стать универсальным солдатом в IT? Наш<br>
                        курс по Fullstack-разработке — ваш пропуск в мир<br>
                        высоких технологий. За 6 месяцев вы с нуля<br> 
                        освоите JavaScript, научитесь создавать<br> 
                        интерфейсы на React и «оживлять» серверную<br> 
                        часть с помощью Node.js.</p>
                </article>
                <article class="Price">
                    <h2 class="NowPrice">2999 ₽</h2>
                    <h6 class="OldPrice">6999 ₽ </h6>
                </article>
            </section>
        </section>
    </main>
</body>
</html>