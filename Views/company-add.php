<?php
require_once "nav-admin.php";
?>
<head>
     <title>New Company</title>
</head>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               
               <form action="<?php echo FRONT_ROOT ?>Company/AddCompany" method="post" class="bg-light p-5">
                  <h2 class="mb-4 p-1 bg-primary text-white">Add Company</h2>
               <div class="col">                         
                          <div class="col-lg-4">
                          <h2 style="color: black">
                                   <?php
                                   if (isset($existCompanyName)) {
                                        echo "company name already exists";
                                   }                                   
                                   ?>
                              </h2>
                              <div class="form-group">
                                   <label for="companyName">Name</label>
                                   <input type="text" name="companyName" value="" class="form-control" Required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="email">Email</label>
                                   <input type="email" name="email" value="" class="form-control" Required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="phoneNumber">PhoneNumber</label>
                                   <input type="text" name="phoneNumber" value="" class="form-control" Required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="address">Address</label>
                                   <input type="text" name="address" value="" class="form-control" Required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="city">City</label>
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
                                   <label for="totalEmployees">TotalEmployees</label>
                                   <input type="text" name="totalEmployees" value="" class="form-control" Required>
                              </div>
                         </div>

                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="companyInfo">Description</label>
                                   <input type="text" name="companyInfo" value="" class="form-control" Required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="active">Active</label>
                                   <input type="text" name="active" value="" class="form-control" Required>
                              </div>
                         </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary ml-auto d-block float-left">Add</button>
                    <a class="float-right" href="<?php echo FRONT_ROOT ?>Company/ShowCompanyListAdminView">Back to Main</a>
               </form>
          </div>
     </section>
</main