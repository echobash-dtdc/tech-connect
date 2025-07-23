<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProfileController,
    HomepageController,
    ProjectsController,
    TeamController,
    BlogController,
    ResourceController,
    EventController,
    InnovationController,
    FeedbackController
};

// Public Homepage
Route::get('/', [HomepageController::class, 'index'])->name('homepage');

// Public Facing Routes (No Login Required)
Route::prefix('teams')->group(function () {
    Route::get('/', [TeamController::class, 'index'])->name('teams.index');
    Route::get('/{id}', [TeamController::class, 'show'])->name('teams.show');
});

Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'publicIndex'])->name('blog.public.index');
    Route::get('/{id}', [BlogController::class, 'show'])->name('blog.show');
});
Route::get('/blogs', [BlogController::class, 'getBlogs'])->name('blogs');
Route::prefix('resources')->group(function () {
    Route::get('/', [ResourceController::class, 'publicIndex'])->name('resources.public.index');
});

Route::prefix('events')->group(function () {
    Route::get('/', [EventControlle3r::class, 'publicIndex'])->name('events.public.index');
    Route::get('/{id}', [EventController::class, 'show'])->name('events.show');
});

Route::prefix('innovation')->group(function () {
    Route::get('/', [InnovationController::class, 'index'])->name('innovation.index');
    Route::get('/{id}', [InnovationController::class, 'show'])->name('innovation.show');
});

Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

// Dashboard (Authenticated)
Route::get('/dashboard', fn() => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated Admin Routes
Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Homepage Content Management
    Route::resource('homepage-content', HomepageController::class)->except(['index']);

    // Admin CRUD Resources
    Route::resources([
        'projects'   => ProjectsController::class,
        'team'       => TeamController::class,
        'blog'       => BlogController::class,
        'resources'  => ResourceController::class,
        'events'     => EventController::class,
        'innovation' => InnovationController::class,
        'feedback'   => FeedbackController::class,
    ]);

    // AJAX endpoint for team fetch
    Route::get('/team/get-teams/{ }', [TeamController::class, 'getTeams']);
});

require __DIR__ . '/auth.php';