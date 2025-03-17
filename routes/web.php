<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\employeeManagment;
use App\Http\Controllers\performncecontroller;
use App\Http\Controllers\attendancemanagment;

use App\Http\Controllers\EventController;

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'home')->name('home'); // Login page (GET)
    Route::get('/login/signin', 'login')->name('login.signin'); // Login page (GET)

    Route::post('login', 'logincheck')->name('login.check'); 
    Route::post('/logout',  'destroy')->name('logout');
});

// Protected Routes (Require Authentication)
Route::middleware('auth')->group(function () {
    // Dashboard Route (Common for both admin and user)
    Route::get('panel/dashboard', [DashboardController::class, 'dash'])->name('dashboard');

    // Admin-Only Routes
    Route::middleware('admin')->group(function () {
        // Employee Management Routes
        Route::prefix('panel')->group(function () {
            Route::controller(employeeManagment::class)->group(function () {
                Route::get('addemployee', 'add')->name('employee.add');
                Route::post('register', 'register')->name('register.submit');

                Route::get('employeelist', 'list')->name('employee.list');
              
                Route::post('update', 'update')->name('employees.update');
                Route::delete('delete/{id}', 'destroy')->name('employees.destroy');


            });
            Route::controller(performncecontroller::class)->group(function () {
                Route::get('performance_record', 'perform_rec')->name('performance.record');
                Route::get('performance_view', 'perform_view')->name('performance.view');
                Route::post('record-feedback', 'store')->name('record.feedback');
                Route::get('filter-employees', 'filterEmployees')->name('filter.employees');
            });
            Route::controller(attendancemanagment::class)->group(function () {
                Route::get('attendance_record', 'record_view')->name('attendance.record');
                Route::get('attendance_report', 'report_view')->name('attendance.report_view');

                Route::post('record-attendance', 'record')->name('record.attendance');
                Route::get('/attendance/filter', 'filter')->name('attendance.filter');


              
            });

            Route::controller(EventController::class)->group(function () {
                Route::get('events/create', 'create')->name('events.create');
                Route::post('/events', 'store')->name('events.store');
              
            });

        });
      


   });

    // User-Only Routes
    Route::middleware('user')->group(function () {
        // Example user-specific route
        Route::get('user/profile', function () {
            return view('user.profile'); // Blade view for user profile
        })->name('user.profile');
    });
});