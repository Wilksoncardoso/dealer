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




Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AuthController@Dashboard')->name('admin');
Route::get('/login_user', 'AuthController@Login_User')->name('admin.login');
Route::get('/admin/logout', 'AuthController@logout')->name('admin.logout');
Route::get('/registrar', 'AuthController@registrar')->name('admin.registrar');
Route::get('/home', 'AuthController@home')->name('admin.home');
Route::post('/login_do', 'AuthController@login')->name('admin.login.do');
Route::post('/upload', 'AuthController@upload')->name('admin.upload');
Route::post('/postagem', 'AuthController@post')->name('admin.post');
Route::get('/show_publicacao', 'AuthController@show_publicacao')->name('admin.publicacao');


// Aqui Começa Publicação 
Route::get('/{store}/edit_publica', 'usuarioController@edit_publica')->name('admin.publica.edit');
Route::post('/update_publica/{store}', 'usuarioController@update_publica')->name('admin.publica.update');
Route::get('/destroy_publica/{store}', 'usuarioController@destroy_publica')->name('admin.publica.destroy');

// Aqui começa publicação salvas
Route::get('/{store}/editsalva', 'usuarioController@edit_salva')->name('admin.salva.edit');
Route::post('/update_salva/{store}', 'usuarioController@update_salva')->name('admin.salva.update');
Route::get('/destroy_salva/{store}', 'usuarioController@destroy_salva')->name('admin.salva.destroy');

// Global rota
Route::get('/global', 'usuarioController@global')->name('global');
Route::get('/minhas_publicacao', 'usuarioController@minhas_publicacao')->name('user.publicacao');
Route::get('/minhas_publicacao/destroy_publica/{store}', 'usuarioController@destroy_publica_user')->name('user.publica.destroy');


//Global user
Route::get('/{store}/editar_user', 'usuarioController@editar_user')->name('user.editar');
Route::post('/update_user/{store}', 'usuarioController@update_user')->name('user.update');
Route::get('/destroy_user/{user}', 'usuarioController@destroy_user')->name('user.destroy');
Route::post('/upload_user', 'usuarioController@upload_image')->name('admin.upload.image');

//Root administrador
Route::get('root/index', 'RootController@root')->name('root');
Route::get('root/{store}/edit_root', 'RootController@edit_root')->name('root.editar');
Route::post('root/update_root_image/{store}', 'RootController@update_image_root')->name('root.image.update');
Route::post('root/update_root/{store}', 'RootController@update_root')->name('root.edit.update');
Route::get('root/list_user', 'RootController@list_user')->name('root.list.user');
Route::get('root/list_post', 'RootController@list_post')->name('root.list.post');


// Root Membro
Route::get('root/destroy_user_root/{store}', 'RootController@destroy_root')->name('root.destroy.user');
Route::post('root/update_root_permissao/{store}', 'RootController@update_root_permissao_deixar')->name('root.permissao.update');
Route::get('root/destroy_post_root/{store}', 'RootController@destroy_root_post')->name('root.destroy.post');
Route::get('root/destroy_user_root/{store}', 'RootController@destroy_root_user')->name('root.destroy.user');

Route::get('root/{store}/edit_publica_root', 'RootController@root_edit_publica')->name('root.publica.edit');
Route::post('root/update_root_post/{store}', 'RootController@root_post_update')->name('root.publica.update');




//url public
Route::get('/', 'PublicController@home')->name('home');
Route::get('/registrar_user', 'PublicController@registrar')->name('registrar');
Route::get('/view/{store}', 'PublicController@show_public')->name('view');




//url teste
Route::get('/teste', function(){
    
    
    $store=DB::table('post')->

    where('post.id', '33')->get();
    


    return $store;
});


