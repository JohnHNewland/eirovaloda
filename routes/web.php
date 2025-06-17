<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LanguageController;
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
    Route::get('/materials/{level}/{aspect}', [MaterialController::class, 'indexAspect'])->name('materials.aspect');
    Route::post('/apply-filter', [MaterialController::class, 'applyFilter'])->name('materials.applyFilter');

    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
        Route::post('/login', [AuthController::class, 'login'])->name('login');

        Route::get('/register', [AuthController::class, 'showRegister'])->name('showRegister');
        Route::post('/register', [AuthController::class, 'register'])->name('register');
    });

    Route::middleware(['auth', 'role:admin,teacher,user'])->group(function () {
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/profile/{profile}', [UserController::class, 'showProfile'])->name('showProfile');
    });

    Route::middleware(['auth', 'role:admin,teacher'])->group(function () {
        Route::get('/materials/upload-form', [MaterialController::class, 'showUpload'])->name('materials.showUpload');
        Route::post('/materials/upload-form', [MaterialController::class, 'create'])->name('materials.upload');
    });


    // Route::get('/translator', );

    // Verification
    Route::get('/verify-teacher-email/{user_id}', function (string $locale, string $user_id) { // Because it otherwise puts locale in
        $user = User::where('user_id', $user_id)->firstOrFail();
        if (!request()->hasValidSignature()) {
            abort(403, 'Invalid or expired verification link.');
        }

        $user->email_verified_at = now();
        $user->role = 'teacher';
        $user->save();

        return redirect()->route('home')->with('status', __('register.verified'));
    })->name('verify.teacher.email');

});

Route::get('/', function () {
    return redirect('/' . App::getLocale());
});

