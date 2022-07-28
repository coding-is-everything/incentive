<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Batch</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo site_url() ?>Batch/add"><i class="fa fa-plus">&nbsp;Add Batch</i></a></li>
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
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>Batch</th>
                    <th>Total Students Enrolled</th>
                    <th>Total Fee Committed</th>
                    <th>Total Fee Given</th>
                    <th>Total Fee Remaining</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $sr = 1;
                    if(!empty($batches)){ foreach($batches as $row){ ?>
                  <tr>
                    <td><?php echo $sr++; ?></td>
                    <td><?php echo ucfirst($row['batchName']); ?></td>
                    <td><center><?php echo $this->Batch_model->getSalesCount(array('batchId' => $row['batchId']))['count(*)']; ?></center></td>
                    <td><center><?php echo round($this->Batch_model->getFeeDetails(array('batchId' => $row['batchId']))[0]['SUM(coursePriceCommited)'], 2) ?></center></td>
                    <td><center><?php echo round($this->Batch_model->getFeeDetails(array('batchId' => $row['batchId']))[0]['SUM(couesePriceGiven)'], 2) ?></center></td>
                    <td><center><?php echo round($this->Batch_model->getFeeDetails(array('batchId' => $row['batchId']))[0]['SUM(coursePriceRemain)'], 2) ?></center></td>
                    <td><?php  if($row['batchStatus']=='1') echo "Active"; else echo "Inactive"; ?></td>
                    <td><a href="<?php echo site_url('batch/batchStudent/'.$row['batchId']); ?>"><i class="fas fa-award" style="font-size: 20px;"></i></a>
                      <a href="<?php echo site_url('batch/view/'.$row['batchId']); ?>"><i class="fa fa-eye" style="font-size:20px"></i></a>
                      &nbsp;<a href="<?php echo site_url('batch/edit/'.$row['batchId']); ?>"><i class="fa fa-edit" style="font-size:20px"></i></a>&nbsp;
                        <a href="<?php echo site_url('batch/delete/'.$row['batchId']); ?>" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" style="font-size:20px;"></i></a></td>
                  </tr>
                  <?php } }else{ ?>
                <tr><td colspan="7">No batches(s) found...</td></tr>
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