<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee; 
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log; 

class employeeManagment extends Controller
{
    public function add(){
        return view("admin.add");
    }
    public function list(){
        $employees = Employee::all();

      
      
        return view("admin.list_employ",compact('employees'));
    }
 
    public function update(Request $request)
    {
        // Validate the request data
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|unique:employees,email,' . $request->id,
            'phone' => 'nullable|string|max:20',
            'position_id' => 'required|integer',
        ]);
    
        // Find the employee and update their details
        $employee = Employee::find($request->id);
        $employee->update($request->all());
    
        return response()->json(['message' => 'Employee updated successfully']);
    }
public function destroy($id)
{
    $employee = Employee::find($id);
    $employee->delete();
    return response()->json(['message' => 'Employee deleted successfully']);
}
    public function register(Request $request){
        try {
            // Validate the request data
                $request->validate([
                    'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                    'position' => 'required|integer',
                    'firstname' => 'required|string|max:255',
                    'secondname' => 'required|string|max:255',
                    'email' => 'required|email|unique:employees,email',
                    'phone' => 'nullable|string|max:20',
                    'entrydate' => 'required|date',
                    'comment' => 'nullable|string',
                    'bankName' => 'required|string',
                    'accountNumber' => 'required|string',
                    'accountHolder' => 'required|string',
                    'acceptanceLetter' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
                    'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
                'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
    
                'username' => 'required|string|unique:users,username',
                'password' => 'required|string|min:6',
                'role_id' => 'required|string', // Role ID (numeric)
            ]);
    
            // Handle file uploads
            if ($request->hasFile('avatar')) {
                // Store the avatar in the 'public/avatars' directory
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
                
                // Save the full path (including the base URL) to the database
                $avatarUrl = asset('storage/' . $avatarPath);
            } else {
                $avatarUrl = null; // No avatar uploaded
            } $acceptanceLetterPath = $request->file('acceptanceLetter') ? $request->file('acceptanceLetter')->store('documents', 'public') : null;
            $cvPath = $request->file('cv') ? $request->file('cv')->store('documents', 'public') : null;
            $resumePath = $request->file('resume') ? $request->file('resume')->store('documents', 'public') : null;
    
            // Create a new employee record
            $employee = Employee::create([
                'avatar' => $avatarUrl,
                'position_id' => $request->position, // Position ID (numeric)
                'first_name' => $request->firstname,
                'last_name' => $request->secondname,
                'email' => $request->email,
                'phone' => $request->phone,
                'date_of_entry' => $request->entrydate,
                'role_id' => $request->role_id, // Role ID (numeric)
                'bank_name' => $request->bankName,
                'account_number' => $request->accountNumber,
                'account_holder' => $request->accountHolder,
                'acceptance_letter' => $acceptanceLetterPath,
                'cv' => $cvPath,
                'resume' => $resumePath,
            ]);
    
            // Create a new user record
            $user = User::create([
                'employee_id' => $employee->id, // Use the employee ID as a foreign key
                'username' => $request->username,
                'role_id' => $request->role_id, // Role ID (numeric)
                'password' => Hash::make($request->password), // Hash the password
            ]);
    
            // Redirect with a success message
            return redirect()->route('employee.add')->with('success', 'Employee and user registered successfully!');
        } catch (\Exception $e) {
            // Log the full error for debugging
            Log::error('Error in register method: ' . $e->getMessage());
    
            // Redirect with an error message
            return redirect()->route('employee.add')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
