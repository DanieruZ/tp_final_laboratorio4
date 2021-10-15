<?php 
  namespace Views;
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    </button>
    <div class="collapse navbar-collapse" >
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo FRONT_ROOT ?>login.php">Log out</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/ShowAddView">Add Company</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo FRONT_ROOT?>Company/ShowListViewAdmin" >List Company</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
<body>
    <h1>Admin</h1>
</body>
</html>
