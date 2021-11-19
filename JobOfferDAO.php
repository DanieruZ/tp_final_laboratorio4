<?php

namespace DAO;

use DAO\IJobOfferDAO as IJobOfferDAO;
use DAO\CompanyDAO as CompanyDAO;
use Models\JobOffer as JobOffer;
use Models\Student as Student;
use DAO\Connection as Connection;

class JobOfferDAO implements IJobOfferDAO
{

  private $jobOfferList = array();
  private $connection;



  public function addJobOffer(JobOffer $jobOffer)
  {

    try {
      $sql = "INSERT INTO  joboffer ( company_id, jobPosition_id,companyName, jobOffer_description, limit_date, active, student_id) 
              VALUES (  :company_id, :jobPosition_id, :companyName,  :jobOffer_description, :limit_date, :active, :student_id);";

      $parameters["company_id"] = $jobOffer->getCompany_id();
      $parameters["jobPosition_id"] = $jobOffer->getJobPosition_id();
      $parameters["companyName"] = $jobOffer->getCompanyName();
      $parameters["jobOffer_description"] = $jobOffer->getJobOffer_description();
      $parameters["limit_date"] = $jobOffer->getLimit_date();
      $parameters["active"] = $jobOffer->getActive();
      $parameters["student_id"] = $jobOffer->getStudent_id();

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
      $id = ($jobOffer->getId_jobOffer() > $id) ? $jobOffer->getId_jobOffer() : $id;
    }
    return $id + 1;
  }


