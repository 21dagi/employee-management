<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    AuthController,
    DashboardController,
  
};
// CSP Reporting
Route::post('/csp-reports', function(Request $request) {
    \Log::channel('security')->warning('CSP Violation:', [
        'report' => json_decode($request->getContent(), true),
        'ip' => $request->ip(),
        'user_agent' => $request->userAgent()
    ]);
    return response()->noContent();
})->name('csp.report')->withoutMiddleware(['csrf']);

// Authentication Routes
require __DIR__.'/web/auth.php';

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('panel/dashboard', [DashboardController::class, 'dash'])
        ->name('dashboard');
    
    // Admin routes (with admin middleware)
    Route::middleware(['admin'])->group(function() {
        require __DIR__.'/web/admin.php';
    });
    
    // User routes
    require __DIR__.'/web/user.php';
});