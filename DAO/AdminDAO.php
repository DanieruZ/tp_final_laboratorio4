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

  private function retrieveData() {
    $this->adminList = array();

    if(file_exists('Data/admins.json')) {
      $jsonContent = file_get_contents('Data/admins.json');
      $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

      foreach ($arrayToDecode as $valuesArray) {
        $admin = new Admin(
          $valuesArray["adminId"],
          $valuesArray["jobPosition"],
          $valuesArray["firstName"],
          $valuesArray["lastName"],
          $valuesArray["dni"],
          $valuesArray["fileNumber"],
          $valuesArray["gender"],
          $valuesArray["birthDate"],
          $valuesArray["email"],
          $valuesArray["password"],
          $valuesArray["phoneNumber"],
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
      $valuesArray["jobPosition"] = $admin->getCareerId();
      $valuesArray["firstName"] = $admin->getFirstName();
      $valuesArray["lastName"] = $admin->getLastName();
      $valuesArray["dni"] = $admin->getDni();
      $valuesArray["fileNumber"] = $admin->getFileNumber();
      $valuesArray["gender"] = $admin->getGender();
      $valuesArray["birthDate"] = $admin->getBirthDate();
      $valuesArray["email"] = $admin->getEmail();
      $valuesArray["password"] = $admin->getPassword();
      $valuesArray["phoneNumber"] = $admin->getPhoneNumber();
      $valuesArray["active"] = $admin->getActive();

      array_push($arrayToEncode, $valuesArray);
    }

    $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
    file_put_contents('Data/admins.json', $jsonContent);
  }  

}

?>
