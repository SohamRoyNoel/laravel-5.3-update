<?php


use App\Http\Controllers\CommentRepliesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', 'Auth\LoginController@logout');

Route::auth();

Route::get('/home', 'HomeController@index');


Route::get('/post/{id}', ['as'=>'views.post', 'uses'=>'AdminPostsController@posts']);




Route::group(['middleware'=>'admin'], function (){

    Route::get('/admin', function (){
        return view();
    });



    //Route::get('/admin/users', 'AdminUsersController@index');

    //Route::get('/admin/creater', 'AdminUsersController@create');


    Route::resource('/admin/create', 'AdminUsersController', ['name'=>[

        'index'=>'admin.create.index',
        'create'=>'admin.create.create',
        'store'=>'admin.create.store',
        'edit'=>'admin.create.edit'

    ]]);

    Route::resource('/admin/posts', 'AdminPostsController', ['names'=>[

        'index'=>'admin.posts.index',
        'create'=>'admin.posts.create',
        'store'=>'admin.posts.store',
        'edit'=>'admin.posts.edit'

    ]]);

    Route::resource('/admin/categories', 'AdminCategoriesController', ['names'=>[

        'index'=>'admin.categories.index',
        'create'=>'admin.categories.create',
        'store'=>'admin.categories.store',
        'edit'=>'admin.categories.edit'

    ]]);

//    Route::resource('/admin/media', 'AdminPhotosController', ['names'=>[
//
//        'index'=>'admin.media.index',
//        'create'=>'admin.media.create',
//        'store'=>'admin.media.store',
//        'edit'=>'admin.media.edit'
//
//    ]]);

     Route::resource('/admin/media', 'AdminPhotosController');

    Route::resource('/admin/comments', 'PostCommentsController', ['names'=>[

        'index'=>'admin.comments.index',
        'create'=>'admin.comments.create',
        'store'=>'admin.comments.store',
        'edit'=>'admin.comments.edit'

    ]]);

    Route::resource('/admin/comment/replies', 'CommentRepliesController', ['names'=>[

        'index'=>'admin.replies.index',
        'create'=>'admin.replies.create',
        'store'=>'admin.replies.store',
        'edit'=>'admin.replies.edit'

    ]]);

});

Route::group(['middleware'=>'auth'], function (){


    Route::post('comment/reply', 'CommentRepliesController@createReply');


});