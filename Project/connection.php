<?php
$connection = mysqli_connect("localhost", "root", "", "hospital_appointment_system");
if (!$connection) {
    echo "Connection Failed";
}
