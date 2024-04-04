<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Doctor</title>
  <link rel="icon" type="image/x-icon" href="../Assets/pics/miracle-logo.png">
  <!-- animate.css link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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

  <?php

  include '../connection.php';

  // Delete
  if (isset($_GET['deleteCnic'])) {

    $cnic = $_GET['deleteCnic'];

    // Delete the doctor
    $sql1 = "DELETE FROM doctor WHERE Doctor_Id = '$cnic'";
    if ($connection->query($sql1)) {
      $sql2 = "DELETE FROM doctor_time WHERE Doctor_Id = '$cnic'";
      if ($connection->query($sql2)) {
        echo "<script>
                Swal.fire({
                  icon: 'success',
                  title: 'Good Job',
                  text: 'Doctor has been deleted successfully !',
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
                    window.location.href = './display.php';
                  });
                </script>";
      } else {
        die(mysqli_error($connection));
      }
    } else {
      die(mysqli_error($connection));
    }
  }
  $connection->close();
  ?>
</body>

</html>