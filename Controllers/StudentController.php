<?php

namespace Controllers;

use DAO\StudentDAO as StudentDAO;
use Models\Student;

class StudentController
{

  private $studentDAO;

  public function __construct()
  {
    $this->studentDAO = new StudentDAO();
  }

  public function ShowStudentWelcomeView($student)
  {
    require_once(VIEWS_PATH . "nav-student.php");
    require_once(VIEWS_PATH . "student-welcome.php");
  }

  public function ShowAddView()
  {
    require_once(VIEWS_PATH . "nav-admin.php");
    require_once(VIEWS_PATH . "student-add.php");
  }

  public function ShowAdminListView()
  {
    require_once(VIEWS_PATH . "nav-admin.php");
    $studentList = $this->studentDAO->getAllStudent();
    require_once(VIEWS_PATH . "student-list-admin.php");
  }

  public function ShowStudentListView()
  {
    require_once(VIEWS_PATH . "nav-student.php");
    $studentList = $this->studentDAO->getAllStudent();
    require_once(VIEWS_PATH . "student-list.php");
  }

  public function AddStudent($careerId,$firstName,$lastName,$dni,$fileNumber,$gender,$birthDate,$email,$phoneNumber,$active)
  {
    $studentId = $this->studentDAO->getNextId();
    $student = new Student($studentId,$careerId,$firstName,$lastName,$dni,$fileNumber,$gender,$birthDate,$email,$phoneNumber,$active);
    $this->studentDAO->addStudent($student);
    $this->ShowAddView();
  }

  public function DeleteStudent($studentId)
  {
    $this->studentDAO->deleteStudentById($studentId);
    $this->ShowAdminListView();
  }

  public function Index()
  {
    $student = $_SESSION["student"];
    $title = $student->getFirstName();      
    $this->ShowStudentWelcomeView($student);
  }
}
