<?php

    namespace DAO;
    
    use DAO\IStudentDAO as IStudentDAO;
    use Models\Student as Student;
    
    class StudentDAO implements IStudentDAO {
    
      private $studentList = array();
    
      public function addStudent(Student $student) {
        $this->retrieveData();
        array_push($this->studentList, $student);
        $this->saveData();
      }
    
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

      private function saveData() {
        $arrayToEncode = array();
    
        foreach($this->studentList as $student){
          $valuesArray["studentId"] = $student->getStudentId();
          $valuesArray["careerId"] = $student->getCareerId();
          $valuesArray["firstName"] = $student->getFirstName();
          $valuesArray["lastName"] = $student->getLastName();
          $valuesArray["dni"] = $student->getDni();
          $valuesArray["fileNumber"] = $student->getFileNumber();
          $valuesArray["gender"] = $student->getGender();
          $valuesArray["birthDate"] = $student->getBirthDate();
          $valuesArray["email"] = $student->getEmail();
          $valuesArray["phoneNumber"] = $student->getPhoneNumber();
          $valuesArray["active"] = $student->getActive();
    
          array_push($arrayToEncode, $valuesArray);
        }
    
        $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
        file_put_contents('Data/students.json', $jsonContent);
      }

    
      private function retrieveData() {
        $this->studentList = array();
    
        if(file_exists('Data/students.json')) {
          $jsonContent = file_get_contents('Data/students.json');
          $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
    
          foreach($arrayToDecode as $valuesArray) {
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
            $valuesArray["active"]);
    
            array_push($this->studentList, $student);
          }
        }
      }
    }
    
    ?> 