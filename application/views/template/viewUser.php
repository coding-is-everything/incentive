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
                <p class="card-text"><b>Name:</b> <?php echo $user['userName']; ?></p>
                <p class="card-text"><b>Email:</b> <?php echo $user['userEmail']; ?></p>
                <p class="card-text"><b>Mobile:</b> <?php echo $user['userMobile']; ?></p>
                <p class="card-text"><b>Status:</b> <?php  if($user['userStatus'] == '1') echo "Active"; else echo "Inactive"; ?></p>
                <a href="<?php echo site_url('User/user_tab'); ?>" class="btn btn-primary">Back To List</a>
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