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
    <x-app-layout></x-app-layout>

    <main>
<form class="Block_Order" method="POST" action="{{ route('application.submit') }}">
    @csrf <!-- Обязательно! -->
    
    <section class="writer">
        <article class="inputs">
            <!-- Исправляем дублирующиеся value в lerning -->
            <select class="input" name="Sfer" id="Sfer" required>
                <option value="" selected disabled>Сфера</option>
                <option value="1">Основы Веб разработки</option>
                <option value="2">Основы алгоритмизации и программирования</option>
                <option value="3">Основы разработки баз данных</option>
            </select>
            
            <select class="input" name="lerning" id="lerning" required>
                <option value="" selected disabled>Период обучения</option>
                <option value="1">2 месяца</option>
                <option value="2">6 месяцев</option>
                <option value="3">12 месяцев</option> <!-- Исправил value -->
            </select>
            
            <select class="input" name="format" id="format" required>
                <option value="" selected disabled>Формат обучения</option>
                <option value="1">Онлайн</option>
                <option value="2">Офлайн</option>
            </select>
            
            <label class="date-label">
                <span>дата начала</span>
                <input type="date" class="input" id="Date" name="Date" required min="{{ date('Y-m-d') }}">
            </label>
        </article>
        
        <nav class="btns">
            <button type="submit" class="BtnOrder" id="btn">
                Подать заявку
            </button>
            
            <!-- Сообщения об успехе/ошибке -->
            @if(session('success'))
                <div style="color: green; margin-top: 10px;">
                    {{ session('success') }}
                </div>
            @endif
            
            @if(session('error'))
                <div style="color: red; margin-top: 10px;">
                    {{ session('error') }}
                </div>
            @endif
        </nav>
    </section>
    
    <!-- Остальная часть формы без изменений -->
    <section class="Descriptions">
        <article class="Description">
            <h1 id="Title">Fullstack-разработчик</h1>
            <p id="Desk">Мечтаете стать универсальным солдатом в IT? Наш<br>
                курс по Fullstack-разработке — ваш пропуск в мир<br>
                высоких технологий. За 6 месяцев вы с нуля<br> 
                освоите JavaScript, научитесь создавать<br> 
                интерфейсы на React и «оживлять» серверную<br> 
                часть с помощью Node.js.</p>
        </article>
        <article class="Price">
            <h2 class="NowPrice"></h2>
            <h6 class="OldPrice"></h6>
        </article>
    </section>
</form>
    </main>
    <script>

        document.getElementById("btn").addEventListener("click", function(){
            loc
        })
        document.getElementById("Sfer").addEventListener("change", function(){
            const selectedValue = this.value;
             const selectedText = this.options[this.selectedIndex].text;
    
            if (selectedValue === "1") {
                document.getElementById("Title").innerHTML = "Основы Веб-разработки";
                document.getElementById("Desk").innerHTML = "Хотите создавать современные сайты и веб-приложения? Наш курс по основам веб-разработки — идеальный старт в IT. За 4 месяца вы освоите HTML и CSS, научитесь создавать адаптивную верстку и добавите интерактивность с помощью JavaScript. Начните свой путь в программировании с нами!";
                document.querySelector(".NowPrice").innerHTML = "2999 ₽";
                document.querySelector(".OldPrice").innerHTML = "6999 ₽";
            } else if (selectedValue === "2") {
                document.getElementById("Title").innerHTML = "Основы алгоритмизации и программирования";                
                document.getElementById("Desk").innerHTML = "Хотите понять логику программирования и научиться решать сложные задачи? Наш курс по алгоритмизации — фундамент для любой IT-специальности. За 5 месяцев вы освоите базовые алгоритмы, структуры данных и научитесь мыслить как программист. Начните с основ — создайте прочный фундамент для карьеры в IT!";
                document.querySelector(".NowPrice").innerHTML = "4599 ₽";
                document.querySelector(".OldPrice").innerHTML = "10999 ₽";
            } else if (selectedValue === "3") {
                document.getElementById("Title").innerHTML = "Основы разработки баз данных";                
                document.getElementById("Desk").innerHTML = "Хотите управлять информацией как профессионал? Наш курс по базам данных откроет вам мир структурированного хранения информации. За 3 месяца вы освоите проектирование БД, научитесь писать сложные SQL-запросы и оптимизировать работу с данными. Станьте специалистом, который понимает данные изнутри!";
                document.querySelector(".NowPrice").innerHTML = "8699 ₽";
                document.querySelector(".OldPrice").innerHTML = "12099 ₽";
            } else if (selectedValue === "0") {
                alert("Пожалуйста, выберите сферу");
            }
        });
    </script>
</body>
</html>