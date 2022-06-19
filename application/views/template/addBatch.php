<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Batch</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo site_url() ?>/Layout/batch"><i class="fas fa-folder">&nbsp;Manage Batch</i></a></li>
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
                <h3 class="card-title">Add Batch</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post">
                  <!-- input states -->
                  <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Batch Name</label>
                    <input type="text" class="form-control is-valid" name="batchName" id="inputSuccess" placeholder="Enter the batch name">
                  </div>
                 <div class="form-group">
                  <label>Courses</label>
                  <select class="form-control select2" style="width: 100%;" name="courseId">
                    <option selected="selected">Select Course</option>
                    <option>Course1</option>
                    <option>Course2</option>
                    <option>Course3</option>
                    <option>Course4</option>
                    <option>Course5</option>
                    <option>Course6</option>
                  </select>
                </div>
                <div class="col-md-6">
                 <div class="form-group">
                  <label>Start Date:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="batchStartDate" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                  <div class="form-group">
                  <label>End Date:</label>
                    <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                        <input type="text" name="batchEndDate" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
              </div>
                  <!-- radio -->
                    <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary1" name="batchStatus" checked>
                        <label for="radioPrimary1">Active
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary2" name="batchStatus">
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