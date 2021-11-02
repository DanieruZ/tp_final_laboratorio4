<?php

namespace DAO;
    
use DAO\IStudentDAO as IStudentDAO;
use Models\Student as Student;

    
class StudentDAO implements IStudentDAO {
    
  private $studentList = array();

  public function addStudent(Student $student) {

  }


  //* Muestra todos los estudiantes consumiendo la API 
  public function getAllStudent() {
    $this->retrieveData();
    return $this->studentList;
  }


  public function getStudentByEmail($email) {
    $this->retrieveData();
    $targetStudent = null;
    
    foreach($this->studentList as $student) {
      if($student->getEmail() == $email) {
        $targetStudent = $student;
      }
    }
    return $targetStudent;
  }

  //* Consume la API de students
  private function retrieveData() {
    $this->studentList = array();
    
    $apiStudent = curl_init(API_URL . 'Student');
    curl_setopt($apiStudent, CURLOPT_URL, API_URL);
    curl_setopt($apiStudent, CURLOPT_HTTPHEADER, array('x-api-key: ' . API_KEY));
    curl_setopt($apiStudent, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($apiStudent);
    $arrayToDecode = ($response) ? json_decode($response, true) : array();

    foreach ($arrayToDecode as $valuesArray) {
      $student = new Student(
        $valuesArray["studentId"],
        $valuesArray["careerId"],
        $valuesArray["firstName"],
        $valuesArray["lastName"],
        $valuesArray["dni"],
        $valuesArray["fileNumber"],
        $valuesArray["gender"],
        $valuesArray["birthDate"],
        $valuesArray["email"],
        $valuesArray["phoneNumber"],
        $valuesArray["active"]
      );
      array_push($this->studentList, $student);
    }
  }

}
    
?> 
