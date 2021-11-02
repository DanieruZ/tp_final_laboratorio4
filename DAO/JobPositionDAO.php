<?php

namespace DAO;

use DAO\IJobPositionDAO as IJobPositionDAO;
use Models\JobPosition as JobPosition;

class JobPositionDAO implements IJobPositionDAO {

  private $jobPositionList = array();

  public function addJobPosition(JobPosition $jobPosition) {
    $this->retrieveData();
    array_push($this->jobPositionList, $jobPosition);
  }


  //* Muetra consumiendo la API
  public function getAllJobPosition() {
    $this->retrieveData();
    return $this->jobPositionList;
  }

  private function retrieveData() {
    $this->jobPositionList = array();

    $apiJobPosition = curl_init(API_URL_JOBPOSITION . 'JobPosition');
    curl_setopt($apiJobPosition, CURLOPT_URL, API_URL_JOBPOSITION);
    curl_setopt($apiJobPosition, CURLOPT_HTTPHEADER, array('x-api-key: ' . API_KEY));
    curl_setopt($apiJobPosition, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($apiJobPosition);
    $arrayToDecode = ($response) ? json_decode($response, true) : array();

      foreach ($arrayToDecode as $valuesArray) {
        $jobPosition = new JobPosition(
          $valuesArray["jobPositionId"],
          $valuesArray["careerId"],
          $valuesArray["description"]
        );

        array_push($this->jobPositionList, $jobPosition);
      }
  }

}

?>
