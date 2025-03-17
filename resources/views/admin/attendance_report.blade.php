
@extends('layout.app')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid py-2">
<div class="container mt-4">
    <!-- Filter Section -->
    <div class="row mb-4">
      <div class="col-md-3">
        <label for="year" class="form-label">Year</label>
        <select class="form-select" id="year" name="year">
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
      <div class="col-md-3 d-flex align-items-end">
        <button id="filterButton" class="btn btn-primary w-100">
          <i class="fas fa-filter"></i> Filter
        </button>
      </div>
    </div>

    <div class="mb-3">
  <input type="text" id="searchInput" class="form-control" placeholder="Search by name...">
</div>

    <!-- Attendance Table -->
    <div class="card">
      <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0" style="max-height: 500px; overflow-y: auto;">
          <table id="attendanceTable" class="table align-items-center mb-0">
            <thead class="sticky-top bg-blue shadow-sm">
              <tr>
                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 p-2">Employee</th>
                @foreach ($dates as $date)
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 p-2">
                    {{ \Carbon\Carbon::parse($date->_date)->format('d M') }}
                  </th>
                @endforeach
              </tr>
            </thead>
            <tbody>
              @foreach ($employees as $employee)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        <img src="{{ $employee->avatar ?? 'https://via.placeholder.com/150' }}" class="avatar avatar-sm me-3 border-radius-lg" alt="{{ $employee->first_name }}">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $employee->first_name }} {{ $employee->last_name }}</h6>
                        <p class="text-xs text-secondary mb-0">{{ $employee->email }}</p>
                      </div>
                    </div>
                  </td>
                  @foreach ($dates as $date)
                  <td class="align-middle text-center text-sm">
    @php
        $attendance = $employee->attendance->where('_date', $date->_date)->first();
        $status = $attendance ? $attendance->_status : 'None Recorded';
    @endphp
    <span class="badge 
        @if($status === 'Present') bg-success
        @elseif($status === 'Absent') bg-dark
        @elseif($status === 'Late') bg-warning
        @else bg-secondary
        @endif">
        {{ $status }}
    </span>
</td>
                  @endforeach
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
  <div class="col-12">
    
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
          <h6 class="text-white text-capitalize ps-3">Attendance Summary</h6>
        </div>
      </div>
      <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
          <table id="summaryTable" class="table align-items-center justify-content-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employee</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Present</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Absent</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Completion</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($employees as $employee)
                @php
                  // Calculate total present, absent, and completion percentage
                  $totalPresent = $employee->attendance->where('_status', 'Present')->count();
                  $totalAbsent = $employee->attendance->where('_status', 'Absent')->count();
                  $totalDays = $employee->attendance->count();
                  $completionPercentage = $totalDays > 0 ? round(($totalPresent / $totalDays) * 100, 2) : 0;
                @endphp
                <tr>
                  <td>
                    <div class="d-flex px-2">
                      <div>
                        <img src="{{ $employee->avatar ?? 'https://via.placeholder.com/150' }}" class="avatar avatar-sm rounded-circle me-2" alt="{{ $employee->first_name }}">
                      </div>
                      <div class="my-auto">
                        <h6 class="mb-0 text-sm">{{ $employee->first_name }} {{ $employee->last_name }}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-sm font-weight-bold mb-0">{{ $employee->phone ?? 'N/A' }}</p>
                  </td>
                  <td>
                    <span class="text-xs font-weight-bold">{{ $totalPresent }}</span>
                  </td>
                  <td>
                    <span class="text-xs font-weight-bold">{{ $totalAbsent }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: {{ $completionPercentage }}%;" aria-valuenow="{{ $completionPercentage }}" aria-valuemin="0" aria-valuemax="100">
                        {{ $completionPercentage }}%
                      </div>
                    </div>
                  </td>
                  <td class="align-middle">
                    <button class="btn btn-link text-secondary mb-0">
                      <i class="fa fa-ellipsis-v text-xs"></i>
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
</div>
      </div>
      <script>
    // Handle filter button click
    document.getElementById('filterButton').addEventListener('click', function () {
      const year = document.getElementById('year').value;
      const month = document.getElementById('month').value;

      if (!year || !month) {
        alert('Please select both year and month.');
        return;
      }

      window.location.href = `/panel/attendance/filter?year=${year}&month=${month}`;
    });

    document.addEventListener('DOMContentLoaded', function () {
  const searchInput = document.getElementById('searchInput');

  if (searchInput) {
    searchInput.addEventListener('input', function () {
      const searchValue = this.value.toLowerCase();

      // Filter the attendance table
      const attendanceRows = document.querySelectorAll('#attendanceTable tbody tr');
      attendanceRows.forEach(row => {
        const name = row.querySelector('h6').textContent.toLowerCase();
        row.style.display = name.includes(searchValue) ? '' : 'none';
      });

      // Filter the summary table
      const summaryRows = document.querySelectorAll('#summaryTable tbody tr');
      summaryRows.forEach(row => {
        const name = row.querySelector('h6').textContent.toLowerCase();
        row.style.display = name.includes(searchValue) ? '' : 'none';
      });
    });
  }
});
  </script>
      <style>
    body {
      background-image: url('path/to/your/background-image.jpg'); /* Add your background image */
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }
    .table {
      background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background for the table */
    }
    .sticky-top {
      position: sticky;
      top: 0;
      z-index: 1;
    }
  </style>
@endsection