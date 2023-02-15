<?php //PHPファイルの開始タグ。開始タグと終了タグの中に書かれたコードはPHPとして実行される。ファイル内全体がPHPコードである場合は、終了タグを省略できる。

namespace App\Models;  //namespaceで名前空間を指定して、同名の関数や同名の変数がファイル内に複数存在することによる衝突を避けることができる。

use Illuminate\Database\Eloquent\Factories\HasFactory;  //Illuminate\Database\Eloquent\Factories\HasFactory でHasFactoryクラスが定義されているファイルパスが書かれており、HasFactoryクラスがインポートされる。use宣言はエイリアス機能もあり、これ以降このファイル内では「HasFactory」という名前だけでクラスが使えるようになる。
use Illuminate\Database\Eloquent\Model; //Illuminate\Database\Eloquent\Model でModelクラスが定義されているファイルパスが書かれており、Modelクラスがインポートされる。use宣言はエイリアス機能もあり、これ以降このファイル内では「Model」という名前だけでクラスが使えるようになる。
use App\Models\User;

class Tweet extends Model  //Modelクラスを継承した子クラスTweetクラスを定義
{
    use HasFactory;  //Tweetクラス内に外部クラスのHasFactoryをインポート

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class, 'tweet_images')
        ->using(TweetImage::class);
    }
}
