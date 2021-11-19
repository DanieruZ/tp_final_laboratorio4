<?php

namespace Models;

class JobApplication
{

  private $jobApplicationId;
  //private $companyId;
  private $studentId;  
  private $jobOfferId;


  public function __construct()
  {
  }

  public function getJobApplicationId()
  {
    return $this->jobApplicationId;
  }

  public function setJobApplicationId($jobApplicationId)
  {
    $this->jobApplicationId = $jobApplicationId;
    return $this;
  }

  public function getCompanyId()
  {
    return $this->companyId;
  }

  public function setCompanyId($companyId)
  {
    $this->companyId = $companyId;
    return $this;
  }

  public function getStudentId()
  {
    return $this->studentId;
  }

  public function setStudentId($studentId)
  {
    $this->studentId = $studentId;
    return $this;
  }

  public function getJobPositionId()
  {
    return $this->jobPositionId;
  }

  public function setJobPositionId($jobPositionId)
  {
    $this->jobPositionId = $jobPositionId;
    return $this;
  } 

  /**
   * Get the value of jobOfferId
   */ 
  public function getJobOfferId()
  {
    return $this->jobOfferId;
  }

  /**
   * Set the value of jobOfferId
   *
   * @return  self
   */ 
  public function setJobOfferId($jobOfferId)
  {
    $this->jobOfferId = $jobOfferId;

    return $this;
  }
}
