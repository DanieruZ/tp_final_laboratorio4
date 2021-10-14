<?php

namespace DAO;

use DAO\IJobPositionDAO as IJobPositionDAO;
use Models\JobPosition as JobPosition;

class JobPositionDAO implements IJobPositionDAO {

  private $jobPositionList = array();

  public function addJobPosition(JobPosition $jobPosition) {
    $this->retrieveData();
    array_push($this->jobPositionList, $jobPosition);
    $this->saveData();
  }

  public function getAllJobPosition() {
    $this->retrieveData();
    return $this->jobPositionList;
  }

  private function retrieveData() {
    $this->jobPositionList = array();

    if(file_exists('Data/jobpositions.json')) {
      $jsonContent = file_get_contents('Data/jobpositions.json');
      $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

      foreach ($arrayToDecode as $valuesArray) {
        $jobPosition = new JobPosition(
          $valuesArray["jobPositionId"],
          $valuesArray["companyId"],
          $valuesArray["jobName"],
          $valuesArray["jobInfo"],
          $valuesArray["active"]
        );

        array_push($this->jobPositionList, $jobPosition);
      }
    }
  }

  private function saveData() {
    $arrayToEncode = array();

    foreach ($this->jobPositionList as $jobPosition) {
      $valuesArray["jobPositionId"] = $jobPosition->getJobPositionId();
      $valuesArray["companyId"] = $jobPosition->getCompanyId();
      $valuesArray["jobName"] = $jobPosition->getJobName();
      $valuesArray["jobInfo"] = $jobPosition->getJobInfo();
      $valuesArray["active"] = $jobPosition->getActive();

      array_push($arrayToEncode, $valuesArray);
    }

    $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
    file_put_contents('Data/jobpositions.json', $jsonContent);
  } 

}

?>
