<?php
if (isset($_GET['specialist'])) {
    $s = $_GET['specialist'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Book Appointment</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./Assets/pics/miracle-logo.png">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file link -->
    <link rel="stylesheet" href="./Assets/css/doctors.css">
    <style>
        body {
            background-color: white;
        }

        .container {
            max-width: 1080px;
            display: grid;
            place-items: center;
            margin: auto;
        }

        .add {
            margin-right: 55rem;
            margin-bottom: 2rem;
        }

        .btn {
            background-color: #0d6efd;
            padding: 8px;
            border: none;
            border-radius: 5px;

            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            background-color: #085AD6;
            color: white;
        }

        .btn a {
            text-decoration: none;
            color: white;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f2f2f2;
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
            <a href="#" class="breadcrumb_link breadcrumb_link_active"><?php echo "$s" ?></a>
        </li>
    </ul>
    <br>

    <!-- table of doctors -->
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Doctor_Id</th>
                    <th>Name</th>
                    <th>Speciality</th>
                    <th>Fee</th>
                    <th>Gender</th>
                    <th>Admin_Id</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include './connection.php';
                if (isset($_GET['specialist'])) {
                    $specialist = $_GET['specialist'];
                    // echo "<h1>Specialist: $specialist</h1>";
                    $sql = "SELECT * FROM doctor WHERE Speciality LIKE '$specialist%'";
                    $result = $connection->query($sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['Doctor_Id'] . "</td>";
                            echo "<td>" . $row['DName'] . "</td>";
                            echo "<td>" . $row['Speciality'] . "</td>";
                            echo "<td>" . $row['Fee'] . "</td>";
                            echo "<td>" . $row['DGender'] . "</td>";
                            echo "<td>" . $row['Admin_Id'] . "</td>";
                            echo "<td><button class='btn'><a href='./signup.php?d_id=" . $row['Doctor_Id'] . "&specialist=" . $specialist . "'><i class='fa-solid fa-calendar-check'></i>&nbsp;Appointment</a></button></td>";
                            echo "</tr>";
                        } //while loop
                    } else {
                        echo "No data found";
                    }
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>