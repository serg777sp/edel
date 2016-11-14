<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::auth();
Route::post('/login','Auth\AuthController@postLogin');
//Route::post('/register','Auth\AuthController@postRegister');
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>Маршруты администрации<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<,
Route::group(['middleware' => ['auth','admin'],'prefix' => 'admin'], function()
{
    Route::get('/','AdminController@index');
    Route::get('/catalog','AdminController@catalog');
    Route::get('/catalog/categorie/add','CatalogController@addCategorie');
    Route::get('/catalog/subcategorie/add','CatalogController@addSubcategorie');
    Route::post('/catalog/categorie/create','CatalogController@createCategorie');
    Route::post('/catalog/subcategorie/create','CatalogController@createSub');
    Route::get('/catalog/edit/categorie/{id}','CatalogController@editCategorie');
    Route::post('/catalog/edit/categorie/{id}','CatalogController@saveCategorie');
    Route::get('/catalog/edit/subcategorie/{id}','CatalogController@editSub');
    Route::post('/catalog/edit/subcategorie/{id}','CatalogController@saveSub');
    Route::get('/catalog/destroy/categorie/{id}','CatalogController@destroycategorie');
    Route::get('/catalog/destroy/subcategorie/{id}','CatalogController@destroysub');
    Route::get('/showcase','AdminController@showcase');
    Route::get('/showcase/add/buket','ItemController@createbuket');
    Route::post('/showcase/add/buket','ItemController@checkbuket');
    Route::get('/showcase/add/single','ItemController@createsingle');
    Route::post('/showcase/add/single','ItemController@checksingle');
    Route::get('/showcase/edit/{id}','ItemController@edit');
    Route::post('/showcase/edit/','ItemController@checkEdit');
    Route::get('/showcase/delete/{id}','ItemController@delete');
    Route::get('/showcase/delete/{id}/confirm','ItemController@destroy');
    Route::get('/users','AdminController@showusers');
    Route::get('/users/delete/{user_id}','AdminController@userDel');
    Route::get('/users/edit/{user_id}','AdminController@userEdit');
    Route::post('/users/edit','AdminController@checkedit');
    Route::post('/item/addphoto/','ItemController@addphoto');
    Route::post('/item/photo/update','ItemController@updatephoto');
    Route::post('/item/edit/price/{viewtype}','ItemController@editprice');
    Route::get('/item/del/price/{value}/{item_id}','ItemController@delprice');
    Route::get('/orders','AdminController@showOrders');
    Route::get('/settings','AdminController@settings');
    Route::post('/setting/update','AdminController@set_update');
    Route::get('/reqcall/show','AdminController@ReqCallShow');
    Route::get('/reqcall/del/{id}','AdminController@ReqCallDel');
    Route::any('/order/sort','OrderController@getSortOrders');
    Route::get('/showcase/generate','ItemController@ganerate');
    Route::post('/user/adresat/add/{id}','AdminController@addUserAdresat');
    Route::post('/user/edit/profile/{id}','AdminController@editUserProfile');
    Route::post('/user/password/edit/{id}','AdminController@editUserPass');
});
//>>>>>>>>>>>>>>>>>>>>Маршруты залогиненных пользователей <<<<<<<<<<<<<<<<<<<<<<<<<<<
Route::group(['middleware' => 'auth'], function()
{
    Route::post('/basket/add','BasketController@add');
    Route::get('/basket','BasketController@show');
    Route::get('/basket/clear','BasketController@clearBasket');
    Route::get('/basket/delete/{basket_id}','BasketController@delete');
    Route::get('/showcase/item/{id}','ItemController@show');
    Route::get('/order/step/one','OrderController@stepone');
    Route::get('/order/step/one/{order_id}','OrderController@stepone');
    Route::post('/order/step/two','OrderController@steptwo');
    Route::get('/order/step/two/{order_id}','OrderController@steptwo');
    Route::post('/order/step/three','OrderController@stepthree');
    Route::get('/order/step/three/{order_id}','OrderController@stepthree');
    Route::post('/order/step/four','OrderController@stepfour');
    Route::get('/order/step/four/{order_id}','OrderController@stepfour');
    Route::post('/order/step/four/update','OrderController@confimUpdate');
    Route::post('/order/finish','OrderController@finish');
    Route::get('/order/finish','BasketController@orderfinish');
    Route::post('/cabinet/adresat/add','AdresatController@save');
    Route::get('/cabinet','UserController@cabinet');
    Route::get('/cabinet/adresat/edit/{adresat_id}','AdresatController@edit');
    Route::post('/cabinet/adresat/edit','AdresatController@update');
    Route::get('/cabinet/adresat/del/{adresat_id}','AdresatController@del');
    Route::post('/cabinet/password/edit','UserController@passEdit');
    Route::post('/cabinet/edit','UserController@update');
    Route::get('/order/show/{id}','OrderController@show');
    Route::get('/item/edit-modal/get','OrderController@getEditItemModal');
});
//>>>>>>>>>>>>>>>>>>>>>>>>>>Маршруты гостей <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
    Route::get('/','UserController@welcome');
    Route::post('/basket/ajaxadd','BasketController@ajaxadd');
    Route::get('/oplata','UserController@oplata');
    Route::get('/dostavka','UserController@dostavka');
    Route::get('/working','UserController@working');
    Route::get('/garant','UserController@garant');
    Route::get('/about','UserController@about');
    Route::get('/reqcall','UserController@ReqCall');
    Route::post('/reqcall','UserController@ReqCall');
    Route::any('/item/sort','ItemController@sortByCat');
    
    Route::get('/test','AdminController@test');
// POST-запрос при нажатии на нашу кнопку.
//Route::post('/basket/ajaxadd', array('before'=>'csrf-ajax', 'as'=>'more', 'uses'=>'BasketController@ajaxAdd'));


// Фильтр, срабатывающий перед пост запросом.
/*
Route::filter('csrf-ajax', function()
{
    if (Session::token() != Request::header('x-csrf-token'))
    {
        throw new Illuminate\Session\TokenMismatchException;
    }
});
*/

////////////////////////////////////конец рабочих маршрутов\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//Старые маршруты
/*/order/step/four/update
Route::get('/', function () {
    return view('welcome');
});
Route::get('/getImage/{id}', 'PicController@getImage');
Route::auth();

Route::get('/home', 'HomeController@index');

    Route::get('/', function () {
    return view('welcome');
    });
    
    Route::get('/destination/adress/add','HomeController@adddesadress');
    Route::post('/destination/adress/add','HomeController@desadresssave');
    Route::get('/destination/phone/add','HomeController@adddesphone');
    Route::post('/destination/phone/add','HomeController@desphonesave');    
    
    
*/    