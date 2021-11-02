<?php

namespace DAO;

use Models\Career as Career;

interface ICareerDAO {

  function addCareer(Career $career);
  function getAllCareer();
}

?> 
