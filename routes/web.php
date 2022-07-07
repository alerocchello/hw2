<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PremierController;
use App\Http\Controllers\NbaController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MatchesController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Qui è dove puoi registrare percorsi web per la tua applicazione.
| Queste route vengono caricate da RouteServiceProvider all'interno di un gruppo
| che contiene il gruppo middleware "web". Ora crea qualcosa di fantastico!
|
*/

Route::get('/', function () {
    return view('login');
});

# REGISTRAZIONE
Route::post('/registration', [RegistrationController::class, 'create']);
Route::get('/registration', [RegistrationController::class, 'index']);
Route::get('/registration/username/{username}', [RegistrationController::class, 'checkUsername']);
Route::get('/registration/email/{email}', [RegistrationController::class, 'checkEmail']);

# LOGIN
Route::get('/login', [LoginController::class, 'login']);
Route::post("/login", [LoginController::class, 'checkLogin']);

# LOGOUT
Route::get("/logout", [LoginController::class, 'logout']);

# HOME
Route::get('/home', [HomeController::class, 'index']);
Route::get('/spotify/song/{song}', [HomeController::class, 'spotify']);

# PREMIER LEAGUE
Route::get('/premier', [PremierController::class, 'index']);
Route::get('/classific_premier', [PremierController::class, 'classification']);

# NBA
Route::get('/nba', [NbaController::class, 'index']);
Route::get('/nba_teams', [NbaController::class, 'nbaTeams']);

# NEWS
Route::get('/news', [NewsController::class, 'index']);
Route::get('/warehouse_news', [NewsController::class, 'warehouse']);
Route::get('/getOneNews/id/{id}', [NewsController::class, 'getOne']);

# MATCHES
Route::get('/matches', [MatchesController::class, 'index']);
Route::get('/warehouse_matches', [MatchesController::class, 'warehouse']);
Route::get('/getMatch/id/{id}', [MatchesController::class, 'getOne']);
Route::get('/load_comments/id/{id}', [MatchesController::class, 'loadComments']);
Route::get('/add_comment/id_match/{id_match}/comment/{comment}', [MatchesController::class, 'addComment']);

# STORE
Route::get('/store', [StoreController::class, 'index']);
Route::get('/return_tshirt/team_name/{team_name}', [StoreController::class, 'returnTshirt']);

# CART
Route::get('/cart', [CartController::class, 'index']);
Route::get('/add_to_cart/id/{id}', [CartController::class, 'addToCart']);
Route::get('/remove_from_cart/id/{id}', [CartController::class, 'removeFromCart']);
Route::get('/return_cart', [CartController::class, 'returnCart']);

?>