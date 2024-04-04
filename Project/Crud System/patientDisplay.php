<!DOCTYPE html>
<html lang="en">

<head>
    <title>Patients</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../Assets/pics/miracle-logo.png">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file link -->
    <link rel="stylesheet" href="../Assets/css/doctors.css">
    <link rel="stylesheet" href="../Assets/css/crud.css">
</head>

<body>
    <!-- breadcrumb -->
    <ul class="breadcrumb">
        <li class="breadcrumb_item">
            <a href="../index.php" class="breadcrumb_link">
                <i class="fa-solid fa-house"></i>
            </a>
        </li>
        <li class="breadcrumb_item">
            <a href="../adminBoard.php" class="breadcrumb_link">admin panel</a>
        </li>
        <li class="breadcrumb_item">
            <a href="" class="breadcrumb_link breadcrumb_link_active" readonly>patients</a>
        </li>
    </ul>
    <br>

    <!-- table of doctors -->
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Patient_Id&nbsp;<i class='fa-solid fa-key pk'></i></th>
                    <th>Patient Name</th>
                    <th>Phone_No</th>
                    <th>Patient Gender</th>
                    <th>Age</th>
                    <th>Doctor_Id&nbsp;<i class='fa-solid fa-key fk'></i></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../connection.php';

                $sql = "SELECT * FROM patient";
                $result = $connection->query($sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['Patient_Id'] . "</td>";
                        echo "<td>" . $row['PName'] . "</td>";
                        echo "<td>" . $row['Phone_No'] . "</td>";
                        echo "<td>" . $row['PGender'] . "</td>";
                        echo "<td>" . $row['Age'] . "</td>";
                        echo "<td>" . $row['Doctor_Id'] . "</td>";
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