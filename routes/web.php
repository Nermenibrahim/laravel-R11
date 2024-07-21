<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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

    Route::get('cars/create',[CarController::class, 'create'])->name(('cars.create'));
    Route::post('cars',[CarController::class, 'store'])->name('cars.store');
    


    
    



   
    
    

    


    
