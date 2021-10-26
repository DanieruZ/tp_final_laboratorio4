<?php

namespace Controllers;

use DAO\StudentDAO as StudentDAO;
use Models\Student;
use Utils\Utils;

class StudentController {

  private $studentDAO;

  public function __construct()
  {
    $this->studentDAO = new StudentDAO();
  }

  public function ShowStudentWelcomeView($student) {
    Utils::checkStudentSession();
    require_once(VIEWS_PATH . "nav-student.php");
    require_once(VIEWS_PATH . "student-welcome.php");
  }

  public function ShowAddView() {
    Utils::checkAdminSession();
    require_once(VIEWS_PATH . "nav-admin.php");
    require_once(VIEWS_PATH . "student-add.php");
  }

  public function ShowStudentListAdminView() {
    Utils::checkAdminSession();
    require_once(VIEWS_PATH . "nav-admin.php");
    $studentList = $this->studentDAO->getAllStudent();
    require_once(VIEWS_PATH . "student-list-admin.php");
  }

  public function ShowStudentListView() {
    Utils::checkStudentSession();
    require_once(VIEWS_PATH . "nav-student.php");
    $studentList = $this->studentDAO->getAllStudent();
    require_once(VIEWS_PATH . "student-list.php");
  }

  public function AddStudent($careerId,$firstName,$lastName,$dni,$fileNumber,$gender,$birthDate,$email,$phoneNumber,$active) {
    Utils::checkAdminSession();
    $studentId = $this->studentDAO->getNextId();
    $student = new Student($studentId,$careerId,$firstName,$lastName,$dni,$fileNumber,$gender,$birthDate,$email,$phoneNumber,$active);
    $this->studentDAO->addStudent($student);
    $this->ShowAddView();
  }

  public function DeleteStudent($studentId) {
    Utils::checkAdminSession();
    $this->studentDAO->deleteStudentById($studentId);
    $this->ShowStudentListAdminView();
  }

  public function Index() {
    Utils::checkStudentSession();
    $student = $_SESSION["student"];
    $title = $student->getFirstName();      
    $this->ShowStudentWelcomeView($student);
  }
}
