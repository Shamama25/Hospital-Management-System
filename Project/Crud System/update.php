<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Doctor</title>
    <link rel="icon" type="image/x-icon" href="../Assets/pics/miracle-logo.png">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- animate.css link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- css file link -->
    <link rel="stylesheet" href="../Assets/css/doctors.css">
    <link rel="stylesheet" href="../Assets/css/formValidation.css" />
    <style>
        input[type="checkbox"] {
            width: 18px;
            height: 18px;
            display: inline;
            margin-top: 15px;
        }

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
            <a href="../adminBoard.html" class="breadcrumb_link">admin panel</a>
        </li>
        <li class="breadcrumb_item">
            <a href="./display.php" class="breadcrumb_link">doctors</a>
        </li>
        <li class="breadcrumb_item">
            <a href="" class="breadcrumb_link breadcrumb_link_active" readonly>update doctor</a>
        </li>
    </ul>
    <br><br><br>

    <!-- update section -->
    <?php
    include '../connection.php';

    // fetch data
    if (isset($_GET['updateCnic'])) {
        $cnic = $_GET['updateCnic'];
        $sql = "SELECT * FROM doctor JOIN doctor_time using(Doctor_ID) WHERE Doctor_Id = '$cnic'";
        $result = $connection->query($sql);
        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);

            $name = $row['DName'];
            $cnic = $row['Doctor_Id']; // Use the correct column name for Doctor ID
            $speciality = $row['Speciality'];
            $fee = $row['Fee'];
            $gender = $row['DGender'];
            $Acnic = $row['Admin_Id']; // Assuming you have an Admin_Id column in the doctor table

            $selectedTimeSlots = [];
            do {
                $selectedTimeSlots[] = $row['Time'];
            } while ($row = mysqli_fetch_assoc($result));
        } //inner if
    } //outer if

    // Update Data
    if (isset($_POST['submit'])) {
        $cnic = $_POST['cnic'];
        $name = $_POST['name'];
        $phone = $_POST['number'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $speciality = $_POST['specialist_type'];
        $availability = $_POST['availability'];
        $fee = $_POST['fees'];
        $Acnic = $_POST['Acnic']; // Get the admin CNIC from the form

        // retrieve the submitted time slots from the form
        $submittedTimeSlots = $_POST['time'];

        // retrieve the existing time slots associated with the doctor from the database
        $sqlExistingTimeSlots = "SELECT Time FROM doctor_time WHERE Doctor_ID = '$cnic'";
        $resultExistingTimeSlots = $connection->query($sqlExistingTimeSlots);
        $existingTimeSlots = [];
        while ($row = mysqli_fetch_assoc($resultExistingTimeSlots)) {
            $existingTimeSlots[] = $row['Time'];
        }

        // determine which time slots need to be added, updated, or removed
        $timeSlotsToAdd = array_diff($submittedTimeSlots, $existingTimeSlots);
        $timeSlotsToRemove = array_diff($existingTimeSlots, $submittedTimeSlots);

        // add new time slots
        foreach ($timeSlotsToAdd as $timeSlot) {
            $sqlAddTimeSlot = "INSERT INTO doctor_time (Doctor_ID, Time) VALUES ('$cnic', '$timeSlot')";
            $connection->query($sqlAddTimeSlot);
        }

        // remove existing time slots
        foreach ($timeSlotsToRemove as $timeSlot) {
            $sqlRemoveTimeSlot = "DELETE FROM doctor_time WHERE Doctor_ID = '$cnic' AND Time = '$timeSlot'";
            $connection->query($sqlRemoveTimeSlot);
        }

        // perform the doctor's data update
        $sql = "UPDATE doctor SET 
                DName='$name', 
                Speciality='$speciality', 
                Fee='$fee', 
                DGender='$gender', 
                Admin_Id='$Acnic' 
            WHERE Doctor_Id = '$cnic'";

        if ($connection->query($sql)) {
            echo "<script>
            Swal.fire({
              icon: 'success',
              title: 'Success !',
              text: 'Your data has been updated successfully !',
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
            }).then(function() {
                window.location.href = './display.php';
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
            <h2>update doctor</h2>
        </div>

        <form action="./update.php" class="form" id="form" method="post">

            <div class="form-handle">
                <label for="cnic">Doctor Id</label>
                <input type="text" name="cnic" id="cnic" value="<?php echo $cnic; ?>" readonly />
                <i class="fa-solid fa-circle-check"></i>
                <i class="fa-solid fa-circle-exclamation"></i>
                <small>Error message</small>
            </div>

            <div class="form-handle">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?php echo $name; ?>" />
                <i class="fa-solid fa-circle-check"></i>
                <i class="fa-solid fa-circle-exclamation"></i>
                <small>Error message</small>
            </div>

            <div class="form-handle">
                <label for="specialist_type">speciality</label>
                <select name="specialist_type" id="specialist_type">
                    <option value="">Select specialization type...</option>
                    <option value="Eye Specialist" <?php if ($speciality === 'Eye Specialist') echo 'selected="selected"'; ?>>Eye Specialist</option>
                    <option value="Ear Specialist" <?php if ($speciality === 'Ear Specialist') echo 'selected="selected"'; ?>>Ear Specialist</option>
                    <option value="Heart Specialist" <?php if ($speciality === 'Heart Specialist') echo 'selected="selected"'; ?>>Heart Specialist</option>
                    <option value="Dentist" <?php if ($speciality === 'Dentist') echo 'selected="selected"'; ?>>Dentist</option>
                    <option value="Gynecologist" <?php if ($speciality === 'Gynecologist') echo 'selected="selected"'; ?>>Gynecologist</option>
                    <option value="Neurologist" <?php if ($speciality === 'Neurologist') echo 'selected="selected"'; ?>>Neurologist</option>
                    <option value="Nutritionist" <?php if ($speciality === 'Nutritionist') echo 'selected="selected"'; ?>>Nutritionist</option>
                    <option value="Psychiatrists" <?php if ($speciality === 'Psychiatrists') echo 'selected="selected"'; ?>>Psychiatrists</option>
                </select>

                <i class="fa-solid fa-circle-check"></i>
                <i class="fa-solid fa-circle-exclamation"></i>
                <small>Error message</small>
            </div>

            <div class="form-handle">
                <label for="fees">fees</label>
                <input type="number" name="fees" id="fees" value="<?php echo $fee; ?>" />
                <i class="fa-solid fa-circle-check"></i>
                <i class="fa-solid fa-circle-exclamation"></i>
                <small>Error message</small>
            </div>

            <div class="form-handle">
                <label for="gender">Gender</label>
                <select name="gender" id="gender">
                    <option value="">select gender...</option>
                    <option value="Male" <?php if ($gender === 'Male') echo 'selected'; ?>>Male</option>
                    <option value="Female" <?php if ($gender === 'Female') echo 'selected'; ?>>Female</option>
                    <option value="Other" <?php if ($gender === 'Other') echo 'selected'; ?>>Other</option>
                </select>
                <i class="fa-solid fa-circle-check"></i>
                <i class="fa-solid fa-circle-exclamation"></i>
                <small>Error message</small>
            </div>

            <div class="form-handle">
                <h3>Time Slots</h3>
                <?php

                $timeSlots = array(
                    '9:00 AM - 10:00 AM',
                    '2:00 PM - 3:00 PM',
                    '8:00 PM - 9:00 PM'
                );

                foreach ($timeSlots as $index => $timeSlot) {
                    $isChecked = in_array($timeSlot, $selectedTimeSlots) ? 'checked' : '';
                    echo '<div>
                            <input type="checkbox" name="time[]" id="time-' . $index . '" value="' . $timeSlot . '" ' . $isChecked . '>
                            <label for="time-' . $index . '">' . $timeSlot . '</label>
                        </div>';
                }

                ?>
            </div>

            <div class="form-handle">
                <label for="Acnic">Admin Id</label>
                <input type="text" name="Acnic" id="Acnic" value="<?php echo $Acnic; ?>" readonly />
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
            const name = document.getElementById("name");
            const specialist_type = document.getElementById("specialist_type");
            const fees = document.getElementById("fees");
            const gender = document.getElementById("gender");
            const time1 = document.getElementById("time1");
            const time2 = document.getElementById("time2");
            const time3 = document.getElementById("time3");
            const Acnic = document.getElementById("Acnic");

            form.addEventListener("submit", function(event) {
                let isValid = true;

                // Reset error messages
                const errorMessages = document.querySelectorAll(".form-handle small");
                errorMessages.forEach((message) => (message.innerText = ""));
                //cnic
                if (cnic.value.trim() === "") {
                    setError(cnic, "CNIC Number is required");
                    isValid = false;
                } else {
                    setSuccessMsg(cnic);
                }
                //name
                if (name.value.trim() === "") {
                    setError(name, "Name is required");
                    isValid = false;
                } else if (!/^[A-Za-z\s]+$/.test(name.value.trim())) {
                    setError(username, "Name can only contain alphabetic characters");
                } else if (/^\d+$/.test(name.value.trim())) {
                    setError(name, "Numbers are not allowed");
                } else if (name.value.trim().length <= 2) {
                    setError(name, "Username must be of 3 characters");
                } else {
                    setSuccessMsg(name);
                }
                //specialist_type
                if (specialist_type.value === "") {
                    setError(specialist_type, "Please select a specialization type");
                    isValid = false;
                } else {
                    setSuccessMsg(specialist_type);
                }
                //fees
                if (fees.value.trim() === "") {
                    setError(fees, "Fees is required");
                    isValid = false;
                } else if (fees.value < 500 || fees.value > 5000) {
                    setError(fees, "Fees must be in range 500 to 5000");
                    isValid = false;
                } else {
                    setSuccessMsg(fees);
                }
                //gender
                if (gender.value === "") {
                    setError(gender, "Please select a gender");
                    isValid = false;
                } else {
                    setSuccessMsg(gender);
                }
                //time
                if (!time1.checked && !time2.checked && !time3.checked) {
                    swal("Warning", "You have to select atleast one time slot", "warning")
                }
                //Acnic
                if (Acnic.value.trim() === "") {
                    setError(Acnic, "CNIC Number is required");
                    isValid = false;
                } else {
                    setSuccessMsg(Acnic);
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