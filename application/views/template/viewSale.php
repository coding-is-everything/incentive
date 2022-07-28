<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?php echo $title; ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
          </ol>
        </div>
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
              <h3 class="card-title"></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="col-md-6">
                <p class="card-text"><b>Batch Name:</b>
                  <?php foreach ($batches as $row1) {
                    if ($row1->batchId == $sale['batchId']) { ?>
                      <?php echo ucfirst($row1->batchName); ?>
                  <?php }
                  } ?></p>
                <p class="card-text"><b>Sale Representative:</b>
                  <?php foreach ($users as $row2) {
                    if ($row2->userId == $sale['userId']) { ?>
                      <?php echo ucfirst($row2->userName); ?>
                  <?php }
                  } ?></p>
                <p class="card-text"><b>Student Name:</b>
                  <?php foreach ($students as $row3) {
                    if ($row3->studentId == $sale['studentId']) { ?>
                      <?php echo ucfirst($row3->studentName); ?>
                  <?php }
                  } ?></p>
                <p class="card-text"><b>Fees:</b> <?php echo $sale['coursePriceCommited']; ?></p>
                <p class="card-text"><b>Amount given:</b> <?php echo $sale['couesePriceGiven']; ?></p>
                <p class="card-text"><b>Amount Remain:</b> <?php echo $sale['coursePriceRemain']; ?></p>
                <p class="card-text"><b>Transaction date:</b> <?php echo $sale['transactionDate']; ?></p>
                <p class="card-text"><b>Commited Date:</b> <?php echo $sale['nextCommitedDate']; ?></p>
                <p class="card-text"><b>Screenshot:</b> <img src="<?php echo base_url() ?>public/admin/screenshot/<?php echo $sale['screenShot']; ?>" style="height: 50px;width: 100px;"></p>
                <p class="card-text"><b>Details:</b> <?php echo $sale['details']; ?></p>
                <p class="card-text"><b>Status:</b> <?php if ($sale['saleStatus'] == '1') echo "Active";
                                                    else echo "Inactive"; ?></p>
                <a href="<?php echo site_url('Sale/sale_tab'); ?>" class="btn btn-primary">Back To List</a>
              </div>
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