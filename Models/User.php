<?php
namespace Models;

class User {
    private $userId;
    private $email;   
    private $name;
    private $AdminId;
    private $studentId;
    private $companyId;
    private $userTypeId;


    function __construct()
    {
        
    }


    /**
     * Get the value of userId
     */ 
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */ 
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
   

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

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
     * Get the value of userTypeId
     */ 
    public function getUserTypeId()
    {
        return $this->userTypeId;
    }

    /**
     * Set the value of userTypeId
     *
     * @return  self
     */ 
    public function setUserTypeId($userTypeId)
    {
        $this->userTypeId = $userTypeId;

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
     * Get the value of AdminId
     */ 
    public function getAdminId()
    {
        return $this->AdminId;
    }

    /**
     * Set the value of AdminId
     *
     * @return  self
     */ 
    public function setAdminId($AdminId)
    {
        $this->AdminId = $AdminId;

        return $this;
    }
}