<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="/panel/dashboard">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->


  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-file-earmark-person"></i><span>Employee Managment</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="/panel/addemployee">
          <i class="bi bi-circle"></i><span>Register Employee</span>
        </a>
      </li>
      <li>
        <a href="/panel/employeelist">
          <i class="bi bi-circle"></i><span>View Employees</span>
        </a>
      </li>
     
    </ul>
  </li><!-- End Forms Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-trophy-fill"></i><span>Performance Board</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="/panel/performance_record">
          <i class="bi bi-circle"></i><span>Record Employee Performance</span>
        </a>
      </li>
      <li>
        <a href="/panel/performance_view">
          <i class="bi bi-circle"></i><span>View employee Progress</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-card-checklist"></i><span>Attendance</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
      <a href="/panel/attendance_record">
          <i class="bi bi-circle"></i><span>Take attendance</span>
        </a>
      </li>
      <li>
      <a href="/panel/attendance_report">
          <i class="bi bi-circle"></i><span>View report</span>
        </a>
      </li>
      
    </ul>
  </li><!-- End Charts Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-sliders"></i><span>Company Setup</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="icons-bootstrap.html">
          <i class="bi bi-circle"></i><span>????</span>
        </a>
      </li>
     
    </ul>
  </li><!-- End Icons Nav -->

  <li class="nav-heading">Pages</li>

 

  <li class="nav-item">
    <a class="nav-link collapsed" href="events/create">
    <i class="bi bi-calendar-event"></i>
      <span>Event board</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="/employee-payments">
    <i class="bi bi-cash-coin"></i>
      <span>Payment Board</span>
    </a>
  </li>


  <li class="nav-item">
  <form action="{{ route('logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" class="nav-link collapsed" >
    <i class="bi bi-box-arrow-right"></i>
      <span>LogOut</span>
</button>
</form>
  </li>
  

</ul>

</aside><!-- End Sidebar-->
