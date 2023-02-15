<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Tweet\UpdateRequest;;
use App\Models\Tweet;
use App\Services\TweetService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request, TweetService $tweetService) //Requestのデータは$requestとして使うよという宣言
    {
        if (!$tweetService->checkOwnTweet($request->user()->id, $request->id())){
            throw new AccessDeniedHttpException();
        }
        $tweet = Tweet::where('id', $request->id())->firstOrFail();  //$requestはUpdateRequestで受け取ったデータを入れる変数。Tweetモデルにアクセスして、UpdateRequestで取得した特定のid()を取得している。FirstOrFail()は存在しないデータが入っている場合はNotFoundになるようにするもの。
        $tweet->content = $request->tweet(); //取得した特定のidのcontentを、新たに取得したtweet()の内容を代入し、更新している。
        $tweet->save();  //saveメソッドでデータベースに保存される
        return redirect()  //元の編集ページにリダイレクトするようにしている。
            ->route('tweet.update.index', ['tweetId' => $tweet->id]) //route呼び出しを簡略化した
            ->with('feedback.success', "つぶやきを編集しました");  //フラッシュセッションデータを追加
    }
}
