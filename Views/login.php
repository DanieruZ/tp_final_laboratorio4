<main class="py-5">
  <section id="listado" class="mb-5">
  <div class="container">
    <main class="d-flex align-items-center justify-content-center height-100">
      <div class="content">
        <header class="text-center">
          <h2>Welcome</h2>
        </header>
        <form action="Login/Login" method="post" class="login-form bg-light p-5 text-white">
          <div class="form-group">
            <label for="email"></label>
            <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter your Email" required>
          </div>
          <button class="btn btn-dark btn-block btn-lg" type="submit">Session Start</button>
        </form>
      </div>
    </main>
  <?php include('footer.php')?>
  </div>
</main>