<?php

namespace DAO;

use DAO\IJobOfferDAO as IJobOfferDAO;
use DAO\CompanyDAO as CompanyDAO;
use Models\JobOffer as JobOffer;
use DAO\Connection as Connection;

class JobOfferDAO implements IJobOfferDAO
{

  private $jobOfferList = array();
  private $connection;
  private $tableName = 'joboffer';


  public function addJobOffer(JobOffer $jobOffer)
  {
    try {
      $sql = "INSERT INTO  joboffer (companyId, companyName, jobPositionId, studentId, adminId, descriptionJobOffer, active) 
              VALUES ( :companyId, :companyName, :jobPositionId, :studentId, :adminId, :descriptionJobOffer, :active);";

      $parameters["companyId"] = $jobOffer->getCompanyId();
      $parameters["companyName"] = $jobOffer->getCompanyName();
      $parameters["jobPositionId"] = $jobOffer->getJobPositionId();
      $parameters["studentId"] = $jobOffer->getStudentId();
      $parameters["adminId"] = $jobOffer->getAdminId();
      $parameters["descriptionJobOffer"] = $jobOffer->getDescriptionJobOffer();
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
        $jobOffer->setCompanyName($row["companyName"]);
        $jobOffer->setJobPositionId($row["jobPositionId"]);
        $jobOffer->setStudentId($row["studentId"]);
        $jobOffer->setAdminId($row["adminId"]);
        $jobOffer->setDescriptionJobOffer($row["descriptionJobOffer"]);
        $jobOffer->setActive($row["active"]);

        array_push($jobOfferList, $jobOffer);
      }
      return $jobOfferList;
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }

