<!DOCTYPE html>
<html lang="en">

<head>
    <title>Patient Appointments</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./Assets/pics/miracle-logo.png">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file link -->
    <link rel="stylesheet" href="./Assets/css/doctors.css">
    <link rel="stylesheet" href="./Assets/css/crud.css">
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
            <a href="./patientAppointmentForm.php" class="breadcrumb_link">check appointments</a>
        </li>
        <li class="breadcrumb_item">
            <a href="" class="breadcrumb_link breadcrumb_link_active" readonly>your appointments</a>
        </li>
    </ul>
    <br>

    <!-- table of doctors -->
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Appointment_Id&nbsp;<i class='fa-solid fa-key pk'></th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Patient_Id&nbsp;<i class='fa-solid fa-key fk'></th>
                    <th>Doctor_Id&nbsp;<i class='fa-solid fa-key fk'></th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include './connection.php';

                if (isset($_GET['p_id'])) {
                    $p_id = $_GET['p_id'];
                }

                    $sql = "SELECT * FROM appointment WHERE Patient_Id = '$p_id'";
                    $result = $connection->query($sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['Appointment_Id'] . "</td>";
                            echo "<td>" . $row['Date'] . "</td>";
                            echo "<td>" . $row['Time'] . "</td>";
                            echo "<td>" . $row['Patient_Id'] . "</td>";
                            echo "<td>" . $row['Doctor_Id'] . "</td>";
                            echo "<td><button class='btn'><a href='./Crud System/reschedule.php?a_id=" . $row['Appointment_Id'] . "&p_id=" . $row['Patient_Id'] . "&d_id=" . $row['Doctor_Id'] . "'><i class='fa-solid fa-pen-to-square'></i></a></button><button class='btn btn-del'><a href='./Crud System/deleteAppointment.php?cancel_id=" . $row['Appointment_Id'] . "'><i class='fa-solid fa-trash-can'></i></a></button></td>";
                            echo "</tr>";
                        } //while loop
                    } else {
                        echo "No data found";
                    }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>