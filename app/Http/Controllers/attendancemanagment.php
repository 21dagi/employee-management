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
        // Fetch all employees with their position names
        $employees = Employee::join('positions', 'employees.position_id', '=', 'positions.id')
            ->select(
                'employees.id',
                'employees.first_name',
                'employees.last_name',
                'positions.position_name as position', // Fetch position name from positions table
                'employees.phone'
            )
            ->orderBy('employees.first_name')
            ->get();
    
        // Pass the employees to the view
        return view('admin.attendance_record', compact('employees'));
    }


    
    public function record(Request $request)
    {
        // Validate the request
        $request->validate([
            'date' => 'required|date',
            'employees' => 'required|array',
            'employees.*' => 'integer|exists:employees,id', // Validate each employee ID
        ]);
    
        // Get the date and employee IDs from the request
        $date = $request->input('date');
        $employeeIds = $request->input('employees');
    
        try {
            // Start a database transaction
            DB::beginTransaction();
    
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
    
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollBack();
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
    public function report_view()
    {

        $employees = Employee::with('attendance')->get();

        // Get unique dates from the attendance table
        $dates = Attendance::select('_date')->distinct()->orderBy('_date', 'asc')->get();

        return view('admin.attendance_report', compact('employees', 'dates'));
    }
    public function filter(Request $request)
    {
        $year = $request->input('year');
        $month = $request->input('month');

        // Fetch employees with attendance records for the selected year and month
        $employees = Employee::with(['attendance' => function ($query) use ($year, $month) {
            $query->whereYear('_date', $year)->whereMonth('_date', $month);
        }])->get();

        // Get unique dates for the selected year and month
        $dates = Attendance::whereYear('_date', $year)
            ->whereMonth('_date', $month)
            ->select('_date')
            ->distinct()
            ->orderBy('_date', 'asc')
            ->get();

        return view('admin.attendance_report', compact('employees', 'dates'));
    }
    
}
