<?php

namespace Models;

class Admin {

  private $adminId; 
  private $firstName;
  private $lastName;
  private $dni;
  private $email;
  private $active;

  public function __construct() {
  }

  public function getAdminId() {
    return $this->adminId;
  }

  public function setAdminId($adminId) {
    $this->adminId = $adminId;
    return $this;
  }

    public function getFirstName() {
    return $this->firstName;
  }

  public function setFirstName($firstName) {
    $this->firstName = $firstName;
    return $this;
  }

  public function getLastName() {
    return $this->lastName;
  }

  public function setLastName($lastName) {
    $this->lastName = $lastName;
    return $this;
  }

  public function getDni() {
    return $this->dni;
  }

  public function setDni($dni) {
    $this->dni = $dni;
    return $this;
  }
  
  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
    return $this;
  }

  public function getActive() {
    return $this->active;
  }

  public function setActive($active) {
    $this->active = $active;
    return $this;
  }
}

?>
