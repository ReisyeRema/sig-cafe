<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIG Cafe & Resto</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="assets/adminlte/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                        <h1 class="h3 mb-0 text-gray-800">Daftar Cafe Pangkalan Kerinci</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="tambahdata.php" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="125%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Cafe</th>
                                            <th>Alamat</th>
                                            <th>Sosmed</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th width="15%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                       include "koneksi.php"; 
                                       $no=1;
                                       $ambildata = mysqli_query($con, "select * from tbl_data");
                                           while($tampil = mysqli_fetch_array($ambildata)){
                                               echo "
                                                   <tr>
                                                       <td>$no</td>
                                                       <td>$tampil[nama]</td>
                                                       <td>$tampil[alamat]</td>
                                                       <td>$tampil[sosmed]</td>
                                                       <td>$tampil[latitude]</td>
                                                       <td>$tampil[longitude]</td>
                                                       <td><a class='btn btn-danger' href='?kode=$tampil[id]'>Hapus</a>
                                                       <a class='btn btn-success' href='ubahdata.php?kode=$tampil[id]'>Ubah</td>
           
                                                   </tr>";
           
                                                   $no++;
                                           }

                                       ?>
                                    </tbody>
                                </table>
                                <?php
                                    if(isset($_GET['kode'])){
                                        
                                        mysqli_query($con, "delete from tbl_data where id='$_GET[kode]'");

                                        echo "Data Telah terhapus";
                                        echo "<meta http-equiv=refresh content=2; URL='tambahdata.php'>";

                                    }
                                ?>
                            </div>
                        </div>
                    </div>

                        
                    </div>

                </div>
                <!-- /.container-fluid -->

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

    <script src="assets/adminlte/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/adminlte/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="assets/adminlte/js/demo/datatables-demo.js"></script>

</body>

</html>