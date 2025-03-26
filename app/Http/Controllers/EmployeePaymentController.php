<?php



namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeePaymentController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employee_payments.index', compact('employees'));
    }
    public function pay(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'amount' => 'required|numeric|min:1',
            'status' => 'required|in:pending,paid',
        ]);
    
        $employee = Employee::findOrFail($request->employee_id);
    
        // Validate the email format
        if (!filter_var($employee->email, FILTER_VALIDATE_EMAIL)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid email format for the employee.',
            ], 400);
        }
    
        $data = [
            'amount' => $request->amount,
            'currency' => 'ETB',
            'email' => $employee->email,
            'first_name' => $employee->first_name,
            'last_name' => $employee->last_name,
            'phone_number' => $employee->phone,
            'tx_ref' => 'emp_pay_' . time(),
            'callback_url' => route('payment.callback'),
            'return_url' => route('payment.return'),
            'customization[title]' => 'Employee Payment',
            'customization[description]' => 'Payment for ' . $employee->first_name . ' ' . $employee->last_name,
        ];
    
        $curl = curl_init();
    
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.chapa.co/v1/transaction/initialize',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . env('CHAPA_SECRET_KEY'),
                'Content-Type: application/json',
            ],
        ]);
    
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
    
        // Log the response for debugging
        \Log::info('Chapa API Response:', [
            'http_code' => $httpCode,
            'response' => $response,
        ]);
    
        $responseData = json_decode($response, true);
    
        if (isset($responseData['status']) && $responseData['status'] === 'success') {
            return response()->json([
                'status' => 'success',
                'checkout_url' => $responseData['data']['checkout_url']
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Payment initialization failed.',
                'chapa_response' => $responseData // Include the full response for debugging
            ]);
        }
    }
public function callback(Request $request)
{
    // Handle the callback from Chapa
    // Update the payment status in your database
    // Example:
    // $transaction = Transaction::where('tx_ref', $request->tx_ref)->first();
    // $transaction->update(['status' => 'paid']);

    return response()->json(['status' => 'success']);
}

public function return(Request $request)
{
    // Handle the return URL
    // Redirect back to the employee payments page with a success query parameter
    return redirect('/employee-payments?payment=success');
}
}
