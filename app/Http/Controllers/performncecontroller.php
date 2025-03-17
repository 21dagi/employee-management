<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  
use App\Models\Employee;
use App\Models\Performance;
use Illuminate\Support\Facades\Log; // Import the Log facade

class performncecontroller extends Controller
{
    public function perform_rec(){
        $employees = Employee::all();
        return view("admin.performance_record", compact('employees'));
    }

    public function perform_view(){
        $filteredEmployees = DB::table('employees')
        ->join('performances', 'employees.id', '=', 'performances.employee_id') // Use 'performances'
        ->select(
            'employees.first_name',
            'employees.last_name',
            'performances.rating',
            'performances.accomplishments as comment',
            'employees.position_id as department'
        )
        ->get();
return view('admin.performance_view', compact('filteredEmployees'));
    }

    public function store(Request $request)
    {
        try {
            // Validate input
            $validatedData = $request->validate([
                'employee_id' => 'required|integer|exists:employees,id',
                'year' => 'required|integer|min:2000|max:' . date('Y'),
                'month' => 'required|integer|min:1|max:12',
                'comment' => 'required|string|max:1000',
                'rating' => 'required|numeric|min:0|max:5',
            ]);

            // Log the validated data to the console
            Log::info('Validated Data:', $validatedData);

            Performance::create([
                'employee_id' => $validatedData['employee_id'],
                'rating' => floatval($validatedData['rating']),
                'accomplishments' => $validatedData['comment'],
                'record_date' => $validatedData['year'] . '-' . $validatedData['month'] . '-01', // Format as YYYY-MM-DD
            ]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error in store method:', ['error' => $e->getMessage()]);

            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function filterEmployees(Request $request)
{
    // Get the filter inputs from the request
    $year = $request->input('year');
    $month = $request->input('month');
    $department = $request->input('department');

    // Base query to join employees, performances, and positions tables
    $query = DB::table('employees')
        ->join('performances', 'employees.id', '=', 'performances.employee_id')
        ->join('positions', 'employees.position_id', '=', 'positions.id') // Join positions table
        ->select(
            'employees.first_name',
            'employees.last_name',
            'performances.rating',
            'performances.accomplishments as comment',
            'positions.position_name as department', // Use position_name as department
            'performances.record_date'
        );

    // Apply filters if they are provided
    if ($year) {
        $query->whereYear('performances.record_date', $year);
    }
    if ($month) {
        $query->whereMonth('performances.record_date', $month);
    }
    if ($department) {
        $query->where('positions.position_name', $department); // Filter by position_name
    }

    // Execute the query and get the results
    $filteredEmployees = $query->get();

    // Return JSON if the request expects JSON
    if ($request->wantsJson()) {
        return response()->json($filteredEmployees);
    }

    // Return the filtered data to the view
    return view('admin.performance_view', compact('filteredEmployees'));
}
    
}