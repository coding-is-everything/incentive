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
              <li class="breadcrumb-item active"><a href="<?php echo site_url() ?>Batch/batch_tab"><i class="fas fa-folder">&nbsp;Manage Batch</i></a></li>
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
                          <!-- Display status message -->
    <?php if(!empty($success_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-success"><?php echo $success_msg; ?></div>
    </div>
    <?php }elseif(!empty($error_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
    </div>
    <?php } ?>
              <div class="card-body">
                <form method="post" action="<?php echo site_url() ?>Batch/add">
                  <!-- input states -->
                  <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Batch Name</label>
                    <input type="text" class="form-control is-valid" name="batchName" id="inputSuccess" placeholder="Enter the batch name" autocomplete="off" value="<?php echo !empty($_POST['batchName'])?$_POST['batchName']:''; ?>">
                    <?php echo form_error('batchName','<div style="color:red;">','</div>'); ?>
                  </div>
                 <div class="form-group">
                  <label>Courses</label>
                  <select class="form-control" style="width: 100%;" name="courseId">
                    <option value="">--Select Course--</option>
                      <?php 
                        foreach($groups as $row)
                        { if($row->courseId == $_POST['courseId'] ){?>
                         <option selected="true"  value="<?php echo $row->courseId?>"><?php echo $row->courseName?></option>
                       <?php } else { ?><option  value="<?php echo $row->courseId?>"><?php echo $row->courseName?></option>
                       <?php }}?>?>
                  </select>

                  <?php echo form_error('courseId','<div style="color:red;">','</div>'); ?>
                </div>
                <div class="col-md-6">
                 <div class="form-group">
                  <label>Start Date:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="batchStartDate" class="form-control datetimepicker-input" data-target="#reservationdate" autocomplete="off" value="<?php echo !empty($_POST['batchStartDate'])?$_POST['batchStartDate']:''; ?>" placeholder="Select start date" />
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <?php echo form_error('batchStartDate','<div style="color:red;">','</div>'); ?>
                </div>
                  <div class="form-group">
                  <label>End Date:</label>
                    <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                        <input type="text" name="batchEndDate" class="form-control datetimepicker-input" data-target="#reservationdate" autocomplete="off" value="<?php echo !empty($_POST['batchEndDate'])?$_POST['batchEndDate']:''; ?>" placeholder="Select end date" />
                        <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <?php echo form_error('batchEndDate','<div style="color:red;">','</div>'); ?>
              </div>
                  <!-- radio -->
                    <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary1" name="batchStatus" value="1">
                        <label for="radioPrimary1">Active
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary2" name="batchStatus" value="0">
                        <label for="radioPrimary2">Inactive
                        </label>
                      </div>
                      <?php echo form_error('batchStatus','<div style="color:red;">','</div>'); ?>
                    </div>
                 <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name="batchSubmit" value="Submit">
                  <a href="<?php echo site_url('Batch/batch_tab'); ?>" class="btn btn-secondary">Back</a>
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