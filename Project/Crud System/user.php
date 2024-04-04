<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>
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
            <a href="" class="breadcrumb_link breadcrumb_link_active" readonly>add doctor</a>
        </li>
    </ul>
    <br><br><br>

    <!-- add section -->
    <?php
    include '../connection.php';
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $speciality = $_POST['specialist_type'];
        $fee = $_POST['fees'];
        $gender = $_POST['gender'];
        $Acnic = $_POST['Acnic'];

        //sql query to add doctor
        $sql = "INSERT INTO doctor(DName,Speciality,Fee,DGender,Admin_Id) 
    VALUES ('$name','$speciality','$fee','$gender','$Acnic')";

        if ($connection->query($sql)) {

            $doctorId = $connection->insert_id; //fetching auto increment doctor id
            $time = $_POST['time'];

            foreach ($time as $t) {

                //sql query to add doctor time
                $sql1 = "INSERT INTO doctor_time(Doctor_Id,Time)
            VALUES ('$doctorId','$t')";

                if (!$connection->query($sql1)) {
                    echo "error:" . mysqli_error($connection);
                }
            } //foreach loop ends

            echo "<script>
            Swal.fire({
              icon: 'success',
              title: 'Good Job',
              text: 'Doctor has been added successfully !',
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
            echo "error:" . mysqli_error($connection);
        }

        $connection->close();
    }
    ?>
    <div class="container">
        <div class="header">
            <h2>add doctor</h2>
        </div>

        <form action="./user.php" class="form" id="form" method="post">

            <div class="form-handle">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter name here..." />
                <i class="fa-solid fa-circle-check"></i>
                <i class="fa-solid fa-circle-exclamation"></i>
                <small>Error message</small>
            </div>

            <div class="form-handle">
                <label for="specialist_type">speciality</label>
                <select name="specialist_type" id="specialist_type">
                    <option value="">Select specialization type...</option>
                    <option value="Eye Specialist">Eye Specialist</option>
                    <option value="Ear Specialist">Ear Specialist</option>
                    <option value="Heart Specialist">Heart Specialist</option>
                    <option value="Dentist">Dentist</option>
                    <option value="Gynecologist">Gynecologist</option>
                    <option value="Neurologist">Neurologist</option>
                    <option value="Nutritionist">Nutritionist</option>
                    <option value="Psychiatrists">Psychiatrists</option>
                </select>
                <i class="fa-solid fa-circle-check"></i>
                <i class="fa-solid fa-circle-exclamation"></i>
                <small>Error message</small>
            </div>

            <div class="form-handle">
                <label for="fees">fees</label>
                <input type="number" name="fees" id="fees" placeholder="Fees in PKR" />
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
                <h3>Time Slots</h3>
                <div>
                    <input type="checkbox" name="time[]" id="time1" value="9:00 AM - 10:00 AM">
                    <label for="time1">9:00 AM - 10:00 AM</label>
                </div>
                <div>
                    <input type="checkbox" name="time[]" id="time2" value="2:00 PM - 3:00 PM">
                    <label for="time2"> 2:00 PM - 3:00 PM</label>
                </div>
                <div>
                    <input type="checkbox" name="time[]" id="time3" value="8:00 PM - 9:00 PM">
                    <label for="time3">8:00 PM - 9:00 PM</label>
                </div>
                <i class="fa-solid fa-circle-check"></i>
                <i class="fa-solid fa-circle-exclamation"></i>
                <small>Error message</small>
            </div>

            <div class="form-handle">
                <label for="Acnic">Admin Id</label>
                <input type="text" name="Acnic" id="Acnic" placeholder="admin id..." />
                <i class="fa-solid fa-circle-check"></i>
                <i class="fa-solid fa-circle-exclamation"></i>
                <small>Error message</small>
            </div>

            <input type="submit" value="Submit" name="submit" class="btn" />

        </form>
    </div>

    <!-- sweetalert js -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
                //name
                if (name.value.trim() === "") {
                    setError(name, "Name is required");
                    isValid = false;
                } else if (!/^[A-Za-z\s]+$/.test(name.value.trim())) {
                    setError(name, "Name can only contain alphabetic characters"); // Corrected here
                } else if (/^\d+$/.test(name.value.trim())) {
                    setError(name, "Numbers are not allowed");
                } else if (name.value.trim().length <= 2) {
                    setError(name, "Name must be of 3 characters");
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