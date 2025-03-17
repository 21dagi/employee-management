
@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container mt-4">
    <!-- Filter Section -->
    <div class="row mb-4">
        <div class="col-md-3">
            <label for="year" class="form-label">Year</label>
            <select class="form-select" id="year">
                <option value="" selected>Select Year</option>
                <script>
                    const currentYear = new Date().getFullYear();
                    for (let year = 2000; year <= currentYear; year++) {
                        document.write(`<option value="${year}">${year}</option>`);
                    }
                </script>
            </select>
        </div>
        <div class="col-md-3">
            <label for="month" class="form-label">Month</label>
            <select class="form-select" id="month">
                <option value="" selected>Select Month</option>
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="day" class="form-label">Day</label>
            <select class="form-select" id="day">
                <option value="" selected>Select Day</option>
                <script>
                    for (let day = 1; day <= 31; day++) {
                        document.write(`<option value="${day}">${day}</option>`);
                    }
                </script>
            </select>
        </div>
        <div class="col-md-3 d-flex align-items-end">
            <button class="btn btn-primary w-100">
                <i class="fas fa-save"></i> Record
            </button>
        </div>
    </div>

    <div class="mb-3">
    <input type="text" id="searchInput" class="form-control" placeholder="Search by name...">
</div>
    <div class="card shadow-sm">
        <div class="card-body">
            <!-- Select All Checkbox -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="selectAll">
                <label class="form-check-label" for="selectAll">
                    Select All
                </label>
            </div>



<!-- Employee Table -->
<div class="table-responsive">
    <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Department</th>
                <th>Phone</th>
                <th>Present</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($employees as $employee)
        <tr class="align-middle employee-row">
            <td>{{ $loop->iteration }}</td>
            <td class="employee-name">{{ $employee->first_name }} {{ $employee->last_name }}</td>
            <td>{{ $employee->position }}</td> <!-- Display position name -->
            <td>{{ $employee->phone }}</td>
            <td>
                <input class="form-check-input attendance-checkbox border" type="checkbox" name="attendance[]" value="{{ $employee->id }}">
            </td>
        </tr>
    @endforeach
</tbody>
    </table>
</div>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    // Select All Checkbox Functionality
    document.getElementById('selectAll').addEventListener('change', function () {
        const checkboxes = document.querySelectorAll('.attendance-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });
    document.addEventListener('DOMContentLoaded', function () {
    const recordButton = document.querySelector('.btn-primary'); // Record button
    const attendanceCheckboxes = document.querySelectorAll('.attendance-checkbox');

    recordButton.addEventListener('click', function () {
        // Get selected year, month, and day
        const year = document.getElementById('year').value;
        const month = document.getElementById('month').value;
        const day = document.getElementById('day').value;

        // Validate the date inputs
        if (!year || !month || !day) {
            alert('Please select a valid year, month, and day.');
            return;
        }

        // Format the date as YYYY-MM-DD
        const recordDate = `${year}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`;

        // Collect selected employee IDs
        const selectedEmployees = [];
        attendanceCheckboxes.forEach(checkbox => {
            if (checkbox.checked) {
                selectedEmployees.push(checkbox.value); // Add employee ID to the array
            }
        });

        // Send data to the server
        if (selectedEmployees.length > 0) {
            fetch('/panel/record-attendance', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    date: recordDate,
                    employees: selectedEmployees,
                }),
            })
            .then(response => {
                if (!response.ok) {
                    return response.text().then(text => {
                        throw new Error(`Network response was not ok. Response: ${text}`);
                    });
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    alert('Attendance recorded successfully!');
                    window.location.reload(); // Refresh the page
                } else {
                    alert('Failed to record attendance: ' + (data.error || 'Unknown error'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while recording attendance: ' + error.message);
            });
        } else {
            alert('No employees selected.');
        }
    });


});
</script>
@endsection