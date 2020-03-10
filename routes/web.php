<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('template.app');
});

Route::group(['prefix' => 'pessoas'], function(){
    Route::get('/', 'PessoasController@index');

});
