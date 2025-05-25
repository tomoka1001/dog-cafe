<!DOCTYPE html>
<html lang="la">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title', "WAN's cafe")</title>
        <link rel="stylesheet" href="/css/normalize.css">
        <link rel="stylesheet" href="/css/customer/layout.css">
    </head>

    <body>
        <!-- ▼▼▼▼共通ヘッダー▼▼▼▼　-->
        <header>
            <div>
                <nav>
                    <a class="title">WAN's cafe</a>
                    <ul>
                        <li><a href="/customer/index">トップ</a></li>
                        <li><a href="/customer/dogs/index">わんこ紹介</a></li>
                        <li><a href="/customer/blogs/detail">ブログ</a></li>
                        <li><a href="/customer/menus/index">メニュー</a></li>
                        <li><a href="/customer/inquiry/index">お問い合わせ</a></li>
                        <li><a href="/customer/reservations/create">ご予約</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <!-- ▲▲▲▲共通ヘッダー▲▲▲▲　-->

        <!-- ▼▼▼▼ページ毎の個別内容▼▼▼▼　-->
        <main>
        @yield('content')
        </main>
        <!-- ▲▲▲▲ページ毎の個別内容▲▲▲▲　-->

        <!-- ▼▼▼▼共通フッター▼▼▼▼　-->
        <footer>
            <div>
                <div>
                    <h2>わんカフェ</h2>
                    <p>〒123-4567</p>
                    <p>東京都中央区晴海</p>
                </div>
                <ul>
                    <li><a href="/customer/index">トップ</a></li>
                    <li><a href="/customer/dogs/index">わんこ紹介</a></li>
                    <li><a href="/customer/blogs/detail">ブログ</a></li>
                    <li><a href="/customer/menus/index">メニュー</a></li>
                    <li><a href="/customer/inquiry/index">お問い合わせ</a></li>
                    <li><a href="/customer/reservations/create">ご予約</a></li>
                </ul>
            </div>
        </footer>
        <!-- ▲▲▲▲共通フッター▲▲▲▲　-->
</body>
</html>