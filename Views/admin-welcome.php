<?php

namespace Views;

use Models\Admin as Admin;
use DAO\AdminDAO as AdminDAO;

/**
 * ! esto no funca
 * * aca datos del estudiante & estado academico 
 * * el model AcademicStatus se tiene que crear en Models
 */

$adminRepo = new AdminDAO();

$adminList = $adminRepo->getAllAdmin();
//$email = "wlorant1@sbwire.com";

//$admin = $adminRepo->getAdminByEmail($email);

?>

<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container-fluid">
            <title><?php echo $admin->getFirstName() . " " . $admin->getLastName(); ?></title>

            </head>

            <body>               
                <h1><?php echo $admin->getFirstName() . " " . $admin->getLastName(); ?></h1>
            </body>
            <table class="table bg-light">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>Admin ID</th>                       
                        <th>First Name</th>
                        <th>Last Name</th>  
                        <th>Email</th>                       
                        <th>Active</th>
                    </tr>     

                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $admin->getAdminId(); ?></td>                       
                        <td><?php echo $admin->getFirstName(); ?></td>
                        <td><?php echo $admin->getLastName(); ?></td>                      
                        <td><?php echo $admin->getEmail(); ?></td>                    
                        <td><?php echo $admin->getActive(); ?></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </section>
</main>