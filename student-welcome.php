<?php

namespace Views;

use Models\Student as Student;
use DAO\StudentDAO as StudentDAO;

$studentRepo = new StudentDAO();
$studentList = $studentRepo->getAllStudent();

?>

<?php require_once(VIEWS_PATH . "nav-student.php"); ?>

<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container-fluid">
            <title><?php echo $student->getFirstName() . " " . $student->getLastName(); ?></title>

            </head>

            <body>               
                <h1><?php echo $student->getFirstName() . " " . $student->getLastName(); ?></h1>
            </body>
            <table class="table bg-light">
                <thead class="bg-primary text-white">
                    <tr>                       
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>DNI</th>
                        <th>File Number</th>
                        <th>Gender</th>
                        <th>Birthdate</th>
                        <th>Email</th>
                        <th>Phone Number</th>                      
                    </tr>

                </thead>
                <tbody>
                    <tr>                        
                        <td><?php echo $student->getFirstName(); ?></td>
                        <td><?php echo $student->getLastName(); ?></td>
                        <td><?php echo $student->getDni(); ?></td>
                        <td><?php echo $student->getFileNumber(); ?></td>
                        <td><?php echo $student->getGender(); ?></td>
                        <td><?php echo $student->getBirthDate(); ?></td>
                        <td><?php echo $student->getEmail(); ?></td>
                        <td><?php echo $student->getPhoneNumber(); ?></td>
                        
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</main>

<?php include('footer.php') ?>