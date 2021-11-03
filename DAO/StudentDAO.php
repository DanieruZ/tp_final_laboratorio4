<?php

namespace DAO;
    
use DAO\IStudentDAO as IStudentDAO;
use Models\Student as Student;
use DAO\Connection as Connection;
    
class StudentDAO implements IStudentDAO {
    
  private $studentList = array();
  private $connection;
  private $tableName = "Student";

  public function addStudent(Student $student) {
    try {
      $sql = "INSERT INTO Student (studentId, careerId, firstName, lastName, dni, fileNumber, gender, birthDate, email, phoneNumber, active) 
              VALUES (:studentId,:careerId,:firstName,:lastName,:dni,:fileNumber,:gender,:birthDate,:email,:phoneNumber,:active)";

      $parameters['studentId'] = $student->getStudentId();
      $parameters['careerId'] = $student->getCareerId();
      $parameters['firstName'] = $student->getFirstName();
      $parameters['lastName'] = $student->getLastName();
      $parameters['dni'] = $student->getDni();
      $parameters['fileNumber'] = $student->getFileNumber(); 
      $parameters['gender'] = $student->getGender();
      $parameters['birthDate'] = $student->getBirthDate();
      $parameters['email'] = $student->getEmail();
      $parameters['phoneNumber'] = $student->getPhoneNumber();
      $parameters['active'] = $student->getActive();
      
      $this->connection = Connection::GetInstance();
      return $this->connection->executeNonQuery($sql, $parameters);

    } catch (\PDOException $ex) {
        throw $ex;
      }
  }


  public function getNextId() {
    $id = 0;

    foreach($this->studentList as $student) {
        $id = ($student->getStudentId() > $id) ? $student->getStudentId() : $id;            
    }
    return $id + 1;
  }


  //* Muestra todos los estudiantes consumiendo la API 
  // public function getAllStudent() {
  //   $this->retrieveData();
  //   return $this->studentList;
  // }

  //* Muestra todos los estudiantes desde la bd  
  public function getAllStudent() {
    try {
      $studentList = array();

      $sql = "SELECT * FROM " . $this->tableName;

      $this->connection = Connection::GetInstance();
      $toStudent = $this->connection->Execute($sql);

      foreach ($toStudent as $row) {
        $student = new Student();
        $student->setStudentId($row['studentId']);
        $student->setCareerId($row['careerId']);
        $student->setFirstName($row['firstName']);
        $student->setLastName($row['lastName']);
        $student->setDni($row['dni']);
        $student->setFileNumber($row['fileNumber']); 
        $student->setGender($row['gender']);
        $student->setBirthDate($row['birthDate']);
        $student->setEmail($row['email']);
        $student->setPhoneNumber($row['phoneNumber']);
        $student->setActive($row['active']);

        array_push($studentList, $student);
      }
      return $studentList;

    } catch (\PDOException $ex) {
        throw $ex;
      }
  }


  public function deleteStudentById($studentId) {
    $sql = "DELETE FROM Student WHERE studentId = :studentId";
    $parameters['studentId'] = $studentId;

    try {
      $this->connection = Connection::getInstance();
      return $this->connection->executeNonQuery($sql, $parameters);

    } catch (\PDOException $ex) {
        throw $ex;
      }
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
    
    $apiStudent = curl_init(API_URL_STUDENT . 'Student');
    curl_setopt($apiStudent, CURLOPT_URL, API_URL_STUDENT);
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

  //* Transfiere los datos de un archivo json a la bd
  //! falta la conexion a la bd, se puede realizar manualmente
  public function transferStudentJsonToDb() {
    if(file_exists('Data/students.json')) {
      $jsonContent = file_get_contents('Data/students.json');
      $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
      
      foreach ($arrayToDecode as $row) {
        $studentId = $row['studentId'];
        $careerId = $row['careerId'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $dni = $row['dni'];
        $fileNumber = $row['fileNumber'];
        $gender = $row['gender'];
        $birthDate = $row['birthDate'];
        $email = $row['email'];
        $phoneNumber = $row['phoneNumber'];
        $active = $row['active'];
        
        $sql = "INSERT INTO `Student` (
            `studentId`,
            `careerId`, 
            `firstName`, 
            `lastName`, 
            `dni`, 
            `fileNumber`, 
            `gender`, 
            `birthDate`, 
            `email`, 
            `phoneNumber`, 
            `active`)
          VALUES (
            '$studentId',
            '$careerId',
            '$firstName',
            '$lastName',
            '$dni',
            '$fileNumber',
            '$gender',
            '$birthDate',
            '$email',
            '$phoneNumber',
            '$active'
          );";
         
        echo $sql; //! ingresar la conexion a la bd
      }
    }
  }

}
    
?> 
