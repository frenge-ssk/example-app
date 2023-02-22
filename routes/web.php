<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;  //Illuminate\Support\Facades\Route でRouteクラスが定義されているファイルパスが書かれており、Routeクラスがインポートされる。use宣言はエイリアス機能もあり、これ以降このファイル内では「Route」という名前だけでクラスが使えるようになる。
use App\Http\Controllers\Tweet\IndexController; //\App\Http\Controllers\Tweet\IndexController でIndexControllerクラスが定義されているファイルパスが書かれており、IndexControllerクラスがインポートされる。use宣言はエイリアス機能もあり、これ以降このファイル内では「IndexController」という名前だけでクラスが使えるようになる。
use App\Http\Controllers\Tweet\CreateController;
use App\Http\Controllers\Tweet\Update\PutController;
use App\Http\Controllers\Tweet\DeleteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('tweet.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/tweet', IndexController::class)  //IndexControllerは単一アクションなので、アクションを指定しなくても自動でIndexControllerの_invokeメソッドが呼び出される。
->name('tweet.index');                        //Routeの名前をつけている
                                              //Route::getでGETメソッドでアクセスすることを表す。第一引数にURLを記載し、第二引数には行う処理（アクション）を書く。
                                              //URLを/tweetとする。そして、IndexControllerクラスにアクセスし、単一アクションコントローラであることから、_invoke()メソッドが実行される。


Route::middleware('auth')->group(function(){
    Route::post('/tweet/create', CreateController::class)
    ->name('tweet.create');
    Route::get('/tweet/update/{tweetId}', App\Http\Controllers\Tweet\Update\IndexController::class)
    ->name('tweet.update.index')->where('tweetId', '[0-9]+');
    Route::put('/tweet/update/{tweetId}', PutController::class)
    ->name('tweet.update.put')->where('tweetId', '[0-9]+');
    Route::delete('/tweet/delete/{tweetId}', DeleteController::class)
    ->name('tweet.delete');
});


require __DIR__.'/auth.php';
