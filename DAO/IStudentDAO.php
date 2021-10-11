<?php

namespace DAO;

use Models\Student as Student;

interface IStudentDAO {

  function addStudent(Student $student);
  function getAllStudent();
}

?> 