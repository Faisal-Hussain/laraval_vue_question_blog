<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



route::resource('/question',QuestionController::class);
route::apiResource('/category',CategoryController::class);
route::apiResource('/question/{question}/reply',ReplyController::class);

route::post('/like/{reply}','LikeController@LikeIt');
route::delete('/like/{reply}','LikeController@unLikeIt');

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
