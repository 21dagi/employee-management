<!-- View Employee Modal -->
<div class="modal fade" id="viewEmployeeModal" tabindex="-1" aria-labelledby="viewEmployeeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewEmployeeModalLabel">Employee Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Employee details will be dynamically inserted here -->
        <p><strong>Name:</strong> <span id="viewEmployeeName"></span></p>
        <p><strong>Position:</strong> <span id="viewEmployeePosition"></span></p>
        <p><strong>Email:</strong> <span id="viewEmployeeEmail"></span></p>
        <p><strong>Phone:</strong> <span id="viewEmployeePhone"></span></p>
        <p><strong>Date of Entry:</strong> <span id="viewEmployeeDateOfEntry"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Employee Modal -->
<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editEmployeeModalLabel">Edit Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Edit form will be dynamically inserted here -->
        <form id="editEmployeeForm">
          <input type="hidden" id="editEmployeeId" name="id">
          <div class="mb-3">
            <label for="editFirstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="editFirstName" name="first_name">
          </div>
          <div class="mb-3">
            <label for="editLastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="editLastName" name="last_name">
          </div>
          <div class="mb-3">
            <label for="editEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="editEmail" name="email">
          </div>
          <div class="mb-3">
            <label for="editPhone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="editPhone" name="phone">
          </div>
          <div class="mb-3">
            <label for="editPosition" class="form-label">Position</label>
            <select class="form-select" id="editPosition" name="position_id">
              <option value="1">CEO</option>
              <option value="2">Front-end Developer</option>
              <option value="3">Back-end Developer</option>
              <option value="4">WordPress Developer</option>
              <option value="5">Accountant</option>
              <option value="6">Senior Developer</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveChangesButton">Save changes</button>
      </div>
    </div>
  </div>
</div>