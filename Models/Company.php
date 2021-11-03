<?php

namespace Models;

class Company
{

  private $companyId;
  private $companyName;
  private $email;
  private $phoneNumber;
  private $address;
  private $city;
  private $country;
  private $totalEmployees;
  private $companyInfo;
  private $active;

  public function __construct()
  {
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

  public function getCompanyName()
  {
    return $this->companyName;
  }

  public function setCompanyName($companyName)
  {
    $this->companyName = $companyName;
    return $this;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail($email)
  {
    $this->email = $email;
    return $this;
  }

  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }

  public function setPhoneNumber($phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
    return $this;
  }

  public function getAddress()
  {
    return $this->address;
  }

  public function setAddress($address)
  {
    $this->address = $address;
    return $this;
  }

  public function getCity()
  {
    return $this->city;
  }

  public function setCity($city)
  {
    $this->city = $city;
    return $this;
  }

  public function getCountry()
  {
    return $this->country;
  }

  public function setCountry($country)
  {
    $this->country = $country;
    return $this;
  }

  public function getTotalEmployees()
  {
    return $this->totalEmployees;
  }

  public function setTotalEmployees($totalEmployees)
  {
    $this->totalEmployees = $totalEmployees;
    return $this;
  }

  public function getCompanyInfo()
  {
    return $this->companyInfo;
  }

  public function setCompanyInfo($companyInfo)
  {
    $this->companyInfo = $companyInfo;
    return $this;
  }

  public function getActive()
  {
    return $this->active;
  }

  public function setActive($active)
  {
    $this->active = $active;
    return $this;
  }
}
