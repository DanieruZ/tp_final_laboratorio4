<?php

namespace DAO;

use Models\JobOffer as JobOffer;

interface IJobOfferDAO {

  function addJobOffer(JobOffer $JobOffer);
  function getAllJobOffer();
}

?> 
