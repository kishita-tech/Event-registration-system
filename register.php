<?php
$conn = mysqli_connect("localhost", "root", "", "event_sys");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$event = $_POST['event'];

$sql = "INSERT INTO registrations (name, email, phone, gender, event)
        VALUES ('$name', '$email', '$phone', '$gender', '$event')";

if (mysqli_query($conn, $sql)) {
    echo "<h3>Registration Successful!</h3>";
    echo "<a href='index.php'>Go Back</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>