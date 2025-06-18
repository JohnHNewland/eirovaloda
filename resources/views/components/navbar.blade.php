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
                <a class="nav-link" href="{{route('materials')}}">{{ __('navbar.materials') }}</a>
            </li>
            @auth
            <li class="nav-item d-flex align-items-center">
                <div class="ver-line mx-2"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('translate.index')}}">{{ __('navbar.translator') }}</a>
            </li>
            @endauth
        </ul>

    </nav>
    <div class="hor-line"></div>
</div>

