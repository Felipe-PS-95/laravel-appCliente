<?php

use Illuminate\Support\Facades\Route;
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

    // ------------- Helpers - Inicio ------------- 
    
    // array_add()
    $array = ['nome'=>'Camila','idade'=>'20'];
    $array = Arr::add($array, 'email','camila@gmail.com');
    $array = Arr::add($array, 'amigo','Guilherme');
    // dd($array);

    // array_collapse()
    $array = [['banana','limão'],['vermelho','azul']];
    $array = Arr::collapse($array);
    // dd($array);

    // array_divide()
    list($key,$value) = Arr::divide(['nome'=>'Camila','idade'=>'20']);
    // dd($key,$value);

    // array_except()
    $array = ['nome'=>'Camila','idade'=>'20'];
    $array = Arr::except($array, 'idade');
    // dd($array);

    // base_path()
    // $path = base_path();
    // $path = base_path('App');
    $path = base_path('Config');
    // dd($path);

    // database_path()
    $path = database_path();
    // dd($path);

    // public_path()
    $path = public_path();
    // dd($path);

    // storage_path()
    $path = storage_path();
    // dd($path);

    // camel_case()
    $text = "Guilherme esta criando uma nova aula";
    // dd(Str::camel($text));

    // snack_case()
    // $text = "Guilherme esta criando uma nova aula";
    $text = "GuilhermeEstaCriandoUmaNovaAula";
    // dd(Str::snake($text));
    
    // str_limit()
    $text = "Guilherme esta criando uma nova aula";
    // dd(Str::limit($text,5));

    // ------------- Helpers - Fim -------------

    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/cliente', ['uses'=>'ClienteController@index','as'=>'cliente.index']);
Route::get('/cliente/adicionar', ['uses'=>'ClienteController@adicionar','as'=>'cliente.adicionar']);
Route::post('/cliente/salvar', ['uses'=>'ClienteController@salvar','as'=>'cliente.salvar']);

// Opcional
// Route::get('/cliente/editar/{id?}', ['uses'=>'ClienteController@editar','as'=>'cliente.editar']);

Route::get('/cliente/editar/{id}', ['uses'=>'ClienteController@editar','as'=>'cliente.editar']);
Route::put('/cliente/atualizar/{id}', ['uses'=>'ClienteController@atualizar','as'=>'cliente.atualizar']);
Route::get('/cliente/deletar/{id}', ['uses'=>'ClienteController@deletar','as'=>'cliente.deletar']);

Route::get('/cliente/detalhe/{id}', ['uses'=>'ClienteController@detalhe','as'=>'cliente.detalhe']);
Route::get('/telefone/adicionar/{id}', ['uses'=>'TelefoneController@adicionar','as'=>'telefone.adicionar']);
Route::post('/telefone/salvar/{id}', ['uses'=>'TelefoneController@salvar','as'=>'telefone.salvar']);

Route::get('/telefone/editar/{id}', ['uses'=>'TelefoneController@editar','as'=>'telefone.editar']);
Route::put('/telefone/atualizar/{id}', ['uses'=>'TelefoneController@atualizar','as'=>'telefone.atualizar']);
Route::get('/telefone/deletar/{id}', ['uses'=>'TelefoneController@deletar','as'=>'telefone.deletar']);