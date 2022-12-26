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

Auth::routes(['register' => false]);

Route::get('/', 'PagesController@home')->name('index');
Route::get('/empresa', 'PagesController@empresa')->name('empresa');
Route::get('/solicitud-de-presupuesto', 'PagesController@solicitudDePresupuesto')->name('solicitud-de-presupuesto');
Route::get('/contacto', 'PagesController@contacto')->name('contacto');
Route::get('/categoria/{id}', 'PagesController@categoria')->name('categoria');
Route::get('/subcategoria/{id}', 'PagesController@subCategoria')->name('subCategoria');
Route::get('/form-filter/{categoria_id?}', 'PagesController@productFilter')->name('productFilter');
Route::get('/sub-categoria/{id}', 'PagesController@subCategoria')->name('sub-categoria');
Route::get('/productos', 'PagesController@productos')->name('productos');
Route::get('/producto/{product?}', 'PagesController@producto')->name('producto');
Route::get('/mercados', 'PagesController@mercados')->name('mercados');
Route::get('/mercado/{market}', 'PagesController@mercado')->name('mercado');
Route::get('/calidad', 'PagesController@calidad')->name('calidad');
Route::get('/seguridad-y-medio-ambiente', 'PagesController@seguridad')->name('seguridad');

Route::post('enviar-cotizacion', 'MailController@quote')->name('send-quote');
Route::post('enviar-contacto', 'MailController@contact')->name('send-contact');
Route::post('newsletter', 'NewsLetterController@storeNewsletter')->name('newsletter.store');

Route::get('/ficha-tecnica/{id}', 'PagesController@fichaTecnica')->name('ficha-tecnica');
Route::get('/descargable/{id}/{campo}', 'PagesController@descargable')->name('descargable');
Route::delete('/ficha-tecnica/{id}', 'PagesController@borrarFichaTecnica')->name('borrar-ficha-tecnica');


