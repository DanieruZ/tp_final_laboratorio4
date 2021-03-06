<?php

namespace Utils;

use DAO\StudentDAO as StudentDAO;
use Models\Student as Student;
use Controllers\HomeController as HomeController;
use DAO\AdminDAO;
use Models\Admin as Admin;

class Utils {

  public static function checkAdminSession() {
    if(!(isset($_SESSION['admin']))) {
      Utils::logout();
    }
  }

  public static function checkStudentSession() {
    if(!(isset($_SESSION['student']))) {
      Utils::logout();
    }
  }

  public static function initAdminSession($email) {
    $adminRepo = new AdminDAO();
    $adminList = $adminRepo->getAllAdmin();
    $i = 0;

    while ($i < count($adminList) && ($adminList[$i]->getEmail() != $email)) {
      $i++;   
    }

    if ($i < count($adminList)) {
      $admin = new Admin();
      $admin->setAdminId($adminList[$i]->getAdminId());
      $admin->setFirstName($adminList[$i]->getFirstName());
      $admin->setLastName($adminList[$i]->getLastName());
      $admin->setDni($adminList[$i]->getDni());
      $admin->setEmail($adminList[$i]->getEmail());
      $admin->setActive($adminList[$i]->getActive());
      
      $_SESSION["admin"] = $admin;
      header("location:" . FRONT_ROOT . "Admin");

    } else {
        $homeController = new HomeController();
        $homeController->Index("Email incorrecto");
      }
  }


  public static function initStudentSession($email) {
    $studenRepo = new StudentDAO();
    $studentList = $studenRepo->getAllStudent();
    $i = 0; 

    while ($i < count($studentList) && ($studentList[$i]->getEmail() != $email)) {
      $i++;
    }

    if ($i < count($studentList)) {
      $student = new Student();
      $student->setStudentId($studentList[$i]->getStudentId());
      $student->setCareerId($studentList[$i]->getCareerId());
      $student->setFirstName($studentList[$i]->getFirstName());
      $student->setLastName($studentList[$i]->getLastName());
      $student->setDni($studentList[$i]->getDni());
      $student->setFileNumber($studentList[$i]->getFileNumber());
      $student->setGender($studentList[$i]->getGender());
      $student->setBirthDate($studentList[$i]->getBirthDate());
      $student->setEmail($studentList[$i]->getEmail());
      $student->setPhoneNumber($studentList[$i]->getPhoneNumber());
      $student->setActive($studentList[$i]->getActive());
    
      $_SESSION["student"] = $student;   
      header("location:" . FRONT_ROOT . "Student");
   
    } else {
        $homeController = new HomeController();
        $homeController->Index("Email incorrecto");
      }
  }

  public static function logout() {
    session_start();
    session_destroy();
    header("location: ../index.php");
  }

}

?>
