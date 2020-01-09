<?php

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

// testes

use Illuminate\Support\Facades\Route;
// ->middleware('auth');

Route::resource('automovel','AutomovelController');
Route::resource('filial','FilialController');
Route::resource('funcionario','FuncionarioController');

Route::get('filial/delete/{id}','FilialController@destroy')->name('filial.delete');
Route::get('automovel/delete/{id}','AutomovelController@destroy')->name('automovel.delete');
Route::get('funcionario/delete/{id}','FuncionarioController@destroy')->name('funcionario.delete');


Route::get('funcionario/active/{id}','FuncionarioController@active')->name('funcionario.active');
Route::get('funcionario/disable/{id}','FuncionarioController@disable')->name('funcionario.disable');
/*Route::delete('automovel/{id}','AutomovelController@destroy')->name('automovel.destroy');
Route::put('automovel/{id}','AutomovelController@update')->name('automovel.update');
Route::get('automovel/{id}/edit','AutomovelController@edit')->name('automovel.edit');
Route::get('automovel/create','AutomovelController@create')->name('automovel.create');
Route::get('automovel/{id}','AutomovelController@show')->name('automovel.show');
Route::get('automovel','AutomovelController@index')->name('automovel.index');
Route::get('automovel','AutomovelController@store')->name('automovel.store');*/

/*Route::middleware([])->group(function(){
    
    Route::prefix('admin')->group(function(){
        
        Route::namespace('Admin')->group(function(){
            Route::name('admin.')->group(function(){
                Route::get('/dashboard','TesteController@teste')->name('dashborad');
        
                Route::get('/financeiro','TesteController@teste')->name('financeiro');
                
                Route::get('/produtos','TesteController@teste')->name('produtos');

                Route::get('/',function(){
                    return redirect()->route('admin.dashboard');
                })->name('home');
            });
           
        });
    });
});*/

/*Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace'=> 'Admin'
],function(){
    Route::name('admin.')->group(function(){
        Route::get('/dashboard','TesteController@teste')->name('dashborad');

        Route::get('/financeiro','TesteController@teste')->name('financeiro');
        
        Route::get('/produtos','TesteController@teste')->name('produtos');

        Route::get('/',function(){
            return redirect()->route('admin.dashboard');
        })->name('home');
    });
});*/


/*Route::get('/redirect',function(){
    return redirect()->route('url.name');
});

Route::get('/nome-url',function(){
    return 'Hey hey hey';
})->name('url.name');*/


// Principais
Route::get('/',function(){
    return view('login');
})->name('login');

/*Route::get('/', function () {
    return view('welcome');
});*/