<?php

namespace Models;

class Admin {

  private $adminId; 
  private $firstName;
  private $lastName;
  private $dni;
  private $email;
 // private $password;
  private $active;

  public function __construct(
    $adminId,     
    $firstName, 
    $lastName, 
    $dni,      
    $email, 
   // $password,     
    $active) {
   
    $this->adminId = $adminId;   
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->dni = $dni;   
    $this->email = $email;
   // $this->password = $password;  
    $this->active = $active;
  }

  public function getAdminId() {
    return $this->adminId;
  }

  public function setAdminId($adminId) {
    $this->adminId = $adminId;
    return $this;
  }

  public function getJobPosition() {
    return $this->jobPosition;
  }

  public function setJobPosition($jobPosition) {
    $this->jobPosition = $jobPosition;
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

  public function getFileNumber() {
    return $this->fileNumber;
  }

  public function setFileNumber($fileNumber) {
    $this->fileNumber = $fileNumber;
    return $this;
  }

  public function getGender() {
    return $this->gender;
  }

  public function setGender($gender) {
    $this->gender = $gender;
    return $this;
  }

  public function getBirthDate() {
    return $this->birthDate;
  }

  public function setBirthDate($birthDate) {
    $this->birthDate = $birthDate;
    return $this;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
    return $this;
  }

  public function getPassword() {
    return $this->password;
  }

  public function setPassword($password) {
    $this->password = $password;
    return $this;
  }

  public function getPhoneNumber() {
    return $this->phoneNumber;
  }

  public function setPhoneNumber($phoneNumber) {
    $this->phoneNumber = $phoneNumber;
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
