<!DOCTYPE html>
<html lang="en">

<head>
  <title>Miracle Health</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Icon -->
  <link href="./Assets/pics/miracle-logo.png" type="image/x-icon" rel="icon" />
  <!-- font awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <!-- swiper css link -->
  <link href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" rel="stylesheet" />
  <!-- animate.css link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!-- css link -->
  <link rel="stylesheet" href="./Assets/css/style.css" />
  <style>
    .btn-class {
      padding: 7px 19px;
      border-radius: 2px;
      background-color: #0d6efd !important;
      font-size: 12px;
      width: 100px;
    }

    .custom-swal-font-size {
      font-size: 16px;
    }
  </style>
</head>

<body>
  <!-- sweetalert js -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
  <div id="one-block">
    <!-- header section -->
    <section class="header">
      <div class="flex">
        <a href="index.php" class="logo">Miracle Health</a>
        <div id="menu-btn" class="fas fa-bars"></div>
      </div>
      <nav class="navbar">
        <a href="#home">home</a>
        <a href="#about">about</a>
        <a href="#specialities">doctors</a>
        <a href="#feedback">contact</a>
        <a href="./patientAppointmentForm.php">appointments</a>
        <a href="admin-login.php">admin board</a>
      </nav>
    </section>

    <!-- search doctor -->
    <section class="search-doctor" id="home">
      <div class="box">
        <div class="flex">
          <div class="text">
            <h3>connect with doctors around you</h3>
            <p>book inclinic appointments from the comfort of your home.</p>
          </div>
          <form action="" id="search-form">
            <div class="icon">
              <i class="fas fa-search"></i>
            </div>
            <input type="search" name="" id="search" placeholder="Search for doctor, disease, speciality..." onkeyup="searchInput()" autocomplete="off" />
            <button type="submit">search</button>
          </form>
        </div>
        <ul id="results">
          <li><a href="./Specialists.php?specialist=eye">eye surgeon</a></li>
          <li><a href="./Specialists.php?specialist=heart">heart surgeon</a></li>
          <li><a href="./Specialists.php?specialist=dentist">dentist</a></li>
          <li><a href="./Specialists.php?specialist=neurologist">neurologist</a></li>
          <li><a href="./Specialists.php?specialist=psychiatrist">psychiatrist</a></li>
          <li><a href="./Specialists.php?specialist=nutritionist">nutritionist</a></li>
          <li><a href="./Specialists.php?specialist=gynecologist">gynecologist</a></li>
          <li><a href="./Specialists.php?specialist=ear">ear specialist</a></li>
        </ul>
      </div>
    </section>
  </div>

  <!-- about us -->
  <section id="about" class="about">
    <div class="box">
      <div class="flex">
        <div class="text">
          <h6>OUR MISSION</h6>
          <h3>Your health is our priority.</h3>
          <p>
            Miracle Health is on a mission to make quality healthcare more
            accessible and affordable for 220 Million+ Pakistanis. We believe
            in empowering our users with the most accurate, comprehensive,
            curated information, care and enabling them to make better
            healthcare decisions.
          </p>
        </div>
        <div class="hospital-image">
          <img src="./Assets/pics/hospital-about.jpg" alt="hospital-about" />
        </div>
      </div>
    </div>
  </section>

  <br />
  <br />
  <br />
  <br />

  <!-- top searched specialties section -->
  <section class="specialities" id="specialities">
    <div class="our-team-heading">
      <h3>Top Searched Specialities</h3>
      <br />
      <p>Pick the supreme choice from the cream of the crop.</p>
    </div>
    <br />

    <!-- Swiper -->
    <div class="box">
      <div class="swiper search">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <a href="./Specialists.php?specialist=eye">
              <div class="block">
                <h3>eye surgeon</h3>
                <img src="./Assets/pics/eye.svg" alt="eye" width="50rem" />
              </div>
            </a>
          </div>

          <div class="swiper-slide">
            <a href="./Specialists.php?specialist=heart">
              <div class="block">
                <h3>heart surgeon</h3>
                <img src="./Assets/pics/heart.svg" alt="heart" width="50rem" />
              </div>
            </a>
          </div>

          <div class="swiper-slide">
            <a href="./Specialists.php?specialist=dentist">
              <div class="block">
                <h3>dentist</h3>
                <img src="./Assets/pics/Dentist.svg" alt="Dentist" width="50rem" />
              </div>
            </a>
          </div>

          <div class="swiper-slide">
            <a href="./Specialists.php?specialist=neurologist">
              <div class="block">
                <h3>neurologist</h3>
                <img src="./Assets/pics/brain.svg" alt="brain" width="50rem" />
              </div>
            </a>
          </div>

          <div class="swiper-slide">
            <a href="./Specialists.php?specialist=psychiatrist">
              <div class="block">
                <h3>psychiatrist</h3>
                <img src="./Assets/pics/nerve.svg" alt="nerve" width="50rem" />
              </div>
            </a>
          </div>

          <div class="swiper-slide">
            <a href="./Specialists.php?specialist=nutritionist">
              <div class="block">
                <h3>nutritionist</h3>
                <img src="./Assets/pics/overweight.svg" alt="overweight" width="50rem" />
              </div>
            </a>
          </div>

          <div class="swiper-slide">
            <a href="./Specialists.php?specialist=gynecologist">
              <div class="block">
                <h3>gynecologist</h3>
                <img src="./Assets/pics/female_reproductive_system.svg" alt="female_reproductive_system" width="50rem" />
              </div>
            </a>
          </div>

          <div class="swiper-slide">
            <a href="./Specialists.php?specialist=ear">
              <div class="block">
                <h3>ear specialist</h3>
                <img src="./Assets/pics/ear.svg" alt="kidneys" width="50rem" />
              </div>
            </a>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>

  <!-- feedback section -->
  <section class="feedback" id="feedback">
    <div class="our-team-heading">
      <h3>Feedback</h3>
      <br />
      <p>Your opinion carries tremendous value and significance.</p>
    </div>
    <div class="row">
      <div class="col-6">
        <form action="./index.php" class="form" id="form" method="post">

          <label for="p_id">Patient ID</label>
          <input type="number" name="p_id" id="p_id" placeholder="your id...">

          <textarea name="message" id="message" rows="4" placeholder="type here..."></textarea>

          <div class="form-button">
            <input type="submit" value="Submit" name="submit" />
          </div>
        </form>
      </div>
      <div class="col-6">
        <div class="banner-img">
          <div class="circular-img">
            <div class="circular-img-inner">
              <div class="circular-img-circle"></div>
              <img src="./Assets/pics/banner-img.png" alt="banner img" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- feedback validation -->
  <?php
  include './connection.php';

  if (isset($_POST['submit'])) {

    $p_id    = $_POST['p_id'];
    $message = trim($_POST['message']); // Trim whitespace

    if (empty($p_id)) {
      echo "<script>
      Swal.fire({
        icon: 'error',
        title: 'ID Error',
        text: 'Please enter Patient-ID !',
        width: 600,
        showClass: {
          popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
          popup: 'animate__animated animate__fadeOutUp'
        },
        customClass: {
          confirmButton: 'btn-class',
          buttonsStyling: false,
          heightAuto: false,
          popup: 'custom-swal-font-size',
          title: 'custom-swal-font-size',
          htmlContainer: 'custom-swal-font-size',
          text: 'custom-swal-font-size',
        }
      })
      .then(function() {
          window.location.href = './index.php';
        });
      </script>";
    } else if (empty($message)) {
      echo "<script>
      Swal.fire({
        icon: 'error',
        title: 'Feedback Error',
        text: 'Please enter Feedback !',
        width: 600,
        showClass: {
          popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
          popup: 'animate__animated animate__fadeOutUp'
        },
        customClass: {
          confirmButton: 'btn-class',
          buttonsStyling: false,
          heightAuto: false,
          popup: 'custom-swal-font-size',
          title: 'custom-swal-font-size',
          htmlContainer: 'custom-swal-font-size',
          text: 'custom-swal-font-size',
        }
      })
      .then(function() {
          window.location.href = './index.php';
        });
      </script>";
    } else if (strlen($message) > 1000) { // Set maximum length as needed
      echo "<script>
                swal('Error', 'Feedback message should not exceed 1000 characters.', 'error')
                .then(function() {
                    window.location.href = './index.php';
                });
            </script>";
    } else {
      $sql = "SELECT * FROM feedback WHERE Patient_Id = '$p_id'";
      $result = $connection->query($sql);

      if (mysqli_num_rows($result) === 0) {

        $sql1 = "SELECT * FROM patient WHERE Patient_Id = '$p_id'";
        $result1 = $connection->query($sql1);

        if (mysqli_num_rows($result1) > 0) {

          $filteredMessage = mysqli_real_escape_string($connection, $message);

          $sql2 = "INSERT INTO feedback (Text, Date, Patient_Id) VALUES ('$filteredMessage', CURRENT_DATE(), $p_id)";
          if ($connection->query($sql2)) {
            echo "<script>
            Swal.fire({
              icon: 'success',
              title: 'Thank You',
              text: 'Your feedback has been submitted successfully !',
              width: 600,
              showConfirmButton: false,
              timer: 3000,
              showClass: {
                popup: 'animate__animated animate__fadeInDown'
              },
              hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
              },
              customClass: {
                confirmButton: 'btn-class',
                buttonsStyling: false,
                heightAuto: false,
                popup: 'custom-swal-font-size',
                title: 'custom-swal-font-size',
                htmlContainer: 'custom-swal-font-size',
                text: 'custom-swal-font-size',
              }
            })
            .then(function() {
                window.location.href = './index.php';
              });
            </script>";
          }
        } else {
          echo "<script>
          Swal.fire({
            icon: 'error',
            title: 'ID Error',
            text: 'This Patient-ID does not exist',
            width: 600,
            showClass: {
              popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
              popup: 'animate__animated animate__fadeOutUp'
            },
            customClass: {
              confirmButton: 'btn-class',
              buttonsStyling: false,
              heightAuto: false,
              popup: 'custom-swal-font-size',
              title: 'custom-swal-font-size',
              htmlContainer: 'custom-swal-font-size',
              text: 'custom-swal-font-size',
            }
          })
          .then(function() {
              window.location.href = './index.php';
            });
          </script>";
        }
      } else {
        echo "<script>
        Swal.fire({
          icon: 'error',
          title: 'Repeatation Error',
          text: 'You have already submitted your feedback !',
          width: 600,
          showClass: {
            popup: 'animate__animated animate__fadeInDown'
          },
          hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
          },
          customClass: {
            confirmButton: 'btn-class',
            buttonsStyling: false,
            heightAuto: false,
            popup: 'custom-swal-font-size',
            title: 'custom-swal-font-size',
            htmlContainer: 'custom-swal-font-size',
            text: 'custom-swal-font-size',
          }
        })
        .then(function() {
            window.location.href = './index.php';
          });
        </script>";
      }
    }
    $connection->close();
  }
  ?>

  <!-- footer -->
  <?php include 'footer.php' ?>
  <!-- swiper slider js -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

  <!-- js link -->
  <script src="./Assets/js/custom.js"></script>
  <script src="./Assets/js/searchbar.js"></script>

</body>

</html>