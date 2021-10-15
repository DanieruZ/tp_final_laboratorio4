<?php
require_once "nav-admin.php";
?>
<head>
     <title>New Company</title>
</head>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Add Company</h2>
               <form action="<?php echo FRONT_ROOT ?>Company/AddCompany" method="post" class="bg-light-alpha p-5">
                    <div class="col">                         
                          <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="companyName">companyName</label>
                                   <input type="text" name="companyName" value="" class="form-control" Required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="email">email</label>
                                   <input type="email" name="email" value="" class="form-control" Required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="phoneNumber">phoneNumber</label>
                                   <input type="text" name="phoneNumber" value="" class="form-control" Required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="address">address</label>
                                   <input type="text" name="address" value="" class="form-control" Required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="city">city</label>
                                   <input type="text" name="city" value="" class="form-control" Required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="country">country</label>
                                   <input type="text" name="country" value="" class="form-control" Required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="totalEmployees">totalEmployees</label>
                                   <input type="text" name="totalEmployees" value="" class="form-control" Required>
                              </div>
                         </div>

                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="companyInfo">companyInfo</label>
                                   <input type="text" name="companyInfo" value="" class="form-control" Required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="active">active</label>
                                   <input type="text" name="active" value="" class="form-control" Required>
                              </div>
                         </div>
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Add</button>
                    <a href="<?php echo FRONT_ROOT ?>Admin">Back to Main</a>
               </form>
          </div>
     </section>
</main