<?php
    include('inc/config.php');
    $student_id = $_GET['id'];
    // Get the student details according to the id provided
    // Get student details from the three tables
    $student_query = " SELECT 
                stud.first_name AS first_name, 
                stud.last_name AS last_name,
                stud.other_name AS other_name,
                stud.image AS image,
                stud.club AS club, 
                stud.gender AS gender,
                stud.class_teacher AS class_teacher,
                c.class_name AS class_name,
                subj.subject_name AS subject_name,
                m.mark AS mark,
                m.academic_period AS academic_period
            FROM
                students stud
            JOIN
                marks m ON m.student_id = stud.student_id
            JOIN
                classes c ON c.class_id = stud.class_id
            JOIN
                subjects subj ON subj.subject_id = m.subject_id
            WHERE 
                stud.student_id = $student_id
    ";

    $student_query_run = mysqli_query($conn, $student_query);
    $student = mysqli_fetch_array($student_query_run);


    // Get student marks
    $marks_query = "SELECT
            stud.student_id AS student_id,
            m.mark AS mark,
            s.subject_name AS subject_name
        FROM
            marks m
        JOIN
            subjects s ON s.subject_id = m.subject_id
        JOIN
            students stud ON stud.student_id = m.student_id
        WHERE
            stud.student_id = $student_id
    ";
    // ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Marks For the table~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    $marks_query_run = mysqli_query($conn, $marks_query);

    // ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Marks for the JS (Charts) ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    /**
     * In this case, the data will be retrieved and then converted into a Json format that javascript can utilize
     */

    //  @@@@@@@@@@@@@@@@@@@@@@@ Get marks into an array @@@@@@@@@@@@@
    $marks_query = $conn->prepare("SELECT marks.mark FROM marks WHERE student_id = $student_id");
    $marks_query->bind_result($marks);
    $marks_query->execute();

    // Loop and add the marks into the marks array
    $marks_array = array();
    while($marks_query->fetch()){
        $marks_array[] = $marks;
    }
    // Convert php array into Json format for JS to use it
    $json_marks_array = json_encode($marks_array);

    //  @@@@@@@@@@@@@@@@@@@@@@@ Get marks into an array @@@@@@@@@@@@@
    $subjects_query = $conn->prepare("SELECT s.subject_name AS subject_name FROM subjects s JOIN marks m ON m.subject_id = s.subject_id WHERE student_id = $student_id");
    $subjects_query->bind_result($subjects);
    $subjects_query->execute();

    // Loop and add all the subjects into the subjects array
    $subjects_array = array();
    while($subjects_query->fetch()){
        $subjects_array[] = $subjects;
    }

    // Convert php array into Json format for JS to use it
    $json_subjects_array = json_encode($subjects_array);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>KDIS MGT SYSTEM</title>
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
      <h1>Student Details</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index">Home</a></li>
          <li class="breadcrumb-item active"><a href="year4">Year 4</a></li>
          <li class="breadcrumb-item">
            <span><?=ucfirst($student['first_name']);?> <?=ucfirst($student['other_name']);?> <?=ucfirst($student['last_name']);?></span>
          </li>
        </ol>
      </nav>
    </div>

    <!-- ~~~~~~~~~~~~~~ CONTENT SECTION ~~~~~~~~~~~~~~~ -->
    <section class="section profile">
      <div class="row">
        <!-- Personal Details & Graphical Performance -->
        <div class="col-lg-4" style="border: 2px solid re;">
            <!-- Personal Details -->
            <div class="mb-4 shadow-lg rounded" style="background-color: white">
                <div class="d-flex align-items-center justify-content-center">
                    <img src="assets/img/user1.jpg" alt="Profile Image" height="100" width="100" class="rounded-circle p-2">
                </div>
                <div style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                    <p class="text-center fs-4 fw-bolder">
                        <span><?=ucfirst($student['first_name']);?> <?=ucfirst($student['other_name']);?> <?=ucfirst($student['last_name']);?></span>
                        <br>
                        <span class="fw-bold text-secondary"><?=ucfirst($student['class_name']);?></span>
                    </p>

                    <div class="ps-4">
                        <label class="fw-bold fs-6">Club:</label> 
                        <span class="fw-bold text-info"><?=ucfirst($student['club']);?></span>
                        <br>
                        <label class="fw-bold fs-6">Class Teacher:</label> 
                        <span class="fw-bold text-info" style=""><?=ucfirst($student['class_teacher']);?></span>
                    </div>
                </div>
            </div>

            <!-- Graphical Performance -->
            <div class="shadow-lg rounded" style="background-color: white; position: relative; border: 2px solid purpl; height:190px;">
                <!-- Bar Chart -->
                <canvas id="barChart" class="p-2" style="heigh: 500px;"></canvas>
                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new Chart(document.querySelector('#barChart'), {
                        type: 'bar',
                        data: {
                          labels: <?=$json_subjects_array;?>,
                          datasets: [{
                            barThickness: 20,
                            minBarLength: 2,
                            
                            data: <?=$json_marks_array;?>,

                            backgroundColor: [
                              'rgba(255, 99, 132, 0.7)',
                              'rgba(255, 159, 64, 0.7)',
                              'rgba(255, 205, 86, 0.7)',
                              'rgba(75, 192, 192, 0.7)',
                              'rgba(54, 162, 235, 0.7)',
                              'rgba(153, 102, 255, 0.7)',
                              'rgba(201, 203, 20, 0.7)'
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
                            borderWidth: 0
                          }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                beginAtZero: true
                            }
                            },
                            // Animation
                            animations: {
                                tension: {
                                    duration: 1200,
                                    easing: 'linear',
                                    from: 1,
                                    to: 0,
                                    loop: true
                                }
                            },
                            plugins: {
                                // Display title
                                title: {
                                    display: true,
                                    text: 'Student Performance',
                                    color: 'red',
                                    font:{
                                        size: 15,
                                        weight: 'bold'
                                    }
                                },
                                // Display legend
                                legend: {
                                    display: false,
                                    labels: {
                                        color: 'rgb(255, 99, 132)'
                                    }
                                }
                            }
                        }
                      });
                    });
                  </script>
            </div>
        </div>

        <!-- Tabular Performance -->
        <div class="col-lg-8  shadow-none" style="border: 2px solid gree;">
            <h4 class="text-center fw-bolder fs-4">Scores</h4>
            <!-- Filter section -->
             
            <div class="d-flex align-item-center justify-content-center" style="border: 2px solid re;">
                <div class="col-lg-12 row">
                    <!-- Filter by academic month -->
                    <div class="col-lg-5 pt-2 pb-2 d-flex align-item-center justify-content-center" style="border: 2px solid gre;">
                        <label class="pe-2 pt-1 fw-bolder">Month</label>
                        <select class="" name="academic_month" id="" style="height: 30px; border: 2px solid grey; border-radius: 5px">
                            <option>None</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                    </div>

                    <!-- Filter by subject -->
                    <div class="col-lg-4 d-flex pt-2 pb-2 align-item-center justify-content-center" style="border: 2px solid blac;">
                            <label class="me-2 pt-1 fw-bolder">Subject</label>
                            <select class="" name="academic_month" id="" style="height: 30px; border: 2px solid grey; border-radius: 5px">
                                <option>------</option>
                                <option value="english">English</option>
                                <option value="ICT">ICT</option>
                                <option value="mathematics">Mathematics</option>
                            </select>
                    </div>

                    <div class="col-lg-3 pt-2 pb-2 d-flex align-item-center justify-content-center" style="border: 2px solid deeppin;">
                        <!-- <a class="btn btn-sm btn-success" href=""><i class="bi bi-filter text-danger fs-5"></i>Filter</a> -->

                        <button type="button" class="btn btn-sm btn-danger"><i class="bi bi-funnel me-1 fw-bolder"></i>Filter</button>
                    </div>
                </div>
            </div>

            <!-- Marks table -->
            <!-- <div class="" > -->
            <div class="table-responsive mt-2 rounded shadow-lg" style="border: 5px solid gre; height: 55vh; background-color: white">
                <table style="overflow: auto;" class="table datatable table-hover">
                    <thead>
                        <tr>
                            <th class="">Subject</th>
                            <th class="text-end"><span class="me-4">Mark (%)</span></th>
                            <!-- <th class="" style="font-size: 13px">Grade</th> -->

                        </tr>
                    </thead>
                    <tbody>

                        <?php while($stud_mark = mysqli_fetch_assoc($marks_query_run)){?>
                            <tr>
                                <td class=""><?= $stud_mark['subject_name'];?></td>
                                <td class="text-end">
                                    <span class="me-4 fw-bolder"><?= $stud_mark['mark'];?></span>
                                </td>
                            </tr>
                        <?php }?>
                        
                    </tbody>
                </table>
            </div>
            <!-- </div> -->
        </div>

      </div>
    </section>

  </main>

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