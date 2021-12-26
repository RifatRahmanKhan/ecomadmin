<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiteInfoController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;


Route::get('/', function () {
    return view('index');
});

Route::group(['prefix' => 'admin'], function(){

    Route::group(['prefix' => '/socialMediaLinks'], function(){
        Route::get('/', [SiteInfoController::class, 'socialMediaLinks'])->name('socialMediaLinks');
        Route::post('/updateFbLink', [SiteInfoController::class, 'updateFbLink'])->name('updateFbLink');
    });

    Route::group(['prefix' => 'divisions'], function(){
        Route::get('/', [DivisionController::class, 'index'])->name('division.manage');
        Route::get('/create', [DivisionController::class, 'create'])->name('division.create');
        Route::post('/store', [DivisionController::class, 'store'])->name('division.store');
        Route::get('/edit/{id}', [DivisionController::class, 'edit'])->name('division.edit');
        Route::post('/update/{id}', [DivisionController::class, 'update'])->name('division.update');
        Route::post('/destroy/{id}', [DivisionController::class, 'destroy'])->name('division.destroy');
    });

    // District
	Route::group(['prefix' => '/districts'], function(){ 
		Route::get('/manage', 'App\Http\Controllers\DistrictController@index')->name('district.manage');
		Route::get('/create', 'App\Http\Controllers\DistrictController@create')->name('district.create');
		Route::post('/store', 'App\Http\Controllers\DistrictController@store')->name('district.store');
		Route::get('/edit/{id}', 'App\Http\Controllers\DistrictController@edit')->name('district.edit');
		Route::post('/update/{id}', 'App\Http\Controllers\DistrictController@update')->name('district.update');
		Route::post('/destroy/{id}', 'App\Http\Controllers\DistrictController@destroy')->name('district.destroy');
	});

    Route::group(['prefix' => 'visitorDetails'], function(){
        Route::get('/', [VisitorDetailsController::class, 'index'])->name('visitorDetails.manage');
        Route::post('destroy/{id}', [VisitorDetailsController::class, 'destroy'])->name('visitorDetails.destroy');
    });

    Route::group(['prefix' => 'categories'], function(){
        Route::get('/', [CategoryController::class, 'index'])->name('category.manage');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::post('/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });

    Route::group(['prefix' => 'brands'], function(){
        Route::get('/', [BrandController::class, 'index'])->name('brand.manage');
        Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
        Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::post('/update/{id}', [BrandController::class, 'update'])->name('brand.update');
        Route::post('/destroy/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
    });

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
