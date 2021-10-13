<?php

namespace DAO;

use Models\Admin as Admin;

interface IAdminDAO {

  function addAdmin(Admin $admin);
  function getAllAdmin();
}

?> 
