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
                <p class="card-text"><b>Name:</b> <?php echo $student['studentName']; ?></p>
                <p class="card-text"><b>Email:</b> <?php echo $student['studentEmail']; ?></p>
                <p class="card-text"><b>Mobile:</b> <?php echo $student['studentMobile']; ?></p>
                <p class="card-text"><b>Details:</b> <?php echo $student['studentDetails']; ?></p>
                <p class="card-text"><b>Status:</b> <?php  if($student['studentStatus'] == '1') echo "Active"; else echo "Inactive"; ?></p>
                <a href="<?php echo site_url('Student/student_tab'); ?>" class="btn btn-primary">Back To List</a>
    </div></div>
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