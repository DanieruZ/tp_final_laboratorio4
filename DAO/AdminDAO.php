<?php

namespace DAO;

use DAO\IAdminDAO as IAdminDAO;
use Models\Admin as Admin;
use DAO\Connection as Connection;

class AdminDAO implements IAdminDAO {
private $tableName = "Admin";
private $connection;


  private $adminList = array();
/*
  public function addAdmin(Admin $admin) {
    $this->retrieveData();
    array_push($this->adminList, $admin);
    $this->saveData();
  }
*/
  public function addAdmin(Admin $admin)
  {

    try {

      $sql = "INSERT INTO  Admin (firstName, lastName, dni, email, active) 
                VALUES ( :firstName, :lastName, :dni, :email, :active);";

      
      $parameters["firstName"] = $admin->getFirstName();
      $parameters["lastName"] = $admin->getLastName();
      $parameters["dni"] = $admin->getDni();
      $parameters["email"] = $admin->getEmail();
      $parameters["active"] = $admin->getActive();



      $this->connection = Connection::GetInstance();
      return $this->connection->ExecuteNonQuery($sql, $parameters);
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }

  public function getNextId()
  {
    $id = 0;
    foreach ($this->adminList as $admin) {
      $id = ($admin->getAdminId() > $id) ? $admin->getAdminId() : $id;
    }
    return $id + 1;
  }
  
/*
  public function getAllAdmin() {
    $this->retrieveData();
    return $this->adminList;
  }
*/
  public function getAllAdmin() {
    try {
      $adminList = array();

      $sql = "SELECT * FROM " . $this->tableName;

      $this->connection = Connection::GetInstance();
      $toAdmin = $this->connection->Execute($sql);

      foreach ($toAdmin as $row) {
        $admin = new Admin();
        $admin->setAdminId($row['adminId']);
        $admin->setFirstName($row['firstName']);
        $admin->setLastName($row['lastName']);
        $admin->setDni($row['dni']);
        $admin->setEmail($row['email']);
        $admin->setActive($row['active']);

        array_push($adminList, $admin);
      }
      return $adminList;

    } catch (\PDOException $ex) {
        throw $ex;
      }
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
