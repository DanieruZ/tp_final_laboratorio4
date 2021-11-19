<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <span class="navbar-text">
    <strong>Student</strong>
  </span>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item"> <a class="nav-link" href="<?php echo FRONT_ROOT . "Student/ShowStudent/" . $_SESSION['student']->getStudentId() ?>">Home</a> </li>
    <li class="nav-item"> <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company\ShowCompanyListStudentView">Company's List</a> </li>
    <li class="nav-item"> <a class="nav-link" href="<?php echo FRONT_ROOT ?>JobOffer\ShowJobOfferListStudentView">Job Offer's List</a> </li>
    <li class="nav-item"> <a class="nav-link" href="<?php echo FRONT_ROOT ?>JobOffer\ShowHistoryApplicationView">Job Application's List</a> </li>
    <li class="nav-item"> <a class="nav-link" href="<?php echo FRONT_ROOT ?>Home/Logout">Logout</a> </li>  
  </ul>
</nav>