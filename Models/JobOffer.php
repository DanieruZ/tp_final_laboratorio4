<?php

namespace Models;

class JobOffer
{

    private $jobOfferId;
    private $companyId;
    private $companyName;
    private $jobPositionId;
    private $studentId;
    private $adminId;
    private $descriptionJobOffer;
    private $active;


    public function __construct()
    {
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

    /**
     * Get the value of companyId
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * Set the value of companyId
     *
     * @return  self
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;

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
     * Get the value of jobPositionId
     */
    public function getJobPositionId()
    {
        return $this->jobPositionId;
    }

    /**
     * Set the value of jobPositionId
     *
     * @return  self
     */
    public function setJobPositionId($jobPositionId)
    {
        $this->jobPositionId = $jobPositionId;

        return $this;
    }

    /**
     * Get the value of studentId
     */
    public function getStudentId()
    {
        return $this->studentId;
    }

    /**
     * Set the value of studentId
     *
     * @return  self
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;

        return $this;
    }

    /**
     * Get the value of adminId
     */
    public function getAdminId()
    {
        return $this->adminId;
    }

    /**
     * Set the value of adminId
     *
     * @return  self
     */
    public function setAdminId($adminId)
    {
        $this->adminId = $adminId;

        return $this;
    }



    /**
     * Get the value of active
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set the value of active
     *
     * @return  self
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }



    /**
     * Get the value of descriptionJobOffer
     */
    public function getDescriptionJobOffer()
    {
        return $this->descriptionJobOffer;
    }

    /**
     * Set the value of descriptionJobOffer
     *
     * @return  self
     */
    public function setDescriptionJobOffer($descriptionJobOffer)
    {
        $this->descriptionJobOffer = $descriptionJobOffer;

        return $this;
    }
}
