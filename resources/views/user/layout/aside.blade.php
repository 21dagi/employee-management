<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="/panel/dashboard">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="events/create">
    <i class="bi bi-file-earmark-person"></i>
      <span>Profile board</span>
    </a>
  </li><!-- End F.A.Q Page Nav -->


  <li class="nav-item">
    <a class="nav-link collapsed" href="events/create">
    <i class="bi bi-trophy-fill"></i>
      <span>Performance</span>
    </a>
  </li><!-- End F.A.Q Page Nav -->



  <li class="nav-item">
    <a class="nav-link collapsed" href="events/create">
    <i class="bi bi-card-checklist"></i>
      <span>Attendance</span>
    </a>
  </li><!-- End F.A.Q Page Nav -->

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