  public function getAllJobOfferbyName()
  {
    try {
      $jobOfferList = array();

      $sql = "SELECT * FROM joboffer " ;

      $this->connection = Connection::GetInstance();
      $toJobOffer = $this->connection->Execute($sql);

      foreach ($toJobOffer as $row) {
        $jobOffer = new JobOffer();
        $jobOffer->setJobOfferId($row["jobOfferId"]);
        $jobOffer->setCompanyId($row["companyId"]);
        $jobOffer->setCompanyName($row["companyName"]);
        $jobOffer->setJobPositionId($row["jobPositionId"]);
        $jobOffer->setStudentId($row["studentId"]);
        $jobOffer->setAdminId($row["adminId"]);
        $jobOffer->setDescriptionJobOffer($row["descriptionJobOffer"]);
        $jobOffer->setActive($row["active"]);

        array_push($jobOfferList, $jobOffer);
      }
      return $jobOfferList;
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }


  public function deleteJobOfferById($jobOfferId)
  {
    try {
      $sql = "DELETE FROM joboffer WHERE jobOfferId = :jobOfferId;";

      $parameters["jobOfferId"] = $jobOfferId;

      $this->connection = Connection::GetInstance();
      return $this->connection->ExecuteNonQuery($sql, $parameters);
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }

  public function changeJobOfferActive($jobOfferId)
  {
    try {
      $sql = "UPDATE joboffer SET active = 1 WHERE jobOfferId = :jobOfferId ;";

      $parameters["jobOfferId"] = $jobOfferId;

      $this->connection = Connection::GetInstance();
      return $this->connection->ExecuteNonQuery($sql, $parameters);
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }

  public function changeJobOfferInactive($jobOfferId)
  {
    try {
      $sql = "UPDATE joboffer SET active = 0 WHERE jobOfferId = :jobOfferId ;";

      $parameters["jobOfferId"] = $jobOfferId;

      $this->connection = Connection::GetInstance();
      return $this->connection->ExecuteNonQuery($sql, $parameters);
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }


  public function getJobOffer($jobOfferId)
  {


    try {
      $jobOfferList = array();

      $sql = "SELECT *
      FROM joboffer jo
      INNER JOIN company cp on jo.companyId = cp.companyId
      INNER JOIN jobposition jp on jo.jobPositionId = jp.jobPositionId
      INNER JOIN career cr on jp.careerId = cr.careerId
      WHERE jo.jobOfferId = " . $jobOfferId . ";";

      $this->connection = Connection::GetInstance();
      $resultSet = $this->connection->Execute($sql);

      foreach ($resultSet as $row) {
        $jobOffer = new JobOffer();
        $jobOffer->setJobOfferId($row["jobOfferId"]);
        $jobOffer->setCompanyId($row["companyId"]);
        $jobOffer->setCompanyName($row["companyName"]);
        $jobOffer->setJobPositionId($row["jobPositionId"]);
        $jobOffer->setStudentId($row["studentId"]);
        $jobOffer->setAdminId($row["adminId"]);
        $jobOffer->setDescriptionJobOffer($row["descriptionJobOffer"]);
        $jobOffer->setActive($row["active"]);

        array_push($jobOfferList, $jobOffer);
      }
     
      return $jobOfferList;
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }

  public function getJobOfferByApplication($jobOfferId)
  {
    try {     

      $sql = "SELECT *
      FROM joboffer jo
      INNER JOIN company cp on jo.companyId = cp.companyId
      INNER JOIN jobposition jp on jo.jobPositionId = jp.jobPositionId
      INNER JOIN career cr on jp.careerId = cr.careerId
      WHERE jo.jobOfferId = " . $jobOfferId . ";";

      $this->connection = Connection::GetInstance();
      $resultSet = $this->connection->Execute($sql);

      foreach ($resultSet as $row) {
        $jobOffer = new JobOffer();
        $jobOffer->setJobOfferId($row["jobOfferId"]);
        $jobOffer->setCompanyId($row["companyId"]);
        $jobOffer->setCompanyName($row["companyName"]);
        $jobOffer->setJobPositionId($row["jobPositionId"]);
        $jobOffer->setStudentId($row["studentId"]);
        $jobOffer->setAdminId($row["adminId"]);
        $jobOffer->setDescriptionJobOffer($row["descriptionJobOffer"]);
        $jobOffer->setActive($row["active"]);

     
       
      }
     
      return $jobOffer;
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }


  public function getJobofferById()
  {
    try {
      $jobOfferList = array();

      $sql = "SELECT *
        FROM joboffers jo
        INNER JOIN companies cp on jo.companyId = cp.companyId
        INNER JOIN jobpositions jp on jo.jobPositionId = jp.jobPositionId
        INNER JOIN careers cr on jp.careerId = cr.careerId;";

      $this->connection = Connection::GetInstance();
      $toJobOffer = $this->connection->Execute($sql);

      foreach ($toJobOffer as $row) {
        $jobOffer = new JobOffer();
        $jobOffer->setJobOfferId($row["jobOfferId"]);
        $jobOffer->setCompanyId($row["companyId"]);
        $jobOffer->setCompanyName($row["companyName"]);
        $jobOffer->setJobPositionId($row["jobPositionId"]);
        $jobOffer->setStudentId($row["studentId"]);
        $jobOffer->setAdminId($row["adminId"]);
        $jobOffer->setDescriptionJobOffer($row["descriptionJobOffer"]);
        $jobOffer->setActive($row["active"]);;

        array_push($jobOfferList, $jobOffer);
      }
      return $jobOfferList;
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }


  public function updateJobOffer($jobOfferId, $companyName, $description, $active)
  {
    try {
      $sql = "UPDATE joboffer
              SET companyName = :companyName, 
                  description = :description,
                  active =  :active
              WHERE jobOfferId = :jobOfferId";

      $jobOffer = new JobOffer;
      $parameters["jobOfferId"] = $jobOffer->getJobOfferId();
      $parameters["companyName"] = $jobOffer->getCompanyName();
      $parameters["descriptionJobOffer"] = $jobOffer->getDescriptionJobOffer();
      $parameters["active"] = $jobOffer->getActive();

      $this->connection = Connection::GetInstance();
      return $this->connection->ExecuteNonQuery($sql, $parameters);
      // $this->connection->ExecuteNonQuery($sql,$parameters);

    } catch (\PDOException $ex) {
      throw $ex;
    }
  }

  public function AddStudentApplication(JobOffer $jobOffer, $studentId)
  {
    try {     
      $sql = "INSERT INTO jobapplication ( studentId, jobOfferId, jobPositionId, active)
      VALUES ( :studentId, :jobOfferId, :jobPositionId, :active);";
       

       // var_dump($studentId);

      $parameters["studentId"] = $studentId;
      $parameters["jobOfferId"] = $jobOffer->getJobOfferId();
      $parameters["jobPositionId"] = $jobOffer->getJobPositionId();
      $parameters["active"] = 0;


      $this->connection = Connection::GetInstance();
      return $this->connection->ExecuteNonQuery($sql, $parameters);
    

    } catch (\PDOException $ex) {
      throw $ex;
    }
  }
}
