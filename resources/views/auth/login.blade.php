    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Auth</title>
        <link rel="stylesheet" href="{{ asset('css/Auth.css') }}"></head>
    </head>
    <body>
    <main>
        <x-auth-session-status class="" :status="session('status')" />

        <form method="POST" class="blockRegForm" action="{{ route('login') }}">
        @csrf

            <input id="email" class="formInput" type="text" name="email" :value="old('email')" placeholder="email"  required autofocus autocomplete="email" />
            <x-input-error :messages="$errors->get('name')"/>

            <input id="password" class="formInput"  type="password" name="password" placeholder="пароль" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="" />

        <!--
        <div class="">
            <label for="remember_me" class="">
                <input id="remember_me" type="checkbox" class="" name="remember">
                <span class="">{{ __('Remember me') }}</span>
            </label>
        </div>-->

        <div class="footerForm">
            <button id="formBTN">{{ __('Войти') }}</button>
            <div class="formLinks">
                @if (Route::has('password.request'))
                    <a class="formLink" href="{{ route('password.request') }}">{{ __('забыли пароль?') }}</a>
                @endif
                <a href="{{ route('register') }}" class="formLink">зарегистрироваться</a>
            </div>
        </div>
        </form>
    </main>
</body>
</html>
    
    
    
