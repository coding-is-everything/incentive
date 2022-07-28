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
                            <?php if (!empty($success_msg)) { ?>
                                <div class="col-xs-12">
                                    <div class="alert alert-success"><?php echo $success_msg; ?></div>
                                </div>
                            <?php } elseif (!empty($error_msg)) { ?>
                                <div class="col-xs-12">
                                    <div class="alert alert-danger"><?php echo $error_msg; ?></div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="card-body">
                            <table border="0" cellspacing="5" cellpadding="5">
                                <tbody>
                                    <tr>
                                        <td>From date:</td>
                                        <td><input type="date" id="min" name="min"></td>
                                        <td>To date:</td>
                                        <td><input type="date" id="max" name="max"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Student Name</th>
                                        <th>Course Fees</th>
                                        <th>Fees Given</th>
                                        <th>Fees Remaining</th>
                                        <th>Next Commited Transaction Date</th>
                                        <th>Sales Repsentative</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sr = 1;
                                    if (!empty($student)) {
                                        foreach ($student as $row) { ?>
                                            <tr>
                                                <td><?php echo $sr++; ?></td>
                                                <td><?php echo ucfirst($this->Batch_model->studentData(array('studentId' => $row['studentId']))['studentName']); ?></td>
                                                <td>
                                                    <center><?php echo round($row['coursePriceCommited'], 2) ?></center>
                                                </td>
                                                <td>
                                                    <center><?php echo round($row['couesePriceGiven'], 2) ?></center>
                                                </td>
                                                <td>
                                                    <center><?php echo round($row['coursePriceRemain'], 2) ?></center>
                                                </td>
                                                <td>
                                                    <center><?php echo date('d-m-Y', strtotime($row['nextCommitedDate'])) ?></center>
                                                </td>
                                                <td><?php foreach ($users as $row3) {
                                                        if ($row3->userId == $row['userId']) { ?>
                                                            <?php echo ucfirst($row3->userName); ?>
                                                    <?php }
                                                    } ?></td>
                                                <td>
                                                    <a href="<?php echo site_url('sale/view/' . $row['saleId']); ?>"><i class="fa fa-eye" style="font-size:20px"></i></a>
                                                    &nbsp;<a href="<?php echo site_url('sale/edit/' . $row['saleId']); ?>"><i class="fa fa-edit" style="font-size:20px"></i></a>&nbsp;
                                                    <a href="<?php echo site_url('sale/delete/' . $row['saleId']); ?>" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" style="font-size:20px;"></i></a>
                                                </td>
                                            </tr>
                                        <?php }
                                    } else { ?>
                                        <tr>
                                            <td colspan="8">No batches(s) found...</td>
                                        </tr>
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