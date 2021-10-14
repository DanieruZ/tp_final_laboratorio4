<?php

namespace DAO;

use Models\JobPosition as JobPosition;

interface IJobPositionDAO {

  function addJobPosition(JobPosition $jobPosition);
  function getAllJobPosition();
}

?> 
