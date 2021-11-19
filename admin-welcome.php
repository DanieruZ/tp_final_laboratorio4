<?php

namespace Views;

use Models\Admin as Admin;
use DAO\AdminDAO as AdminDAO;


$adminRepo = new AdminDAO();
$adminList = $adminRepo->getAllAdmin();




?>

<?php require_once(VIEWS_PATH . "nav-admin.php"); ?>

<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container-fluid">
            <title><?php echo $admin->getFirstName() . " " . $admin->getLastName(); ?></title>

            </head>

            <body>               
                <h1><?php echo $admin->getFirstName() . " " . $admin->getLastName(); ?></h1>
            </body>
            <table class="table bg-light">
                <thead class="bg-primary text-white">
                    <tr>                                            
                        <th>First Name</th>
                        <th>Last Name</th>  
                        <th>DNI</th>  
                        <th>Email</th>                      
                        
                    </tr>     

                </thead>
                <tbody>
                    <tr>                                           
                        <td><?php echo $admin->getFirstName(); ?></td>
                        <td><?php echo $admin->getLastName(); ?></td>                      
                        <td><?php echo $admin->getDni(); ?></td>                      
                        <td><?php echo $admin->getEmail(); ?></td>                     
                    </tr>

                </tbody>
            </table>
        </div>
    </section>
</main>