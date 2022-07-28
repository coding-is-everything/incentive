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
                  <select id="selectoption"  class="form-control select2" style="width: 100%;" name="batchId" onchange="show();">
                    <option value="" data-price="">--Select Batch--</option>
                    <?php 
                        foreach($batches as $row)
                        {  if($row->batchId == $_POST['batchId'] ){  ?>
                         <option selected="true" data-price="<?php echo $row->coursePrice?>"  value="<?php echo $row->batchId?>"><?php echo ucfirst($row->batchName)?></option>
                       <?php } else {?><option data-price="<?php echo $row->coursePrice?>"  value="<?php echo $row->batchId?>"><?php echo ucfirst($row->batchName)?></option>
                        <?php }}?>
                  </select>
                </div>
                 <div class="form-group">
                  <label>Sales representatives</label>
                  <select id="selectoption1"  class="form-control select2" style="width: 100%;" name="userId" onchange="show1();">
                    <option value="" data-price="" data-price1="">--Select Sales Representative--</option>
                    <?php 
                        foreach($users as $row)
                        { if($row->userId == $_POST['userId'] ){?>
                         <option selected="true" data-price="<?php echo $row->incecntivePer?>" data-price1="<?php echo $row->teamLeadPer?>" value="<?php echo $row->userId?>"><?php echo $row->userName?></option>
                       <?php } else {?><option data-price="<?php echo $row->incecntivePer?>" data-price1="<?php echo $row->teamLeadPer?>"  value="<?php echo $row->userId?>"><?php echo $row->userName?></option>
                         <?php }}?>
                  </select>
                  <?php echo form_error('userId','<div style="color:red;">','</div>'); ?>
                </div>
                  <div class="form-group">
                  <label>Student</label>
                  <select class="form-control select2" style="width: 100%;" name="studentId">
                    <option value="">--Select Student--</option>
                    <?php 
                        foreach($students as $row)
                        { if($row->studentId == $_POST['studentId'] ){?>
                         <option selected="true" value="<?php echo $row->studentId?>"><?php echo $row->studentName?>&nbsp;(<?php echo $row->studentMobile?>)</option>
                       <?php } else {?><option value="<?php echo $row->studentId?>"><?php echo $row->studentName?>&nbsp;(<?php echo $row->studentMobile?>)</option>
                        <?php }}?>
                  </select>
                  <?php echo form_error('studentId','<div style="color:red;">','</div>'); ?>
                </div>
                    <a href="javascript:window.open('<?php echo site_url() ?>Student/add', 'Add Student','width=600,height=600,target=popup');">Click Here to Add Student</a>

                 <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Course Commited</label>
                      <input type="text" class="form-control" name="price" id="priceInput" readonly>
                  </div>

                   <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Discount(in amount)</label>
                    <input type="text"  class="form-control is-valid" autocomplete="off"  name="courseDiscount"  id="discount" value="<?php echo !empty($_POST['courseDiscount'])?$_POST['courseDiscount']:''; ?>">
                  </div>
                   <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Actual Course Fees</label>
                    <input type="text" class="form-control is-valid" name="coursePriceCommited" id="actual" onmouseleave="display();" readonly>
                  </div>              
                <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Course Fees Given</label>
                    <input type="text" class="form-control is-valid" name="couesePriceGiven" id="feegiven" placeholder="Enter Given Course Price" autocomplete="off" value="<?php echo !empty($_POST['couesePriceGiven'])?$_POST['couesePriceGiven']:''; ?>">
                    <?php echo form_error('couesePriceGiven','<div style="color:red;">','</div>'); ?>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Course Fees Remain</label>
                    <input type="text" readonly class="form-control is-valid" name="coursePriceRemain" id="feeremain" onmouseleave="remain();">
                  </div>
                   <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Course Incentive Percentage</label>
                      <input type="text" class="form-control" name="courseIncentivePer" id="priceInput1" readonly>
                  </div>
                    <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Course Incentive</label>
                      <input type="text" class="form-control" name="courseIncentive" id="incentive" onmouseleave="centive();" readonly>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Course Incentive Percentage(Team Lead)</label>
                      <input type="text" class="form-control" name="courseIncentivePerTeam" id="priceInput2" readonly>
                  </div>
                    <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Course Incentive(Team Lead)</label>
                      <input type="text" class="form-control" name="courseIncentiveTeam" id="incentive1" onmouseleave="centive1();" readonly>
                  </div>
                  <div class="col-md-6">
              <div class="form-group">
                  <label>Transaction Date:</label>
                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                        <input type="text" name="transactionDate" class="form-control datetimepicker-input" data-target="#reservationdate2" value="<?php echo !empty($_POST['transactionDate'])?$_POST['transactionDate']:''; ?>" />
                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <?php echo form_error('transactionDate','<div style="color:red;">','</div>'); ?>
                </div>

                <div class="form-group">
                  <label>Next Commited Date:</label>
                    <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                        <input type="text" name="nextCommitedDate" class="form-control datetimepicker-input" data-target="#reservationdate3" value="<?php echo !empty($_POST['nextCommitedDate'])?$_POST['nextCommitedDate']:''; ?>" />
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
<script>
  let show = () => {
    let element = document.getElementById("selectoption");
    let price = element.options[element.selectedIndex].getAttribute("data-price");
    //alert("Price: " + price);
    $('#priceInput').val(price);

  }
</script>
<script>
  let show1 = () => {
    let element = document.getElementById("selectoption1");
    let percent = element.options[element.selectedIndex].getAttribute("data-price");
    let team = element.options[element.selectedIndex].getAttribute("data-price1");
    //alert("Price: " + price);
    $('#priceInput1').val(percent);
    $('#priceInput2').val(team);

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
    var prec =document.getElementById("priceInput1").value;
    //alert(feeg);
    //var incen = 0.1;
    var incentive = feeg * prec;
    //alert(incentive);
   $('#incentive').val(incentive);
    //alert(actual);
  }
</script>
<script>
  function centive1(){
    var feeg =document.getElementById("feegiven").value;
    var prec1 =document.getElementById("priceInput2").value;
    //alert(feeg);
    //var incen = 0.1;
    var incentive1 = feeg * prec1;
    //alert(incentive);
   $('#incentive1').val(incentive1);
    //alert(actual);
  }
</script>
