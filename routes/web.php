<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\MarmitexController;
use App\Http\Controllers\UserController;
use App\Models\Marmitex;
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

//Forms
Route::get('/', function () {
    return view('site.home');
})->name('home');

Route::get('menu', function() {

    $marmitexes = Marmitex::all();

    return view('site.menu',[
        'marmitexes' => $marmitexes
    ]);
})->name('menu');

Route::get('cadastrar-bebida',[DrinkController::class, 'registerDrink'])->name('drink.register');
Route::get('excluir-bebida', [DrinkController::class,'removeDrink'])->name('drink.remove');
Route::get('cadastrar-prato', [DishController::class, 'registerDish'])->name('dish.register');
Route::get('excluir-prato', [DishController::class,'removeDish'])->name('dish.remove');
Route::get('cadastrar-marmitex', [MarmitexController::class, 'registerMarmitex'])->name('marmitex.register');
Route::get('editar-marmitex', [MarmitexController::class, 'editMarmitex'])->name('marmitex.edit');
Route::get('buffet', [DishController::class, 'showBuffet'])->name('dish.showBuffet');
Route::get('bebidas', [DrinkController::class, 'showDrink'])->name('dish.showDrink');
Route::get('carrinho', [CartController::class, 'showCart'])->name('cart.show');
Route::post('checkout',[CartController::class,'checkout'])-> name('cart.checkout');


//METHODS
Route::post('save-dish',[DishController::class, 'saveDish'])->name('dish.save');
Route::delete('delete-dish', [DishController::class, 'deleteDish'])->name('dish.delete');
Route::post('save-drink',[DrinkController::class, 'saveDrink'])->name('drink.save');
Route::delete('delete-drink', [DrinkController::class, 'deleteDrink'])->name('drink.delete');
Route::post('save-marmitex',[MarmitexController::class, 'saveMarmitex'])->name('marmitex.save');
Route::put('update-marmitex', [MarmitexController::class, 'updateMarmitex'])->name('marmitex.update');
Route::get('delete-marmitex', [MarmitexController::class, 'deleteMarmitex'])->name('marmitex.delete');
Route::post('add-marmitex-to-cart',[CartController::class, 'addMarmitexToCart'])->name('cart.addMarmitex');
Route::post('add-drink-to-cart',[CartController::class,'addDrinkToCart'])->name('cart.addDrink');
Route::get('empty-cart',[CartController::class,'emptyCart'])->name('cart.empty');
Route::post('remove-from-cart', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('send-messge', [CartController::class, 'sendMessage'])->name('cart.sendMessage');

//---User
//Forms
Route::get('cadastrar-se',[UserController::class, 'register'])->name('user.register');
Route::get('admin-login',[UserController::class, 'login'])->name('user.login');
Route::get('editar-conta',[UserController::class, 'edit'])->name('user.edit');

//METHODS
Route::post('save-user', [UserController::class, 'save'])->name('user.save');
Route::put('update-user', [UserController::class, 'update'])->name('user.update');
Route::post('authenticate', [UserController::class, 'authenticate'])->name('user.auth');
Route::get('logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('open-store', [UserController::class, 'openStore'])->name('user.open');
