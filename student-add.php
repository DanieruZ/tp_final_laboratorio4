<main class="py-5">
	<section id="listado" class="mb-5">
		<div class="container">
			
			<form action="<?php echo FRONT_ROOT ?>Student/AddStudent" method="post" class="bg-light p-5">
			<h2 class="mb-4 p-1 bg-primary text-white">Add Student</h2>
					<div class="col-lg-4">
					<h2 style="color: black">
                                   <?php
                                   if (isset($registedEmail)) {
                                        echo "EMAIL ya esta";
                                   }                                   
                                   ?>
                              </h2>
						<div class="form-group">					
							<label for="careerId">Career</label>												
							<select name="careerId"  required class="form-control form-control-ml">
                                        <option style="color:grey" hidden selected>Carrer</option>
									
                                        <?php
                                       
                                        if (isset($careerList)) {
                                             foreach ($careerList as $career) {
                                                  echo "<option value=" . $career->getCareerId() . ">" . $career->getDescription() . "</option>";
                                             }
                                        }
                                        ?>
                                   </select>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="firstName">First Name</label>
							<input type="text" name="firstName" class="form-control">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="lastName">Last Name</label>
							<input type="text" name="lastName" class="form-control">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="dni">DNI</label>
							<input type="number" name="dni" class="form-control">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="fileNumber">File Number</label>
							<input type="text" name="fileNumber" class="form-control">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="gender">Gender</label>
							<input type="text" name="gender" class="form-control">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="birthDate">Birthdate</label>
							<input type="date" name="birthDate" class="form-control">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" name="email" class="form-control">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="phoneNumber">PhoneNumber</label>
							<input type="number" name="phoneNumber" class="form-control">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="active">Active</label>
							<input type="number" name="active" class="form-control">
						</div>
					</div>
					<button type="submit" name="" class="btn btn-outline-primary ml-auto d-block float-left">Add</button>
				</div>
				
				
			</form>
		</div>
	</section>
</main>
