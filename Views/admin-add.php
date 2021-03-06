<main class="py-5">
	<section id="listado" class="mb-5">
		<div class="container">
			<h2 class="mb-4">Add Admin</h2>
			<form action="<?php echo FRONT_ROOT ?>Admin/AddAdmin" method="post" class="bg-light p-5">
					
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
							<label for="email">Email</label>
							<input type="email" name="email" class="form-control">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="active">Active</label>
							<input type="text" name="active" class="form-control">
						</div>
					</div>
				</div>
				<button type="submit" name="" class="btn btn-dark ml-auto d-block">Add</button>
				
			</form>
		</div>
	</section>
</main>
