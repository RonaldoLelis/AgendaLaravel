<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('template.app');
});

Route::group(['prefix' => 'pessoas'], function(){
    Route::get('/', function(){
        return redirect('/pessoas/A');
    });
    Route::get('/novo', 'PessoasController@novoView');
    Route::get('/{id}/editar', 'PessoasController@editarView');
    Route::get('/{id}/excluir', 'PessoasController@excluirView');
    Route::get('/{id}/destroy', 'PessoasController@destroy');
    Route::post('/store', 'PessoasController@store');
    Route::post('/update', 'PessoasController@update');
    Route::post('/busca', 'PessoasController@busca');
    Route::get('/{letra}', 'PessoasController@index');
});
