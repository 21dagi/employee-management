
@extends('layout.app')

@section('title', 'Dashboard')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container mt-5">
  <h2 class="mb-4">Employee Performance Report</h2>
  <form  action="/panel/filter-employees" method="GET" class="bg-light p-4 rounded shadow-sm">
    <div class="row g-3 align-items-end">
      <!-- Year Input -->
      <div class="col-md-3">
        <label for="year" class="form-label">Year</label>
        <select class="form-select form-select-sm" id="year" name="year">
          <option value="" selected>Select Year</option>
          <script>
            const currentYear = new Date().getFullYear();
            for (let year = 2000; year <= currentYear; year++) {
              document.write(`<option value="${year}">${year}</option>`);
            }
          </script>
        </select>
      </div>

      <!-- Month Input -->
      <div class="col-md-3">
        <label for="month" class="form-label">Month</label>
        <select class="form-select form-select-sm" id="month" name="month">
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

      <!-- Department Input -->
      <div class="col-md-3">
        <label for="department" class="form-label">Department</label>
        <select class="form-select form-select-sm" id="department" name="department">
          <option value="CEO" selected>CEO</option>
          <option value="Front-end Dev">Front-End Developer</option>
          <option value="Back-end Dev">Back-End Developer</option>
          <option value="WordPress Dev">WordPress Dev</option>
          <option value="Accountant">Accountant</option>
          <option value="Senior Developer">Senior Developer</option>
        </select>
      </div>

      <!-- Submit Button -->
      <div class="col-md-3">
        <button type="submit" class="btn btn-primary btn-sm w-100">
          <i class="bi bi-filter"></i> Filter
        </button>
      </div>
    </div>
  </form>
</div>
<div class="container mt-4">
    <div class="table-responsive">
    <table  id="performance-table" class="table table-hover">
    <thead class="table-light">
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Department</th>
        <th>Rating</th>
        <th>Comments</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    @if ($filteredEmployees->isEmpty())
                  <tr>
                      <td colspan="6" class="text-center">No employees found for the selected filters.</td>
                  </tr>
              @else
              @foreach ($filteredEmployees as $employee)
      <tr class="table-row">
        <td class="align-middle">
          <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg" 
               alt="Employee Image" 
               class="rounded-circle" 
               style="width: 40px; height: 40px; object-fit: cover;">
        </td>
        <td class="align-middle">{{ $employee->first_name }} {{ $employee->last_name }}</td>
        <td class="align-middle">{{ $employee->department }}</td>
        <td class="align-middle">
          <span class="badge bg-warning text-dark">{{ $employee->rating }} / 5</span>
        </td>
        <td class="align-middle">{{ $employee->comment }}</td>
        <td class="align-middle">
          <button class="btn btn-info btn-sm me-2" title="View Details">
            <i class="bi bi-eye"></i>
          </button>
          <button class="btn btn-warning btn-sm" title="Edit">
            <i class="bi bi-pencil"></i>
          </button>
        </td>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>


       
    </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const filterForm = document.querySelector('#filter-form');
    const performanceTable = document.querySelector('#performance-table tbody');

    filterForm.addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent form submission

        const formData = new FormData(filterForm);
        const year = formData.get('year');
        const month = formData.get('month');
        const department = formData.get('department');

        // Send the filter data to the server
        fetch(`/filter-employees?year=${year}&month=${month}&department=${department}`, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            // Clear the table
            performanceTable.innerHTML = '';

            // Populate the table with filtered data
            if (data.length === 0) {
                performanceTable.innerHTML = `
                    <tr>
                        <td colspan="6" class="text-center">No employees found for the selected filters.</td>
                    </tr>
                `;
            } else {
                data.forEach(employee => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td><!-- Add image logic here if needed --></td>
                        <td>${employee.first_name} ${employee.last_name}</td>
                        <td>${employee.department}</td>
                        <td>${employee.rating}</td>
                        <td>${employee.comment}</td>
                        <td><!-- Add action buttons here if needed --></td>
                    `;
                    performanceTable.appendChild(row);
                });
            }
        })
        .catch(error => console.error('Error:', error));
    });
});
</script>
@endsection