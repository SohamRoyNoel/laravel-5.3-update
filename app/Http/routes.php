<?php


use App\Http\Controllers\CommentRepliesController;

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/admin', function (){
    return view('admin.index');
});

Route::get('/post/{id}', ['as'=>'views.post', 'uses'=>'AdminPostsController@posts']);


Route::group(['middleware'=>'admin'], function (){

    Route::get('/admin', function (){
        return view('admin.index');
    });

    Route::resource('/admin/creates', 'AdminUsersController');

    Route::get('/admin/users', 'AdminUsersController@index');

    Route::get('/admin/creater', 'AdminUsersController@create');

    Route::resource('/admin/posts', 'AdminPostsController');

    Route::resource('/admin/categories', 'AdminCategoriesController');

    Route::resource('/admin/media', 'AdminPhotosController');

    Route::resource('/admin/comments', 'PostCommentsController');

    Route::resource('/admin/comment/replies', 'CommentRepliesController');

});

Route::group(['middleware'=>'auth'], function (){


    Route::post('comment/reply', 'CommentRepliesController@createReply');


});