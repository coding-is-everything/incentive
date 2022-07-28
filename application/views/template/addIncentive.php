<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Incentive</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo site_url() ?>Incentive/incentive_tab"><i class="fas fa-folder">&nbsp;Manage Incentive</i></a></li>
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
                <h3 class="card-title">Add Incentive</h3>
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
                <form method="post" action="<?php echo site_url() ?>Incentive/add">
                  <!-- input states -->
           <div class="form-group">
                  <label>Batch</label>
                  <select id="selectoption"  class="form-control select2" style="width: 100%;" name="batchId" onchange="show();">
                    <option value="" data-price="">--Select Batch--</option>
                    <?php 
                        foreach($batches as $row)
                        {   ?>
                         <option data-price="<?php echo $row->coursePrice?>"  value="<?php echo $row->batchId?>"><?php echo ucfirst($row->batchName)?></option>
                       <?php } ?>
                  </select>
                    <?php echo form_error('batchId','<div style="color:red;">','</div>'); ?>
                </div>
                 <div class="form-group">
                  <label>Sales representatives</label>
                  <select class="form-control select2" style="width: 100%;" name="userId">
                    <option value="">--Select Sales Representative--</option>
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
                  <select class="form-control select2" style="width: 100%;" name="studentId">
                    <option value="">--Select Student--</option>
                    <?php 
                        foreach($students as $row)
                        { ?>
                         <option value="<?php echo $row->studentId?>"><?php echo $row->studentName?>&nbsp;(<?php echo $row->studentMobile?>)</option>
                       <?php } ?>
                  </select>
                  <?php echo form_error('studentId','<div style="color:red;">','</div>'); ?>
                </div>
                 <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Course Commited</label>
                      <input type="text" class="form-control" name="courseCommited" id="priceInput" readonly>
                  </div>
                   <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Discount(in amount)</label>
                    <input type="text" autocomplete="off"  class="form-control is-valid" name="courseDiscount"  id="discount">
                  </div>
                   <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Actual Course Fees</label>
                    <input type="text" class="form-control is-valid" name="actualCourseFee" id="actual" onmouseleave="display();" readonly>
                  </div>              
                <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Course Fees Given</label>
                    <input type="text" class="form-control is-valid" autocomplete="off" name="coursePriceGiven" id="feegiven" placeholder="Enter Given Course Price">
                    <?php echo form_error('couesePriceGiven','<div style="color:red;">','</div>'); ?>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Course Fees Remain</label>
                    <input type="text" readonly class="form-control is-valid" name="coursePriceRemain" id="feeremain" onmouseleave="remain();">
                  </div>
                    
                  <div class="col-md-6">
                         <div class="form-group">
                  <label>Transcation Date:</label>
                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                        <input type="text" autocomplete="off" name="transDate" class="form-control datetimepicker-input" data-target="#reservationdate2" value="<?php echo !empty($_POST['transDate'])?$_POST['transDate']:''; ?>" />
                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>    
                <div class="form-group">
                  <label>Next Commited Date:</label>
                    <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                        <input type="text" autocomplete="off" name="nextDate" class="form-control datetimepicker-input" data-target="#reservationdate3" value="<?php echo !empty($_POST['nextDate'])?$_POST['nextDate']:''; ?>" />
                        <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                </div>
                  <div class="form-group">
                  <label>Role Type</label>
                  <select  class="form-control" style="width: 100%;" name="roleType">
                    <option value="">--Select Role Type--</option>
                    <option value="Individual Contributor">Individual Contributor</option>
                     <option value="Team Leader">Team Leader</option>                   
                  </select>
                  <?php echo form_error('roleType','<div style="color:red;">','</div>'); ?>
                </div>
                 <div class="form-group">
                 <select  class="form-control" style="width: 100%;" name="incecntivePer" id="selectoption2">
                    <option value="">--Select Percentage--</option>
                    <option value="0.03">3</option>
                    <option value="0.05">5</option>
                    <option value="0.07">7</option>
                    <option value="0.1">10</option>                  
                  </select>
                  </div>
                   <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Course Incentives</label>
                    <input type="text" readonly class="form-control is-valid" name="courseIncentive" id="incentive" onmouseleave="centive();">
                  </div>
                     <div class="form-group">
                          <input class="customCheckbox2"  type="checkbox" name="checked" id="chkPassport" onclick="ShowHideDiv(this)" value="1">
                          <label for="customCheckbox2">If any teamlead allot</label>
                        </div>

                  <div id="dvPassport" style="display: none">      
                  <div class="form-group">
                  <label>Team Leader</label>
                  <select class="form-control select2" style="width: 100%;" name="teamLeadName">
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
                      <select  class="form-control" style="width: 100%;" name="teamLeadPer" id="selectoption3">
                    <option value="">--Select Percentage--</option>
                    <option value="0.03">3</option>
                    <option value="0.05">5</option>
                    <option value="0.07">7</option>
                    <option value="0.1">10</option>                  
                  </select>
                      <?php //echo form_error('teamLeadPer','<div style="color:red;">','</div>'); ?>
                  </div>
                    <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Team Lead Incentives</label>
                    <input type="text" readonly class="form-control is-valid" name="teamLeadIncentive" id="team" onmouseleave="teamlead();">
                  </div>
                </div>
                 <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name="incentiveSubmit" value="Submit">
                  <a href="<?php echo site_url('Incentive/incentive_tab'); ?>" class="btn btn-secondary">Back</a>
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

<script>
  let show = () => {
    let element = document.getElementById("selectoption");
    let price = element.options[element.selectedIndex].getAttribute("data-price");
    //alert("Price: " + price);
    $('#priceInput').val(price);

  }
</script>
<script>
  function display(){
    var discount =document.getElementById("discount").value;
    //alert(discount)
    var price = document.getElementById("priceInput").value;
    //alert(price);
   var actual = price - discount;
   $('#actual').val(actual);
    //alert(actual);
  }
</script>
<script>
  function remain(){
    var feea =document.getElementById("actual").value;
    //alert(discount)
    var feeg = document.getElementById("feegiven").value;
    //alert(price);
   var feeremain = feea - feeg;
   $('#feeremain').val(feeremain);
    //alert(actual);
  }
</script>
<script>
  function centive(){
    var feeg =document.getElementById("feegiven").value;
    var element2 = document.getElementById("selectoption2");
    var bug = element2.options[element2.selectedIndex].getAttribute("value");
    //alert(feeg);
    var incentive = feeg * bug;
    //alert(incentive);
   $('#incentive').val(incentive);
    //alert(actual);
  }
</script>
<script>
  function teamlead(){
    var feeg =document.getElementById("feegiven").value;
    var element3 = document.getElementById("selectoption3");
    var bug1 = element3.options[element3.selectedIndex].getAttribute("value");
    //alert(feeg);
    //alert(bug1);
    var team = feeg * bug1;
   $('#team').val(team);
    //alert(team);
  }
</script>
