<?php
$conn = mysqli_connect("localhost", "root", "", "event_sys");

$id = intval($_GET['id']);
$result = mysqli_query($conn, "SELECT * FROM registrations WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])) {

    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $phone  = $_POST['phone'];
    $gender = $_POST['gender'];
    $event  = $_POST['event'];

    mysqli_query($conn, "UPDATE registrations SET 
        name='$name',
        email='$email',
        phone='$phone',
        gender='$gender',
        event='$event'
        WHERE id=$id
    ");

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit User</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
:root {
    --bg: #f4f6fb;
    --card: #ffffff;
    --text: #333;
    --input: #fff;
}

body.dark {
    --bg: #1e1e2f;
    --card: #2a2a40;
    --text: #eee;
    --input: #3a3a55;
}

body {
    background: var(--bg);
    color: var(--text);
    transition: 0.3s;
    font-family: 'Segoe UI', sans-serif;
}

.card {
    background: var(--card);
    border-radius: 12px;
    border: none;
    box-shadow: 0 4px 20px rgba(0,0,0,0.05);
}

.form-control, .form-select {
    background: var(--input);
    color: var(--text);
    border: 1px solid #ccc;
}

.form-control:focus, .form-select:focus {
    border-color: #0d6efd;
    box-shadow: none;
}

.form-select option {
    color: black;
}

/* Dark mode dropdown fix */
body.dark .form-select option {
    color: black;
    background: white;
}

.toggle-btn {
    position: absolute;
    top: 20px;
    right: 20px;
}

.btn-primary {
    border-radius: 8px;
}
</style>
</head>

<body>

<!-- Dark Mode Toggle -->
<button class="btn btn-outline-secondary toggle-btn" onclick="toggleMode()">
    🌙 / ☀️
</button>

<div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;">

<div class="card p-4" style="width:420px;">

<h4 class="text-center mb-4">Edit Registration</h4>

<form method="POST">

<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control"
           value="<?= $row['name'] ?>" required>
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control"
           value="<?= $row['email'] ?>" required>
</div>

<div class="mb-3">
    <label>Phone</label>
    <input type="text" name="phone" class="form-control"
           value="<?= $row['phone'] ?>" required>
</div>

<div class="mb-3">
    <label>Gender</label><br>

    <input type="radio" name="gender" value="Male"
        <?= $row['gender']=="Male" ? "checked" : "" ?>> Male

    <input type="radio" name="gender" value="Female"
        <?= $row['gender']=="Female" ? "checked" : "" ?>> Female
</div>

<div class="mb-3">
<label>Event</label>

<select name="event" class="form-select" required>

    <optgroup label="Technical Events">
        <option <?= $row['event']=="Hackathon"?"selected":"" ?>>Hackathon</option>
        <option <?= $row['event']=="AI & Machine Learning Workshop"?"selected":"" ?>>AI & Machine Learning Workshop</option>
        <option <?= $row['event']=="Web Development Bootcamp"?"selected":"" ?>>Web Development Bootcamp</option>
        <option <?= $row['event']=="Cybersecurity Seminar"?"selected":"" ?>>Cybersecurity Seminar</option>
    </optgroup>

    <optgroup label="Educational Events">
        <option <?= $row['event']=="Career Guidance Seminar"?"selected":"" ?>>Career Guidance Seminar</option>
        <option <?= $row['event']=="Entrepreneurship Workshop"?"selected":"" ?>>Entrepreneurship Workshop</option>
        <option <?= $row['event']=="Research Paper Writing Session"?"selected":"" ?>>Research Paper Writing Session</option>
        <option <?= $row['event']=="Public Speaking Workshop"?"selected":"" ?>>Public Speaking Workshop</option>
    </optgroup>

    <optgroup label="Online Events">
        <option <?= $row['event']=="Webinar on Digital Marketing"?"selected":"" ?>>Webinar on Digital Marketing</option>
        <option <?= $row['event']=="Online Coding Contest"?"selected":"" ?>>Online Coding Contest</option>
        <option <?= $row['event']=="Virtual Networking Event"?"selected":"" ?>>Virtual Networking Event</option>
    </optgroup>

    <optgroup label="Fun & Cultural Events">
        <option <?= $row['event']=="Music Festival"?"selected":"" ?>>Music Festival</option>
        <option <?= $row['event']=="Art & Craft Workshop"?"selected":"" ?>>Art & Craft Workshop</option>
        <option <?= $row['event']=="Photography Contest"?"selected":"" ?>>Photography Contest</option>
        <option <?= $row['event']=="Gaming Tournament"?"selected":"" ?>>Gaming Tournament</option>
    </optgroup>

</select>
</div>

<button type="submit" name="update" class="btn btn-primary w-100">
    Update User
</button>

<a href="index.php" class="btn btn-outline-secondary w-100 mt-2">
    Back
</a>

</form>

</div>
</div>

<script>
// Toggle Dark Mode
function toggleMode() {
    document.body.classList.toggle("dark");
}
</script>

</body>
</html>
```
