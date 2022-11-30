<?php

use App\Helpers\Core\Helper;
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

Route::group(['middleware' => []], function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });
});

/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */

/*
 * Frontend Routes
 */
Route::group(['prefix' => ''], function () {
    Helper::includeRouteFiles(__DIR__.'/frontend/');
});
