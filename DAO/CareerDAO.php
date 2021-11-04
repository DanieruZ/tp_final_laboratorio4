<?php

namespace DAO;
    
use DAO\ICareerDAO as ICareerDAO;
use Models\Career as Career;
use DAO\Connection as Connection;
    
class CareerDAO implements ICareerDAO {
    
  private $careerList = array();
  private $connection;

  public function addCareer(Career $career) {
  
  }


  //* Muestra todas las carreras consumiendo la API 
  public function getAllCareer() {
    $this->retrieveData();
    return $this->careerList;
  }


  //* Consume la API career
  private function retrieveData() {
    $this->careerList = array();
    
    $apiCareer = curl_init(API_URL_CAREER . 'Career');
    curl_setopt($apiCareer, CURLOPT_URL, API_URL_CAREER);
    curl_setopt($apiCareer, CURLOPT_HTTPHEADER, array('x-api-key: ' . API_KEY));
    curl_setopt($apiCareer, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($apiCareer);
    $arrayToDecode = ($response) ? json_decode($response, true) : array();

    foreach ($arrayToDecode as $valuesArray) {
      $career = new Career(
        $valuesArray["careerId"],
        $valuesArray["description"],
        $valuesArray["active"],
      );

      array_push($this->careerList, $career);
    }
  }  


  /**
   * 
   * * Transfiere los datos de careers json a la bd
   *
   */
  public function transferCareerJsonToDb() {
    if(file_exists('Data/careers.json')) {
      $jsonContent = file_get_contents('Data/careers.json');
      $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

      foreach ($arrayToDecode as $row) {
        $careerId = $row['careerId'];
        $description = $row['description'];
        $active = $row['active'];

        $sql = "INSERT INTO career (
            'jobPositionId',
            'careerId', 
            'description')
          VALUES (
            '$careerId',
            '$description',
            '$active',
          );";
          echo $sql;
      }
    }
  }

}

?>
