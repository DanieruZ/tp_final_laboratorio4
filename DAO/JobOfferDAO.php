<?php

namespace DAO;

use DAO\IJobOfferDAO as IJobOfferDAO;
use Models\JobOffer as JobOffer;
use DAO\Connection as Connection;

class JobOfferDAO implements IJobOfferDAO {

  private $jobOfferList = array();
  private $connection;

  public function addJobOffer(JobOffer $jobOffer) {
    try {
      $sql = "INSERT INTO  joboffer (companyId, companyName, jobPositionId, studentId, adminId, description, active) 
              VALUES ( :companyId, :companyName, :jobPositionId, :studentId, :adminId, :description, :active);";

      $parameters["companyId"] = $jobOffer->getCompanyId();
      $parameters["companyName"] = $jobOffer->getCompanyName();
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


  public function getNextId() {
    $id = 0;

    foreach ($this->jobOfferList as $jobOffer) {
      $id = ($jobOffer->getJobOfferId() > $id) ? $jobOffer->getJobOfferId() : $id;
    }
    return $id + 1;
  }
 
  function getAllJobOffer(){

  }

}


  ?>