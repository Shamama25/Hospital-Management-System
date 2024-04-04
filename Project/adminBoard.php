<?php
include "./connection.php";
//sql query
$sql = "SELECT * FROM admin";
$result = $connection->query($sql);

$sql1 = "SELECT * FROM doctor";
$result1 = $connection->query($sql1);
$count = mysqli_num_rows($result1);

$sql2 = "SELECT * FROM patient";
$result2 = $connection->query($sql2);
$count1 = mysqli_num_rows($result2);

$sql3 = "SELECT * FROM appointment";
$result3 = $connection->query($sql3);
$count2 = mysqli_num_rows($result3);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $name = $row['AName'];
}
$connection->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Board</title>
    <link rel="icon" type="image/x-icon" href="./Assets/pics/miracle-logo.png" />
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- animate.css link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- css link -->
    <link rel="stylesheet" href="./Assets/css/admin.css" />
    <style>
        .btn-class {
            padding: 7px 19px;
            border-radius: 2px;
            background-color: #0d6efd !important;
            font-size: 12px;
            width: 100px;
        }
    </style>
</head>

<body>
    <section class="admin">
        <!-- Navigation -->
        <div class="container">
            <div class="navigation">
                <ul>
                    <li><a href="#"><span class="title">Miracle Health</span></a></li>

                    <li><a href="index.php"><span class="title">Home</span></a></li>

                    <li><a href="./Crud System/displayFeedback.php"><span class="title">Feedback</span></a></li>

                    <li><a href="./adminPassword.php"><span class="title">Password</span></a></li>

                </ul>
            </div>

            <!-- Main -->
            <div class="main">
                <div class="topbar">
                    <div class="toggle">
                        <div id="menu-btn" class="fas fa-bars"></div>
                    </div>

                    <div class="text">
                        <h3><?php echo "Welcome! " . $name; ?></h3>
                    </div>

                    <div class="user">
                        <img src="./Assets/pics/admin.png" alt="admin" onclick="pic()" />
                    </div>
                </div>

                <!-- Cards -->
                <div class="cardBox">

                    <a href="./Crud System/display.php">
                        <div class="card">
                            <div>
                                <div class="numbers"><?php echo "$count"; ?></div>
                                <div class="cardName">Doctors</div>
                            </div>

                            <div class="iconBx">
                                <i class="fa-solid fa-user-doctor"></i>
                            </div>
                        </div>
                    </a>

                    <a href="./Crud System/patientDisplay.php">
                        <div class="card">
                            <div>
                                <div class="numbers"><?php echo "$count1"; ?></div>
                                <div class="cardName">Patients</div>
                            </div>

                            <div class="iconBx">
                                <i class="fa-solid fa-hospital-user"></i>
                            </div>
                        </div>
                    </a>

                    <a href="./Crud System/appointmentDisplay.php">
                        <div class="card">
                            <div>
                                <div class="numbers"><?php echo "$count2"; ?></div>
                                <div class="cardName">Appointments</div>
                            </div>

                            <div class="iconBx">
                                <i class="fa-solid fa-calendar-check"></i>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </section>

    <!-- sweetalert js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>

    <!-- Script -->
    <script>
        function pic() {
            Swal.fire({
                title: 'Dr. Qaiser Shehryar Durrani',
                text: 'PhD in AI from George Washington University, USA',
                imageUrl: './Assets/pics/admin.png',
                imageWidth: 350,
                imageHeight: 300,
                imageAlt: 'Custom image',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                },
                customClass: {
                    confirmButton: 'btn-class',
                    buttonsStyling: 'false',
                }
            })
        }
    </script>
    <script src="./Assets/js/admin.js"></script>
</body>

</html>