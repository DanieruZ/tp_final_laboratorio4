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


  /**
   * 
   * * Muestra consumiendo la API jobPosition
   *
   */
  // public function getAllJobPosition() {
  //   $this->retrieveData();
  //   return $this->jobPositionList;
  // }

  public function getAllJobPosition()
  {
      try {
          $jobPositionList = array();

          $sql = "SELECT * FROM jobposition";   
            
          
          $this->connection = Connection::GetInstance();

          $toJobPosition = $this->connection->Execute($sql);

          foreach ($toJobPosition as $row) {
              $jobPosition = new JobPosition();
              $jobPosition->setJobPositionId($row["id_jobPosition"]);
              $jobPosition->setCareerId($row["career_id"]);
              $jobPosition->setDescription($row["jobPosition_description"]);
             
              //die(var_dump($toJobPosition));
              array_push($jobPositionList, $jobPosition);
          }
   

         
          return $jobPositionList;
      } catch (\PDOException $ex) {
        throw $ex;
      }
  }

  

  public function getAllJobPositionByName()
  {
      try {
          $jobPositionList = array();

          $sql ="SELECT jobOffer_description FROM joboffer jo     
      INNER JOIN jobposition jp on jo.jobPosition_id = jp.id_jobPosition      
      WHERE jo.id_jobOffer  =  jp.id_jobPosition ";
            

          $this->connection = Connection::GetInstance();

          $toJobPosition = $this->connection->Execute($sql);

          foreach ($toJobPosition as $row) {
              $jobPosition = new JobPosition();             
              $jobPosition->setDescription($row["jobOffer_description"]);
             

              array_push($jobPositionList, $jobPosition);
          }
          return $jobPositionList;
      } catch (\PDOException $ex) {
        throw $ex;
      }
  }


  /**
   * 
   * * Consume la API jobPosition
   *
   */
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

  public function getAllActiveCareer()
  {
    try {
      $jobPositionList = array();

      $sql = "SELECT * FROM jobposition jp
            INNER JOIN career cr ON cr.id_career = jp.career_id
            WHERE cr.active = 1;";

      $this->connection = Connection::GetInstance();

      $toJobPosition = $this->connection->Execute($sql);

      foreach ($toJobPosition as $row) {
        $jobPosition = new JobPosition();
        $jobPosition->setJobPositionId($row["id_jobPosition"]);
        $jobPosition->setCareerId($row["career_id"]);
        $jobPosition->setDescription($row["jobPosition_description"]);
        
        array_push($jobPositionList, $jobPosition);
     
      }     
      return $jobPositionList;
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }

  /**
   * 
   * * Transfiere los datos de jobPosition json a la bd
   *
   */
  public function transferJobPositionJsonToDb() {
    if(file_exists('Data/job-positions.json')) {
      $jsonContent = file_get_contents('Data/job-positions.json');
      $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

      foreach ($arrayToDecode as $row) {
        $jobPositionId = $row['jobPositionId'];
        $careerId = $row['careerId'];
        $description = $row['description'];

        $sql = "INSERT INTO job-position (
            'jobPositionId',
            'careerId', 
            'description')
          VALUES (
            '$jobPositionId',
            '$careerId',
            '$description',
          );";
          echo $sql;
      }
    }
  }

}

?>
