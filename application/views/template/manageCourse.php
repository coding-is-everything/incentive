<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Course</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo site_url() ?>Layout/courseAdd"><i class="fa fa-plus">&nbsp;Add Course</i></a></li>
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
                    <th>Course</th>
                    <th>Price</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $sr = 1;
                    if(!empty($courses)){ foreach($courses as $row){ ?>
                  <tr>
                    <td><?php echo $sr++; ?></td>
                    <td><?php echo $row['courseName']; ?></td>
                    <td><?php echo $row['coursePrice']; ?></td>
                    <td><a href="<?php echo site_url('course/view/'.$row['courseId']); ?>"><i class="fa fa-eye" style="font-size:20px"></i></a>
                      &nbsp;<a href="<?php echo site_url('course/edit/'.$row['courseId']); ?>"><i class="fa fa-edit" style="font-size:20px"></i></a>&nbsp;
                        <a href="<?php echo site_url('course/delete/'.$row['courseId']); ?>" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" style="font-size:20px;"></i></a></td>
                  </tr>
                  <?php } }else{ ?>
                <tr><td colspan="7">No course(s) found...</td></tr>
                <?php } ?>
                  </tbody>
                </table>
                 <div class="pagination pull-right">
            <?php echo $this->pagination->create_links(); ?>
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