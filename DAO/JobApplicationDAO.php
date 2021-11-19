<?php

namespace DAO;

use DAO\IJobApplicationDAO as IJobApplicationDAO;
use Models\JobApplication as JobApplication;



class JobApplicationDAO implements IJobApplicationDAO {

  private $jobApplicationList = array();

  public function addJobApplication(JobApplication $jobApplication) {
    $this->retrieveData();
    array_push($this->jobApplicationList, $jobApplication);
    $this->saveData();
  }

  public function getAllJobApplication() {
    $this->retrieveData();
    return $this->jobApplicationList;
  }

  private function retrieveData() {
    $this->jobApplicationList = array();

    if(file_exists('Data/jobapplications.json')) {
      $jsonContent = file_get_contents('Data/jobapplications.json');
      $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

      foreach ($arrayToDecode as $valuesArray) {
        $jobApplication = new JobApplication(
          $valuesArray["jobApplicationId"],
          $valuesArray["companyId"],
          $valuesArray["studentId"],
          $valuesArray["jobPositionId"],       
        );

        array_push($this->jobApplicationList, $jobApplication);
      }
    }
  }

  public function getAllJoApplicationHisotory()
  {
      try {
          $jobApplicationList = array();
          $studentId = $_SESSION['student']->getStudentId();

         // die(var_dump($studentId));
          $sql = "SELECT * FROM studentxjoboffer st
         WHERE st.id_student  = " . $studentId . ";";
         
            

          $this->connection = Connection::GetInstance();

          $toJobApplication = $this->connection->Execute($sql);

          foreach ($toJobApplication as $row) {
              $JobApplication = new JobApplication();
              $JobApplication->setJobApplicationId($row["id_studentXjobOffer"]);
              $JobApplication->setStudentId($row["id_student"]);
              $JobApplication->setJobOfferId($row["id_jobOffer"]);
            

             

              array_push($jobApplicationList, $JobApplication);

           }
          // die(var_dump($jobApplicationList));
          return $jobApplicationList;
      } catch (\PDOException $ex) {
        throw $ex;
      }
  }

  public function getJoApplicationByStudent()
  {
      try {
          $jobApplicationList = array();
         

          $sql = "SELECT * FROM studentxjoboffer ja
                  INNER JOIN student st on st.studentId = ja.id_student";   
            

          $this->connection = Connection::GetInstance();

          $toJobApplication = $this->connection->Execute($sql);

          foreach ($toJobApplication as $row) {
              $JobApplication = new JobApplication();
              $JobApplication->setJobApplicationId($row["id_studentXjobOffer"]);
              $JobApplication->setStudentId($row["id_student"]);
              $JobApplication->setJobOfferId($row["id_jobOffer"]);       

              array_push($jobApplicationList, $JobApplication);

           }
          //die(var_dump($JobApplication));
          return $jobApplicationList;
      } catch (\PDOException $ex) {
        throw $ex;
      }
  }

  private function saveData() {
    $arrayToEncode = array();

    foreach ($this->jobApplicationList as $jobApplication) {
      $valuesArray["jobApplicationId"] = $jobApplication->getJobApplicationId();
      $valuesArray["companyId"] = $jobApplication->getCompanyId();
      $valuesArray["studentId"] = $jobApplication->getStudentId();
      $valuesArray["jobPositionId"] = $jobApplication->getJobPositionId();
      $valuesArray["adminId"] = $jobApplication->getAdminId();
      $valuesArray["active"] = $jobApplication->getActive();

      array_push($arrayToEncode, $valuesArray);
    }

    $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
    file_put_contents('Data/jobapplications.json', $jsonContent);
  } 

}
