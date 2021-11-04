<?php

namespace Controllers;

use DAO\AdminDAO as AdminDAO;
use Models\Admin as Admin;
use Utils\Utils;

class AdminController {
        
  private $adminDAO;

  public function __construct() {
    $this->adminDAO = new AdminDAO();
  }
  
  public function ShowAdminWelcomeView($admin) {
    require_once(VIEWS_PATH."nav-admin.php");
    require_once(VIEWS_PATH."admin-welcome.php");
  }

  public function ShowAddAdminView(){
    require_once(VIEWS_PATH."nav-admin.php");
    require_once(VIEWS_PATH."admin-add.php");
}


  public function Index() {
    $admin = $_SESSION["admin"];
    $title = $admin->getFirstName();   
    $this->ShowAdminWelcomeView($admin);
  }

  public function AddAdmin($firstName, $lastName,$dni,$email,$active) {  
    Utils::checkAdminSession();    
    $adminId = $this->AdminDAO->getNextId(); //genera el siguiente ID
    $admin = new Admin();   
    $admin->setFirstName($firstName);
    $admin->setLastName($lastName);
    $admin->setDni($dni);
    $admin->setEmail($email);
    $admin->setActive($active); 

    $this->AdminDAO->addAdmin($admin);   
    $this->ShowAddAdminView();
  }

}

?>
