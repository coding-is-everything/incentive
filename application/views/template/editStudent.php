<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Student</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo site_url() ?>Student/student_tab"><i class="fas fa-folder">&nbsp;Manage Student</i></a></li>
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
                <h3 class="card-title">Update Student</h3>
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
                <form method="post" action="<?php echo site_url() ?>Student/edit/<?php echo $student['studentId']; ?>">
                  <!-- input states -->
                            <div class="form-group">
                  <label>Enrolled Through</label>
                  <select class="form-control" style="width: 100%;" name="studentEnrolled">
                   <option value="<?php echo !empty($student['studentEnrolled'])?$student['studentEnrolled']:''; ?>"><?php echo !empty($student['studentEnrolled'])?$student['studentEnrolled']:''; ?></option>
                      <option value="Webinar">Webinar</option>
                      <option value="Referral">Referral</option>
                      <option value="Sale Representative">Sale Representative</option>
                  </select>
                  <?php echo form_error('courseId','<div style="color:red;">','</div>'); ?>
                </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Student Name</label>
                    <input  type="text" class="form-control is-valid" name="studentName" id="inputSuccess" placeholder="Enter the Student name" value="<?php echo !empty($student['studentName'])?$student['studentName']:''; ?>">
                    <?php echo form_error('studentName','<div style="color:red;">','</div>'); ?>
                  </div>
                   <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Student Email</label>
                    <input  type="text" class="form-control is-valid" name="studentEmail" id="inputSuccess" placeholder="Enter the student email" value="<?php echo !empty($student['studentEmail'])?$student['studentEmail']:''; ?>">
                    <?php echo form_error('studentEmail','<div style="color:red;">','</div>'); ?>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Student Mobile</label>
                    <input  type="text" class="form-control is-valid" name="studentMobile" id="inputSuccess" placeholder="Enter the student mobile" value="<?php echo !empty($student['studentMobile'])?$student['studentMobile']:''; ?>">
                    <?php echo form_error('studentMobile','<div style="color:red;">','</div>'); ?>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Student Details</label>
                    <textarea class="form-control is-valid" name="studentDetails" id="inputSuccess"><?php echo !empty($student['studentDetails'])?$student['studentDetails']:''; ?></textarea>
                  </div> 
                  
                      <!-- radio -->
                    <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary1" name="studentStatus" value="1"  <?php 
    echo set_value('studentStatus', $student['studentStatus']) == 1 ? "checked" : ""; 
?> >
                        <label for="radioPrimary1">Active
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary2" name="studentStatus" value="0" <?php 
    echo set_value('studentStatus', $student['studentStatus']) == 0 ? "checked" : ""; 
?>>
                        <label for="radioPrimary2">Inactive
                        </label>
                      </div>
                      <?php echo form_error('courseStatus','<div style="color:red;">','</div>'); ?>
                    </div>
                 <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name="studentSubmit" value="Submit">
                  <a href="<?php echo site_url('Student/student_tab'); ?>" class="btn btn-secondary">Back</a>
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