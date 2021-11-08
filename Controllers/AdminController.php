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
    Utils::checkAdminSession();
    require_once(VIEWS_PATH."nav-admin.php");
    require_once(VIEWS_PATH."admin-welcome.php");
  }


  public function ShowAddView(){
    Utils::checkAdminSession();
    require_once(VIEWS_PATH."nav-admin.php");
    require_once(VIEWS_PATH."admin-add.php");
  }

  
  public function AddAdmin($firstName, $lastName, $dni, $email, $active) {  
    Utils::checkAdminSession();    
    $adminId = $this->adminDAO->getNextId(); //genera el siguiente ID

    $admin = new Admin();   
    $admin->setAdminId($adminId);
    $admin->setFirstName($firstName);
    $admin->setLastName($lastName);
    $admin->setDni($dni);
    $admin->setEmail($email);
    $admin->setActive($active); 
    
    $this->adminDAO->addAdmin($admin);   
    $this->ShowAddView();
  }
  
  
  public function Index() {
    $admin = $_SESSION["admin"];
    $title = $admin->getFirstName();   
    $this->ShowAdminWelcomeView($admin);
  }

}

?>
