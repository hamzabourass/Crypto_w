<?php

use App\Http\controllers\HomeController;
use App\Http\controllers\LoginController;
use App\Http\controllers\TransactionController;


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
Route::controller(HomeController::class, 'UserController')->group(function(){
    Route::get('/','home')->name('app_home');//index
    Route::get('/search','search')->name('app_search');
    Route::get('/test','test')->name('app_test');
    Route::get('/about','about')->name('app_about');
    Route::match(['get', 'post'], '/dashboard','dashboard')->middleware('auth')->name('app_dashboard');
    //Route::post('/GetPrice','GetPrice')->name('app_GetPrice');
    Route::get('/buycrypto','buycrypto')->name('app_buycrypto');

});
Route::controller(LoginController::class, 'UserController')->group(function(){
    Route::get('/logout','logout')->name('app_logout');
    Route::post('/exist_email','existEmail')->name('app_exist_email');
    Route::match(['get', 'post'], '/activation_code/{token}','activationCode')->name('app_activation_code');
    Route::get('/user_chercher', 'userChecker')->name('app_user_chercher');
    Route::get('/resend_activation_code/{token}','resendActivationCode')->name('app_resend_activation_code');
    Route::get('/activation_account_link/{token}', 'activationAccountLink')->name('app_activation_account_link');

});
Route::controller(TransactionController::class, 'UserController')->group(function(){
    //HTML
    Route::get('/wallet','wallet')->name('app_wallet');
    Route::get('/converter','converter')->name('app_converter');
    Route::get('/btcconverter','btcconverter')->name('app_btcconverter');
    Route::get('/btcwallet','btcwallet')->name('app_btcwallet');
    Route::get('/ethwallet','ethwallet')->name('app_ethwallet');
    Route::get('/buyCrypto','buyCrypto')->name('app_buyCrypto');
    Route::get('/balance','balance')->name('app_balance');
    Route::get('/history','history')->name('app_history');

    //function
    Route::get('/deposit','deposit')->name('app_deposit');
    Route::get('/convert_To_Btc','convert_To_Btc')->name('app_convert_To_Btc');
    Route::get('/convert_To_Usdt','convert_To_Usdt')->name('app_convert_To_Usdt');
    Route::get('/convert_To_Eth','convert_To_Eth')->name('app_convert_To_Eth');
    Route::get('/converter_Usdt_To_Eth','converter_Usdt_To_Eth')->name('app_converter_Usdt_To_Eth');
    Route::get('/buyCryptoE','buyCryptoE')->name('app_buyCryptoE');
    Route::get('/depositeth','depositeth')->name('app_depositeth');
    Route::get('/depositbtc','depositbtc')->name('app_depositbtc');






});
Route::controller(CryptoController::class, 'UserController')->group(function(){
    Route::post('/cryptoPrice','cryptoPrice');





});




























/*Route::get('/', [HomeController:: class,'home'])
->name('app_home');
Route::get('/about', [HomeController:: class,'about'])
->name('app_about');
Route::match(['get', 'post'], '/dashboard', [HomeController:: class,'dashboard'])
->middleware('auth')
->name('app_dashboard');
Route::get('/logout', [LoginController:: class,'logout'])
->name('app_logout');
Route::post('/exist_email', [LoginController:: class,'existEmail'])
->name('app_exist_email');
Route::match(['get', 'post'], '/activation_code/{token}', [LoginController:: class,'activationCode'])
->name('app_activation_code');
Route::get('/user_chercher', [LoginController:: class,'userChecker'])
->name('app_user_chercher');
Route::get('/resend_activation_code/{token}', [LoginController:: class,'resendActivationCode'])
->name('app_resend_activation_code');
Route::get('/activation_account_link/{token}', [LoginController:: class,'activationAccountLink'])
->name('app_activation_account_link');



/*Route::get('/email_available', 'EmailAvailable@index');
Route::post('/email_available/check', 'EmailAvailable@check')->name('email_available.check');*/





/*Route::match(['get', 'post'], '/login', [LoginController:: class,'login'])->name('app_login');
Route::match(['get', 'post'], '/register', [LoginController:: class,'register'])->name('app_register');*/

