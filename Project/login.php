<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Miracle Health</title>
  <link rel="icon" type="image/x-icon" href="./Assets/pics/miracle-logo.png" />
  <!-- font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <!-- css link -->
  <link rel="stylesheet" href="./Assets/css/doctors.css">
  <link rel="stylesheet" href="./Assets/css/formValidation.css" />
  <style>
    .footer {
      margin-top: 2rem;
      display: flex;
      justify-content: center;
    }
  </style>
</head>

<body>

  <!-- breadcrumb -->
  <ul class="breadcrumb">
    <li class="breadcrumb_item">
      <a href="./index.php" class="breadcrumb_link">
        <i class="fa-solid fa-house"></i>
      </a>
    </li>
    <li class="breadcrumb_item">
      <a href="./login.php" class="breadcrumb_link breadcrumb_link_active">login</a>
    </li>
  </ul>
  <br><br><br>

  <!-- login section -->
  <?php
  include './connection.php';

  if (isset($_GET['d_id']) && isset($_GET['specialist'])) {
    $specialist = $_GET['specialist'];
    $d_id = $_GET['d_id'];
  }
  if (isset($_POST['submit'])) {
    $p_id = $_POST['p_id'];
    $pname = $_POST['pname'];
    $d_id = $_POST['d_id'];
    $specialist = $_POST['specialist'];

    $sql = "SELECT * FROM patient WHERE Patient_Id = '$p_id' AND PName = '$pname'";

    $result = $connection->query($sql);

    if (mysqli_num_rows($result) > 0) {
      header("Location: ./appointment.php?d_id=$d_id&specialist=$specialist&p_id=$p_id&p_name=$pname");
      exit();
    } else {
      die(mysqli_error($connection));
    }
  }
  $connection->close();
  ?>
  <div class="container">
    <div class="header">
      <h2>log_in</h2>
    </div>

    <form action="./login.php" class="form" id="form" method="post">

      <div class="form-handle">
        <label for="p_id">Patient Id</label>
        <input type="text" name="p_id" id="p_id" />
        <i class="fa-solid fa-circle-check"></i>
        <i class="fa-solid fa-circle-exclamation"></i>
        <small>Error message</small>
      </div>

      <div class="form-handle">
        <label for="name">Name</label>
        <input type="text" name="pname" id="pname" placeholder="Enter name here..." />
        <i class="fa-solid fa-circle-check"></i>
        <i class="fa-solid fa-circle-exclamation"></i>
        <small>Error message</small>
      </div>

      <input type="hidden" name="d_id" id="d_id" value="<?php echo $d_id; ?>" readonly />

      <input type="hidden" name="specialist" id="specialist" value="<?php echo $specialist; ?>" readonly />

      <input type="submit" value="Submit" name="submit" class="btn" />

      <div class="footer">
        <h4>
          Don't have an account?
          <a href="./signup.php?d_id=<?php echo $d_id; ?>&specialist=<?php echo $specialist; ?>">Sign Up</a>
        </h4>
      </div>
    </form>
  </div>

  <!-- custom js -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const form = document.getElementById("form");
      const p_id = document.getElementById("p_id");
      const name = document.getElementById("pname");

      form.addEventListener("submit", function(event) {
        let isValid = true;

        // Reset error messages
        const errorMessages = document.querySelectorAll(".form-handle small");
        errorMessages.forEach((message) => (message.innerText = ""));

        // Patient Id
        if (p_id.value.trim() === "") {
          setError(p_id, "Patient Id is required");
          isValid = false;
        } else {
          setSuccessMsg(p_id);
        }
        // Name
        if (name.value.trim() === "") {
          setError(name, "Name is required");
          isValid = false;
        } else if (!/^[A-Za-z\s]+$/.test(pname.value.trim())) {
          setError(name, "Name can only contain alphabetic characters");
          isValid = false;
        } else if (name.value.trim().length <= 2) {
          setError(name, "Name must be at least 3 characters");
          isValid = false;
        } else {
          setSuccessMsg(name);
        }

        if (!isValid) {
          event.preventDefault(); // Prevent form submission
        }
      });

      function setError(input, message) {
        const formHandle = input.parentElement;
        const errorMessage = formHandle.querySelector("small");
        errorMessage.innerText = message;
        formHandle.classList.add("error");
      }

      function setSuccessMsg(input) {
        const formHandle = input.parentElement;
        formHandle.className = "form-handle success";
      }
    });
  </script>
</body>

</html>