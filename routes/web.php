<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('template.app');
});

Route::group(['prefix' => 'pessoas'], function(){
    Route::get('/', 'PessoasController@index');
    Route::get('/novo', 'PessoasController@novoView');
    Route::get('/{id}/editar', 'PessoasController@editarView');
    Route::get('/{id}/excluir', 'PessoasController@excluirView');
    Route::get('/{id}/destroy', 'PessoasController@destroy');
    Route::post('/store', 'PessoasController@store');
    Route::post('/update', 'PessoasController@update');

});
