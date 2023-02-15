<!DOCTYPE html> <!-- DOCTYPE宣言といい、ブラウザにHTMLの仕様を認識させるために書く必要がある -->
<html lang="ja"><!-- HTMLの言語を日本語表記に設定している -->
<head><!-- <head></head>内にこのHTMLファイルのさまざまな設定を記述する（文字コードなど）。通常ブラウザの画面には表示されない（titleタグなどは除く） -->
    <meta charset="UTF-8"><!-- <meta>タグは<head>要素に配置されるタグで、このHYMLファイルに関する情報を指定する時に使う。<meta>タグを使って、このHTMLファイルの文字コードをUTF-8に設定している -->
    <meta name="viewport" 
          content="width=device-width, user-scalable=no, initial-scale=1.0,
          maxmum-scale=1.0, minimum-scale=1.0"> <!-- <meta>タグのname属性にviewportと記述することで、ページの表示領域を指定することができる。 -->
                                                <!-- content="width=device-widthでユーザーの端末画面の幅に合わせる指定をしている。 -->
                                                <!-- user-scalableでズームの操作を許可するしないの指定ができる。今回は許可しない。 -->
                                                <!-- initial-scaleはズーム倍率の初期値を指定できる。 minimum-scaleとmaxmum-scaleはこの範囲で倍率の指定ができる。今回は1.0で固定。 -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge"><!-- http-equivはHTML文書で使用する既存のデータ形式を指定する。今回はX-UA-Compatibleのie=edgeを指定しており、使用しているインターネットエクスプローラーで最新のモードを使用するように指定している。 -->
    <link href="/css/app.css" rel="stylesheet">
    <script src="{{ mix('/js/app.js') }}" async defer></script>
    <title>{{ $title ?? 'つぶやきアプリ' }}</title>
    @stack('css')
</head>
<body class="bg-gray-50"><!--  <body></body>内はHTMLファイルの内容を表し、実際にブラウザに表示される内容（文章や画像など）を指定する。 -->
    {{ $slot }}
</body>
</html>