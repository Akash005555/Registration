<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_registration";


$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM students ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h2 {
            background-color: #ff4d4d;
            color: white;
            padding: 10px;
            border-radius: 4px;
            margin: 0 -20px 20px -20px;
        }

        .info {
            background-color: #007bff;
            color: white;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            font-size: 16px;
            text-align: left;
        }

        .info strong {
            display: inline-block;
            width: 130px;
        }

        .button {
            margin-top: 20px;
        }

        .button a {
            text-decoration: none;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            display: inline-block;
        }

        .button a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($result->num_rows > 0): 
            $row = $result->fetch_assoc();
        ?>
            <h2>Registration Successful</h2>
            <div class="info">
                <strong>Full Name:</strong> <?php echo $row['fullname']; ?>
            </div>
            <div class="info">
                <strong>Student ID:</strong> <?php echo $row['studentid']; ?>
            </div>
            <div class="info">
                <strong>Gender:</strong> <?php echo ucfirst($row['gender']); ?>
            </div>
            <div class="info">
                <strong>Department:</strong> <?php echo $row['department']; ?>
            </div>
            <div class="info">
                <strong>Date of Birth:</strong> <?php echo $row['dob']; ?>
            </div>
            <div class="info">
                <strong>Email:</strong> <?php echo $row['email']; ?>
            </div>
            <div class="info">
                <strong>Contact:</strong> <?php echo $row['contact']; ?>
            </div>
            <div class="info">
                <strong>Address:</strong> <?php echo $row['address']; ?>
            </div>
            <div class="button">
                <a href="register.html">Go Back to Registration</a>
            </div>
        <?php else: ?>
            <h2>No Data Found</h2>
        <?php endif; ?>
    </div>
</body>
</html>

<?php

$conn->close();
?>
