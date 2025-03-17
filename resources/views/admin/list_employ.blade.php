@extends('layout.app')

@section('title', 'Employee-list')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container mt-4">
  <h2 class="text-center mb-4">Employee List</h2>
  <table class="table table-striped table-hover rounded shadow">
    <thead class="table-light">
      <tr>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Position</th>
        <th scope="col">Status</th>
        <th scope="col">Actions</th>
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
          Employee Image
          <!-- Employee Name -->
          <td class="align-middle">{{ $employee->first_name }} {{ $employee->last_name }}</td>

          <!-- Employee Position -->
          <td class="align-middle">
            @php
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
          <button class="btn btn-info btn-sm view-btn" 
          data-id="{{ $employee->id }}" 
          data-first-name="{{ $employee->first_name }}" 
          data-last-name="{{ $employee->last_name }}" 
          data-position="{{ $positions[$employee->position_id] ?? 'Unknown Position' }}" 
          data-email="{{ $employee->email }}" 
          data-phone="{{ $employee->phone }}" 
          data-date-of-entry="{{ $employee->date_of_entry }}">
    <i class="bi bi-eye"></i> View
  </button>

  <!-- Edit Button -->
  <button class="btn btn-warning btn-sm edit-btn" 
          data-id="{{ $employee->id }}" 
          data-first-name="{{ $employee->first_name }}" 
          data-last-name="{{ $employee->last_name }}" 
          data-email="{{ $employee->email }}" 
          data-phone="{{ $employee->phone }}" 
          data-position-id="{{ $employee->position_id }}">
    <i class="bi bi-pencil"></i> Edit
  </button>

  <!-- Delete Button -->
  <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $employee->id }}">
    <i class="bi bi-trash"></i> Delete
  </button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@include('layout.viewmodal')
<!-- Include Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

<!-- Add custom styles -->
<style>
  .table {
    border-collapse: separate;
    border-spacing: 0 15px; /* Smooth distance between rows */
  }
  .table th, .table td {
    border: none; /* No inner borders */
  }
  .table tr {
    border-radius: 10px; /* Rounded borders */
    overflow: hidden; /* Ensure rounded corners are visible */
  }
  .table-hover tbody tr:hover {
    background-color: #f8f9fa; /* Light hover effect */
  }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  $(document).ready(function () {
    // Handle View Button Click
    $('.view-btn').on('click', function () {
      const employee = {
        id: $(this).data('id'),
        firstName: $(this).data('first-name'),
        lastName: $(this).data('last-name'),
        position: $(this).data('position'),
        email: $(this).data('email'),
        phone: $(this).data('phone'),
        dateOfEntry: $(this).data('date-of-entry'),
      };

      // Populate the View Modal
      $('#viewEmployeeName').text(`${employee.firstName} ${employee.lastName}`);
      $('#viewEmployeePosition').text(employee.position);
      $('#viewEmployeeEmail').text(employee.email);
      $('#viewEmployeePhone').text(employee.phone);
      $('#viewEmployeeDateOfEntry').text(employee.dateOfEntry);

      // Show the View Modal
      $('#viewEmployeeModal').modal('show');
    });

    // Handle Edit Button Click
    $('.edit-btn').on('click', function () {
      const employee = {
        id: $(this).data('id'),
        firstName: $(this).data('first-name'),
        lastName: $(this).data('last-name'),
        email: $(this).data('email'),
        phone: $(this).data('phone'),
        positionId: $(this).data('position-id'),
      };

      // Populate the Edit Modal
      $('#editEmployeeId').val(employee.id);
      $('#editFirstName').val(employee.firstName);
      $('#editLastName').val(employee.lastName);
      $('#editEmail').val(employee.email);
      $('#editPhone').val(employee.phone);
      $('#editPosition').val(employee.positionId);

      // Show the Edit Modal
      $('#editEmployeeModal').modal('show');
    });

    // Handle Save Changes Button Click (Edit Modal)
    $('#saveChangesButton').on('click', function () {
      const formData = $('#editEmployeeForm').serialize();

      // Send an AJAX request to update the employee
      $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
  },
});

$.ajax({
  url: '/panel/update',
  method: 'POST',
  data: formData,
  success: function (response) {
    alert('Employee updated successfully!');
    $('#editEmployeeModal').modal('hide');
    location.reload(); // Reload the page to reflect changes
  },
  error: function (xhr) {
    if (xhr.status === 422) { // Validation error
      const errors = xhr.responseJSON.errors;
      let errorMessage = 'Validation errors:\n';
      for (const field in errors) {
        errorMessage += `${field}: ${errors[field].join(', ')}\n`;
      }
      alert(errorMessage);
    } else {
      alert('An error occurred while updating the employee.');
      console.log(xhr.responseText); // Log the error details for debugging
    }
  },
});
    });

    // Handle Delete Button Click
$('.delete-btn').on('click', function () {
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
  },
});
  const employeeId = $(this).data('id');

  if (confirm('Are you sure you want to delete this employee?')) {
    // Send an AJAX request to delete the employee
    $.ajax({
      url: `/panel/delete/${employeeId}`, // Use the correct route
      method: 'DELETE',
      success: function (response) {
        alert('Employee deleted successfully!');
        location.reload(); // Reload the page to reflect changes
      },
      error: function (xhr) {
        if (xhr.status === 404) {
          alert('Employee not found.');
        } else {
          alert('An error occurred while deleting the employee.');
        }
        console.log(xhr.responseText); // Log the error details for debugging
      },
    });
  }
});
  });
</script>
@endsection