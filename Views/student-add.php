<?php 
//require_once('nav.php'); 
require_once('nav-admin.php'); 


?>

<main class="py-5">
	<section id="listado" class="mb-5">
		<div class="container">
			<h2 class="mb-4">Add Student</h2>
			<form action="<?php echo FRONT_ROOT ?>Student/ShowAddView" method="post" class="bg-light-alpha p-5">
			<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<label for="studentId">Student ID</label>
							<input type="text" name="studentId" class="form-control">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="careerId">Career ID</label>
							<input type="text" name="careerId" class="form-control">
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
							<label for="phoneNumber">Phone Number</label>
							<input type="number" name="phoneNumber" class="form-control">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="active">Active</label>
							<input type="text" name="active" class="form-control">
						</div>
					</div>
				</div>
				<button type="submit" name="button" class="btn btn-dark ml-auto d-block">Agregar</button>
			</form>
		</div>
	</section>
</main>
