<!DOCTYPE html>
<html lang="ja">
<head>
    <title>@yield('title', 'わんカフェ')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="/css/tailwind/tailwind.min.css">

    <link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">
    <script src="/js/main.js"></script>
</head>
<body class="antialiased bg-body text-body font-body">

<!-- ▼▼▼▼共通ヘッダー▼▼▼▼　-->
<header>
    <div class="container px-4 mx-auto">
        <nav class="flex items-center justify-between py-6">
            <a class="text-3xl font-semibold leading-none" href="/">わんカフェ</a>
            <ul class="hidden lg:flex ml-12 mr-auto space-x-12">
                <li><a class="text-sm text-blueGray-400 hover:text-blueGray-500" href="/customer/index">トップ</a></li>
                <li><a class="text-sm text-blueGray-400 hover:text-blueGray-500" href="/customer/dog/index">わんこ紹介</a></li>
                <li><a class="text-sm text-blueGray-400 hover:text-blueGray-500" href="/customer/blogs/detail">ブログ</a></li>
                <li><a class="text-sm text-blueGray-400 hover:text-blueGray-500" href="/customer/menu/index">メニュー</a></li>
                <li><a class="text-sm text-blueGray-400 hover:text-blueGray-500" href="/customer/inquiry/index">お問い合わせ</a></li>
                <li><a class="text-sm text-blueGray-400 hover:text-blueGray-500" href="/reservation">ご予約</a></li>
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
<footer class="bg-black">
    <div class="px-4 container mx-auto p-10 flex justify-between">
        <div class="text-white text-left">
            <h2 class="text-xl font-semibold">わんカフェ</h2>
            <p>〒123-4567</p>
            <p>東京都中央区晴海</p>
        </div>

        <ul class="text-white text-left hidden md:flex flex-wrap flex-col h-12 md:w-128">
            <li class="ml-6"><a href="/customer/index" class="hover:underline">トップ</a></li>
            <li class="ml-6"><a href="customer/dog/index" class="hover:underline">わんこ紹介</a></li>
            <li class="ml-6"><a href="customer/blogs/detail" class="hover:underline">ブログ</a></li>
            <li class="ml-6"><a href="customer/menu/index"class="hover:underline">メニュー</a></li>
            <li class="ml-6"><a href="/contact" href="/customer/inquiry/index">お問い合わせ</a></li>
            <li class="ml-6"><a href="/contact" href="/reservation">ご予約</a></li>

        </ul>
    </div>
</footer>
<!-- ▲▲▲▲共通フッター▲▲▲▲　-->
</body>
</html>
