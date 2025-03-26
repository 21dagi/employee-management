@extends('layout.app')

@section('title', 'Employee-Register')

@section('content')
<div class="container py-3">
    <h1 class="mb-3 text-center text-primary fs-4">Employee Payments</h1>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-3">
            <div class="table-responsive">
                <table class="table table-hover align-middle custom-table">
                    <thead>
                        <tr class="border-bottom">
                            <th class="py-2 text-secondary small">Name</th>
                            <th class="py-2 text-secondary small">Email</th>
                            <th class="py-2 text-secondary small">Phone</th>
                            <th class="py-2 text-secondary small">Amount</th>
                            <th class="py-2 text-secondary small">Status</th>
                            <th class="py-2 text-secondary small text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                        <tr>
    <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
    <td>{{ $employee->email }}</td>
    <td>{{ $employee->phone }}</td>
    <td>
        <input type="number" class="form-control amount" name="amount" required>
    </td>
    <td>
        <select class="form-select form-select-sm border-0 shadow-sm status" name="status">
            <option value="pending">Pending</option>
            <option value="paid">Paid</option>
        </select>
    </td>
    <td class="py-2 px-3 text-center">
        <button class="btn btn-success btn-sm px-3 py-1 pay-btn shadow-sm" data-employee-id="{{ $employee->id }}">
            <i class="bi bi-cash-coin"></i> Pay
        </button>
    </td>
</tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .custom-table tbody tr {
        transition: all 0.2s ease-in-out;
    }
    
    .custom-table tbody tr:hover {
        box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.08);
        transform: scale(1.01);
    }
</style>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Payment Successful</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                The payment was successfully processed.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Error Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Payment Failed</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                There was an error processing the payment. Please try again.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.querySelectorAll('.pay-btn').forEach(button => {
        button.addEventListener('click', function() {
            // Get employee ID from the data attribute
            const employeeId = this.getAttribute('data-employee-id');

            // Get the closest table row (tr) to find the amount and status inputs
            const row = this.closest('tr');

            // Get the amount and status values
            const amount = row.querySelector('.amount').value;
            const status = row.querySelector('.status').value;

            // Validate the amount (must be a positive number)
            if (!amount || isNaN(amount) || amount <= 0) {
                alert('Please enter a valid amount.');
                return;
            }

            // Prepare the data to send to the server
            const data = {
                employee_id: employeeId,
                amount: amount,
                status: status
            };

            // Send the payment request to the server
            fetch('/employee-payments/pay', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token for Laravel
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    // Redirect to Chapa payment page
                    window.location.href = data.checkout_url;
                } else {
                    // Show error modal with the message from the server
                    const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                    document.getElementById('errorModal').querySelector('.modal-body').textContent = data.message || 'Payment initialization failed.';
                    errorModal.show();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
            });
        });
    });

    // Check for success query parameter and show success modal
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('payment') === 'success') {
        const successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
    }
</script>
@endsection
