<?php
use App\Http\Middleware\NpmMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/lol/status/v3/shard-data', [\App\Http\Controllers\WrapperController::class, 'sharddata'])->middleware('npm')->name('sharddata');
Route::get('/lol/platform/v3/champion-rotations', [\App\Http\Controllers\WrapperController::class, 'championRotations'])->middleware('npm')->name('championRotations');
Route::get('/lol/summoner/v4/summoners/by-name/{summonerName}', [\App\Http\Controllers\WrapperController::class, 'summonerByName'])->middleware('npm')->name('summonerbyName');
Route::get('/lol/league/v4/entries/{queue}/{tier}/{division}', [\App\Http\Controllers\WrapperController::class, 'allLeagueEntries'])->middleware('npm')->name('allLeagueEntries');
Route::get('/lol/spectator/v4/featured-games', [\App\Http\Controllers\WrapperController::class, 'featured'])->middleware('npm')->name('featured');
Route::get('/user/identitas', function (){
    return [
        'code' => '0',
        'data' => [
            'npm'=>'197006073',
            'nama'=>'Alfa Adriel Monico',
            'email'=>'197006073'
        ]
    ];
})->middleware('npm');
