<?php
$conn = mysqli_connect("localhost", "root", "", "event_sys");
$result = mysqli_query($conn, "SELECT * FROM registrations");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registered Users</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #e0eafc, #cfdef3);
            min-height: 100vh;
        }

        .card {
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: none;
        }

        .table thead {
            background: #0d6efd;
            color: white;
        }

        .table tbody tr {
            transition: 0.3s;
        }

        .table tbody tr:hover {
            background-color: #f0f6ff;
            transform: scale(1.01);
        }

        .title {
            font-weight: bold;
            letter-spacing: 1px;
        }

        .badge-custom {
            padding: 6px 10px;
            border-radius: 12px;
            font-size: 12px;
        }

        .email {
            color: #0d6efd;
            font-weight: 500;
        }
    </style>
</head>

<body>

<div class="container mt-5">

    <div class="card p-4">

        <h2 class="text-center title text-primary mb-4">
            🎉 Registered Users List
        </h2>

        <table class="table table-hover text-center align-middle">

            <thead>
                <tr>
                    <th># ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Event</th>
                </tr>
            </thead>

            <tbody>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><span class="badge bg-dark"><?= $row['id'] ?></span></td>

                    <td><strong><?= $row['name'] ?></strong></td>

                    <td class="email"><?= $row['email'] ?></td>

                    <td><?= $row['phone'] ?></td>

                    <td>
                        <?php if($row['gender'] == "Male") { ?>
                            <span class="badge bg-primary badge-custom">Male</span>
                        <?php } else { ?>
                            <span class="badge bg-danger badge-custom">Female</span>
                        <?php } ?>
                    </td>

                    <td>
                        <span class="badge bg-success badge-custom">
                            <?= $row['event'] ?>
                        </span>
                    </td>
                </tr>
            <?php } ?>
            </tbody>

        </table>

    </div>

</div>

</body>
</html>