Route::middleware('auth')->prefix('admin')->group(function () {
    /** Page Home */
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('home/content', 'HomeController@content')->name('home.content');
    Route::post('home/content/generic-section/store', 'HomeController@store')->name('home.content.generic-section.store');
    Route::post('home/content/generic-section/update', 'HomeController@update')->name('home.content.generic-section.update');
    Route::post('home/content/update-info', 'HomeController@updateInfo')->name('home.content.update-info');
    Route::delete('home/content/{id}', 'HomeController@destroy')->name('home.content.destroy');
    Route::get('home/content/slider/get-list', 'HomeController@sliderGetList')->name('home.slider.get-list');
    /** Fin home*/
    /** Page Company */
    Route::get('company/content', 'CompanyController@content')->name('company.content');
    Route::post('company/content/store-slider', 'CompanyController@storeSlider')->name('company.content.storeSlider');
    Route::post('company/content/update-slider', 'CompanyController@updateSlider')->name('company.content.updateSlider');
    Route::post('company/content/update-info', 'CompanyController@updateInfo')->name('company.content.updateInfo');
    Route::delete('company/content/{id}', 'CompanyController@destroy')->name('company.content.destroy');
    Route::get('company/content/slider/get-list', 'CompanyController@sliderGetList')->name('company.slider.get-list');
    Route::post('company/content/store-recorrido', 'CompanyController@storeRecorrido')->name('company.content.storeRecorrido');
    Route::post('company/content/update-recorrido', 'CompanyController@updateRecorrido')->name('company.content.updateRecorrido');
    Route::get('company/content/recorrido/get-list', 'CompanyController@getRecorridos');
    /** Fin company*/
    /** Page Application */
    Route::get('application/content', 'ApplicationController@content')->name('application.content');
    Route::get('application/content/{id}', 'ApplicationController@findContent');
    Route::post('application/content/store', 'ApplicationController@store')->name('application.content.store');
    Route::post('application/content/update', 'ApplicationController@update')->name('application.content.update');
    Route::delete('application/content/{id}', 'ApplicationController@destroy')->name('application.content.destroy');
    Route::get('application/content/slider/get-list', 'ApplicationController@sliderGetList')->name('application.slider.get-list');
    /** Fin Application*/
    /** Page Presentation */
    Route::get('presentation/content', 'PresentationController@content')->name('presentation.content');
    Route::get('presentation/content/{id}', 'PresentationController@findContent');
    Route::post('presentation/content/store', 'PresentationController@store')->name('presentation.content.store');
    Route::post('presentation/content/update', 'PresentationController@update')->name('presentation.content.update');
    Route::delete('presentation/content/{id}', 'PresentationController@destroy')->name('presentation.content.destroy');
    Route::get('presentation/content/slider/get-list', 'PresentationController@sliderGetList')->name('presentation.slider.get-list');
    /** Fin Presentation*/
    /** Page Category */
    Route::get('category', 'CategoryController@index')->name('category');
    Route::get('category/content', 'CategoryController@content')->name('category.content');
    Route::get('category/content/{id}', 'CategoryController@findContent');
    Route::post('category/content/store', 'CategoryController@store')->name('category.content.store');
    Route::post('category/content/update', 'CategoryController@update')->name('category.content.update');
    Route::delete('category/content/{id}', 'CategoryController@destroy')->name('category.content.destroy');
    Route::get('category/content/slider/get-list', 'CategoryController@sliderGetList')->name('category.slider.get-list');
    /** Fin Category*/
    /** Page Sub Category */
    Route::get('sub-category', 'SubCategoryController@index')->name('sub-category');
    Route::get('sub-category/content', 'SubCategoryController@content')->name('sub-category.content');
    Route::get('sub-category/content/{id}', 'SubCategoryController@findContent');
    Route::post('sub-category/content/store', 'SubCategoryController@store')->name('sub-category.content.store');
    Route::post('sub-category/content/update', 'SubCategoryController@update')->name('sub-category.content.update');
    Route::delete('sub-category/content/{id}', 'SubCategoryController@destroy')->name('sub-category.content.destroy');
    Route::get('sub-category/content/slider/get-list', 'SubCategoryController@sliderGetList')->name('sub-category.slider.get-list');
    /** Fin Sub Category*/
    /** Page Product */
    Route::get('product/content', 'ProductController@content')->name('product.content');
    Route::get('product/content/create', 'ProductController@create')->name('product.content.create');
    Route::post('product/content/store', 'ProductController@store')->name('product.content.store');
    Route::get('product/content/{id}/edit', 'ProductController@edit')->name('product.content.edit');
    Route::put('product/content', 'ProductController@update')->name('product.content.update');
    Route::delete('product/content/{id}', 'ProductController@destroy')->name('product.content.destroy');
    Route::get('product/content/get-list', 'ProductController@getList')->name('product.content.get-list');
    Route::get('product/content/find-product/{id?}', 'ProductController@find')->name('product.content.find');
    /** Fin product*/
    /** Page Product */
    Route::get('market/content', 'MarketController@content')->name('market.content');
    Route::get('market/content/create', 'MarketController@create')->name('market.content.create');
    Route::post('market/content/store', 'MarketController@store')->name('market.content.store');
    Route::get('market/content/{id}/edit', 'MarketController@edit')->name('market.content.edit');
    Route::put('market/content', 'MarketController@update')->name('market.content.update');
    Route::delete('market/content/{id}', 'MarketController@destroy')->name('market.content.destroy');
    Route::get('market/content/get-list', 'MarketController@getList')->name('market.content.get-list');
    Route::get('market/content/find-product/{id?}', 'MarketController@find')->name('market.content.find');
    /** Fin product*/
    /** Page Product Picture */
    Route::delete('product-picture/content/destroy/{id}', 'ProductPictureController@destroy')->name('product-picture.content.destroy');
    /** Fin product picture*/
    /** Page Quality */
    Route::get('quality/content', 'QualityController@content')->name('quality.content');
    Route::post('quality/content/store-slider', 'QualityController@storeSlider')->name('quality.content.storeSlider');
    Route::post('quality/content/update-slider', 'QualityController@updateSlider')->name('quality.content.updateSlider');
    Route::post('quality/content/update-info', 'QualityController@updateInfo')->name('quality.content.updateInfo');
    Route::delete('quality/content/{id}', 'QualityController@destroy')->name('quality.content.destroy');
    Route::get('quality/content/slider/get-list', 'QualityController@sliderGetList')->name('quality.slider.get-list');
    Route::post('quality/content/store-recorrido', 'QualityController@storeRecorrido')->name('quality.content.storeRecorrido');
    Route::post('quality/content/update-recorrido', 'QualityController@updateRecorrido')->name('quality.content.updateRecorrido');
    Route::get('quality/content/recorrido/get-list', 'QualityController@getRecorridos');
    Route::get('quality/content/descargables/get-list', 'QualityController@getDescargables');
    /** Fin Quality*/
    /** Page Secu */
    Route::get('security/content', 'SecurityController@content')->name('security.content');
    Route::post('security/content/store-slider', 'SecurityController@storeSlider')->name('security.content.storeSlider');
    Route::post('security/content/update-slider', 'SecurityController@updateSlider')->name('security.content.updateSlider');
    Route::post('security/content/update-info', 'SecurityController@updateInfo')->name('security.content.updateInfo');
    Route::delete('security/content/{id}', 'SecurityController@destroy')->name('security.content.destroy');
    Route::get('security/content/slider/get-list', 'SecurityController@sliderGetList')->name('security.slider.get-list');
    Route::post('security/content/store-recorrido', 'SecurityController@storeRecorrido')->name('security.content.storeRecorrido');
    Route::post('security/content/update-recorrido', 'SecurityController@updateRecorrido')->name('security.content.updateRecorrido');    Route::post('security/content/store-articulo', 'SecurityController@storeArticulo')->name('security.content.storeArticulo');
    Route::post('security/content/update-articulo', 'SecurityController@updateArticulo')->name('security.content.updateArticulo');
    Route::get('security/content/recorrido/get-list', 'SecurityController@getRecorridos');
    Route::get('security/content/descargables/get-list', 'SecurityController@getDescargables');
    /** Fin Quality*/
    /** Page company */
    Route::get('data/content', 'DataController@content')->name('data.content');
    Route::put('data/content', 'DataController@update')->name('data.content.update');
    /** Fin company*/

    /** Page newsletter */
    Route::get('newsletter/content', 'NewsLetterController@content')->name('newsletter.content');
    Route::get('newsletter/content/get-list', 'NewsLetterController@getList')->name('newsletter.content.get-list');
    Route::delete('newsletter/content/{id}', 'NewsLetterController@destroy')->name('newsletter.content.destroy');
    /** Fin newsletter*/

    Route::get('content/', 'ContentController@content')->name('content');
    Route::get('content/{id}', 'ContentController@findContent');

    Route::get('user/get-list', 'UserController@getList')->name('user.get-list');
    Route::resource('user', 'UserController');
});