  public function getAllJobOffer()
  {
    try {
      $jobOfferList = array();

      $sql = "SELECT * FROM joboffer";

      $this->connection = Connection::GetInstance();
      $toJobOffer = $this->connection->Execute($sql);

      foreach ($toJobOffer as $row) {
        $jobOffer = new JobOffer();
        $jobOffer->setId_jobOffer($row["id_jobOffer"]);
        $jobOffer->setCompany_id($row["company_id"]);
        $jobOffer->setJobPosition_id($row["jobPosition_id"]);
        $jobOffer->setCompanyName($row["companyName"]);
        $jobOffer->setJobOffer_description($row["jobOffer_description"]);
        $jobOffer->setLimit_date($row["limit_date"]);
        $jobOffer->setActive($row["active"]);
        $jobOffer->setStudent_id($row["student_id"]);
        array_push($jobOfferList, $jobOffer);
      }
      return $jobOfferList;
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }


  public function getAllJobOfferbyActive()
  {
    try {
      $jobOfferList = array();

      $sql = "SELECT * FROM joboffer WHERE active = 1;";

      $this->connection = Connection::GetInstance();
      $toJobOffer = $this->connection->Execute($sql);

      foreach ($toJobOffer as $row) {
        $jobOffer = new JobOffer();
        $jobOffer->setId_jobOffer($row["id_jobOffer"]);
        $jobOffer->setCompany_id($row["company_id"]);
        $jobOffer->setJobPosition_id($row["jobPosition_id"]);
        $jobOffer->setCompanyName($row["companyName"]);
        $jobOffer->setJobOffer_description($row["jobOffer_description"]);
        $jobOffer->setLimit_date($row["limit_date"]);
        $jobOffer->setActive($row["active"]);
        $jobOffer->setStudent_id($row["student_id"]);

        array_push($jobOfferList, $jobOffer);
      }
      return $jobOfferList;
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }


  public function getAllJobOfferbyStudentId($studentId)
  {
    try {
      $jobOfferList = array();

      $sql = "SELECT * FROM joboffer WHERE student_id = :studentId;";

      $this->connection = Connection::GetInstance();
      $toJobOffer = $this->connection->Execute($sql);

      foreach ($toJobOffer as $row) {
        $jobOffer = new JobOffer();
        $jobOffer->setId_jobOffer($row["id_jobOffer"]);
        $jobOffer->setCompany_id($row["company_id"]);
        $jobOffer->setJobPosition_id($row["jobPosition_id"]);
        $jobOffer->setJobOffer_description($row["jobOffer_description"]);
        $jobOffer->setLimit_date($row["limit_date"]);
        $jobOffer->setActive($row["active"]);
        $jobOffer->setStudent_id($row["student_id"]);


        array_push($jobOfferList, $jobOffer);
      }
      return $jobOfferList;
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }


  public function deleteJobOfferById($id_jobOffer)
  {
    try {
      $sql = "DELETE FROM joboffer WHERE id_jobOffer = :id_jobOffer;";

      $parameters["id_jobOffer"] = $id_jobOffer;

      $this->connection = Connection::GetInstance();
      return $this->connection->ExecuteNonQuery($sql, $parameters);
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }


  public function cancellJobOfferById($id_jobOffer)
  {
    try {
      $sql = "UPDATE joboffer SET student_id = 0 WHERE id_jobOffer = :id_jobOffer ;";

      $parameters["id_jobOffer"] = $id_jobOffer;

      $this->connection = Connection::GetInstance();
      return $this->connection->ExecuteNonQuery($sql, $parameters);
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }

  public function changeJobOfferActive($id_jobOffer)
  {
    try {
      $sql = "UPDATE joboffer SET active = 1 WHERE id_jobOffer = :id_jobOffer ;";

      $parameters["id_jobOffer"] = $id_jobOffer;

      $this->connection = Connection::GetInstance();
      return $this->connection->ExecuteNonQuery($sql, $parameters);
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }

  public function changeJobOfferInactive($id_jobOffer)
  {
    try {
      $sql = "UPDATE joboffer SET active = 0 WHERE id_jobOffer = :id_jobOffer ;";

      $parameters["id_jobOffer"] = $id_jobOffer;

      $this->connection = Connection::GetInstance();
      return $this->connection->ExecuteNonQuery($sql, $parameters);
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }


 

  public function getJobOfferByApplication($id_jobOffer)
  {

    
    try {

      $sql = "SELECT * FROM joboffer 
      WHERE id_jobOffer =  $id_jobOffer ;";

      $this->connection = Connection::GetInstance();
      $resultSet = $this->connection->Execute($sql);

      foreach ($resultSet as $row) {
        $jobOffer = new JobOffer();
        $jobOffer->setId_jobOffer($id_jobOffer);
        $jobOffer->setCompany_id($row["company_id"]);
        $jobOffer->setJobPosition_id($row["jobPosition_id"]);
        $jobOffer->setCompanyName($row["companyName"]);
        $jobOffer->setJobOffer_description($row["jobOffer_description"]);
        $jobOffer->setLimit_date($row["limit_date"]);
        $jobOffer->setActive(0);
        $jobOffer->setStudent_id($row["student_id"]);
      }
      
      return $jobOffer;
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }

  public function getJobofferById($id_jobOffer)
  {
    try {
  
      $sql = "SELECT *
      FROM joboffer jo
      INNER JOIN company cp on jo.company_id = cp.companyId
      INNER JOIN jobposition jp on jo.jobPosition_id = jp.id_jobPosition
      INNER JOIN career cr on jp.career_id = cr.id_career
      WHERE jo.id_jobOffer = " . $id_jobOffer . ";";

      $this->connection = Connection::GetInstance();
      $resultSet = $this->connection->Execute($sql);

      foreach ($resultSet as $row) {
        $jobOffer = new JobOffer();
        $jobOffer->setId_jobOffer($row["id_jobOffer"]);
        $jobOffer->setCompany_id($row["company_id"]);
        $jobOffer->setJobPosition_id($row["jobPosition_id"]);
        $jobOffer->setCompanyName($row["companyName"]);
        $jobOffer->setJobOffer_description($row["jobOffer_description"]);
        $jobOffer->setLimit_date($row["limit_date"]);
        $jobOffer->setActive($row["active"]);
        $jobOffer->setStudent_id($row["student_id"]);
       
      }
      return $jobOffer;
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }


 


  public function updateJobOffer(JobOffer $jobOffer)
  {
    try {

      $query = "UPDATE  joboffer SET company_id=:company_id, jobPosition_id=:jobPosition_id,companyName=:companyName,
              jobOffer_description=:jobOffer_description, limit_date=:limit_date, active=:active, student_id=:student_id
              WHERE id_jobOffer = :id_jobOffer;";

            

      $parameters["id_jobOffer"] = $jobOffer->getId_jobOffer();
      $parameters["company_id"] = $jobOffer->getCompany_id();
      $parameters["jobPosition_id"] = $jobOffer->getJobPosition_id();
      $parameters["companyName"] = $jobOffer->getCompanyName();
      $parameters["jobOffer_description"] = $jobOffer->getJobOffer_description();
      $parameters["limit_date"] = $jobOffer->getLimit_date();
      $parameters["active"] = $jobOffer->getActive();
      $parameters["student_id"] = $jobOffer->getStudent_id();


      $this->connection = Connection::GetInstance();
      return $this->connection->ExecuteNonQuery($query, $parameters);

    } catch (\PDOException $ex) {
      throw $ex;
    }
  }

  public function AddStudentApplication($studentId, $jobOfferId)
  {

    try {
      $sql = "INSERT INTO studentxjoboffer ( id_student, id_jobOffer)
      VALUES ( :id_student, :id_jobOffer);";

     
      $parameters["id_student"] = $studentId;
      $parameters["id_jobOffer"] = $jobOfferId;

      $this->connection = Connection::GetInstance();
      return $this->connection->ExecuteNonQuery($sql, $parameters);
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }

  public function AddStudentApplicationx2(JobOffer $jobOffer,$jobOfferId,$studentId)
  {
   
    
    try {

      $sql = "UPDATE  joboffer SET company_id=:company_id, jobPosition_id=:jobPosition_id, companyName=:companyName,
      jobOffer_description=:jobOffer_description, limit_date=:limit_date, active=:active, student_id=:student_id
      WHERE id_jobOffer = $jobOfferId;";

     
      $parameters["company_id"] = $jobOffer->getCompany_id();
      $parameters["jobPosition_id"] = $jobOffer->getJobPosition_id();
      $parameters["companyName"] = $jobOffer->getCompanyName();
      $parameters["jobOffer_description"] = $jobOffer->getJobOffer_description();
      $parameters["limit_date"] = $jobOffer->getLimit_date();
      $parameters["active"] = $jobOffer->getActive();
      $parameters["student_id"] =  $studentId;;

      $this->connection = Connection::GetInstance();

      return $this->connection->ExecuteNonQuery($sql, $parameters);
    } catch (\PDOException $ex) {
      throw $ex;
    }
  }
}
