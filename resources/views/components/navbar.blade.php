<style>
    #head {
        position: sticky;
        top: 0;
        z-index: 1000; /* Ensure it stays above other content */
        padding: 0 0.5rem;
    }

    #header {
        display: flex;
        flex-wrap: wrap;
        row-gap: 1rem;
        align-items: center;
        justify-content: space-between;
        width: 100%;
    }
    #title {
        font-family: 'Buenard', serif;
        font-size: 225%;
        letter-spacing: 0.4vw;
        padding-top: 3.5vh;
    }

    .hor-line {
        height: 1px;
        background-color: black;
        width: 100%; /* length of the line */
        margin: 0 10px;
    }

    .nav-link {
        color: black;
        text-decoration: none;
        font-weight: 500;
        padding: 0.5rem 1rem;
    }

    .nav-link:hover {
        color: darkgray;
        text-decoration: underline;
    }

    .ver-line {
        width: 1px;
        height: 30px;
        background-color: black;
    }


    #navbar {
        font-family: 'Buenard', serif;
        font-size: 150%;
    }

    .lang-btn {
        background-color: #F5EED2;
        border: 1px solid black;
        padding: 0.375rem 0.75rem;
        font-weight: 500;
        font-family: 'Buenard', serif;
    }

    .lang-btn:hover,
    .lang-btn:focus {
        background-color: #e9e0c1;
        border-color: gray;
    }

    .lang-menu {
        background-color: #F5EED2;
        padding: 0;
        margin: 0;
        border: 1px solid black;
        min-width: 8rem;
    }
    .lang-menu .dropdown-item {
        padding: 0.5rem 1rem;
        color: black;
        font-family: 'Buenard', serif;
        background-color: transparent;
    }

    .lang-menu .dropdown-item:hover {
        background-color: #e9e0c1;
    }

    .auth-btn {
        background-color: #F5EED2;
        border: 1px solid black;
        font-weight: 500;
        font-family: 'Buenard', serif;
        font-size: 125%;
        padding: 0.375rem 0.75rem;
        text-decoration: none;
    }

    .auth-btn:hover {
        background-color: #e9e0c1;
        color: black;
        border-color: gray;
    }

    #username {
        font-weight: 500;
        font-family: 'Buenard', serif;
        font-size: 125%;
    }
</style>
<div id="head">
    <div id="header">
        <a href="{{ route('home')}}"><img src="{{ asset('images/eirovaloda.png') }}" alt="Eirovaloda"></a>
        <p id="title">{{__('navbar.title')}}</p>
        <div class="dropdown" id="language">
            <button class="btn lang-btn dropdown-toggle" type="button" id="languageDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                {{ strtoupper(app()->getLocale()) }}
            </button>
            <ul class="dropdown-menu lang-menu" aria-labelledby="languageDropdown">
                <li>
                    <a class="dropdown-item" href="{{ route('lang.switch', ['locale' => 'en']) }}">{{ __('navbar.english') }}</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('lang.switch', ['locale' => 'lv']) }}">{{ __('navbar.latvian') }}</a>
                </li>
            </ul>
        </div>
        @guest
            <div id="login" class="d-flex flex-column gap-2">
                <a href="{{ route('showLogin') }}" class="btn auth-btn">{{ __('navbar.login') }}</a>
                <a href="{{ route('showRegister') }}" class="btn auth-btn">{{ __('navbar.register') }}</a>
            </div>
        @endguest
        @auth
            <div class="d-flex flex-column justify-center">
                <p id="username" class="text-center">
                    {{ Auth::user()->user_name }}
                    @if (Auth::user()->role === 'admin')
                        {{'(' . __('navbar.admin') . ')'}}
                    @elseif (Auth::user()->role === 'teacher')
                        {{'(' . __('navbar.teacher') . ')'}}
                    @else
                        {{'(' . __('navbar.user') . ')'}}
                    @endif
                </p>
                <div id="options" class="d-flex gap-2">
                    <a href="{{ route('showProfile', Auth::user()->id) }}" class="btn auth-btn">{{ __('navbar.viewProfile') }}</a>
                    <a href="{{ route('logout') }}" class="btn auth-btn">{{ __('navbar.logout') }}</a>
                </div>
            </div>

        @endauth
    </div>
    <div class="hor-line"></div>
    <nav id="navbar">
        <ul class="nav justify-content-around">
            <li class="nav-item">
                <a class="nav-link nav-link" href="{{route('materials')}}">{{ __('navbar.materials') }}</a>
            </li>
            @auth
            <li class="nav-item d-flex align-items-center">
                <div class="ver-line mx-2"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link" href="#">{{ __('navbar.translator') }}</a>
            </li>
            @endauth
        </ul>

    </nav>
    <div class="hor-line"></div>
</div>

