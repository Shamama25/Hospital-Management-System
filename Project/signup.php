<?php
include './connection.php';

if (isset($_GET['d_id']) && isset($_GET['specialist'])) {
  $specialist = $_GET['specialist'];
  $d_id = $_GET['d_id'];
}

if (isset($_POST['submit'])) {
  $pname = $_POST['pname'];
  $phone = $_POST['phone'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $d_id = $_POST['d_id'];
  $specialist = $_POST['specialist'];

  $sql = "INSERT INTO patient(PName,Phone_No,PGender,Age,Doctor_Id) 
  VALUES ('$pname','$phone','$gender','$age','$d_id')";

  if ($connection->query($sql)) {
    $p_id = $connection->insert_id; //fetching auto increment patient id
    header("Location: ./appointment.php?d_id=$d_id&specialist=$specialist&p_id=$p_id&p_name=$pname");
    exit();
  } else {
    die(mysqli_error($connection));
  }
}
$connection->close();
?>
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
      <a href="./Specialists.php?specialist=<?php echo $specialist; ?>" class="breadcrumb_link">doctors</a>
    </li>
    <li class="breadcrumb_item">
      <a href="./signup.php" class="breadcrumb_link breadcrumb_link_active">register yourserlf</a>
    </li>
  </ul>
  <br><br><br>

  <!-- register section -->
  <div class="container">
    <div class="header">
      <h2>register yourself</h2>
    </div>

    <form action="./signup.php" class="form" id="form" method="post">

      <div class="form-handle">
        <label for="pname">Name</label>
        <input type="text" name="pname" id="pname" placeholder="Enter name here..." />
        <i class="fa-solid fa-circle-check"></i>
        <i class="fa-solid fa-circle-exclamation"></i>
        <small>Error message</small>
      </div>

      <div class="form-handle">
        <label for="phone">Phone</label>
        <input type="number" name="phone" id="phone" placeholder="Enter number here...">
        <i class="fa-solid fa-circle-check"></i>
        <i class="fa-solid fa-circle-exclamation"></i>
        <small>Error message</small>
      </div>

      <div class="form-handle">
        <label for="gender">Gender</label>
        <select name="gender" id="gender">
          <option value="">select gender...</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
        </select>
        <i class="fa-solid fa-circle-check"></i>
        <i class="fa-solid fa-circle-exclamation"></i>
        <small>Error message</small>
      </div>

      <div class="form-handle">
        <label for="age">Age</label>
        <input type="number" name="age" id="age" placeholder="Enter your age here..." />
        <i class="fa-solid fa-circle-check"></i>
        <i class="fa-solid fa-circle-exclamation"></i>
        <small>Error message</small>
      </div>

      <div class="form-handle">
        <label for="d_id">Doctor Id</label>
        <input type="text" name="d_id" id="d_id" value="<?php echo $d_id; ?>" readonly />
        <i class="fa-solid fa-circle-check"></i>
        <i class="fa-solid fa-circle-exclamation"></i>
        <small>Error message</small>
      </div>

      <div class="form-handle">
        <label for="specialist"></label>
        <input type="hidden" name="specialist" id="specialist" value="<?php echo $specialist; ?>" readonly />
        <i class="fa-solid fa-circle-check"></i>
        <i class="fa-solid fa-circle-exclamation"></i>
        <small>Error message</small>
      </div>

      <input type="submit" value="Submit" name="submit" class="btn" />
      <div class="footer">
        <h4>
          Already registered?
          <a href="./login.php?d_id=<?php echo $d_id; ?>&specialist=<?php echo $specialist; ?>">Login</a>
        </h4>
      </div>
    </form>
  </div>

  <!-- custom js -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const form = document.getElementById("form");
      const pname = document.getElementById("pname");
      const phone = document.getElementById("phone");
      const gender = document.getElementById("gender");
      const age = document.getElementById("age");
      const d_id = document.getElementById("d_id");

      form.addEventListener("submit", function(event) {
        let isValid = true;

        // Reset error messages
        const errorMessages = document.querySelectorAll(".form-handle small");
        errorMessages.forEach((message) => (message.innerText = ""));

        // Name
        if (pname.value.trim() === "") {
          setError(pname, "Name is required");
          isValid = false;
        } else if (!/^[A-Za-z\s]+$/.test(pname.value.trim())) {
          setError(pname, "Name can only contain alphabetic characters");
          isValid = false;
        } else if (pname.value.trim().length <= 2) {
          setError(pname, "Name must be at least 3 characters");
          isValid = false;
        } else {
          setSuccessMsg(pname);
        }

        // Phone
        if (phone.value.trim() === "") {
          setError(phone, "Phone Number is required");
          isValid = false;
        } else if (!/^\d{11}$/.test(phone.value.trim())) {
          setError(phone, "Phone Number should be 11 digits");
          isValid = false;
        } else {
          setSuccessMsg(phone);
        }

        // Gender
        if (gender.value === "") {
          setError(gender, "Please select a gender");
          isValid = false;
        } else {
          setSuccessMsg(gender);
        }

        // Age
        if (age.value.trim() === "") {
          setError(age, "Age is required");
          isValid = false;
        } else if (age.value < 1 || age.value > 100) {
          setError(age, "Age must be between 1 and 100");
          isValid = false;
        } else {
          setSuccessMsg(age);
        }

        // Doctor Id
        if (d_id.value.trim() === "") {
          setError(d_id, "Doctor Id is required");
          isValid = false;
        } else {
          setSuccessMsg(d_id);
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