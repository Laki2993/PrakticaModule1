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
    <x-app-layout></x-app-layout>
    <main>
        <section class="Slider">
            <section class="ControlBar">
                <div class="BtnControl" id="left"><</div>
                <div class="BtnControl" id="right">></div>
            </section>
            <article class="sliderLine" id="sliderLine">
                <div class="card" id="crad1"><button class="Card1Btn"><a href="{{route('order')}}">Подать заявку</a></button></div>
                <div class="card" id="crad2"><button class="Card1Btn"><a href="{{route('order')}}">Подать заявку</a></button></div>
                <div class="card" id="crad3"><button class="Card1Btn"><a href="{{route('order')}}">Подать заявку</a></button></div>
            </article>
        </section>
    </main>
    <footer class="footer">
    <div class="footer-top">
        <div class="footer-container">
            <!-- Лого и описание -->

            <div class="footer-column">
                <h3 class="column-title">Направления</h3>
                <ul class="footer-menu">
                    <li><a href="#" class="menu-link">📱 Разработка</a></li>
                    <li><a href="#" class="menu-link">🎨 Дизайн</a></li>
                    <li><a href="#" class="menu-link">📊 Маркетинг</a></li>
                    <li><a href="#" class="menu-link">📈 Аналитика</a></li>
                    <li><a href="#" class="menu-link">🗣️ Языки</a></li>
                    <li><a href="#" class="menu-link">💼 Бизнес</a></li>
                </ul>
            </div>

            <!-- О нас -->
            <div class="footer-column">
                <h3 class="column-title">Платформа</h3>
                <ul class="footer-menu">
                    <li><a href="#" class="menu-link">👥 О нас</a></li>
                    <li><a href="#" class="menu-link">👨‍🏫 Преподаватели</a></li>
                    <li><a href="#" class="menu-link">⭐ Отзывы</a></li>
                    <li><a href="#" class="menu-link">📰 Блог</a></li>
                    <li><a href="#" class="menu-link">💼 Вакансии</a></li>
                    <li><a href="#" class="menu-link">❓ Помощь</a></li>
                </ul>
            </div>

            <!-- Контакты и подписка -->
            <div class="footer-column">
                <h3 class="column-title">Контакты</h3>
                <div class="contacts">
                    <div class="contact-item">
                        <span class="contact-icon">📧</span>
                        <a href="mailto:info@educourse.ru" class="contact-link">info@educourse.ru</a>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">📞</span>
                        <a href="tel:+78001234567" class="contact-link">8 (800) 123-45-67</a>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">📍</span>
                        <span>Москва, ул. Образовательная, 15</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>
    <script>

    if(document.getElementById("Name").innerHTML == "Admin"){
        document.getElementById("AdminPage").style.display = "block";
    }
    else{
        document.getElementById("AdminPage").style.display = "none"
    }

const cards = [
    { id: 'crad1', left: 0 },
    { id: 'crad2', left: 1200 },
    { id: 'crad3', left: 2400 }
];

function moveNext() {
    cards.forEach(card => {
        card.left += 1200;
        
        if (card.left >= 3600) {
            card.left = 0;
            document.getElementById(card.id).style.zIndex = "0";
            
            setTimeout(() => {
                document.getElementById(card.id).style.left = `${card.left}px`;
            }, 1000);
        } else {
            document.getElementById(card.id).style.zIndex = "1";
            document.getElementById(card.id).style.left = `${card.left}px`;
        }
    });
}
function movePrev() {
    cards.forEach(card => {
        card.left -= 1200;
        
        if (card.left < 0) {
            card.left = 2400; 
            document.getElementById(card.id).style.zIndex = "0";
            
            setTimeout(() => {
                document.getElementById(card.id).style.left = `${card.left}px`;
            }, 1000);
        } else {
            document.getElementById(card.id).style.zIndex = "1";
            document.getElementById(card.id).style.left = `${card.left}px`;
        }
    });
}

let slideInterval = setInterval(moveNext, 5000);

document.getElementById("right").addEventListener("click", () => {
    clearInterval(slideInterval); // Останавливаем автопрокрутку при клике
    movePrev();
    slideInterval = setInterval(moveNext, 5000); // Перезапускаем
});

document.getElementById("left").addEventListener("click", () => {
    clearInterval(slideInterval);
    moveNext();
    slideInterval = setInterval(moveNext, 5000);
});

</script>
</body>
</html>

