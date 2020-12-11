<?php 
include("header.php");
?>
  <div class="main-content" id="panel">
    <div class="container-fluid mt--10">
      <div class="row">
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h1 class="mb-0">Create New Product </h1>
                  <h3 class="mb-0">Enter Product Details </h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Select Product Category</label>
                        <input type="text" id="input-username" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Enter Product Name</label>
                        <input type="email" id="input-email" class="form-control" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Page URL</label>
                        <input type="text" id="input-first-name" class="form-control" required>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <div class="card-body">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="form-group">
                       <h1>Product Description</h1>
                        <h3>Enter Product Description Below</h3>
                        <hr class="my-4" />
                      </div>
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Enter Monthly Price</label>
                        <input type="text" id="input-username" class="form-control" placeholder="ex:23" required>
                        <h6>This Would be Monthly Plan</h6>   
                    </div>
                    </div>
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Enter Annual Price</label>
                        <input type="email" id="input-email" class="form-control" placeholder="ex:23" required>
                        <h6>This Would be Annual Plan</h6>  
                    </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">SKU</label>
                        <input type="text" id="input-first-name" class="form-control" required>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <div class="card-body">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="form-group">
                       <h1>Features</h1>
                        <hr class="my-4" />
                      </div>
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Web Space(in GB)</label>
                        <input type="text" id="input-username" class="form-control"required>
                        <h6>Enter 0.5 for 512 MB</h6>   
                    </div>
                    </div>
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Bandwidth (in GB)</label>
                        <input type="email" id="input-email" class="form-control"required>
                        <h6>Enter 0.5 for 512 MB</h6>  
                    </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Free Domain</label>
                        <input type="text" id="input-first-name" class="form-control" required>
                        <h6>Enter 0 if no domain available in this service</h6>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Language/Technology Support</label>
                        <input type="text" id="input-first-name" class="form-control" required>
                        <h6>Seperate by (,) Ex: PHP,MySQL, MongoDB</h6>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Mailbox</label>
                        <input type="text" id="input-first-name" class="form-control" required>
                        <h6>Enter Number of mailbox will be provided, enter 0 if none</h6>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4" name="create">Create Now</button>
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>