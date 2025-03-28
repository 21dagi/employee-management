<?php

// Web-based API routes (not stateless)
Route::middleware(['api', 'auth:sanctum'])->prefix('web-api')->group(function() {
    // Add any web-based API endpoints here
});