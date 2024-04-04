<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Credentials</title>
    <link rel="icon" type="image/x-icon" href="./Assets/pics/miracle-logo.png">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- animate.css link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- css file link -->
    <link rel="stylesheet" href="./Assets/css/doctors.css">
    <link rel="stylesheet" href="./Assets/css/formValidation.css" />
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
            <a href="./index.php" class="breadcrumb_link">
                <i class="fa-solid fa-house"></i>
            </a>
        </li>
        <li class="breadcrumb_item">
            <a href="./adminBoard.php" class="breadcrumb_link">admin panel</a>
        </li>
        <li class="breadcrumb_item">
            <a href="" class="breadcrumb_link breadcrumb_link_active" readonly>change credentials</a>
        </li>
    </ul>
    <br><br><br>

    <!--admin update section -->
    <?php
    include './connection.php';

    $sql = "SELECT * FROM admin";
    $result = $connection->query($sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $a_number = $row['Phone_No'];
        $a_password = $row['Admin_password'];
    }

    if (isset($_POST['submit'])) {
        $number = $_POST['number'];
        $password = $_POST['password'];

        $sql = "UPDATE admin SET Phone_No='$number', Admin_password='$password' WHERE Admin_Id=1";

        if ($connection->query($sql)) {
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success !',
                text: 'Your credentials has been updated successfully !',
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
                window.location.href = './adminBoard.php';
              });
              </script>";
        } else {
            die(mysqli_error($connection));
        }
    }
    ?>
    <div class="container">
        <div class="header">
            <h2>update admin</h2>
        </div>

        <form action="./adminPassword.php" class="form" id="form" method="post">

            <div class="form-handle">
                <label for="number">Phone Number</label>
                <input type="number" name="number" id="number" value="<?php echo $a_number; ?>" />
                <i class="fa-solid fa-circle-check"></i>
                <i class="fa-solid fa-circle-exclamation"></i>
                <small>Error message</small>
            </div>

            <div class="form-handle">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="<?php echo $a_password ?>" />
                <i class="bi bi-eye-slash" id="togglePassword"></i>
                <i class="fa-solid fa-circle-check"></i>
                <i class="fa-solid fa-circle-exclamation"></i>
                <small>Error message</small>
            </div>

            <input type="checkbox" onclick="see()" name="show" id="show">
            <label for="show">&nbsp;Show Password</label>

            <input type="submit" value="Submit" name="submit" class="btn" />

        </form>
    </div>

    <!-- custom js -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById("form");
            const number = document.getElementById("number");
            const password = document.getElementById("password");

            form.addEventListener("submit", (e) => {
                let isValid = true;
                const errorMessages = document.querySelectorAll(".form-handle small");

                errorMessages.forEach((message) => (message.innerText = ""));

                const numberVal = number.value.trim();
                const passwordVal = password.value.trim();

                // number validation
                if (numberVal === "") {
                    setErrorMsg(number, "Phone Number is required");
                    isValid = false;
                } else if (!/^\d{11}$/.test(numberVal)) {
                    setErrorMsg(number, "Phone Number should be 11 digits");
                    isValid = false;
                } else {
                    setSuccessMsg(number);
                }

                // validate password
                if (passwordVal === "") {
                    setErrorMsg(password, "Password is required");
                    isValid = false;
                } else if (passwordVal.length !== 8) {
                    setErrorMsg(password, "Password must be 8 characters");
                    isValid = false;
                } else {
                    setSuccessMsg(password);
                }

                if (!isValid) {
                    e.preventDefault(); // Prevent form submission if there are validation errors.
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
        });

        // show password
        function see() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

</body>

</html>