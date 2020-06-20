<?php

//route com parametro obrigatóro


// Route::get('/categorias/{tipo}', function ($tipo) {
//     return "A categoria é $tipo";
// });

//route com parametro opicional e default;
// Route::get('/produtos/{id?}', function ($id = '') {
//     if ($id) {
//         return "produto $id"; //se tiver id eleretorna o produto especifco
//     }
//     return "produtos"; //se não tiver id ele retorna todos os produtos
// });


//redrecionar uma rota pra outra,
//quando acessar /rota1 sera redireconado para /rota2
// Route::get('/rota1', function () {
//     return redirect('/rota2');
// });

// Route::get('/rota2', function () {
//     return 'rota 2 que foi redirecionada de rota 1';
// });


//redireciona o acesso a pagina principal para a pagina /hello
// Route::redirect('/', '/hello');

//todas as view ficam em resources, e tem como extensão '.blade' 
// Route::get('/hello', function () {
//     return view('hello'); //so precisa passar o nome da view sem as estensão '.blade e .php'
// });


//rota com middleware de authenticação
// Route::get('/admin', function () {
//     return "Admin";
// })->middleware(['auth']); //auth chama a rota /login

// rota de login login
// Route::get('login', function () {
//     return "login";
// })->name('login');

// grupo de authenticação
// Route::middleware(['auth'])->group(function () {
//Aui dentro ficariam todas as rotas que necessitam do auth;
// });

// grupo de rotas 
Route::prefix('admin')->group(function () {

    Route::get('', function () {
        return "adm inicio";
    });
    Route::get('/dashboard', function () {
        return "adm dashboard";
    });
    Route::get('/financeiro', function () {
        return "adm financeiro";
    });
    Route::get('/banco', function () {
        return "adm banco";
    });
});

###################  INICIO CURSO ####################

#########  CRUD DE PRODUTOS ###########

//rotas com controller; -> php artisan make:controller NameController
// Route::prefix('/product')->group(function(){
//     Route::get('/edit/{id}', 'ProductController@edit')->name('product.edit');
//     Route::put('/update/{id}', 'ProductController@update')->name('product.update');

//     Route::get('/remove/{id}', 'ProductController@remove')->name('product.remove');
//     Route::delete('/delete/{id}', 'ProductController@delete')->name('product.delete');

//     Route::get('/create', 'ProductController@create')->name('product.create');
//     Route::post('/store', 'ProductController@store')->name('product.store');

//     Route::get('/show/{id}', 'ProductController@show')->name('product.show'); 

//     Route::get('', 'ProductController@index')->name('product.index');
// });


##### ou vc pode gerar um resource, que pega todas as funções do controller;
#### pra gerar um controller com todas as funções de crud -> php artisan make:controller --resource;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('product', 'ProductController')->middleware(['auth', 'check.is.admin']);

// Auth::routes();
Auth::routes(['register' => false]); //desabilita a tela/rota de registro

