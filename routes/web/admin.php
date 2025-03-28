<?php

use App\Http\Controllers\{
    EmployeePaymentController,
    employeeManagment,
    PerformanceController,
    attendancemanagment,
    EventController
};

// Employee Payment
Route::get('/employee-payments', [EmployeePaymentController::class, 'index']);
Route::post('/employee-payments/pay', [EmployeePaymentController::class, 'pay']);
Route::get('/payment/callback', [EmployeePaymentController::class, 'callback'])->name('payment.callback');
Route::get('/payment/return', [EmployeePaymentController::class, 'return'])->name('payment.return');

// Panel routes 
Route::prefix('panel')->middleware(['auth'])->group(function() {
    // Employee Management
    Route::controller(employeeManagment::class)->group(function() {
        Route::get('addemployee', 'add')->name('employee.add');
        Route::post('register', 'register')->name('register.submit');
        Route::get('employeelist', 'list')->name('employee.list');
        Route::post('update', 'update')->name('employees.update');
        Route::delete('delete/{id}', 'destroy')->name('employees.destroy');
    });
    
    // Performance
    Route::middleware('can:viewAny,App\Models\Performance')->controller(PerformanceController::class)->group(function() {
        Route::get('performance_record', 'perform_rec')->name('performance.record');
        Route::get('performance_view', 'perform_view')->name('performance.view');
        Route::get('filter-employees', 'filterEmployees')->name('filter.employees');
    });
    
    Route::middleware('can:manage,App\Models\Performance')->controller(PerformanceController::class)->group(function() {
        Route::post('record-feedback', 'store')->name('record.feedback');
    });
    
    // Attendance
    Route::controller(attendancemanagment::class)->group(function() {
        Route::get('attendance_record', 'record_view')->name('attendance.record');
        Route::get('attendance_report', 'report_view')->name('attendance.report_view');
        Route::post('record-attendance', 'record')->name('record.attendance');
        Route::get('/attendance/filter', 'filter')->name('attendance.filter');
    });
    
    Route::middleware('can:create,App\Models\EventBoard')->controller(EventController::class)->group(function() {
        Route::get('events/create', 'create')->name('events.create');
        Route::post('events', 'store')->name('events.store');
    });
});