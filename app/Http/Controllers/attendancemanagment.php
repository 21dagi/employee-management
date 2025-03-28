<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;
use App\Models\Attendance;

use Illuminate\Support\Facades\DB;
class attendancemanagment extends Controller
{
    public function record_view()
    {
        $employees = Employee::join('positions', 'employees.position_id', '=', 'positions.id')
            ->select(
                'employees.id',
                'employees.first_name',
                'employees.last_name',
                'positions.position_name as position',
                'employees.phone'
            )
            ->orderBy('employees.first_name')
            ->get();
    
        // Escape output but keep as objects for the view
        $employees->each(function ($employee) {
            $employee->first_name = e($employee->first_name);
            $employee->last_name = e($employee->last_name);
            $employee->position = e($employee->position);
            $employee->phone = e($employee->phone);
            return $employee;
        });
    
        return response()
            ->view('admin.attendance_record', compact('employees'))
            ->header('X-Content-Type-Options', 'nosniff')
            ->header('X-Frame-Options', 'DENY')
            ->header('X-XSS-Protection', '1; mode=block');
    }
    public function record(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'date' => 'required|date|before_or_equal:today',
            'employees' => 'required|array|min:1',
            'employees.*' => 'integer|exists:employees,id',
        ]);
    
        // Get the date and employee IDs from the request
        $date = $validated['date'];
        $employeeIds = $validated['employees'];
    
        try {
            // Start a database transaction
            DB::beginTransaction();
    
            // Check for existing records (optional improvement)
            $existingRecords = Attendance::whereIn('employee_id', $employeeIds)
                ->where('_date', $date)
                ->count();
    
            if ($existingRecords > 0) {
                throw new \Exception('Attendance for one or more employees already recorded for this date.');
            }
    
            // Record attendance for each selected employee
            foreach ($employeeIds as $employeeId) {
                Attendance::create([
                    'employee_id' => $employeeId,
                    '_date' => $date,
                    '_status' => 'Present', // Default status is 'Present'
                ]);
            }
    
            // Commit the transaction
            DB::commit();
    
            return response()->json([
                'success' => true,
                'message' => 'Attendance recorded successfully.'
            ]);
    
        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollBack();
            
            \Log::error('Attendance recording failed: ' . $e->getMessage(), [
                'date' => $date,
                'employees' => $employeeIds,
                'ip' => $request->ip()
            ]);
    
            return response()->json([
                'success' => false,
                'error' => $e->getMessage() // Return actual error message for debugging
            ], 500);
        }
    }
    public function report_view()
{
    $employees = Employee::with('attendance')->get()->map(function($employee) {
        $employee->name = e($employee->name);
        return $employee;
    });

    $dates = Attendance::select('_date')
        ->distinct()
        ->orderBy('_date', 'asc')
        ->get()
        ->map(function($date) {
            $date->_date = e($date->_date);
            return $date;
        });

    return response()
        ->view('admin.attendance_report', compact('employees', 'dates'))
        ->header('X-Content-Type-Options', 'nosniff')
        ->header('X-Frame-Options', 'DENY')
        ->header('X-XSS-Protection', '1; mode=block');
}

public function filter(Request $request)
{
    $validated = $request->validate([
        'year' => ['required', 'integer', 'digits:4', 'min:2000', 'max:'.(date('Y')+1)],
        'month' => ['required', 'integer', 'min:1', 'max:12']
    ]);

    $year = (int)$validated['year'];
    $month = (int)$validated['month'];

    $employees = Employee::with(['attendance' => function ($query) use ($year, $month) {
        $query->whereYear('_date', $year)
              ->whereMonth('_date', $month);
    }])->get()->map(function($employee) {
        $employee->name = e($employee->name);
        return $employee;
    });

    $dates = Attendance::whereYear('_date', $year)
        ->whereMonth('_date', $month)
        ->select('_date')
        ->distinct()
        ->orderBy('_date', 'asc')
        ->get()
        ->map(function($date) {
            $date->_date = e($date->_date);
            return $date;
        });

    return response()
        ->view('admin.attendance_report', compact('employees', 'dates'))
        ->header('Content-Security-Policy', "default-src 'self'")
        ->header('X-Content-Type-Options', 'nosniff')
        ->header('X-Frame-Options', 'DENY')
        ->header('X-XSS-Protection', '1; mode=block');
}
    
}
