<?php

namespace Controllers;

use DAO\AdminDAO as AdminDAO;

class AdminController {
        
  private $adminDAO;

  public function __construct() {
    $this->adminDAO = new AdminDAO();
  }
  
  public function ShowAdminWelcomeView(){
    require_once(VIEWS_PATH."nav-admin.php");
    require_once(VIEWS_PATH."admin-welcome.php");
  }

  public function Index(){
    $this->ShowAdminWelcomeView();
  }

}

?>
