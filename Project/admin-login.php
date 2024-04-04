<?php
include './connection.php';

$sql = "SELECT * FROM admin";
$result = $connection->query($sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $admin_id = $row['Admin_Id'];
    $admin_password = $row['Admin_password'];
}

$connection->close();

if (isset($_POST['send'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    } //validate

    $id = validate($_POST['id']);
    $password = validate($_POST['password']);

    if (empty($id)) {
        header("Location: admin-login.php?error=Id is required");
        exit();
    } else if (empty($password)) {
        header("Location: admin-login.php?error=Password is required");
        exit();
    } else if (strlen($password) != 8) {
        header("Location: admin-login.php?error=Password must be of 8 characters");
        exit();
    } else if ($id == $admin_id && $password == $admin_password) {
        header("Location: adminBoard.php");
        exit();
    } else {
        header("Location: admin-login.php?error=Incorrect credentials");
        exit();
    }
}

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
    <link rel="stylesheet" href="./Assets/css/style.css" />
</head>

<body style="background: linear-gradient(#F0F6FD, #edf4fc)">
    <!-- header section -->
    <section class="header">
        <div class="flex">
            <a href="./index.php" class="logo" style="color: #1212f0">Miracle Health</a>
            <a href="./index.php" class="btn">Home</a>
            <div id="menu-btn" class="fas fa-bars"></div>
        </div>
    </section>

    <!-- contact section -->
    <section class="contact login-contact" id="contact">
        <div class="row">
            <form action="./admin-login.php" method="post">
                <h3>Admin Login</h3>

                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <input type="number" name="id" placeholder="Your id..." class="box" />
                <input type="password" name="password" placeholder="Your password..." class="box" />
                <input type="submit" value="Login" name="send" class="btn send" />

            </form>
        </div>
    </section>

    <!-- footer -->
    <?php include 'footer.php' ?>
    </div>
    <!-- js link -->
    <script src="./Assets/js/custom.js"></script>
</body>

</html>