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
          $valuesArray["adminId"],
          $valuesArray["active"]
        );

        array_push($this->jobApplicationList, $jobApplication);
      }
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

?>