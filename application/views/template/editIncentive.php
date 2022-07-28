<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Incentive</h1>
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
                <h3 class="card-title">Update Incentive</h3>
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
                <form method="post" action="<?php echo site_url() ?>Incentive/edit/<?php echo $incentive['incentiveId']; ?>">
                  <!-- input states -->
              <div class="form-group">
                  <label>Batch</label>
                  <select id="selectoption"  class="form-control" style="width: 100%;" name="batchId" onchange="show();">
                     <?php 
                        foreach($batches as $row)
                        { 
                          if($row->batchId == $sale['batchId'] ){?>
                         <option data-price="<?php echo $row->coursePrice?>" selected="true" value="<?php echo $row->batchId?>"><?php echo $row->batchName?></option>
                       <?php }else { ?><option data-price="<?php echo $row->coursePrice?>"  value="<?php echo $row->batchId?>"><?php echo ucfirst($row->batchName)?></option>
                       <?php }}?>
                  </select>
                  <?php echo form_error('batchId','<div style="color:red;">','</div>'); ?>
                </div>
                 <div class="form-group">
                  <label>Sales representatives</label>
                  <select class="form-control" style="width: 100%;" name="userId">
                    <?php 
                        foreach($users as $row)
                        { 
                          if($row->userId == $sale['userId'] ){?>
                         <option selected="true" value="<?php echo $row->userId?>"><?php echo $row->userName?></option>
                       <?php }else { ?><option  value="<?php echo $row->userId?>"><?php echo $row->userName?></option>
                       <?php }}?>
                  </select>
                  <?php echo form_error('userId','<div style="color:red;">','</div>'); ?>
                </div>
                  <div class="form-group">
                  <label>Student</label>
                  <select class="form-control" style="width: 100%;" name="studentId">
                    <?php 
                        foreach($students as $row)
                        { 
                          if($row->studentId == $sale['studentId'] ){?>
                         <option selected="true" value="<?php echo $row->studentId?>"><?php echo $row->studentName?></option>
                       <?php }else { ?><option  value="<?php echo $row->studentId?>"><?php echo $row->studentName?></option>
                       <?php }}?>
                  </select>
                  <?php echo form_error('studentId','<div style="color:red;">','</div>'); ?>
                </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Course Commited</label>
                      <input type="text" class="form-control" name="courseCommited" id="priceInput" readonly value="<?php echo !empty($incentive['courseCommited'])?$incentive['courseCommited']:''; ?>">
                  </div>
                   <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Discount(in %)</label>
                    <input type="text"  class="form-control is-valid" name="courseDiscount"  id="discount" value="<?php echo !empty($incentive['courseDiscount'])?$incentive['courseDiscount']:''; ?>">
                  </div>
                   <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Actual Course Fees</label>
                    <input type="text" class="form-control is-valid" name="actualCourseFee" id="actual" onclick="display();" readonly value="<?php echo !empty($incentive['actualCourseFee'])?$incentive['actualCourseFee']:''; ?>">
                  </div>              
                     <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Course Fees Given</label>
                    <input type="text" class="form-control is-valid" name="coursePriceGiven" id="feegiven" value="<?php echo !empty($incentive['coursePriceGiven'])?$incentive['coursePriceGiven']:''; ?>">
                    <?php echo form_error('couesePriceGiven','<div style="color:red;">','</div>'); ?>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Course Fees Remain</label>
                    <input type="text" class="form-control is-valid" name="coursePriceRemain" id="feeremain" onclick="remain();" readonly value="<?php echo !empty($incentive['coursePriceRemain'])?$incentive['coursePriceRemain']:''; ?>">
                  </div>
                        <div class="col-md-6">
                            <label>Transaction Date:</label>
                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                        <input type="text" name="transDate" class="form-control datetimepicker-input" value="<?php echo !empty($incentive['transDate'])?$incentive['transDate']:''; ?>" data-target="#reservationdate2"/>
                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                  <label>Next Commited Date:</label>
                    <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                        <input type="text" name="nextDate" class="form-control datetimepicker-input" value="<?php echo !empty($incentive['nextDate'])?$incentive['nextDate']:''; ?>" data-target="#reservationdate3"/>
                        <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                  
                </div>
                  <div class="form-group">
                  <label>Role Type</label>
                  <select  class="form-control" style="width: 100%;" name="roleType">
                    <option value="<?php echo !empty($incentive['roleType'])?$incentive['roleType']:''; ?>"><?php echo !empty($incentive['roleType'])?$incentive['roleType']:''; ?></option>
                    <option value="Individual Contributor">Individual Contributor</option>
                     <option value="Team Leader">Team Leader</option>                   
                  </select>
                  <?php //echo form_error('roleType','<div style="color:red;">','</div>'); ?>
                </div>
                 <div class="form-group">
                 <select  class="form-control" style="width: 100%;" name="incecntivePer" id="selectoption2">
                    <option value="<?php echo !empty($incentive['incecntivePer'])?$incentive['incecntivePer']:''; ?>"><?php echo !empty($incentive['incecntivePer'])?$incentive['incecntivePer']:''; ?></option>
                    <option value="0.03">3</option>
                    <option value="0.05">5</option>
                    <option value="0.07">7</option>
                    <option value="0.1">10</option>                  
                  </select>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Course Incentives</label>
                    <input type="text" readonly class="form-control is-valid" name="courseIncentive" id="incentive" onmouseleave="centive();" value="<?php echo !empty($incentive['courseIncentive'])?$incentive['courseIncentive']:''; ?>">
                  </div>
                     <div class="form-group">
                          <input class="customCheckbox2"  type="checkbox" name="checked" id="chkPassport"  value="1" <?php echo ($incentive['checked']=="1")?"checked:'checked'":"";?> checked>
                          <label for="customCheckbox2">If any teamlead allot</label>
                        </div>
                   

                  <div id="dvPassport">      
                  <div class="form-group">
                  <label>Team Leader</label>
                  <select class="form-control select2" style="width: 100%;" name="teamLeadName">
                    <option value="">--Team Leader--</option>
                    <?php 
                        foreach($leads as $row1)
                        { 
                          if($row1->userName == $incentive['teamLeadName'] ){?>
                         <option selected="true" value="<?php echo $row1->userName?>"><?php echo $row1->userName?></option>
                       <?php }else { ?><option  value="<?php echo $row1->userName?>"><?php echo $row1->userName?></option>
                       <?php }}?>
                  </select>
                  <?php //echo form_error('teamLeadName','<div style="color:red;">','</div>'); ?>
                </div>
                   <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i>Team Lead Incentive Percentage</label>
                      <select  class="form-control" style="width: 100%;" name="teamLeadPer" id="selectoption3">
                    <option value="<?php echo !empty($incentive['teamLeadPer'])?$incentive['teamLeadPer']:''; ?>"><?php echo !empty($incentive['teamLeadPer'])?$incentive['teamLeadPer']:''; ?></option>
                    <option value="0.03">3</option>
                    <option value="0.05">5</option>
                    <option value="0.07">7</option>
                    <option value="0.1">10</option>                  
                  </select>
                      <?php //echo form_error('teamLeadPer','<div style="color:red;">','</div>'); ?>
                  </div>
                        <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Team Lead Incentives</label>
                    <input type="text" readonly class="form-control is-valid" name="teamLeadIncentive" id="team" onmouseleave="teamlead();" value="<?php echo !empty($incentive['teamLeadIncentive'])?$incentive['teamLeadIncentive']:''; ?>">
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
