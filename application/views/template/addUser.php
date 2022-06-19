<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo site_url() ?>/Layout/user"><i class="fas fa-folder">&nbsp;Manage User</i></a></li>
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
                <h3 class="card-title">Add User</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post">
                  <!-- input states -->
                 <div class="form-group">
                  <label>Roles</label>
                  <select class="form-control select2" style="width: 100%;" name="roleId">
                    <option selected="selected">Select Roles</option>
                    <option>role 1</option>
                    <option>role2</option>
                    <option>role3</option>
                    </select>
                </div>
                 <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> User Name</label>
                    <input type="text" class="form-control is-valid" name="userName" id="inputSuccess" placeholder="Enter the user name">
                  </div>
                     <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> User Mobile</label>
                    <input type="number" class="form-control is-valid" name="userMobile" id="inputSuccess" placeholder="Enter the mobile no">
                  </div>
                     <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> User Email</label>
                    <input type="email" class="form-control is-valid" name="userEmail" id="inputSuccess" placeholder="Enter the email">
                  </div>
                      <div class="form-group">
                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> User Passwoed</label>
                    <input type="password" class="form-control is-valid" name="userPassword" id="inputSuccess" placeholder="Enter the password">
                  </div>
                <!-- radio -->
                    <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary1" name="userStatus" checked>
                        <label for="radioPrimary1">Active
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary2" name="userStatus">
                        <label for="radioPrimary2">Inactive
                        </label>
                      </div>
                    </div>
                 <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="submit" class="btn btn-primary">Cancel</button>
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