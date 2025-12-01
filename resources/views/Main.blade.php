<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>main</title>
    <link rel="stylesheet" href="{{ asset('css/Main.css') }}">
</head>
<body>
    <header>
        <img  src="{{ asset('uploads/Logo.png') }}" alt="logo">
        <nav>
            <a class="headerLink" href="">course</a>
            <a class="headerLink" href="">Blog</a>
            <a class="headerLink" href="">about</a>
            <a class="headerLink" href="">profile</a>
        </nav>
    </header>
    <main>
        <section class="content">
            <section class="Filter">
                <article class="FilterInputs">
                    <input type="text" placeholder="Сфера">
                    <input type="text" placeholder="Период обучения">
                    <input type="text" placeholder="Формат">
                    <input type="text" placeholder="Цена">
                </article>
                <button class="FilterBtn">
                    Найти 
                    <img src="{{ asset('uploads/Loop.png') }}" alt="">
                </button>
            </section>
            <section class="Cards">
                <article class="Card">
                    <div class="ConteinerCard1"><button class="Card1Btn">Подать заявку</button></div>
                    <div class="ConteinerCard2"></div>
                </article>
                <article class="Card">
                    <div class="ConteinerCard11"><button class="Card1Btn">Подать заявку</button></div>
                </article>
            </section>
        </section>
    </main>
</body>
</html>