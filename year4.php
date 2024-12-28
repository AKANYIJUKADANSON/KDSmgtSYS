<?php

    include('inc/config.php');
    $student_query = "SELECT * FROM students where class = 'year4' ";
    $student_query_run = mysqli_query($conn, $student_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Year 4 - KDIS MGT SYSTEM</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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

    <?php include('inc/header.php'); ?>
    <?php include('inc/sidebar.php'); ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Student List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Year 4</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        

            <table border="1" class="table datatable table-bordered table-stripped">
                <!-- <tr> -->
                    <!-- <td> -->
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Student Name</th>
                          <th>Gender</th>
                          <th>Class</th>
                        </tr>
                      </thead>
                      <tbody>
                    
                    <?php $count = 0; while($student = mysqli_fetch_array($student_query_run)){ $count++; ?>
                      <tr>
                        <td class="text-center"><b><?=$count?></b></td>
                        <td>
                          <img src="assets/img/<?php echo 'placeholder.jpg' //$student['image'];?>" alt="Profile" class="rounded-circle me-4" style="height: 50px; width: 50px">
                          
                          <span><?=ucfirst($student['first_name']);?> <?=ucfirst($student['other_name']);?> <?=ucfirst($student['last_name']);?></span>
                        </td>
                        <td>
                          <span class="fs-6 mt-4"><?= ucfirst($student['gender']);?></span>
                        </td>
                        <td>
                          <span class="fs-6 mt-4"><?= ucfirst($student['class']);?></span>
                        </td>

                        <!-- Action Section -->
                         <td>
                          <a href="dets.php?id=<?=$student['id'];?>"><i class="bi bi-eye-fill text-danger fs-4"></i></a>
                         </td>
                    </tr>
                    <?php } ?>
                    <!-- </td> -->
                <!-- </tr> -->
            </table>

      </div>
    </section>

  </main><!-- End #main -->

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