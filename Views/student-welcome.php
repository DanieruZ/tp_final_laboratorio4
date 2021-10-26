<?php

namespace Views;

use Models\Student as Student;
use DAO\StudentDAO as StudentDAO;

$studentRepo = new StudentDAO();
$studentList = $studentRepo->getAllStudent();

?>

<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container-fluid">
            <title><?php echo $student->getFirstName() . " " . $student->getLastName(); ?></title>

            </head>

            <body>               
                <h1><?php echo $student->getFirstName() . " " . $student->getLastName(); ?></h1>
            </body>
            <table class="table bg-light">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>Student ID</th>
                        <th>Career ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>DNI</th>
                        <th>File Number</th>
                        <th>Gender</th>
                        <th>Birthdate</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Active</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $student->getStudentId(); ?></td>
                        <td><?php echo $student->getCareerId(); ?></td>
                        <td><?php echo $student->getFirstName(); ?></td>
                        <td><?php echo $student->getLastName(); ?></td>
                        <td><?php echo $student->getDni(); ?></td>
                        <td><?php echo $student->getFileNumber(); ?></td>
                        <td><?php echo $student->getGender(); ?></td>
                        <td><?php echo $student->getBirthDate(); ?></td>
                        <td><?php echo $student->getEmail(); ?></td>
                        <td><?php echo $student->getPhoneNumber(); ?></td>
                        <td><?php echo $student->getActive(); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</main>

<?php include('footer.php') ?>