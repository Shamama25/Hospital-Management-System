<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reschedule Appointment</title>
    <link rel="icon" type="image/x-icon" href="../Assets/pics/miracle-logo.png">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- animate.css link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- css file link -->
    <link rel="stylesheet" href="../Assets/css/doctors.css">
    <link rel="stylesheet" href="../Assets/css/formValidation.css" />
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
            <a href="../index.php" class="breadcrumb_link">
                <i class="fa-solid fa-house"></i>
            </a>
        </li>
        <li class="breadcrumb_item">
            <a href="../patientAppointmentDisplay.php" class="breadcrumb_link">appointments</a>
        </li>
        <li class="breadcrumb_item">
            <a href="" class="breadcrumb_link breadcrumb_link_active" readonly>reschedule appointment</a>
        </li>
    </ul>
    <br><br><br>

    <!-- reschedule section -->
    <?php
    include '../connection.php';

    if (isset($_GET['d_id']) && isset($_GET['p_id']) && isset($_GET['a_id'])) {

        $a_id = $_GET['a_id'];
        $d_id = $_GET['d_id'];
        $p_id = $_GET['p_id'];

        $sql = "SELECT * FROM doctor_time WHERE Doctor_Id = '$d_id'";
        $result = $connection->query($sql);

        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);

            // fetch time slots and store them in an array
            $timeSlots = [];
            do {
                $timeSlots[] = $row['Time'];
            } while ($row = mysqli_fetch_assoc($result));
        } //if
    } //outer if

    // Update Data
    if (isset($_POST['submit'])) {

        $app_id = $_POST['app_id'];
        $date = $_POST['date'];
        $time = $_POST['timeSlot'];
        $p_id = $_POST['p_id'];
        $d_id = $_POST['d_id'];

        // reschedule appointment
        $sql = "UPDATE appointment SET Date='$date', Time='$time' WHERE Appointment_Id = '$app_id'";


        if ($connection->query($sql)) {
            echo "<script>
            Swal.fire({
              icon: 'success',
              title: 'Thank You',
              text: 'Your Appointment has been rescheduled successfully !',
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
                window.location.href = '../patientAppointmentDisplay.php?p_id=$p_id';
              });
            </script>";
        } else {
            die(mysqli_error($connection));
        }
    }
    $connection->close();
    ?>
    <div class="container">
        <div class="header">
            <h2>reschedule appointment</h2>
        </div>

        <form action="./reschedule.php" class="form" id="form" method="post">

            <input type="hidden" name="app_id" id="app_id" value="<?php echo $a_id; ?>" readonly />

            <div class="form-handle">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" />
                <i class="fa-solid fa-circle-check"></i>
                <i class="fa-solid fa-circle-exclamation"></i>
                <small>Error message</small>
            </div>

            <div class="form-handle">
                <label for="timeSlot">Time Slot</label>
                <select name="timeSlot" id="timeSlot">
                    <option value="">Select time slot</option>
                    <?php
                    foreach ($timeSlots as $timeSlot) {
                        echo "<option value=\"$timeSlot\">$timeSlot</option>";
                    }
                    ?>
                </select>
                <i class="fa-solid fa-circle-check"></i>
                <i class="fa-solid fa-circle-exclamation"></i>
                <small>Error message</small>
            </div>

            <input type="hidden" name="d_id" id="d_id" value="<?php echo $d_id; ?>" readonly />

            <input type="hidden" name="p_id" id="p_id" value="<?php echo $p_id; ?>" readonly />

            <input type="submit" value="Submit" name="submit" class="btn" />

        </form>
    </div>

    <!-- custom js -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById("form");
            const date = document.getElementById("date");
            const timeSlot = document.getElementById("timeSlot");

            form.addEventListener("submit", (e) => {
                let isValid = true;
                const errorMessages = document.querySelectorAll(".form-handle small");

                errorMessages.forEach((message) => (message.innerText = ""));

                const dateVal = date.value;
                const timeSlotVal = timeSlot.value;

                //validate date
                const dateValidationResult = isDateValid(dateVal);
                if (dateVal === "") {
                    setErrorMsg(date, "Please select a date");
                    isValid = false;
                } else if (dateValidationResult.isPastDate) {
                    setErrorMsg(date, "Selected date cannot be in the past");
                    isValid = false;
                } else if (!dateValidationResult.isFutureDate) {
                    setErrorMsg(date, "Selected date must be within the next 30 days");
                    isValid = false;
                } else {
                    setSuccessMsg(date);
                }

                // validate time slot
                if (timeSlotVal === "") {
                    setErrorMsg(timeSlot, "Please select a time slot");
                    isValid = false;
                } else {
                    setSuccessMsg(timeSlot);
                }

                if (!isValid) {
                    e.preventDefault();
                }
            });

            function setErrorMsg(input, errorMsg) {
                const formHandle = input.parentElement;
                const small = formHandle.querySelector("small");
                formHandle.className = "form-handle error";
                small.innerText = errorMsg;
            }

            function setSuccessMsg(input) {
                const formHandle = input.parentElement;
                formHandle.className = "form-handle success";
            }

            function isDateValid(dateStr) {
                const selectedDate = new Date(dateStr);
                const currentDate = new Date();
                const maxAllowedDate = new Date();
                maxAllowedDate.setDate(maxAllowedDate.getDate() + 30);

                selectedDate.setHours(0, 0, 0, 0);
                currentDate.setHours(0, 0, 0, 0);
                maxAllowedDate.setHours(0, 0, 0, 0);

                const isPastDate = selectedDate < currentDate;
                const isFutureDate = selectedDate >= currentDate && selectedDate <= maxAllowedDate;

                return {
                    isPastDate,
                    isFutureDate
                };
            }

        });
    </script>

</body>

</html>