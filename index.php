<!DOCTYPE html>
<html>
<head>
    <title>Event Registration</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                        url('https://images.unsplash.com/photo-1505373877841-8d25f7d46678') no-repeat center/cover;
            height: 100vh;
        }

        .card {
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            color: white;
            animation: fadeIn 1s ease-in-out;
        }

        h2 {
            font-weight: 600;
        }

        label {
            font-size: 14px;
            margin-bottom: 5px;
        }

        .form-control, select {
            border-radius: 12px;
            background: rgba(255,255,255,0.2);
            border: none;
            color: white;
        }

        .form-control::placeholder {
            color: #ddd;
        }

        .form-control:focus {
            box-shadow: 0 0 10px #00c6ff;
            background: rgba(255,255,255,0.3);
        }

        .input-group-text {
            background: rgba(255,255,255,0.2);
            border: none;
            color: white;
        }

        .btn-primary {
            border-radius: 12px;
            background: linear-gradient(45deg, #00c6ff, #0072ff);
            border: none;
            transition: 0.3s;
            font-weight: 500;
        }

        .btn-primary:hover {
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 5px 15px rgba(0, 198, 255, 0.4);
        }

        .radio-group input {
            margin-left: 10px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

    </style>
</head>

<body>

<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    
    <div class="card p-4 shadow-lg" style="width: 420px;">

        <h2 class="text-center mb-4">✨ Event Registration</h2>

        <form action="register.php" method="POST">

            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
                <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
            </div>

            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>

            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="fa fa-phone"></i></span>
                <input type="text" name="phone" class="form-control" placeholder="Enter phone number" required>
            </div>

            <div class="mb-3 radio-group">
                <label>Gender</label><br>
                <input type="radio" name="gender" value="Male" required> Male
                <input type="radio" name="gender" value="Female"> Female
            </div>

            <div class="mb-3">
                <label>Select Event</label>
                <select name="event" class="form-control">
                    <optgroup label="Technical Events">
                        <option>Hackathon</option>
                        <option>AI & Machine Learning Workshop</option>
                        <option>Web Development Bootcamp</option>
                        <option>Cybersecurity Seminar</option>
                    </optgroup>
                    <optgroup label="Educational Events">
                        <option>Career Guidance Seminar</option>
                        <option>Entrepreneurship Workshop</option>
                        <option>Research Paper Writing Session</option>
                        <option>Public Speaking Workshop</option>
                    </optgroup>
                    <optgroup label="Online Events">
                        <option>Webinar on Digital Marketing</option>
                        <option>Online Coding Contest</option>
                        <option>Virtual Networking Event</option>
                    </optgroup>
                    <optgroup label="Fun & Cultural Events">
                        <option>Music Festival</option>
                        <option>Art & Craft Workshop</option>
                        <option>Photography Contest</option>
                        <option>Gaming Tournament</option>
                    </optgroup>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">🚀 Register Now</button>

        </form>

    </div>

</div>

</body>
</html>