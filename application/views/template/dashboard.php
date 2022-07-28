   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Batchwise Pending Payment</h3>
                </div>
              </div>
              <div class="card-body">
                 <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>Batch</th>
                    <th>Fees Remaining</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $sr = 1;
                    foreach($fees as $row){ //print_r($fees);//exit();?>
                  <tr>
                    <td><?php echo $sr++; ?></td>
                    <td><?php echo ucfirst($row->batchName)?></td>
                    <td><?php echo "&#8377;&nbsp;".$row->total;?></td>
                  </tr>
                <?php } ?>
                  </tbody>
                </table>
              </div>
              </div>
            </div>
            <!-- /.card -->
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Incentives</h3>
                <div class="card-tools">

                </div>
              </div>
            <div class="card-body">
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Total Pending Payment</h3>
                  </div>
              </div>
              <div class="card-body">
                        <?php 
                    foreach($totals as $row){?>
                        <h1><?php echo "&#8377;&nbsp;".$row->totalfees;?></h1>
                      <?php } ?>
              </div>
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Commimg Soon</h3>
                <div class="card-tools">
                  
                </div>
              </div>
              <div class="card-body">
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->