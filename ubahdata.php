<?php
    include "koneksi.php";

    $sql=mysqli_query($con,"select * from tbl_data where id='$_GET[kode]'");
    $data=mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Custom fonts for this template-->
    <link href="assets/adminlte/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/adminlte/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php 
        
            include "sidebar.php";

        ?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <!-- Header -->
            <?php
                include "header.php";
            ?>
              
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Ubah Data</h1>
                </div>

                  <div class="row">
                  <div class="card" style="width: 100%">
                  <div class="card-body">
                  <form method="post">
                        <div class="mb-3">
                            <label for="namacafe" class="form-label">Nama Cafe</label>
                            <input type="text" class="form-control" name="namacafe" value="<?php echo $data['nama']?>">
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']?>">
                        </div>

                        <div class="mb-3">
                            <label for="sosmed" class="form-label">Sosmed</label>
                            <input type="text" class="form-control" name="sosmed" value="<?php echo $data['sosmed']?>"> 
                        </div>

                        <div class="mb-3">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="text" class="form-control" name="latitude" value="<?php echo $data['latitude']?>">
                        </div>

                        <div class="mb-3">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="text" class="form-control" name="longitude" value="<?php echo $data['longitude']?>">
                        </div>

                        <button type="submit" class="btn btn-primary" value="simpan" name="proses" >Submit</button>
                        <a href="listdata.php" class="btn btn-danger">Kembali</a>
                    </form>
                    <?php
                    include "koneksi.php";

                    if(isset($_POST['proses'])){
                        mysqli_query($con,"UPDATE tbl_data set
                        nama = '$_POST[namacafe]',
                        alamat = '$_POST[alamat]',
                        sosmed = '$_POST[sosmed]',
                        latitude = '$_POST[latitude]',
                        longitude = '$_POST[longitude]'
                        where id = '$_GET[kode]'");

                        echo "Data baru telah tersimpan";
                        echo "<meta http-equiv=refresh content=1; URL='listdata.php'>";
                    }
                    ?>

                  </div>

                  </div>
                    
                  </div>
                </div>
            </div>
            <!-- End of Main Content -->

           <?php
                include "footer.php";
           ?>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="assets/adminlte/vendor/jquery/jquery.min.js"></script>
    <script src="assets/adminlte/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/adminlte/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="|assets/adminlte/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/adminlte/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/adminlte/js/demo/chart-area-demo.js"></script>
    <script src="assets/adminlte/js/demo/chart-pie-demo.js"></script>

</body>

</html>