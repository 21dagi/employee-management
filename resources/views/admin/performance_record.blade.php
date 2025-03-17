@extends('layout.app')

@section('title', 'Dashboard')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container mt-5">
    <h2 class="mb-4">Filter Employees</h2>
    <form action="/filter-employees" method="GET">
      <div class="row g-3">
        <!-- Year Input -->
        <div class="col-md-4">
          <label for="year" class="form-label">Year</label>
          <select class="form-select" id="year" name="year">
            <option value="" selected>Select Year</option>
            <!-- Dynamically generate years (e.g., from 2000 to current year) -->
            <script>
              const currentYear = new Date().getFullYear();
              for (let year = 2000; year <= currentYear; year++) {
                document.write(`<option value="${year}">${year}</option>`);
              }
            </script>
          </select>
        </div>

        <!-- Month Input -->
        <div class="col-md-4">
          <label for="month" class="form-label">Month</label>
          <select class="form-select" id="month" name="month">
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

      
      </div>

      <!-- Submit Button -->
      <div class="row mt-4">
       
      </div>
    </form>
    
  </div>
 <!-- Employee Table -->
 <table class="table table-hover">
  <thead>
    <tr>
      <th>Image</th>
      <th>Name</th>
      <th>Department</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($employees as $employee)
      <tr>
        <!-- Employee Image -->
        <td class="align-middle">
          <img src="{{ $employee->avatar ?? 'https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg' }}" 
               alt="Employee Image" 
               class="rounded-circle" 
               style="width: 50px; height: 50px; object-fit: cover;">
        </td>

        <!-- Employee Name -->
        <td class="align-middle">{{ $employee->first_name }} {{ $employee->last_name }}</td>

        <!-- Employee Department -->
        <td class="align-middle">
          @php
            // Map position_id to department/position names
            $positions = [
              1 => 'CEO',
              2 => 'Front-end Developer',
              3 => 'Back-end Developer',
              4 => 'WordPress Developer',
              5 => 'Accountant',
              6 => 'Senior Developer',
            ];
            echo $positions[$employee->position_id] ?? 'Unknown Position';
          @endphp
        </td>

        <!-- Employee Status -->
        <td class="align-middle">
          <span class="badge bg-success">Active</span>
        </td>

        <!-- Actions -->
        <td class="align-middle">
          <button class="btn btn-primary btn-sm record-btn" 
                  title="Record" 
                  data-employee-id="{{ $employee->id }}">
            <i class="bi bi-pencil"></i> Record
          </button>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@include('layout.modal')
<!-- JavaScript to Handle the Modal and Form Submission -->
<script>
  document.addEventListener('DOMContentLoaded', function () {

  document.querySelectorAll('.record-btn').forEach(button => {
    button.addEventListener('click', () => {
      const employeeId = button.getAttribute('data-employee-id');
      const year = document.getElementById('year').value;
      const month = document.getElementById('month').value;

      // Validate if year and month are selected
      if (!year || !month) {
        alert('Please select both year and month before recording feedback.');
        return;
      }

      // Set the values in the modal form
      document.getElementById('employeeId').value = employeeId;
      document.getElementById('selectedYear').value = year;
      document.getElementById('selectedMonth').value = month;

      // Show the modal
      new bootstrap.Modal(document.getElementById('recordModal')).show();
    });
  });

  // Handle form submission
  const recordForm = document.getElementById('recordForm');
  if (recordForm) {
    recordForm.addEventListener('submit', function (e) {
      e.preventDefault();

      const formData = new FormData(this);

      // Validate if year and month are selected
      const year = formData.get('year');
      const month = formData.get('month');
      if (!year || !month) {
        alert('Please select both year and month before recording feedback.');
        return;
      }

      // Send the data to the server
      fetch('/panel/record-feedback', {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(Object.fromEntries(formData))
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          alert('Feedback recorded successfully!');
          new bootstrap.Modal(document.getElementById('recordModal')).hide();
        } else {
          alert('Failed to record feedback.');
        }
      })
      .catch(error => console.error('Error:', error));
    });
  } else {
    console.error('Form with ID "recordForm" not found.');
  }
});
</script>
@endsection