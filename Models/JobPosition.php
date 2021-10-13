<?php

namespace Models;

class JobPosition {

  private $jobPositionId;
  private $companyId;
  private $jobName;
  private $jobInfo;
  private $active;

  public function __construct(
    $jobPositionId,
    $companyId,
    $jobName,
    $jobInfo,
    $active) {
    
    $this->jobPositionId = $jobPositionId;  
    $this->companyId = $companyId;  
    $this->jobName = $jobName;  
    $this->jobInfo = $jobInfo;  
    $this->active = $active;  
  }

  public function getJobPositionId() {
    return $this->jobPositionId;
  }

  public function setJobPositionId($jobPositionId) {
    $this->jobPositionId = $jobPositionId;
    return $this;
  }

  public function getCompanyId() {
    return $this->companyId;
  }

  public function setCompanyId($companyId) {
    $this->companyId = $companyId;
    return $this;
  }

  public function getJobName() {
    return $this->jobName;
  }

  public function setJobName($jobName) {
    $this->jobName = $jobName;
    return $this;
  }

  public function getJobInfo() {
    return $this->jobInfo;
  }

  public function setJobInfo($jobInfo) {
    $this->jobInfo = $jobInfo;
    return $this;
  }

  public function getActive() {
    return $this->active;
  }

  public function setActive($active) {
    $this->active = $active;
    return $this;
  }
}

?>
