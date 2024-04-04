<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Patient Appointments Form</title>
    <link rel="icon" type="image/x-icon" href="./Assets/pics/miracle-logo.png" />
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- animate.css link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- css link -->
    <link rel="stylesheet" href="./Assets/css/doctors.css">
    <link rel="stylesheet" href="./Assets/css/formValidation.css" />
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

    <!-- breadcrumb -->
    <ul class="breadcrumb">
        <li class="breadcrumb_item">
            <a href="./index.php" class="breadcrumb_link">
                <i class="fa-solid fa-house"></i>
            </a>
        </li>
        <li class="breadcrumb_item">
            <a href="" class="breadcrumb_link breadcrumb_link_active" readonly>Check Appointments</a>
        </li>
    </ul>
    <br><br><br>

    <!-- register section -->
    <?php
    include './connection.php';

    if (isset($_POST['submit'])) {

        $p_id = $_POST['p_id'];
        $pname = $_POST['pname'];

        $sql = "SELECT * FROM patient WHERE Patient_Id = '$p_id' AND PName = '$pname'";

        $result = $connection->query($sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: ./patientAppointmentDisplay.php?p_id=$p_id");
            exit();
        } else {
            echo "<script>
            Swal.fire({
              icon: 'error',
              title: 'No Patient Found',
              text: 'The patient you are looking for does not exist !',
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
                window.location.href = './patientAppointmentForm.php';
              });
            </script>";
        }
    }
    $connection->close();
    ?>
    <div class="container">
        <div class="header">
            <h2>check your appointments</h2>
        </div>

        <form action="./patientAppointmentForm.php" class="form" id="form" method="post">

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

            <input type="submit" value="Submit" name="submit" class="btn" />

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
                } else if (!/^[A-Za-z\s]+$/.test(name.value.trim())) {
                    setError(name, "Name can only contain alphabetic characters");
                    isValid = false;
                } else if (name.value.trim().length <= 2) {
                    setError(name, "Name must be at least 3 characters");
                    isValid = false;
                } else {
                    setSuccessMsg(name);
                }

                // Prevent form submission if there are errors
                if (!isValid) {
                    event.preventDefault();
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