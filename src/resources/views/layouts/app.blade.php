<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <title>Flea Market App</title>
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-logo__content">
                <a href="/" class="header-logo__home-link">
                    <img src="/images/logo.svg">
                </a>
            </div>
            <div class="header__search-content">
                <form action="/" method="get" class="header__search-form">
                    @csrf
                    <input type="text" name="keyword" class="header__search-input" placeholder="なにをお探しですか？">
                </form>
            </div>
            <nav class="header__nav">
                <ul class="header__nav-list">
                    <li>
                        @if (Auth::check())
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="header__logout-button">ログアウト</button>
                            </form>
                        @else
                            <a href="/login" class="header__login-button">ログイン</a>
                        @endif
                    </li>
                    <li>
                        <a href="/mypage" class="header__mypage-button">マイページ</a>
                    </li>
                    <li>
                        <a href="/sell" class="header__sell-button">出品</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>