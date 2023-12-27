<?php

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

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Mailer\MailerController;
use App\Http\Controllers\Admin\Profile\ProfileController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\LandingController;

Route::get('/', [LandingController::class, 'viewPortfolio'])->name('landing');
Route::post('/contact', [LandingController::class, 'postMail'])
    ->middleware(['throttle:2,10'])
    ->name('post-mail');

Route::get('/support', 'Admin\\ViewController@viewSupport');

Route::get('/test', function () {
    return view('test');
});

Route::get('/auth', [AuthController::class, 'viewAuth']);
Route::post('/auth/login', [AuthController::class, 'postLogin'])->name('auth-login');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'viewDashboard'])->name('admin-dashboard');

    Route::prefix('mailer')->group(function () {
        Route::get('/', [MailerController::class, 'viewMails'])->name('get-mail');
        Route::get('/{mailId}', [MailerController::class, 'getMail']);
        Route::put('/{mailId}', [MailerController::class, 'putMail']);
        Route::delete('/{mailId}', [MailerController::class, 'deleteMail']);
    });

    Route::prefix('skills')->group(function () {
        Route::get('/', 'Skills\\SkillsController@getSkills')->name('get-skills');
        Route::post('/', 'Skills\\SkillsController@postSkill');
        Route::get('/{skillId}', 'Skills\\SkillsController@getSkill');
        Route::put('/{skillId}', 'Skills\\SkillsController@putSkill');
        Route::delete('/{skillId}', 'Skills\\SkillsController@deleteSkill');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'viewProfile'])->name('get-profile');
        Route::put('/{fieldId}', [ProfileController::class, 'putProfileData'])->name('update-profile');
    });

    Route::prefix('places')->group(function () {
        Route::get('/', 'Places\\PlacesController@getPlaces')->name('get-places');
        Route::post('/', 'Places\\PlacesController@postPlace');
        Route::get('/{placeId}', 'Places\\PlacesController@getPlace');
        Route::put('/{placeId}', 'Places\\PlacesController@putPlace');
        Route::delete('/{placeId}', 'Places\\PlacesController@deletePlace');
    });
});
