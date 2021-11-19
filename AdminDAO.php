<?php

namespace DAO;

use DAO\IAdminDAO as IAdminDAO;
use Models\Admin as Admin;
use DAO\Connection as Connection;

class AdminDAO implements IAdminDAO {

  private $adminList = array();
  private $connection;



  public function addAdmin(Admin $admin) {
    try {
      $sql = "INSERT INTO admin (firstName, lastName, dni, email, active) 
              VALUES (:firstName, :lastName, :dni, :email, :active);";

      $parameters['firstName'] = $admin->getFirstName();
      $parameters['lastName'] = $admin->getLastName();
      $parameters['dni'] = $admin->getDni();
      $parameters['email'] = $admin->getEmail();
      $parameters['active'] = $admin->getActive();

      $this->connection = Connection::GetInstance();
      return $this->connection->ExecuteNonQuery($sql, $parameters);

    } catch (\PDOException $ex) {
        throw $ex;
      }
  }


  public function getNextId() {
    $id = 0;

    foreach ($this->adminList as $admin) {
      $id = ($admin->getAdminId() > $id) ? $admin->getAdminId() : $id;
    }
    return $id + 1;
  }

 
  public function getAllAdmin() {
    try {
      $adminList = array();

      $sql = "SELECT * FROM admin " ;

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


  public function getAdminByEmail($email){
    $targetAdmin = NULL;
    $admins = $this->getAllAdmin();

    foreach($admins as $admin){
        if($admin->getEmail() == $email){
            $targetAdmin = $admin;
        }
    }   
       return $targetAdmin;
}

}

?>
