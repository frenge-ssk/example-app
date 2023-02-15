<?php //PHPファイルの開始タグ。開始タグと終了タグの中に書かれたコードはPHPとして実行される。ファイル内全体がPHPコードである場合は、終了タグを省略できる。

namespace App\Http\Controllers\Tweet;  //namespaceで名前空間を指定して、同名の関数や同名の変数がファイル内に複数存在することによる衝突を避けることができる。

use App\Http\Controllers\Controller;   //App\Http\Controllers\Controller でControllerクラスが定義されているファイルパスが書かれており、Controllerクラスがインポートされる。use宣言はエイリアス機能もあり、これ以降このファイル内では「Controller」という名前だけでクラスが使えるようになる。
use App\Models\Tweet;
use Illuminate\Http\Request;   //Illuminate\Http\Request でRequestクラスが定義されているファイルパスが書かれており、Requestクラスがインポートされる。use宣言はエイリアス機能もあり、これ以降このファイル内では「Request」という名前だけでクラスが使えるようになる。
use App\Services\TweetService;

class IndexController extends Controller  //Controllerクラスを継承した子クラスIndexControllerクラスを定義
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, TweetService $tweetService)  //publicはアクセス修飾子で、どこからでもこのメソッドへのアクセスが可能であることを表す（publicは省略可） _invoke()はマジックメソッドといい、シングルアクションControllerでメソッド名を省略してルーティングを記述できるようになる。
                                                                            //依存性の注入。TweetServiceクラスのオブジェクトを受け取っている。
    {
        $tweets = $tweetService->getTweets();
        return view('tweet.index')
            ->with('tweets', $tweets);
    }
}

