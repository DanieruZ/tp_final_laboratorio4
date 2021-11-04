<?php

namespace DAO;

use DAO\IJobOfferDAO as IJobOfferDAO;
use Models\JobOffer as JobOffer;
use DAO\Connection as Connection;

class JobOfferDAO implements IJobOfferDAO {

  private $jobOfferList = array();
  private $connection;
  private $tableName = 'joboffer';
 

  public function addJobOffer(JobOffer $jobOffer) {
 
    try {

      $sql = "INSERT INTO  joboffer (companyId, jobPositionId, studentId, adminId, description, active) 
                VALUES ( :companyId, :jobPositionId, :studentId, :adminId, :description, :active);";

    
      $parameters["companyId"] = $jobOffer->getCompanyId();
      $parameters["jobPositionId"] = $jobOffer->getJobPositionId();
      $parameters["studentId"] = $jobOffer->getStudentId();
      $parameters["adminId"] = $jobOffer->getAdminId();
      $parameters["description"] = $jobOffer->getDescription();
      $parameters["active"] = $jobOffer->getActive();
     



      $this->connection = Connection::GetInstance();
      return $this->connection->ExecuteNonQuery($sql, $parameters);
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }

  public function getNextId()
  {
    $id = 0;
    foreach ($this->jobOfferList as $jobOffer) {
      $id = ($jobOffer->getJobOfferId() > $id) ? $jobOffer->getJobOfferId() : $id;
    }
    return $id + 1;
  }
 
 

  public function getAllJobOffer()
  {
    try {
      $jobOfferList = array();

      $sql = "SELECT * FROM " . $this->tableName;

      $this->connection = Connection::GetInstance();

      $toJobOffer = $this->connection->Execute($sql);

      foreach ($toJobOffer as $row) {

        $jobOffer = new JobOffer();
        $jobOffer->setJobOfferId($row["jobOfferId"]);
        $jobOffer->setCompanyId($row["companyId"]);
        $jobOffer->setJobPositionId($row["jobPositionId"]);
        $jobOffer->setStudentId($row["studentId"]);
        $jobOffer->setAdminId($row["adminId"]);
        $jobOffer->setDescription($row["description"]);
        $jobOffer->setActive($row["active"]);

        array_push($jobOfferList, $jobOffer);
      }

      return $jobOfferList;
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }
}


  ?>