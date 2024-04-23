<?php

use App\Contracts\GreeteInterface;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Services\GreetService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting/{name?}', function (?string $name = 'anonymous') {
    return 'Hello ' . $name. ' !';
})->whereAlpha('name')->name('greet');

Route::get('/hey', function () {
    return redirect()->route('greet');
});

Route::get('/controller', [Controller::class, 'index']);
Route::get('/user/controller', [UserController::class, 'index']);

//依存のあるクラスをサービスコンテナで依存解決するようにバインド.
Route::get('/di', function (GreetService $greetService) {
    $greetMessage =  $greetService->greet();
    return $greetMessage;
});

Route::get('/di/service', function (Application $app, GreetService $greetService) {
    $greetServiceFromContainer = $app->make(GreetService::class);
    $greetMessage = $greetServiceFromContainer->greet();
    return $greetMessage;
});

//サービスコンテナにinterfaceとその実装クラスをバインド.
Route::get('/di/interface', function (GreeteInterface $greeteInterface) {
    $greetMessage = $greeteInterface->greet();
    return $greetMessage;
});