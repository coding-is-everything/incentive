<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Sale</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo site_url() ?>/Layout/sale"><i class="fas fa-folder">&nbsp;Manage Sales</i></a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- right column -->
          <div class="col-md-12">
            <!-- Form Element sizes -->
                   <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Add Sale</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post">
                  <!-- input states -->
                 <div class="form-group">
                  <label>Batch</label>
                  <select class="form-control select2" style="width: 100%;" name="batchId">
                    <option selected="selected">Select Batch</option>
                    <option>Batch 1</option>
                    <option>Batch2</option>
                    <option>Batch3</option>
                    <option>Batch4</option>
                    <option>Batch5</option>
                    <option>Batch6</option>
                  </select>
                </div>
                 <div class="form-group">
                  <label>Student</label>
                  <select class="form-control select2" style="width: 100%;" name="userId">
                    <option selected="selected">Select Student</option>
                    <option>User 1</option>
                    <option>User2</option>
                    <option>User3</option>
                    <option>User4</option>
                    <option>User5</option>
                    <option>User6</option>
                  </select>
                </div>
                 <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Course Commited</label>
                    <input type="text" class="form-control is-valid" name="coursePriceCommited" id="inputSuccess" placeholder="Enter the batch name">
                  </div>
                     <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Course Price Given</label>
                    <input type="text" class="form-control is-valid" name="couesePriceGiven" id="inputSuccess" placeholder="Enter the batch name">
                  </div>
                     <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Course Price Remain</label>
                    <input type="text" class="form-control is-valid" name="coursePriceRemain" id="inputSuccess" placeholder="Enter the batch name">
                  </div>
                <!-- radio -->
                    <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary1" name="saleStatus" checked>
                        <label for="radioPrimary1">Active
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary2" name="saleStatus">
                        <label for="radioPrimary2">Inactive
                        </label>
                      </div>
                    </div>
                 <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="submit" class="btn btn-primary">Cancel</button>
                </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->