@extends('layout.app')

@section('title', 'Employee-Register')

@section('content')
<div class="card">
  <div class="border p-3 card-body">
    <h5 class="card-title">Register Employee</h5>

    <form action="{{ route('register.submit') }}"  method="POST"  enctype="multipart/form-data">
    @csrf 
      <div>
        <div class="d-flex justify-content-center mb-4">
          <img id="selectedAvatar" src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
            class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;" alt="example placeholder" />
        </div>
        <div class="d-flex justify-content-center">
          <div data-mdb-ripple-init class="btn sm-5 btn-primary btn-rounded">
            <label class="form-label text-white m-1" for="customFile2">Choose file</label>
            <input type="file" name="avatar" class="form-control d-none" id="customFile2" onchange="displaySelectedImage(event, 'selectedAvatar')" /></div>
        </div>
      </div>
    
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Position</label>
        <div class="col-sm-10">
          <select name="position" class="form-select" aria-label="Default select example">
            <option selected>Select employee's position</option>
            <option value="1">CEO</option>

            <option value="2">Front-end Dev</option>
            <option value="3">Back-end Dev</option>
            <option value="4">WordPress Dev</option>
            <option value="5">Accountant</option>
            <option value="6">Senior Developer</option>
          </select>
        </div>
      </div>

      <div class="container mt-4">
        <!-- Personal Details -->
        <div class="border p-3 mb-4" style="border-color: #007bff;">
          <h5>Personal Details</h5>
          
          <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">First Name</label>
                  <div class="col-sm-10">
                    <input name="firstname" type="text" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Second Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="secondname" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Price</label>
                  <div class="col-sm-10">
                    <input type="price" name="price" class="form-control">
                  </div>
                </div>
               
                
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Date of Entry</label>
                  <div class="col-sm-10">
                    <input type="date" name="entrydate" class="form-control">
                  </div>
                </div>
    

              
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Comments</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="comment" style="height: 100px"></textarea>
                  </div>
                </div>
        </div>

        <!-- Bank Transfer Information -->
        <div class="border p-3 mb-4" style="border-color: #28a745;">
          <h5>Bank Transfer Information</h5>
          <div class="row mb-3">
            <label for="bankName" class="col-sm-2 col-form-label">Bank Name</label>
            <div class="col-sm-10">
              <select name="bankName" class="form-select" id="bankName">
                <option selected>Select Bank</option>
                <option value="bank1">Bank 1</option>
                <option value="bank2">Bank 2</option>
                <option value="bank3">Bank 3</option>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label for="accountNumber"  class="col-sm-2 col-form-label">Account Number</label>
            <div class="col-sm-10">
              <input type="text" name="accountNumber" class="form-control" id="accountNumber" placeholder="Enter Account Number">
            </div>
          </div>
          <div class="row mb-3">
            <label for="accountHolder" class="col-sm-2 col-form-label">Account Holder Name</label>
            <div class="col-sm-10">
              <input type="text" name="accountHolder" class="form-control" id="accountHolder" placeholder="Enter Account Holder Name">
            </div>
          </div>
        </div>


        <!-- portal usage -->
        <div class="border p-3 mb-4" style="border-color: #007bff;">
        <h5>User Registration</h5>
        <div class="row mb-3">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" required>
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="role_id" class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
                <select name="role_id" class="form-select" name="role" id="role_id" required>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>
            </div>
        </div>
    </div>


        <!-- Document Upload -->
        <div class="border p-3" style="border-color: #dc3545;">
          <h5>Document Upload</h5>
          <div class="row mb-3">
            <label for="acceptanceLetter" class="col-sm-2 col-form-label">Acceptance Letter</label>
            <div class="col-sm-10">
              <input type="file" name="acceptanceLetter" class="form-control" id="acceptanceLetter">
            </div>
          </div>
          <div class="row mb-3">
            <label for="cv" class="col-sm-2 col-form-label">CV</label>
            <div class="col-sm-10">
              <input type="file" name="cv" class="form-control" id="cv">
            </div>
          </div>
          <div class="row mb-3">
            <label for="resume" class="col-sm-2 col-form-label">Resume</label>
            <div class="col-sm-10">
              <input type="file" name="resume" class="form-control" id="resume">
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <label class="col-sm-2 col-form-label">Submit Button</label>
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Submit Form</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ session('success') }}
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
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="errorModalLabel">Error</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ session('error') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    function displaySelectedImage(event, elementId) {
        const selectedImage = document.getElementById(elementId);
        const fileInput = event.target;

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                selectedImage.src = e.target.result;
            };

            reader.readAsDataURL(fileInput.files[0]);
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        // Check for success message
        @if(session('success'))
            $('#successModal').modal('show');
        @endif

        // Check for error message
        @if(session('error'))
            $('#errorModal').modal('show');
        @endif
    });
</script>
@endsection
