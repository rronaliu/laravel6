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
     return view('welcome');
 });

 Route::get('/about', function () {
     $articles = App\Article::latest()->get(); // oreder by created_at desc

     return view('about', [
         'articles' => App\Article::take(3)->latest()->get()
     ]);
 });
                                                           
 
 Route::get('/articles', 'ArticlesController@index');
 Route::post('/articles', 'ArticlesController@store');
 Route::get('/articles/create', 'ArticlesController@create');
 Route::get('/articles/{article}', 'ArticlesController@show');
 Route::get('/articles/{article}/edit', 'ArticlesController@edit');
 Route::put('/articles/{article}', 'ArticlesController@update');
 
 
 









                                                            // THIS LISTS THE ARTICLES (first one)
                                                            //Route::get('/articles', 'ArticlesController@index');        // listen for /articles and use that articles controller but this time we load an action called index
//Route::get('/articles/{article}', 'ArticlesController@show'); // this allows me to READ a SINGLE article
// Route::get('/articles/{article}/edit', 'ArticlesController@edit');
// Route::get('/articles/{article}', 'ArticlesController@update');

// GET /articles - for a collection
// GET /articles/:id - for a single 

// POST /articles   - that's saying i want to create a new article

// GET, POST, PUT, DELETE - qito komandat KONVENTA

// PUT /articles/:id     - per update "put"
// DELETE /articles/:id/ 


// GET /videos
                // GET /videos/create
// GET /videos/2
                // GET /videos/2/edit
// PUT /videos/2
// DELETE /videos/2

// how to subscribe 

// GET/videos/subscribe <--- how to do it ? Dont use verbs 

//POST /videos/subscriptions =>  VideoSubscriptionsController@store        <--- maybe like this. There's always a way to stick to the convention