<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <span class="navbar-text">
    <strong>Admin</strong>
  </span>
  <ul class="navbar-nav ml-auto">

    <li class="nav-item"> <a class="nav-link" href="<?php echo FRONT_ROOT . "Admin/Index/" . $_SESSION['admin']->getAdminId() ?>">Home</a> </li>    
    <li class="nav-item"> <a class="nav-link" href="<?php echo FRONT_ROOT ?>Admin\ShowAddView">Add Admin</a> </li>
    <li class="nav-item"> <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company\ShowAddView">Add Company</a> </li>
    <li class="nav-item"> <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company\ShowCompanyListAdminView" >Company's List</a> </li>
    <li class="nav-item"> <a class="nav-link" href="<?php echo FRONT_ROOT ?>JobOffer\ShowAddJobOfferView">Add Job Offer</a> </li>
    <li class="nav-item"> <a class="nav-link" href="<?php echo FRONT_ROOT ?>JobOffer\ShowJobOfferListAdminView">Job Offer's List</a> </li>
    <li class="nav-item"> <a class="nav-link" href="<?php echo FRONT_ROOT ?>JobOffer\ShowJobOfferListApplicationAdminView">Job Offer's Application List</a> </li>    

    <li class="nav-item"> <a class="nav-link" href="<?php echo FRONT_ROOT ?>Student/ShowAddView">Add Student</a> </li>
    <li class="nav-item"> <a class="nav-link" href="<?php echo FRONT_ROOT ?>Student/ShowStudentListAdminView">Student's List</a> </li>
    <li class="nav-item"> <a class="nav-link" href="<?php echo FRONT_ROOT ?>Home/Logout">Logout</a> </li>  
  </ul>
</nav>