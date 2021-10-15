<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
     <span class="navbar-text">
          <strong>Admin</strong>
     </span>
     <ul class="navbar-nav ml-auto">
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Admin">home</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company\ShowAddView">Add Company</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT?>Company\ShowListViewAdmin" >List Company</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" readonly href="<?php echo FRONT_ROOT ?>Student/ShowAddView">Add Student</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Student/ShowListView">List Student</a>
          </li>
          <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="<?php echo FRONT_ROOT ?>Login/Logout">Logout</a>
          </li>          
     </ul>
</nav>