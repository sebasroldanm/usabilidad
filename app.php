<?php
  if (is_null($_GET["id"])) {
    header("Location: index.php");
  }
?>

<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Usabilidad - Gráficas</title>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/Chart.min.js"></script>

  <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-radar.min.js"></script>
  <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
  <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet">
  <!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->

  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

  <style type="text/css">
    #chart-container-barras {
      width: 100%;
      height: auto;
    }
  </style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Complementos
      </div>

      <!-- Nav Item - Charts -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Aplicaciones</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

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

          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Usuario Logeado</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar Sesión
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Gráficas</h1>

          <!-- Content Row -->
          <div class="row">

            <div class="col-xl-12 col-lg-11">

              <!-- Area Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Gráfico de Barras</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area" style="height: 100%;">
                    <div id="chart-container-barras">
                      <canvas id="graficaBarras"></canvas>
                    </div>
                  </div>
                  <hr>
                  <!-- Styling for the area chart can be found in the <code>/js/demo/chart-area-demo.js</code> file. -->
                </div>
              </div>
              
              <!-- Bar Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Gráfica Radar</h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar" style="height: 100%; float:">
                    <div id="chart-container-radar">
                      <div id="graficaRadar" style="width: 500px; height: 400px; margin-left: 25%;"></div>
                      <!-- <canvas id="graficaRadar"></canvas> -->
                    </div>
                  </div>
                  <hr>
                  <!-- Styling for the bar chart can be found in the <code>/js/demo/chart-bar-demo.js</code> file. -->
                </div>
              </div>
              
              <!-- Area Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Gráfico de Aplicaciones</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area" style="height: 100%;">
                    <div id="chart-container-barras">
                      <canvas id="graficaHorizontal"></canvas>
                    </div>
                  </div>
                  <hr>
                  <!-- Styling for the area chart can be found in the <code>/js/demo/chart-area-demo.js</code> file. -->
                </div>
              </div>
            </div>
            
            <!-- Donut Chart -->

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
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
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Script de Grafica Barras -->

  <script>
    $(document).ready(function() {
      showGraphBar();
      showGraphRadar();
      horizontalBar();
    });

    function showGraphBar() {
      {
        $.post("dataGraph.php?id=<?php echo $_GET["id"]; ?>",
          function(data) {
            // console.log(data);
            var name = [];
            var marks = [];

            for (var i in data) {
              name.push(data[i].student_name);
              marks.push(data[i].marks);
            }

            var chartdata = {
              labels: name,
              datasets: [{
                label: 'Cálculo',
                backgroundColor: '#49e2ff',
                borderColor: '#46d5f1',
                hoverBackgroundColor: '#CCCCCC',
                hoverBorderColor: '#666666',
                data: marks
              }]
            };

            var graphTarget = $("#graficaBarras");

            var barGraph = new Chart(graphTarget, {
              type: 'bar',
              data: chartdata
            });
          });
      }
    }

    function showGraphRadar() {
      {
        $.post("dataGraph.php?id=<?php echo $_GET["id"]; ?>",
          function(data) {
            // console.log(data);
            var name = [];
            var marks = [];

            for (var i in data) {
              name.push(data[i].student_name);
              marks.push(data[i].marks);
            }

            var chartdata = {
              labels: name,
              datasets: [{
                label: 'Cálculo',
                backgroundColor: '#49e2ff',
                borderColor: '#46d5f1',
                hoverBackgroundColor: '#CCCCCC',
                hoverBorderColor: '#666666',
                data: marks
              }]
            };

            var graphTarget = $("#graficaRadar");

            var barGraph = new Chart(graphTarget, {
              type: 'radar',
              data: chartdata
            });
          });
      }
    }

    function horizontalBar() {
      {
        $.post("dataBarButtom.php",
          function(data) {
            // console.log(data);
            var name = [];
            var marks = [];

            for (var i in data) {
              name.push(data[i].nombre);
              marks.push(data[i].calculo);
            }

            var chartdata = {
              labels: name,
              datasets: [{
                label: 'Cálculo',
                backgroundColor: '#49e2ff',
                borderColor: '#46d5f1',
                hoverBackgroundColor: '#CCCCCC',
                hoverBorderColor: '#666666',
                data: marks
              }]
            };

            var graphTarget = $("#graficaHorizontal");

            var barGraph = new Chart(graphTarget, {
              type: 'horizontalBar',
              data: chartdata
            });
          });
      }
    }
  </script>

  <script>
    anychart.onDocumentReady(function() {
      // create data set on our data
      $.post("dataRadar.php?id=<?php echo $_GET["id"]; ?>",
        function(data) {
          // console.log(data);
          var dataSet = anychart.data.set(data);

          // map data for the first series, take x from the zero column and value from the first column of data set
          var data1 = dataSet.mapAs({
            x: 0,
            value: 1
          });

          // create radar chart
          var chart = anychart.radar();

          // set chart title text settings
          chart.title(
            'Calculo Usabilidad con Diagráma de Radar'
          );

          // create first series with mapped data
          var series1 = chart.line(data1).name('Shaman');
          series1.markers().enabled(true).type('circle').size(3);

          // chart tooltip format
          chart.tooltip().format('Cálculo: {%Value}');

          // set container id for the chart
          chart.container('graficaRadar');
          chart.draw();
        })
    });
  </script>


  <!-- Fin grafica de barras -->

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="assets/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="assets/js/demo/chart-area-demo.js"></script>
  <script src="assets/js/demo/chart-pie-demo.js"></script>
  <script src="assets/js/demo/chart-bar-demo.js"></script>

</body>

</html>