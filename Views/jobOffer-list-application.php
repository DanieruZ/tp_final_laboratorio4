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
            <h2 class="mb-4">JobOffer Application's List</h2>
            <table class="table bg-light">
                <thead class="bg-primary text-white">                    
                    <th>Company Name</th>                    
                    <th>Student Firstame</th>
                    <th>Student Lastname</th>                    
                    <th>Description</th>                  
                    <th>Status</th>
                    <th>Options</th>                   

                </thead>
                <tbody>
                    <?php                  
                   
                        foreach ($jobOfferList as $jobOffer) {
                            foreach ($studentList as $student) {
                                
                                if($jobOffer->getStudent_id() == $student->getStudentId()){
                                    if (($jobOffer->getActive()))
                                    $jobOffer->setActive("Enable");
                               else
                                    $jobOffer->setActive("Disable");
                           
                    ?>
                    <tr>              
                        <td><?php echo $jobOffer->getCompanyName(); ?></td>                      
                        <td><?php echo $student->getFirstName(); ?></td>
                        <td><?php echo $student->getLastName(); ?></td>
                        <td><?php echo $jobOffer->getJobOffer_description(); ?></td>                                                                     
                        <td><?php echo $jobOffer->getActive(); ?></td>                         
                      
                        <td>
                            <button type="submit" name="btnRemove" class="btn btn-outline-danger">
                                <a href="<?php if (isset($jobOffer)) {
                                    echo FRONT_ROOT . "JobOffer/CancellJobOffer/" . $jobOffer->getId_jobOffer();}; ?>">Delete</a>
                            </button>                        
                        
                                                 
                        </td>
                    </tr>
                    <?php
                        }
                    }
                }
            
                        ?>
                </tbody>

            </table>
        </div>

    </section>
</main>