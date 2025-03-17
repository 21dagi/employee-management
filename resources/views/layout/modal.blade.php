<!-- Modal -->
<div class="modal fade" id="recordModal" tabindex="-1" aria-labelledby="recordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="recordModalLabel">Record Feedback</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="recordForm">
          <!-- Hidden inputs for employee ID, year, and month -->
          <input type="hidden" id="employeeId" name="employee_id">
          <input type="hidden" id="selectedYear" name="year">
          <input type="hidden" id="selectedMonth" name="month">

          <!-- Accomplishments -->
          <div class="mb-3">
            <label for="comment" class="form-label">Accomplishments</label>
            <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
          </div>

          <!-- Rating -->
          <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <select class="form-select" id="rating" name="rating" required>
              <option value="" disabled selected>Select Rating</option>
              <option value="1.00">1 - Poor</option>
              <option value="2.00">2 - Fair</option>
              <option value="3.00">3 - Good</option>
              <option value="4.00">4 - Very Good</option>
              <option value="5.00">5 - Excellent</option>
            </select>  
          </div>

          <!-- Submit Button -->
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>