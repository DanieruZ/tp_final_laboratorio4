<?php

namespace Models;

class JobOffer
{

    private $id_jobOffer;
    private $company_id;
    private $jobPosition_id;
    private $companyName;
    private $jobOffer_description;
    private $limit_date;
    private $active;
    private $student_id;
  


    public function __construct()
    {
    }



    /**
     * Get the value of id_jobOffer
     */ 
    public function getId_jobOffer()
    {
        return $this->id_jobOffer;
    }

    /**
     * Set the value of id_jobOffer
     *
     * @return  self
     */ 
    public function setId_jobOffer($id_jobOffer)
    {
        $this->id_jobOffer = $id_jobOffer;

        return $this;
    }

    /**
     * Get the value of company_id
     */ 
    public function getCompany_id()
    {
        return $this->company_id;
    }

    /**
     * Set the value of company_id
     *
     * @return  self
     */ 
    public function setCompany_id($company_id)
    {
        $this->company_id = $company_id;

        return $this;
    }

    /**
     * Get the value of jobPosition_id
     */ 
    public function getJobPosition_id()
    {
        return $this->jobPosition_id;
    }

    /**
     * Set the value of jobPosition_id
     *
     * @return  self
     */ 
    public function setJobPosition_id($jobPosition_id)
    {
        $this->jobPosition_id = $jobPosition_id;

        return $this;
    }

    /**
     * Get the value of companyName
     */ 
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * Set the value of companyName
     *
     * @return  self
     */ 
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }
    
    /**
     * Get the value of jobOffer_description
     */ 
    public function getJobOffer_description()
    {
        return $this->jobOffer_description;
    }

    /**
     * Set the value of jobOffer_description
     *
     * @return  self
     */ 
    public function setJobOffer_description($jobOffer_description)
    {
        $this->jobOffer_description = $jobOffer_description;

        return $this;
    }

    /**
     * Get the value of limit_date
     */ 
    public function getLimit_date()
    {
        return $this->limit_date;
    }

    /**
     * Set the value of limit_date
     *
     * @return  self
     */ 
    public function setLimit_date($limit_date)
    {
        $this->limit_date = $limit_date;

        return $this;
    }

    /**
     * Get the value of state
     */ 
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */ 
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get the value of student_id
     */ 
    public function getStudent_id()
    {
        return $this->student_id;
    }

    /**
     * Set the value of student_id
     *
     * @return  self
     */ 
    public function setStudent_id($student_id)
    {
        $this->student_id = $student_id;

        return $this;
    }

    
}
?>
