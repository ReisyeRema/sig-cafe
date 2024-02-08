<?php
        include "koneksi.php";
        $no=1;
        $hasil = mysqli_query($con, "SELECT * FROM tbl_data");
        $data = [];
            while ($d = mysqli_fetch_assoc($hasil)) {
                $data[] = $d;
            }
?>

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

    <!-- Custom fonts for this template-->
    <link href="assets/adminlte/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/adminlte/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css
    integrity="sha512-MV7K8+y+gLIBoVD591QIYicR65iaqukzvf/nwasF0nqhPay5w/91JmvM2hMDcnK1OnMGCdVK+iQrJ71zPJQd1w==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        #map{
            height: 80vh;
        }
    </style>    

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
                        <h1 class="h3 mb-0 text-gray-800"><b>Maps Cafe & Resto - Pangkalan Kerinci</b></h1>
                    </div>

                    <div class="row">
                        <div class="id" id="map"></div>
                    </div>

                </div>
            </div>

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

    <script>
        
            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition); 
                }
            }

            function showPosition(position) {
                let lat = position.coords.latitude; 
                let long = position.coords.longitude 

            var map = L.map('map', {
                center: [lat, long],
                zoom: 13
            });

            var myIcon = L.icon({
                    iconUrl: 'icon.png',
                    iconSize: [50, 45],
                    iconAnchor: [22, 94],
                    popupAnchor: [-3, -76],
            })

            L.marker([lat, long]).addTo(map);

            let data = <?php echo json_encode($data); ?>;

            data.map(function (d) {
            L.marker([d.latitude, d.longitude], {
                icon:myIcon
            }).addTo(map).bindPopup(`
            <p> 
            <i class="bi bi-cup-hot-fill"></i> 
                <b>Cafe Pangkalan Kerinci</b>: ${d.nama} </p>
                <p> 
                <i class="fa-sharp fa-solid fa-map-location-dot"></i> 
                <b>Alamat</b>: ${d.alamat} </p>
                <p>
                    <i class="fa-brands fa_facebook"></i> 
                    <b>Sosmed</b>: ${d.sosmed} </p>`);           
            })

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {foo: 'bar', attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(map) }
            getLocation();

        </script>
</body>
</html>