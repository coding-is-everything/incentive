<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Sale</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo site_url() ?>Sale/add"><i class="fa fa-plus">&nbsp;Add Sale</i></a></li>
            </ol>
          </div>
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
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                <table class="table table-bordered table-striped table-responsive">
                  <center><tr>
                    <td>Committed Sales : <?php echo round($this->Sale_model->getFeeAmount()[0]['SUM(coursePriceCommited)'], 2) ?></td>
                    <td>Received Sales: <?php echo round($this->Sale_model->getFeeAmount()[0]['SUM(couesePriceGiven)'], 2) ?></td>
                    <td>Remaining Sales : <?php echo round($this->Sale_model->getFeeAmount()[0]['SUM(coursePriceRemain)'], 2) ?></td>
                    <td>Total Incentive : <?php echo round($this->Sale_model->getIncentiveAmount()[0]['SUM(courseIncentive)'], 2) + round($this->Sale_model->getIncentiveAmount()[0]['SUM(courseIncentiveTeam)'], 2) ?></td>
                  </tr></center>
                </table>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>Batch</th>
                    <th>Name</th>
                     <th>Email</th>
                     <th>Mobile</th> 
                     <th>Sale representative</th>
                     <th>Transaction Amount</th>
                     <th>Transaction Date</th>                     
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $sr = 1;
                    if(!empty($sales)){ foreach($sales as $row){ ?>
                  <tr>
                    <td><?php echo $sr++; ?></td>
                    <td><?php foreach($batches as $row1)
                        { 
                          if($row1->batchId == $row['batchId'] ){?>
                         <?php echo ucfirst($row1->batchName);?>
                       <?php }} ?>
                      </td>
                      <td><?php foreach($students as $row2)
                        { 
                          if($row2->studentId == $row['studentId'] ){?>
                         <?php echo ucfirst($row2->studentName);?>
                       <?php }} ?></td>
                    <td><?php foreach($students as $row2)
                        { 
                          if($row2->studentId == $row['studentId'] ){?>
                         <?php echo ucfirst($row2->studentEmail);?>
                       <?php }} ?></td>
                       <td><?php foreach($students as $row2)
                        { 
                          if($row2->studentId == $row['studentId'] ){?>
                         <?php echo ucfirst($row2->studentMobile);?>
                       <?php }} ?></td>
                        <td><?php foreach($users as $row3)
                        { 
                          if($row3->userId == $row['userId'] ){?>
                         <?php echo ucfirst($row3->userName);?>
                       <?php }} ?></td>
                       <td><?php echo $row['couesePriceGiven'] ?></td>
                       <td><?php echo $row['transactionDate'];?></td>
                    <td><a href="<?php echo site_url('sale/view/'.$row['saleId']); ?>"><i class="fa fa-eye" style="font-size:20px"></i></a>
                      &nbsp;<a href="<?php echo site_url('sale/edit/'.$row['saleId']); ?>"><i class="fa fa-edit" style="font-size:20px"></i></a>&nbsp;
                        <a href="<?php echo site_url('sale/delete/'.$row['saleId']); ?>" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" style="font-size:20px;"></i></a></td>
                  </tr>
                  <?php } }else{ ?>
                <tr><td colspan="7">No sale(s) found...</td></tr>
                <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->