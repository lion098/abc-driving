<?php

use App\Http\Controllers\Back\{DashboardController, LoginController, ProfileController, PasswordController, StaffsController, CoursesController,
    AboutController, SliderController, TestimonialController, FeatureController, SiteSettingController, ClientController, CompletedDaysController, ContactController};
use App\Http\Controllers\FrontEndController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::name('front.')->controller(FrontEndController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/about-us', 'aboutUs')->name('aboutUs');
    Route::get('/courses', 'courses')->name('courses');
    Route::get('/features', 'features')->name('features');
    Route::get('/teams', 'teams')->name('teams');
    Route::get('/client', 'client')->name('client');
    Route::get('/client/search', 'searchClient')->name('client.search');
    Route::get('/client-inner/{slug}', 'clientInner')->name('client.inner');
    Route::get('/contact', 'contact')->name('contact');
});

Route::prefix('cms')->name('cms.')->group(function() {

    Route::middleware('auth:cms')->group(function() {
        // dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        // logout
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

        // edit profile
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::match(['put', 'patch'], '/profile/update', [ProfileController::class, 'update'])->name('profile.update');

        // change password
        Route::get('/password/edit', [PasswordController::class, 'edit'])->name('password.edit');
        Route::match(['put', 'patch'], '/password/update', [PasswordController::class, 'update'])->name('password.update');

        // staff crud
        Route::resource('/staffs', StaffsController::class)->except(['show'])->middleware('admin');

        // courses crud
        Route::resource('/courses', CoursesController::class)->except(['show'])->middleware('admin');

        // about us crud
        Route::resource('/about', AboutController::class)->except(['show'])->middleware('admin');

        // slider crud
        Route::resource('/slider', SliderController::class)->except(['show'])->middleware('admin');

        // testimonial crud
        Route::resource('/testimonial', TestimonialController::class)->except(['show'])->middleware('admin');

        // feature crud
        Route::resource('/feature', FeatureController::class)->except(['show'])->middleware('admin');

        // site setting crud
        Route::resource('/sitesetting', SiteSettingController::class)->only(['index', 'update'])->middleware('admin');

        // client crud
        Route::resource('/clients', ClientController::class)->except(['show'])->middleware('admin');

        // add or subtract completed days
        Route::get('client/add-completed-days/{id}', [CompletedDaysController::class, 'addDay'])->name('client.addDay')->middleware('admin');
        Route::get('client/subtract-completed-days/{id}', [CompletedDaysController::class, 'subtractDay'])->name('client.subtractDay')->middleware('admin');

        // contact crud
        Route::resource('/contacts', ContactController::class)->only(['index', 'store', 'destroy'])->middleware('admin');

    });

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('loginShow');

    Route::post('/login', [LoginController::class, 'login'])->name('loginCheck');
});


// Route::get('/', function(){
//     return redirect()->route('cms.dashboard.index');
// });

