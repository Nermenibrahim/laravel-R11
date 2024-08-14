<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ClassController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;

use Illuminate\Contracts\View\View;

Route::get('/', function () {
    return view('welcome');
});

Route::get('cv', function () {
    return view('cv');
});



Route::get('w', function () {
    return "Hello laravel !!";
});


// Route::get('cars/{id}', function ($id) {
//     return "car number is " .  $id;
// });


// Route::get('cars/{id?}', function ($id=0) {
//     return "car number is " .  $id;
// }) ->where([

//     'id' => '[0-9]+'
// ]);

// Route::get('cars/{id?}', function ($id=0) {
//     return "car number is " .  $id;
// }) ->whereNumber(['id']);

// Route::get('user/{name}/{age?}', function ($name , $age=0) {
//     if($age == 0){

//         return "Name is " . $name  ;

//     } else {
//         return "Name is " . $name . " and age is " . $age ;
//     }
    
// }) ->where([
//     'name' => '[a-zA-Z]+' ,
//     'age' => '[0-9]+' 

// ]);

// Route::get('car/{name}', function ($name) {
//     return "Name is " .  $name;
// }) ->whereIn('name', ['nour','nada']);








Route::prefix('company')->group(function(){
    Route::get('', function () {
        return "company index";
    });

    Route::get('it', function () {
        return "company IT";
    });

    Route::get('users', function () {
        return "company users";
    });


});





Route::prefix('accounts')->group(function(){
    Route::get('', function () {
        return "accounts index";
    });

    Route::get('admin', function () {
        return " accounts admin";
    });

    Route::get('user', function () {
        return "accounts user";
    });


});





// Route::prefix('cars')->group(function(){

//     Route::get('', function () {
//         return "cars index";
//     });

//     Route::prefix('usa')->group(function()
//          {
            
//             Route::get('ford', function () {
//                 return "cars usa ford";
//             });


//             Route::get('tesla', function () {
//                 return "cars usa tesla";
//             });


//          });


//          Route::prefix('ger')->group(function(){

//             Route::get('mercedes', function () {
//                 return "cars ger mercedes";
//             });

//             Route::get('audi', function () {
//                 return "cars ger audi";
//             });


//             Route::get('volkswagen', function () {
//                 return "cars ger volkswagen";
//             });


//          });





    
//     });

    // Route::fallback(function(){

    //     return redirect('/');

    // });


    Route::get('link', function () {
        $url = route('w');
        return "<a href='$url'>go to welcome </a>";
    });

    
    Route::get('welcome', function () {
        return "welcome to laravel";
    })->name('w');


    Route::get('login', function () {
        return view('login');
    });


    Route::post('data', function () {
        return "login succufly";
    })->name('data');



    Route::get('contact-us', function () {
        return view('contact-us');
    });


    Route::post('/contact-data', function (Request $request ) {
        return($request->all());
    });

  





    //class controller

    Route::prefix('classes')->controller(ClassController::class)->as('classes.')->group(function() {
        

    Route::get('create', 'create')->name(('create'));
    Route::post('', 'store')->name('store');
    Route::get('', 'index')->name('index');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::put('update/{id}', 'update')->name('update');
    Route::get('detail/{id}', 'show')->name('detail');
    Route::delete('delete/{id}', 'destroy')->name('destroy');
    Route::get('trashed', 'showDeleted')->name('showDeleted');
    Route::patch('{id}', 'restore')->name('restore');
    Route::delete('{id}', 'forceDelete')->name('forceDelete');
    

});

//});
    
    

        //CarController

    Route::prefix('cars')->controller(CarController::class)->as('cars.')->group(function() {
        
        Route::get('', 'index')->name('index');
        Route::get('create','create')->name(('create'));
        Route::post('','store')->name('store');
        Route::get('{car}/edit', 'edit')->name('edit');
        Route::put('{car}', 'update')->name('update');
        Route::get('detail/{id}', 'show')->name('detail');
        Route::get('delete/{id}', 'destroy')->name('destroy');
        Route::get('trashed', 'showDeleted')->name('showDeleted');
        Route::patch('{id}', 'restore')->name('restore');
        Route::delete('{id}', 'forceDelete')->name('forceDelete');
    
    

    });

    Route::get('uploadForm',[ExampleController::class, 'uploadForm']);
    Route::post('upload',[ExampleController::class, 'upload'])->name('upload');
   

    Route::get('about',[ExampleController::class, 'index']);
    

    


    
//product Controller

Route::get('products/create',[ProductController::class, 'create'])->name('products.create');
Route::post('products',[ProductController::class, 'store'])->name('products.store');
Route::get('index',[ProductController::class, 'index'])->name('products.index');
Route::get('{product}/edit',[ProductController::class, 'edit'])->name('products.edit');
Route::put('{product}',[ProductController::class, 'update'])->name('products.update');

Route::get('testOnetoOne',[ExampleController::class, 'test']);