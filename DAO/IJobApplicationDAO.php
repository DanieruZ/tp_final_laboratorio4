<?php

namespace DAO;

use Models\JobApplication as JobApplication;

interface IJobApplicationDAO {

  function addJobApplication(JobApplication $jobApplication);
  function getAllJobApplication();
}

?> 
