<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;



$controller_path = 'App\Http\Controllers';


// Routes non authentifiées
Route::get('/auth/login-basic', $controller_path . '\Authentications\LoginBasic@index')->name('login');
Route::post('/auth/login-basic', $controller_path . '\Authentications\LoginBasic@login')->name('login-post');

// authentication
Route::get('/auth/register-basic', $controller_path . '\Authentications\RegisterBasic@register')->name('register-post');
Route::get('/auth/forgot-password-basic', $controller_path . '\Authentications\ForgotPasswordBasic@index')->name('auth-reset-password-basic');

// Page d'accueil
Route::redirect('/', '/auth/login-basic'); // Redirige vers la page de connexion

// Routes authentifiées (requièrent une authentification préalable)
Route::middleware('auth')->group(function () {
    // Ajoutez ici les autres routes nécessitant une authentification
    $controller_path = 'App\Http\Controllers';

    // Page d'accueil
    Route::get('/dashboard', function () {
        return view('content.dashboard.dashboards-analytics');
    })->name('dashboard-analytics');



    // Logout
    Route::get('/auth/logout', $controller_path . '\Authentications\LoginBasic@logout')->name('logout');

    // Get Username
    Route::get('/auth/get-username', $controller_path . '\Authentications\LoginBasic@getUsername')->name('get-username');

    Route::resource('companies', $controller_path . '\Admin\CompanyController');





    Route::resource('roles', $controller_path . '\Admin\RoleController');
    Route::resource('permissions', $controller_path . '\Admin\PermissionController');
    Route::resource('users', $controller_path . '\Admin\UserController');
});
