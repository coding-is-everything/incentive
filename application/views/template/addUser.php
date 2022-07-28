<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo site_url() ?>User/user_tab"><i class="fas fa-folder">&nbsp;Manage User</i></a></li>
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
                <h3 class="card-title">Add User</h3>
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
                <form method="post" action="<?php echo site_url() ?>User/add">
                  <!-- input states -->
                 <div class="form-group">
                  <label>Roles</label>
                  <select class="form-control" style="width: 100%;" name="roleId">
                    <option value="">--Select Roles--</option>
                      <?php 
                        foreach($roles as $row)
                        { if($row->roleId == $_POST['roleId'] ){?>
                         <option selected="true" value="<?php echo $row->roleId?>"><?php echo $row->roleName?></option>
                       <?php } else {?><option value="<?php echo $row->roleId?>"><?php echo $row->roleName?></option>
                        <?php }}?>
                  </select>
                  <?php echo form_error('roleId','<div style="color:red;">','</div>'); ?>
                </div>
                 <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> User Name</label>
                    <input type="text" autocomplete="off" class="form-control is-valid" name="userName" id="inputSuccess" placeholder="Enter the user name" value="<?php echo !empty($_POST['userName'])?$_POST['userName']:''; ?>">
                     <?php echo form_error('userName','<div style="color:red;">','</div>'); ?>
                  </div>
                     <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> User Mobile</label>
                    <input type="number" autocomplete="off" class="form-control is-valid" name="userMobile" id="inputSuccess" placeholder="Enter the mobile no" value="<?php echo !empty($_POST['userMobile'])?$_POST['userMobile']:''; ?>">
                     <?php echo form_error('userMobile','<div style="color:red;">','</div>'); ?>
                  </div>
                     <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> User Email</label>
                    <input type="email" autocomplete="off" class="form-control is-valid" name="userEmail" id="inputSuccess" placeholder="Enter the email" value="<?php echo !empty($_POST['userEmail'])?$_POST['userEmail']:''; ?>">
                     <?php echo form_error('userEmail','<div style="color:red;">','</div>'); ?>
                  </div>
                      <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> User Password</label>
                    <input type="text" autocomplete="off" class="form-control is-valid" name="userPassword" id="inputSuccess" placeholder="Enter the password">
                     <?php echo form_error('userPassword','<div style="color:red;">','</div>'); ?>
                  </div>
                   <div class="form-group">
                  <label>Role Type</label>
                  <select  class="form-control" style="width: 100%;" name="roleType" id="name">
                    <option value="">--Select Role Type--</option>
                    <option value="Individual Contributor">Individual Contributor</option>
                     <option value="Team Leader">Team Leader</option>                   
                  </select>
                  <?php echo form_error('roleType','<div style="color:red;">','</div>'); ?>
                </div>
                 <div class="form-group">
                   <label>Incentive Percentage</label>
                 <select  class="form-control" style="width: 100%;" name="incecntivePer" id="name1">
                    <option value="">--Select Percentage--</option>
                    <option value="0.03">3</option>
                    <option value="0.05">5</option>
                    <option value="0.07">7</option>
                    <option value="0.1">10</option>                  
                  </select>
                  </div>
                   <div class="form-group">
                          <input class="customCheckbox2"  type="checkbox" name="checked" id="chkPassport" onclick="ShowHideDiv(this)" value="1">
                          <label for="customCheckbox2">If any teamlead allot</label>
                        </div>

                  <div id="dvPassport" style="display: none">      
                  <div class="form-group">
                  <label>Team Leader</label>
                  <select class="form-control select2" style="width: 100%;" name="teamLeadName" id="name2">
                    <option value="">--Select Team Leader--</option>
                    <?php 
                        foreach($leads as $row6)
                        { ?>
                         <option value="<?php echo $row6->userName?>"><?php echo $row6->userName?></option>
                       <?php } ?>
                  </select>
                  <?php //echo form_error('teamLeadName','<div style="color:red;">','</div>'); ?>
                </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i>Team Lead Incentive Percentage</label>
                      <select  class="form-control" style="width: 100%;" name="teamLeadPer">
                    <option value="">--Select Percentage--</option>
                    <option value="0.03">3</option>
                    <option value="0.05">5</option>
                    <option value="0.07">7</option>
                    <option value="0.1">10</option>                  
                  </select>
                      <?php //echo form_error('teamLeadPer','<div style="color:red;">','</div>'); ?>
                  </div>
                  </div>
                <!-- radio -->
                    <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary1" name="userStatus" value="1">
                        <label for="radioPrimary1">Active
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary2" name="userStatus" value="0">
                        <label for="radioPrimary2">Inactive
                        </label>
                      </div>
                       <?php echo form_error('userStatus','<div style="color:red;">','</div>'); ?>
                    </div>
                 <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name="userSubmit" value="Submit">
                  <a href="<?php echo site_url('User/user_tab'); ?>" class="btn btn-secondary">Back</a>
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
    function ShowHideDiv(chkPassport) {
        var dvPassport = document.getElementById("dvPassport");
        dvPassport.style.display = chkPassport.checked ? "block" : "none";
    }
</script>
<script type="text/javascript">
  document.getElementById('name').value = "<?php echo $_POST['roleType'];?>";
  document.getElementById('name1').value = "<?php echo $_POST['incecntivePer'];?>";
  document.getElementById('name2').value = "<?php echo $_POST['teamLeadName'];?>";
</script>