<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection
    $conn = new mysqli("localhost", "root", "", "sarat_db");

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    // Form fields
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];

    // File Uploads
    $photo = $_FILES['photo']['name'];
    $adhar = $_FILES['adhar']['name'];

    $photo_tmp = $_FILES['photo']['tmp_name'];
    $adhar_tmp = $_FILES['adhar']['tmp_name'];

    $photo_folder = "uploads/photos/" . $photo;
    $adhar_folder = "uploads/adhar/" . $adhar;

    // Create folders if not exist
    if (!file_exists("uploads/photos")) {
        mkdir("uploads/photos", 0777, true);
    }
    if (!file_exists("uploads/adhar")) {
        mkdir("uploads/adhar", 0777, true);
    }

    // Move files
    move_uploaded_file($photo_tmp, $photo_folder);
    move_uploaded_file($adhar_tmp, $adhar_folder);

    // Insert into database
    $sql = "INSERT INTO markam (name, email, phone, dob, gender, photo, adhar) 
            VALUES ('$name', '$email', '$phone', '$dob', '$gender', '$photo', '$adhar')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='success'>✅ Student Registered Successfully!</div>";
    } else {
        echo "<div class='error'>❌ Error: " . $conn->error . "</div>";
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            margin: 0;
            padding: 0;
        }
        .form-container {
            width: 400px;
            margin: 50px auto;
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.2);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
            color: #444;
        }
        input[type="text"], input[type="email"], input[type="date"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
            outline: none;
        }
        input[type="radio"] {
            margin: 0 6px;
        }
        .btn {
            margin-top: 15px;
            width: 100%;
            padding: 12px;
            background: #4facfe;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .btn:hover {
            background: #00c6ff;
        }
        .success, .error {
            margin: 20px auto;
            width: 400px;
            padding: 12px;
            text-align: center;
            border-radius: 8px;
        }
        .success {
            background: #d4edda;
            color: #155724;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
<nav><a href="home.html">Back</a></nav>

    <div class="form-container">
        <h2>Student Registration</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <label>Full Name:</label>
            <input type="text" name="name" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Phone:</label>
            <input type="text" name="phone" required>

            <label>Date of Birth:</label>
            <input type="date" name="dob" required>

            <label>Gender:</label>
            <input type="radio" name="gender" value="Male"> Male
            <input type="radio" name="gender" value="Female"> Female 

            <label>Upload Passport Photo:</label>
            <input type="file" name="photo" accept="image/*" required>

            <label>Upload Aadhaar Document:</label>
            <input type="file" name="adhar" accept=".pdf,.jpg,.png" required>

            <button type="submit" class="btn">Register</button>
        </form>
    </div>
<footer><p>&copy;saratgond96@gmail.com</p></footer>
</body>
</html>
