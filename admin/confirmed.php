<?php
  require_once('../customers_view/connection.php');
 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Confirmed Reservation</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="main.php">Hotel Reservation System</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">


      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>
  </form>
    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="main.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Main page</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="charts.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Dashboard</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="main.php">Main page</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="mr-5">Reservation</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="checked_out.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="mr-5">Pending Reservation</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="pending.php">
                  <span class="float-left">View Details</span>

                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="mr-5">Confirmed Reservation</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="confirmed.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="mr-5">Cancelled Reservation</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="cancelled.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Confirmed reservation</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Full name</th>
                      <th>Contact</th>
                      <th>Email</th>
                      <th>No. of Adults</th>
                      <th>No. of Children</th>
                      <th>Check in</th>
                      <th>Check out</th>
                      <th>Plan</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql        = "SELECT * FROM reservation_form1";
                    $stmtselect = $db->prepare($sql);
                    $stmtselect->execute();
                    while ($rowAcc = $stmtselect->fetch(PDO::FETCH_ASSOC)) {
                        if ($rowAcc['status'] == 'Confirmed') {
                        ?>
                        <tr>
                          <td><?php  print($rowAcc['full_name']) ?></td>
                          <td><?php  print($rowAcc['contact']) ?></td>
                          <td><?php  print($rowAcc['email']) ?></td>
                          <td><?php  print($rowAcc['adults']) ?></td>
                          <td><?php  print($rowAcc['children']) ?></td>
                          <td><?php  print($rowAcc['check_in']) ?></td>
                          <td><?php  print($rowAcc['check_out']) ?></td>
                          <td><?php  print($rowAcc['plan']) ?></td>
                          <td><span class="badge badge-success"><?php  print($rowAcc['status']) ?></span></td>
                        </tr>
                          <?php
                          if ($rowAcc['check_in'] == date("Y-m-d") || $rowAcc['check_in'] < date("Y-m-d")) {
                            $rowAcc['status'] = 'Arrival';
                            $status = $rowAcc['status'];
                            $full_name = $rowAcc['full_name'];
                            $sql = "UPDATE reservation_form1 SET status=:status WHERE full_name=:full_name";
                            $stm = $db->prepare($sql);
                            $result = $stm->execute(array(':full_name' => $full_name, ':status' => $status));
                          }
                    }
                  }
                     ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
          </a>

          <!-- Logout Modal-->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="main.php?logout=true">Logout</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Bootstrap core JavaScript-->
          <script src="vendor/jquery/jquery.min.js"></script>
          <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

          <!-- Core plugin JavaScript-->
          <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

          <!-- Page level plugin JavaScript-->
          <script src="vendor/chart.js/Chart.min.js"></script>
          <script src="vendor/datatables/jquery.dataTables.js"></script>
          <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

          <!-- Custom scripts for all pages-->
          <script src="js/sb-admin.min.js"></script>

          <!-- Demo scripts for this page-->
          <script src="js/demo/datatables-demo.js"></script>
          <script src="js/demo/chart-area-demo.js"></script>

          </body>

          </html>
