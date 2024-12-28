<?php

  include('../admin/config.php');

  // Fetching sponsors
  $query_sponsors = "SELECT * FROM sponsors WHERE status= 'Active'";
  $query_sponsors_run = mysqli_query($conn, $query_sponsors);

  $query_gallery = "SELECT * FROM gallery";
  $query_gallery_run = mysqli_query($conn, $query_gallery);

    // ~~~~~~Executive
    $query_executive = "SELECT * FROM executives WHERE `role` = 'President' ";
    $query_executive_run = mysqli_query($conn, $query_executive);
    $president = mysqli_fetch_array($query_executive_run);

    // ~~~~~~President
    $query_bod = "SELECT * FROM executives WHERE `role` != 'President' ";
    $query_bod_run = mysqli_query($conn, $query_bod);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="description">
  <meta content="" name="keywords">

  <title>Nyaruju House</title>

  <?php include('../inc/header-links.php'); ?>

</head>

<body>

  <!-- ==================Start of Navigation div================== -->
  <?php include('../inc/nav-bars.php'); ?>
  <!-- ==================End of Navigation div================== -->

    <div id="la-container-executive" class="d-flex align-items-center justify-content-center" >
      <h1 class="d-flex justify-content-center text-white text-center px-4 fs-1">Executive Team</h1>
    </div>

  <!-- ======= executive-team ======= -->
  <div>
    <section id="executive-team" class="executive-team" style="background-color: lightgrey; border: 2px solid re">
      <div class="album py-5 bg-light">
        <div class="container">
          <!-- President -->
          <div class="row">
            <div class="col-md-4 m-auto">
              <div class="card pt-4 mx-auto w-auto executive-team-item" style="border: 2px solid orang;">
                <center>
                  <img src="../assets/img/executive-team/<?=$president['image']?>" alt="Profile" class="rounded-circle"
                    width="150" height="150">
                </center>
                <div class="card-body text-center">
                  <h3 class="my-2">
                    <?=$president['last_name']?>
                    <?=$president['first_name']?>
                  </h3>
                  <h4 class="text-secondary my-2">
                    <?=$president['role']?>
                    <?php if($president['role'] == 'Club Rep.'){?>
                    <span class="text-success mx-1 my-1">(
                      <?=$president['team']?>)
                    </span>
                    <?php } ?>
                  </h4>

                  <div class="social-links mt-2">
                    <?php if(!empty($president['link_twitter'])){?>
                    <a href="<?=$president['link_twitter']; ?>" class="twitter"><i class="bi bi-twitter"></i></a>
                    <?php } ?>

                    <?php if(!empty($president['link_facebook'])){?>
                    <a href="<?=$president['link_twitter']; ?>" class="facebook"><i class="bi bi-facebook"></i></a>
                    <?php } ?>

                    <?php if(!empty($president['link_instagram'])){?>
                    <a href="<?=$president['link_instagram']; ?>" class="instagram"><i class="bi bi-instagram"></i></a>
                    <?php } ?>

                    <?php if(!empty($president['link_whatsapp'])){?>
                    <a href="<?=$president['link_whatsapp']; ?>" class="whatsapp"><i
                        class="bi bi-whatsapp text-success"></i></a>
                    <?php } ?>

                    <?php if(!empty($president['link_linkedin'])){?>
                    <a href="<?=$president['link_linkedin']; ?>" class="whatsapp"><i
                        class="bi bi-linkedin text-primary"></i></a>
                    <?php } ?>

                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="row">

            <?php while($bod_members = mysqli_fetch_assoc($query_bod_run)){?>
            <div class="col-md-3 executive-team-item " style="border: 2px solid re">
              <div class="card py-4" style="border: 2px solid gree">
                <center>
                  <img src="../assets/img/executive-team/<?=$bod_members['image']?>" alt="Profile"
                    class="rounded-circle mx-auto" width="140" height="140">
                </center>
                <div class="card-body text-center">
                  <h3 class="my-2">
                    <?=$bod_members['last_name']?>
                    <?=$bod_members['first_name']?>
                  </h3>
                  <h4 class="text-secondary my-2">
                    <?=$bod_members['role']?>
                    <?php if($bod_members['role'] == 'Club Rep.'){?>
                    <span class="text-success mx-1 my-1">(
                      <?=$bod_members['team']?>)
                    </span>
                    <?php } ?>
                  </h4>

                  <div class="social-links mt-2">
                    <?php if(!empty($bod_members['link_twitter'])){?>
                    <a href="<?=$bod_members['link_twitter']; ?>" class="twitter"><i class="bi bi-twitter"></i></a>
                    <?php } ?>

                    <?php if(!empty($bod_members['link_facebook'])){?>
                    <a href="<?=$bod_members['link_twitter']; ?>" class="facebook"><i class="bi bi-facebook"></i></a>
                    <?php } ?>

                    <?php if(!empty($bod_members['link_instagram'])){?>
                    <a href="<?=$bod_members['link_instagram']; ?>" class="instagram"><i
                        class="bi bi-instagram"></i></a>
                    <?php } ?>

                    <?php if(!empty($bod_members['link_whatsapp'])){?>
                    <a href="<?=$bod_members['link_whatsapp']; ?>" class="whatsapp"><i
                        class="bi bi-whatsapp text-success"></i></a>
                    <?php } ?>
                  </div>

                </div>
              </div>
            </div>
            <?php } ?>

          </div>
        </div>
    </section>

  </div>

  <!-- ============== Footer -->
  <?php include('../inc/footer.php'); ?>