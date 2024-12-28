<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - KDSMGTSYS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header & Sidebar ======= -->
    <?php include('inc/header.php'); ?>
    <?php include('inc/sidebar.php'); ?>

  <main id="main" class="main" style="border: 2px solid blu;">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <!-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav> -->
    </div>

    <section class="dashboard" style="border: 1px solid re;">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Students Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card ps-4">
                <!-- <div class="card-body"> -->
                  <h5 class="card-title">Male</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people text-danger"></i>
                    </div>
                    <div class="ps-3">
                      <h6>451</h6>
                    </div>
                  </div>
                <!-- </div> -->
              </div>
            </div><!-- End Students Card -->

            <!-- Subjects Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card ps-4">
                <!-- <div class="card-body"> -->
                  <h5 class="card-title">Female</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>520</h6>

                    </div>
                  <!-- </div> -->
                </div>

              </div>
            </div><!-- End male Card -->

            <!-- Performance Card -->
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">General Performance</h5>

                  <!-- Bar Chart -->
                  <canvas id="barChart" style="max-height: 250px;"></canvas>
                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new Chart(document.querySelector('#barChart'), {
                        type: 'bar',
                        data: {
                          labels: ['YR1', 'YR2', 'YR3', 'YR4', 'YR5', 'YR6', 'YR7', 'YR8', 'YR9', 'YR10', 'YR11', 'YR12', 'YR13'],
                          datasets: [{

                            data: [65, 59, 80, 81, 56, 55, 40, 30, 50, 99, 20, 75, 89],
                            backgroundColor: [
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(255, 159, 64, 0.2)',
                              'rgba(255, 205, 86, 0.2)',
                              'rgba(75, 192, 192, 0.2)',
                              'rgba(54, 162, 235, 0.2)',
                              'rgba(153, 102, 255, 0.2)',
                              'rgba(201, 203, 207, 0.2)'
                            ],
                            borderColor: [
                              'rgb(255, 99, 132)',
                              'rgb(255, 159, 64)',
                              'rgb(255, 205, 86)',
                              'rgb(75, 192, 192)',
                              'rgb(54, 162, 235)',
                              'rgb(153, 102, 255)',
                              'rgb(201, 203, 207)'
                            ],
                            borderWidth: 1
                          }]
                        },
                        options: {
                          scales: {
                            y: {
                              beginAtZero: true
                            }
                          }
                        }
                      });
                    });
                  </script>
                  <!-- End Bar CHart -->

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">
          <!-- News & Updates Traffic -->
          <div class="card" style="min-height: 500px;">
            <div class="card-body pb-0">
              <h5 class="card-title">Upcoming Events</h5>

              <div class="news">
                <div class="post-item clearfix">
                  <img src="assets/img/news-1.jpg" alt="">
                  <h4><a href="#">Sports Day</a></h4>
                  <p>Participation in all kinds of sports activities at all levels...</p>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/news-2.jpg" alt="">
                  <h4><a href="#">Clubs exhibition</a></h4>
                  <p>Clubs in the school showcase what they have been learning...</p>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/news-3.jpg" alt="">
                  <h4><a href="#">End of November Test</a></h4>
                  <p>Students seat for the End Of November test set by the respective subject teachers...</p>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/news-1.jpg" alt="">
                  <h4><a href="#">Sports Day</a></h4>
                  <p>Participation in all kinds of sports activities at all levels...</p>
                </div>

              </div>

            </div>
          </div>
          <!-- End News & Updates -->

        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <a href="#" class="bg-danger rounded-circle back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short text-white"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>