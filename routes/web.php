<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InnovationController;
use App\Http\Controllers\FeedbackController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // HomepageContent CRUD
    Route::get('/homepage-content', [HomepageController::class, 'contentIndex'])->name('homepage-content.index');
    Route::get('/homepage-content/create', [HomepageController::class, 'create'])->name('homepage-content.create');
    Route::post('/homepage-content', [HomepageController::class, 'store'])->name('homepage-content.store');
    Route::get('/homepage-content/{homepageContent}', [HomepageController::class, 'show'])->name('homepage-content.show');
    Route::get('/homepage-content/{homepageContent}/edit', [HomepageController::class, 'edit'])->name('homepage-content.edit');
    Route::put('/homepage-content/{homepageContent}', [HomepageController::class, 'update'])->name('homepage-content.update');
    Route::delete('/homepage-content/{homepageContent}', [HomepageController::class, 'destroy'])->name('homepage-content.destroy');

    // Feedback CRUD
    Route::resource('feedback', FeedbackController::class);
    // Innovation CRUD
    Route::resource('innovation', InnovationController::class);
    // Events CRUD
    Route::resource('events', EventController::class);
    // Projects CRUD
    Route::resource('projects', ProjectsController::class);
    // Resources CRUD
    Route::resource('resources', ResourceController::class);
    // Blog CRUD
    Route::resource('blog', BlogController::class);
    // Team CRUD
    Route::resource('team', TeamController::class);
    // Add route for AJAX team fetching by department
    Route::get('/team/get-teams/{departmentId}', [TeamController::class, 'getTeams']);
});

// Homepage
Route::get('/', [HomepageController::class, 'index'])->name('homepage');


// Teams
Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
Route::get('/teams/{id}', [TeamController::class, 'show'])->name('teams.show');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');

// Resources
Route::get('/resources', [ResourceController::class, 'index'])->name('resources.index');

// Events
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

// Innovation Hub
Route::get('/innovation', [InnovationController::class, 'index'])->name('innovation.index');
Route::get('/innovation/{id}', [InnovationController::class, 'show'])->name('innovation.show');

require __DIR__ . '/auth.php';
