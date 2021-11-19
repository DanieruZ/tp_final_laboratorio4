<main class="py-5">
  <section id="listado" class="mb-5">
  <div class="container">
    <main class="d-flex align-items-center justify-content-center height-100">
      <div class="content">
        <header class="text-center">
          
        </header>
        <form action="<?php echo FRONT_ROOT ?>Home/Login" method="POST" class="login-form bg-light p-5 ">
        <h2 class="mb-4 p-1 bg-primary text-white center">Welcome</h2>
        <div class="form-group">
            <label for="email"></label>
            <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter your Email" required>
          </div>
          <button class="btn btn-outline-primary btn-block btn-lg" type="submit">Session Start</button>
        </form>
      </div>
    </main>
  <?php include('footer.php')?>
  </div>
</main>