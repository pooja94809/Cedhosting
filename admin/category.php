<?php
include("header.php"); 
require_once("../Dbcon.php");
require_once("../product.php");
$dbcon=new dbcon();
$category1= new product();
if(isset($_POST['create'])){
  $category= isset($_POST['category'])?$_POST['category']:'';
  echo $category;
  $link= isset($_POST['link'])?$_POST['link']:'';
  echo $link;
  $sql = $category1 -> createcategory($category,$link,$dbcon-> conn);

}
?>
<!-- Main content -->
<div class="main-content">
    <!-- Page content -->
    <div class="container mt--30 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary border-0">
            <div class="card-header bg-transparent pb-5">
             
            <div class="card-body px-lg-5 py-lg-5">
              <form role="form" action="" method="POST">
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="Hosting" type="text"  disabled>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Category" name="category" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="link" name="link" type="text">
                  </div>
                </div>
                <div class="row my-4">
                  <div class="col-12">
                    <div class="custom-control custom-control-alternative custom-checkbox">
                      <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                      <label class="custom-control-label" for="customCheckRegister">
                        <span class="text-muted">I agree with the <a href="#!">Privacy Policy</a></span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4" name="create">Create Category</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="table-responsive">
              <table  id='tableData' class="table align-items-center table-flush cattable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Category Id</th>
                    <th scope="col">Parent Id</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Link</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th id="actionth" scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
</div>