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


  //* Muestra consumiendo la API
  public function getAllJobPosition() {
    $this->retrieveData();
    return $this->jobPositionList;
  }


  //* Consume la API jobPosition
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


  //* Transfiere los datos de un archivo json a la bd
  //! falta la conexion a la bd, se puede realizar manualmente
  public function transferJobPositionJsonToDb() {
    if(file_exists('Data/job-positions.json')) {
      $jsonContent = file_get_contents('Data/job-positions.json');
      $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

      foreach ($arrayToDecode as $row) {
        $jobPositionId = $row['jobPositionId'];
        $careerId = $row['careerId'];
        $description = $row['description'];

        $sql = "INSERT INTO JobPosition (
            'jobPositionId',
            'careerId', 
            'description')
          VALUES (
            '$jobPositionId',
            '$careerId',
            '$description',
          );";
          echo $sql; //! ingresar la conexion a la bd
      }
    }
  }

}

?>
