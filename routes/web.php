<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '{locale}', 'middleware' => 'localization'], function () {
    Route::get('/', function ($locale) {
        // $locale contains the locale string from the URL, e.g. 'en' or 'lv'
        App::setLocale($locale);
        return view('index');
    })->name('home');

    // Other localized routes
    Route::get('/lang', [LanguageController::class, 'switchLang'])->name('lang.switch');
    Route::get('/materials', [MaterialController::class, 'index'])->name('materials');
    Route::post('/materials', [MaterialController::class, 'applyFilter'])->name('materials.applyFilter');
    Route::get('/materials/view/{id}', [MaterialController::class, 'show'])->name('materials.show');
    Route::get('/materials/download/{id}', [MaterialController::class, 'download'])->name('materials.download');

    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
        Route::post('/login', [AuthController::class, 'login'])->name('login');

        Route::get('/register', [AuthController::class, 'showRegister'])->name('showRegister');
        Route::post('/register', [AuthController::class, 'register'])->name('register');
    });

    Route::middleware(['auth', 'role:admin,teacher,user'])->group(function () {
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/profile/{profile}', [UserController::class, 'showProfile'])->name('showProfile');
        Route::post('/materials/view/like/{id}/{like}', [LikeController::class, 'like'])->name('materials.like');
        Route::get('/profile/{id}', [UserController::class, 'showProfile'])->name('showProfile');
        Route::get('/materials/edit/{id}', [MaterialController::class, 'edit'])->name('materials.edit');
        Route::post('/materials/edit/{id}', [MaterialController::class, 'update'])->name('materials.update');
        Route::delete('/materials/{id}', [MaterialController::class, 'destroy'])->name('materials.destroy');
    });

    Route::middleware(['auth', 'role:admin,teacher'])->group(function () {
        Route::get('/materials/upload-form', [MaterialController::class, 'create'])->name('materials.showUpload');
        Route::post('/materials/upload-form', [MaterialController::class, 'store'])->name('materials.upload');
    });

    // Routes are annoying - I need to move this down there so it does not interfere for auth routes
    Route::get('/materials/{level}/{aspect}', [MaterialController::class, 'indexAspect'])->name('materials.aspect');


    // Route::get('/translator', );

});

// Verification
Route::get('/verify-teacher-email/{user_id}', function (string $user_id) {
    $user = User::where('id', $user_id)->firstOrFail();
    if (!request()->hasValidSignature()) {
        abort(403, 'Invalid or expired verification link.');
    }

    $user->email_verified_at = now();
    $user->role = 'teacher';
    $user->save();

    return redirect()->route('home', app()->getLocale())->with('status', __('register.verified'));
})->name('verify.teacher.email');

Route::get('/', function () {
    return redirect('/' . App::getLocale());
});

