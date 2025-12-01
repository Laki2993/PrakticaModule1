<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>main</title>
    <link rel="stylesheet" href="{{ asset('css/Admin.css') }}">
</head>
<body>
    <header>
        <img  src="{{ asset('uploads/Logo.png') }}" alt="logo">
        <nav class="headerLinks">
            <a class="headerLink" href="">course</a>
            <a class="headerLink" href="">Blog</a>
            <a class="headerLink" href="">about</a>
            <a class="headerLink" href="">profile</a>
        </nav>
    </header>
    <main>
        <aside>
            <nav class="asideBtns">
                <button class="BtnOrder" id="BtnOrder"> 
                    <img src="{{ asset('uploads/icon_paper.png') }}" alt="paper">    
                    заявки
                </button>
            </nav>
        </aside>
        <section class="Contens" id="Contens">
            
        </section>
    </main>
    <script>
        document.getElementById("BtnOrder").addEventListener("click", function(){
            if(document.getElementById("Contens").style.display == "none"){
                document.getElementById("Contens").style.display ="flex";
            }
            else{
                document.getElementById("Contens").style.display ="none";
            }
        });
    </script>
</body>
</html>