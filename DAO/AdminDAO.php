<?php

namespace DAO;

use DAO\IAdminDAO as IAdminDAO;
use Models\Admin as Admin;

class AdminDAO implements IAdminDAO {

  private $adminList = array();

  public function addAdmin(Admin $admin) {
    $this->retrieveData();
    array_push($this->adminList, $admin);
    $this->saveData();
  }

  public function getAllAdmin() {
    $this->retrieveData();
    return $this->adminList;
  }

  public function getAdminByEmail($email) {
    $this->retrieveData();
    $targetAdmin = null;
    //die(var_dump($email));
    foreach($this->adminList as $admin) {
      if($admin->getEmail() == $email) {
        $targetAdmin = $admin;
      }
    }
    
    return $targetAdmin;
  }

  private function retrieveData() {
    $this->adminList = array();

    if(file_exists('Data/admins.json')) {
      $jsonContent = file_get_contents('Data/admins.json');
      $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

      foreach ($arrayToDecode as $valuesArray) {
        $admin = new Admin(
          $valuesArray["adminId"],      
          $valuesArray["firstName"],
          $valuesArray["lastName"],
          $valuesArray["dni"],         
          $valuesArray["email"],       
          $valuesArray["active"]
        );

        array_push($this->adminList, $admin);
      }
    }
  }

  private function saveData() {
    $arrayToEncode = array();

    foreach ($this->adminList as $admin) {
      $valuesArray["adminId"] = $admin->getAdminId();    
      $valuesArray["firstName"] = $admin->getFirstName();
      $valuesArray["lastName"] = $admin->getLastName();
      $valuesArray["dni"] = $admin->getDni(); 
      $valuesArray["email"] = $admin->getEmail(); 
      $valuesArray["active"] = $admin->getActive();

      array_push($arrayToEncode, $valuesArray);
    }

    $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
    file_put_contents('Data/admins.json', $jsonContent);
  }  

}

?>
