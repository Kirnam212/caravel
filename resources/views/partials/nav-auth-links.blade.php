@auth
    <a href="{{ route('profile.index') }}" class="nav-link">Мой профиль</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="nav-link">Выход</button>
    </form>
@else
    <a href="{{ route('login') }}" class="nav-link">Вход</a>
    <a href="{{ route('register') }}" class="nav-link">Регистрация</a>
@endauth


