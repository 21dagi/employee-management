<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  
use App\Models\Employee;
use App\Models\Performance;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class PerformanceController extends Controller
{
    public function __construct()
    {
        // Remove the middleware from here - now handled at route level
    }

    public function perform_rec()
    {
        $employees = Employee::select(['id', 'first_name', 'last_name', 'position_id'])->get();
        return view("admin.performance_record", compact('employees'));
    }

    public function perform_view()
    {
        $filteredEmployees = DB::table('employees')
            ->join('performances', 'employees.id', '=', 'performances.employee_id')
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
                'record_date' => $validatedData['year'] . '-' . str_pad($validatedData['month'], 2, '0', STR_PAD_LEFT) . '-01',
                'created_by' => Auth::id()
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
        // Authorization check (simplified)
        if (!auth()->check()) {
            abort(403, 'Unauthorized action');
        }
    
        // Validate input
        $validated = $request->validate([
            'year' => 'nullable|integer|min:2000|max:' . date('Y'),
            'month' => 'nullable|integer|min:1|max:12',
            'department' => 'nullable|string|max:255'
        ]);
    
        // Base query
        $query = DB::table('employees')
            ->join('performances', 'employees.id', '=', 'performances.employee_id')
            ->join('positions', 'employees.position_id', '=', 'positions.id')
            ->select(
                'employees.first_name',
                'employees.last_name',
                'performances.rating',
                'performances.accomplishments as comment', // Removed substring for original functionality
                'positions.position_name as department',
                'performances.record_date'
            );
    
        // Apply filters
        if (!empty($validated['year'])) {
            $query->whereYear('performances.record_date', $validated['year']);
        }
        if (!empty($validated['month'])) {
            $query->whereMonth('performances.record_date', $validated['month']);
        }
        if (!empty($validated['department'])) {
            $query->where('positions.position_name', $validated['department']); // Changed from LIKE to exact match
        }
    
        $filteredEmployees = $query->get();
    
        // Return response
        if ($request->wantsJson()) {
            return response()->json($filteredEmployees)
                ->header('X-Content-Type-Options', 'nosniff');
        }
    
        return view('admin.performance_view', compact('filteredEmployees'));
    }}