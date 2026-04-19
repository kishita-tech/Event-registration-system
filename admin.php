<?php
$conn = mysqli_connect("localhost", "root", "", "event_sys");

// DELETE LOGIC
if(isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM registrations WHERE id=$id");
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM registrations");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Registered Users</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: linear-gradient(135deg, #667eea, #764ba2);
    min-height: 100vh;
    font-family: 'Segoe UI', sans-serif;
}

/* CARD */
.glass-card {
    background: rgba(255, 255, 255, 0.10);
    backdrop-filter: blur(18px);
    border-radius: 20px;
    padding: 25px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.25);
    animation: fadeInUp 0.8s ease;
}

/* TITLE */
h3 {
    font-weight: 700;
    color: #fff;
    text-align: center;
    margin-bottom: 20px;
}

/* TABLE FIX (IMPORTANT) */
.table {
    border-radius: 12px;
    overflow: hidden;
}

.table thead {
    background: linear-gradient(45deg, #0d6efd, #6610f2);
    color: white;
    text-transform: uppercase;
}

.table tbody tr {
    background: #ffffff;
    color: #212529;
    transition: 0.3s;
}

.table tbody tr:hover {
    background: #f8f9fa;
    transform: scale(1.01);
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}

/* PILLS */
.pill {
    padding: 6px 14px;
    border-radius: 50px;
    font-size: 12px;
    display: inline-block;
}

/* Gender */
.male { background:#d0ebff; color:#0d6efd; }
.female { background:#ffe0eb; color:#d63384; }

/* EVENT FIXED (VISIBLE NOW) */
.event-tech {
    background: linear-gradient(45deg, #00e5ff, #00bcd4);
    color: #000;
    font-weight: 500;
}

.event-cultural {
    background: linear-gradient(45deg, #ffd54f, #ffb300);
    color: #000;
    font-weight: 500;
}

.event-sports {
    background: linear-gradient(45deg, #69f0ae, #00c853);
    color: #000;
    font-weight: 500;
}

.event-default {
    background: #6c757d;
    color: #fff;
}

/* BUTTONS */
.btn-action {
    padding: 5px 12px;
    font-size: 12px;
    border-radius: 8px;
    transition: 0.3s;
}

.btn-action:hover {
    transform: translateY(-2px);
}

.btn-warning:hover { background:#ff9800; color:#fff; }
.btn-danger:hover { background:#e53935; color:#fff; }

/* ANIMATION */
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(40px); }
    to { opacity: 1; transform: translateY(0); }
}

tbody tr {
    animation: fadeInUp 0.5s ease forwards;
}
</style>
</head>

<body>

<div class="container py-5">
    <div class="glass-card">

        <h3>✨ Registered Users Dashboard</h3>

        <div class="table-responsive">
            <table class="table table-hover text-center align-middle">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Event</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><strong><?= $row['name'] ?></strong></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['phone'] ?></td>

                        <!-- Gender -->
                        <td>
                            <?php if($row['gender']=="Male") { ?>
                                <span class="pill male">Male</span>
                            <?php } else { ?>
                                <span class="pill female">Female</span>
                            <?php } ?>
                        </td>

                        <!-- EVENT FIXED DISPLAY -->
                        <td>
                            <?php
                                $event = strtolower($row['event']);

                                if(strpos($event,'tech')!==false) $class="event-tech";
                                elseif(strpos($event,'cultural')!==false) $class="event-cultural";
                                elseif(strpos($event,'sport')!==false) $class="event-sports";
                                else $class="event-default";
                            ?>
                            <span class="pill <?= $class ?>">
                                <?= $row['event'] ?>
                            </span>
                        </td>

                        <!-- Actions -->
                        <td>
                            <a href="edit.php?id=<?= $row['id'] ?>" 
                               class="btn btn-warning btn-sm btn-action">
                               Edit
                            </a>

                            <a href="?delete=<?= $row['id'] ?>" 
                               class="btn btn-danger btn-sm btn-action"
                               onclick="return confirm('Delete this user?')">
                               Delete
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>

            </table>
        </div>

    </div>
</div>

</body>
</html>
