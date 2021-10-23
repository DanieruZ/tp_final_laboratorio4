<?php

namespace Controllers;

use DAO\StudentDAO as StudentDAO;
use Models\Student as Student;
use Controllers\HomeController as HomeController;
use DAO\AdminDAO;
use Models\Admin as Admin;

/**
 * * instalar extension Better Comments para los comentarios
 * ! aclaracion: no le pego a la api ni al json, es para acomodar las opciones en las sesiones.
 * ! los email estan predefinidos, si no loguea se redirecciona al index.
 * 
 */
class LoginController
{

  public function Login($email)
  {

    $studenRepo = new StudentDAO();
    $studentList = $studenRepo->getAllStudent();
    $adminRepo = new AdminDAO();
    $adminList = $adminRepo->getAllAdmin();

    $i = 0;

    while ($i < count($adminList) && ($adminList[$i]->getEmail() != $email)) {
      $i++;   
    }
    if ($i < count($adminList)) {
      $admin = new Admin(
        $adminList[$i]->getAdminId(),
        $adminList[$i]->getFirstName(),
        $adminList[$i]->getLastName(),
        $adminList[$i]->getDni(),
        $adminList[$i]->getEmail(),
        $adminList[$i]->getActive()
      );
      $_SESSION["admin"] = $admin;
      header("location:" . FRONT_ROOT . "Admin");
    } else {
      $homeController = new HomeController();
      $homeController->Index("mail o contraseña incorrectas");
    }

    $i = 0; // vuelve el contador a 0 en caso de que el email que se intenta loguear no sea tipo admin

    while ($i < count($studentList) && ($studentList[$i]->getEmail() != $email)) {
      $i++;
    }
    if ($i < count($studentList)) {
      $student = new Student(
        $studentList[$i]->getStudentId(),
        $studentList[$i]->getCareerId(),
        $studentList[$i]->getFirstName(),
        $studentList[$i]->getLastName(),
        $studentList[$i]->getDni(),
        $studentList[$i]->getFileNumber(),
        $studentList[$i]->getGender(),
        $studentList[$i]->getBirthDate(),
        $studentList[$i]->getEmail(),
        $studentList[$i]->getPhoneNumber(),
        $studentList[$i]->getActive()
      );
      $_SESSION["student"] = $student;
      header("location:" . FRONT_ROOT . "Student");
    } else {
      $homeController = new HomeController();
      $homeController->Index("mail o contraseña incorrectas");
    }
  }

  public function Logout()
  {
    header("location: ../index.php");
  }
}
