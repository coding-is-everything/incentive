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
              <li class="breadcrumb-item active"><a href="<?php echo site_url() ?>Sale/sale_tab"><i class="fas fa-folder">&nbsp;Manage Sales</i></a></li>
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
                <form method="post" action="<?php echo site_url() ?>Sale/add" enctype='multipart/form-data'>
                  <!-- input states -->
                 <div class="form-group">
                  <label>Batch</label>
                  <select id="select_car" class="form-control" style="width: 100%;" name="batchId">
                    <option value="0" selected="selected">--Select Batch--</option>
                    <?php 
                        foreach($batches as $row)
                        {   ?>
                         <option data-price="<?php echo $row->coursePrice?>"  value="<?php echo $row->batchId?>"><?php echo $row->batchName?></option>
                       <?php } ?>
                  </select>
                    <?php echo form_error('batchId','<div style="color:red;">','</div>'); ?>
                </div>
                 <div class="form-group">
                  <label>Sales representatives</label>
                  <select class="form-control select2" style="width: 100%;" name="userId">
                    <option value="0" selected="selected">--Select Sales Representative--</option>
                    <?php 
                        foreach($users as $row)
                        { ?>
                         <option value="<?php echo $row->userId?>"><?php echo $row->userName?></option>
                       <?php } ?>
                  </select>
                  <?php echo form_error('userId','<div style="color:red;">','</div>'); ?>
                </div>
                  <div class="form-group">
                  <label>Student</label>
                  <select  class="form-control select2" style="width: 100%;" name="studentId">
                    <option value="0" selected="selected">--Select Student--</option>
                    <?php 
                        foreach($students as $row)
                        { ?>
                         <option value="<?php echo $row->studentId?>"><?php echo $row->studentName?></option>
                       <?php } ?>
                  </select>
                  <?php echo form_error('studentId','<div style="color:red;">','</div>'); ?>
                </div>
                 <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Course Commited</label>
                      <input type="text" class="form-control price-input" readonly >
                  </div>
                   <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Actual Course Price</label>
                    <input type="text" class="form-control is-valid" name="coursePriceCommited" id="inputSuccess" value="">
                    <?php echo form_error('coursePriceCommited','<div style="color:red;">','</div>'); ?>
                  </div>
                   <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Discount(in %)</label>
                    <input type="text"  class="form-control is-valid" name="courseDiscount"  id="inputSuccess" value="">
                  </div>
              
                     <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Course Price Given</label>
                    <input type="text" class="form-control is-valid" name="couesePriceGiven" id="inputSuccess" placeholder="Enter Given Course Price">
                    <?php echo form_error('couesePriceGiven','<div style="color:red;">','</div>'); ?>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Course Price Remain</label>
                    <input type="text" readonly class="form-control is-valid" name="coursePriceRemain" id="inputSuccess">
                  </div>
                  <div class="col-md-6">
              <div class="form-group">
                  <label>Transaction Date:</label>
                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                        <input type="text" name="transactionDate" class="form-control datetimepicker-input" data-target="#reservationdate2"/>
                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <?php echo form_error('transactionDate','<div style="color:red;">','</div>'); ?>
                </div>
                <div class="form-group">
                  <label>Next Commited Date:</label>
                    <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                        <input type="text" name="nextCommitedDate" class="form-control datetimepicker-input" data-target="#reservationdate3"/>
                        <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <?php echo form_error('nextCommitedDate','<div style="color:red;">','</div>'); ?>
                </div>
                </div>
                   <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Screenshot Upload</label>
                    <input type="file" class="form-control is-valid" name="screenShot" id="inputSuccess" placeholder="Enter the batch name">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Notes</label>
                    <textarea class="form-control is-valid" name="details" id="inputSuccess" placeholder="Enter the Detail"></textarea>
                  </div>
                <!-- radio -->
                    <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary1" name="saleStatus" value="1">
                        <label for="radioPrimary1">Active
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary2" name="saleStatus" value="0">
                        <label for="radioPrimary2">Inactive
                        </label>
                      </div>
                    </div>
                 <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name="saleSubmit" value="Submit">
                  <a href="<?php echo site_url('Sale/sale_tab'); ?>" class="btn btn-secondary">Back</a>
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
  <script type="text/javascript">

$('#select_car').on('change', function() {
  $('.input_price').data('price');
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
