<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>registr</title>
    <link rel="stylesheet" href="{{ asset('css/Reg.css') }}"></head>
<body>
    <main>
        <form method="POST" class="blockRegForm" action="{{ route('register') }}">
            @csrf
        
            
        <x-text-input class="formInput" id="name"  type="text" placeholder="имя" name="name" :value="old('name')" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')"  />

        <x-text-input class="formInput" id="last_name"  type="text" placeholder="фамилия" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
        <x-input-error :messages="$errors->get('last_name')"  />   
            
        <x-text-input class="formInput" id="patronymic"  type="text" placeholder="отчество" name="patronymic" :value="old('patronymic')" required autofocus autocomplete="patronymic" />
        <x-input-error :messages="$errors->get('patronymic')"  />    
        
        <x-text-input class="formInput" id="email"  type="email" placeholder="email" name="email" :value="old('email')" required autocomplete="username" minlength="11" maxlength="15" />
        <x-input-error :messages="$errors->get('email')"  />

        <x-text-input class="formInput" id="phone"  type="tel" placeholder="телефон" name="phone" :value="old('phone')" required autocomplete="phone" />
        <x-input-error :messages="$errors->get('phone')"  />

        <x-text-input class="formInput" id="login"  type="text" placeholder="логин" name="login" :value="old('login')" required autocomplete="login" />
        <x-input-error :messages="$errors->get('login')"  />
        
        <x-text-input class="formInput" id="password"  type="password" placeholder="пароль" name="password" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password')"  />
        
        <x-text-input class="formInput" id="password_confirmation"  type="password" placeholder="повторить пароль" name="password_confirmation" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password_confirmation')"  />
        
        <x-primary-button id="formBTN"> {{ __('Зарегистрироваться') }}</x-primary-button>
        <a class="formLink" href="{{ route('login') }}"> {{ __('уже зарегистрирован') }}</a>
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
