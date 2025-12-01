<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Main Page</title>
        <link rel="stylesheet" href="{{ asset('css/Reg.css') }}">
    </head>
    <body>
      <main>
        <form class="blockRegForm" action="#">
            <section class="formInputs">
                <input class="formInput" placeholder="имя" type="text" required>
                <input class="formInput" placeholder="фамилия" type="text" required>
                <input class="formInput" placeholder="отчество" type="text" required>
                <input class="formInput" placeholder="почта" type="email" required>
                <input class="formInput" id="phone" placeholder="телефон" type="tel" minlength="11" maxlength="15" required>
                <input class="formInput" placeholder="логин" type="text" minlength="6" required>
                <input class="formInput" placeholder="пароль" type="password" minlength="8" required>
            </section>
            <button type="submit" id="formBTN">Зарегистрироваться </button>
            <a class="formLink" href="{{ route('login') }}">уже зарегистрирован</a>
        </form>
      </main>
<script>
document.getElementById('phone').addEventListener('input', function(e) {
  let value = this.value.replace(/\D/g, '');
  if (value.length > 0) {
    value = '8(' + value.substring(1, 4) + ')' + value.substring(4, 7) + '-' + value.substring(7, 9) + '-' + value.substring(9, 11);
  }
  this.value = value;
});
</script>
</body>
</html>
