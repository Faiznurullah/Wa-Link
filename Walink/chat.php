<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon"  a href="img/icon.png" type="image/gif" sizes="12x12">
  <title>Wa-Link</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">WA-LINK</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-bookmark"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item active">
        <a class="nav-link" href="add.php">
          <i class="fas fa-fw fa-phone"></i>
          <span>Add Freind</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item active">
        <a class="nav-link" href="list.php">
          <i class="fas fa-fw fa-list"></i>
          <span>Freind List</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>



        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-8">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Tulis Pesan WhatsApp:</h6>
                </div>
                <?php
                include 'model.php';
                //mengambil data

                $id = $_REQUEST['id'];
                $row = $objek_wa->edit($id);


                ?>
                <!-- Card Body -->
                <div class="card-body">
                  <form name='kirim'  method='post'>



                  <div class="row ml-5 mb-4">

                    <div class="col-md-6 col-sm-12 col-xs-12">
                      <p><b><label>Pesan:</label></b></p>
                      <div class="form-floating">
             <textarea class="form-control" type="text" name='pesan' placeholder="Kirim Pesan..." id="floatingTextarea2" style="height: 100px" required></textarea>
              <input class="form-control" type="hidden" name='nomor' placeholder="Nomor Handphone..." value="<?php echo $row['nomor']; ?>" required>
                     </div>

      <button type="submit" class="btn btn-primary btn-lg btn-block mt-3" name='kirim'>Buat</button>
                    </div>

                  <div class="col-md-2 col-sm-6 col-xs-6 mt-4">


                  </div>

                  <div class="col-md-4 col-sm-6 col-xs-6 mt-4">
     <img class="mt-2" src="img/group.png" alt="Group" width="200px" height="200px">
                  </div>

                  </div>









</form>
<?php

if(isset($_POST['kirim'])){

$data['id'] = $_GET['id'];
$data['nomor'] = $_POST['nomor'];
$data['pesan'] = $_POST['pesan'];

$kirim = $objek_wa->chat($data);

}





?>

                </div>

            </div>


          </div>



      </div>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
