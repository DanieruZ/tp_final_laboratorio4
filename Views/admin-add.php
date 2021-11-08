<main>
	<section>
		<div class="container">
			<form action="<?php echo FRONT_ROOT ?>Admin/AddAdmin" method="post" class="bg-light p-5">
				<h2 class="mb-4 p-1 bg-dark text-white">Add Admin</h2>
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
					<button type="submit" name="" class="btn btn-dark ml-auto d-block float-left">Add</button>
				</div>
			</form>
		</div>
	</section>
</main>
