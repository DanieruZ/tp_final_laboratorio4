<?php

namespace Controllers;

use DAO\StudentDAO as StudentDAO;
use DAO\CareerDAO as CareerDAO;
use Models\Student;
use Utils\Utils;

class StudentController
{

  private $studentDAO;
  private $CareerDAO;

  public function __construct()
  {
    $this->studentDAO = new StudentDAO();
    $this->CareerDAO = new CareerDAO();
  }

  public function ShowStudentWelcomeView($student)
  {
    Utils::checkStudentSession();
    require_once(VIEWS_PATH . "nav-student.php");
    require_once(VIEWS_PATH . "student-welcome.php");
  }

  public function ShowAddView()
  {
    Utils::checkAdminSession();
    require_once(VIEWS_PATH . "nav-admin.php");
    $careerList =  $this->CareerDAO->getAllCareer();
    require_once(VIEWS_PATH . "student-add.php");
  }

  public function ShowStudentListAdminView()
  {
    Utils::checkAdminSession();
    require_once(VIEWS_PATH . "nav-admin.php");
    $studentList = $this->studentDAO->getAllStudent();
    require_once(VIEWS_PATH . "student-list-admin.php");
  }

  public function ShowStudentListView()
  {
    Utils::checkStudentSession();
    require_once(VIEWS_PATH . "nav-student.php");
    $studentList = $this->studentDAO->getAllStudent();
    require_once(VIEWS_PATH . "student-list.php");
  }


  public function AddStudent($careerId, $firstName, $lastName, $dni, $fileNumber, $gender, $birthDate, $email, $phoneNumber, $active)
  {
    Utils::checkAdminSession();    
    $student = new Student();
    $student = $this->studentDAO->getStudentByEmail($email);   
      if ($student == null) {            
          $studentId = $this->studentDAO->getNextId();
          $student = new Student();
          $student->setCareerId($careerId);
          $student->setFirstName($firstName);
          $student->setLastName($lastName);
          $student->setDni($dni);
          $student->setFileNumber($fileNumber);
          $student->setGender($gender);
          $student->setBirthDate($birthDate);
          $student->setEmail($email);
          $student->setPhoneNumber($phoneNumber);
          $student->setActive($active);
          $this->studentDAO->addStudent($student);
          $this->ShowAddView();       
      }
      else {
        $registedEmail = true;
        require_once(VIEWS_PATH . "nav-admin.php");
        require_once(VIEWS_PATH . "student-add.php");
    }
  }

  public function DeleteStudent($studentId)
  {
    Utils::checkAdminSession();
    $this->studentDAO->deleteStudentById($studentId);
    $this->ShowStudentListAdminView();
  }
 

  public function Index()
  {
    Utils::checkStudentSession();
    $student = $_SESSION["student"];
    $title = $student->getFirstName();
    $this->ShowStudentWelcomeView($student);
  }
}
