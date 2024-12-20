<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\TeknisiController;



Route::get('/', function () {
    $username = Session::get('username');
    //dd($username);
    //$users="";
   if($username){
    $users = $username->full_name;
    } else {
        $users = "";
    }
    //return view('welcome');
    return view('frontend.index', ['title' => 'All Product', 'user' => $users]);
});

Route::get('/login', function () {
    return view('frontend.login', ['title' => 'Login', 'user' => '']);
      });
Route::get('/register', function () {
                 return view('frontend.register', ['title' => 'Registrasi', 'user' => '']);
});

Route::prefix("frontend")->name("frontend")->group(function() {
    Route::get("/register", [UserController::class, "register"])->name('.register');
 Route::post("/register", [UserController::class, "store"]);
 Route::get('/login', [UserController::class, "login"])->name('.login');
 Route::post('/login', [UserController::class, "authenticate"]);
 Route::get('/home', [UserController::class, "home"]);
 Route::post('/logout', [UserController::class, "logout"]);
});

Route::prefix("teknisi")->name("teknisi")->group(function() {
    Route::get('/register', [TeknisiController::class, "register"])->name('.register')->middleware('guest');
    Route::post("/register", [TeknisiController::class, "register_store"]);
    Route::get('/login', [TeknisiController::class, "login"])->name('.login');
    Route::post('/login', [TeknisiController::class, "authenticate"]);
    Route::post('/logout', [TeknisiController::class, "logout"]);
    Route::get('/reset', [TeknisiController::class, "reset"])->name('.reset');
    Route::get('/new', [TeknisiController::class, "new"])->name('.new');

    Route::get('/home', [TeknisiController::class, "home"]);

    Route::get('kecamatan/{kabupaten_id}', [TeknisiController::class, 'getKecamatan']);
Route::get('kelurahan/{kecamatan_id}', [TeknisiController::class, 'getKelurahan']);
});
Route::prefix("sales")->name("sales")->group(function() {
    Route::get('/login', [VisitController::class, "login"])->name('.login');
    Route::post('/login', [VisitController::class, "authenticate"]);
    Route::get('/visit', [VisitController::class, "view"])->name('view');
    Route::get('/add', [VisitController::class, "add"])->name('view');
    Route::post('/store', [VisitController::class, "store"]);
    Route::resource('visits', VisitController::class);

});


