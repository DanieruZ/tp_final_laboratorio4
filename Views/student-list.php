<?php
    require_once('nav.php');
?>
<main class="py-5">
   <section id="listado" class="mb-5">
	   <div class="container">
		   <h2 class="mb-4">STUDENT'S LIST</h2>

		   <table class="table bg-light">
			   <thead class="bg-dark text-white">
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
			   </thead>
			   <tbody>
				  
					   
					   <?php
					  
					   if (isset($studentList)) {
						  
						   foreach ($studentList as $student) {
					   ?>
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
								   <td>
								   <button type="submit" name="btnRemove"  class="btn btn-danger">
                                        <a href= "<?php echo FRONT_ROOT ?>Student/DeleteStudent?$id=<?php echo $student->getStudentId(); ?>">Delete</a>
                                    </button>
								   </td>
							   </tr>
					   <?php
						   }
					   }
					   ?>
				  
			   </tbody>
		   </table>
	   </div>
   </section>
</main>

<?php include('footer.php') ?>