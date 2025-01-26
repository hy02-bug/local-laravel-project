<?php

use App\Http\Controllers\AcademicianController;
use App\Http\Controllers\GrantController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\ProfileController;
use App\Models\Grant;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check()
    ? redirect()->route('dashboard')
    : redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Resource
    Route::resource('grants', GrantController::class);
    Route::resource('academicians', AcademicianController::class);
    Route::resource('milestones', MilestoneController::class);

        // Additional grant-specific routes
        Route::delete('grants/{grant}/removeMember/{academician}', [GrantController::class, 'removeMember'])
        ->name('grants.removeMember'); // Ensure both grant and academician are provided
        Route::get('grants/{grant}/addMember', [GrantController::class, 'showAddMemberForm'])
        ->name('grants.showAddMemberForm');
        Route::post('grants/{grant}/storeMember', [GrantController::class, 'storeMember'])
        ->name('grants.storeMember'); // Changed to POST for intuitive behavior
        Route::get('grants/{grant}/editLeader', [GrantController::class, 'editLeader'])
        ->name('grants.editLeader');
        Route::patch('grants/{grant}/updateLeader', [GrantController::class, 'updateLeader'])
        ->name('grants.updateLeader');
});


require __DIR__.'/auth.php';
