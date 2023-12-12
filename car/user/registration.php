<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-image: url("../admin/admin_images/Audi.jpg") ;            
            margin: 0;
        }

        form {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        input[type="text"],
        input[type="password"],
        input[type="tel"],
        input[type="email"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"],
        input[type="reset"] {
            width: 100%;
            background-color: blueviolet;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: tomato;
        }
    </style>
</head>

<body>
    <?php include '../index_nav.php'; ?><br><br>
    <center>
    <form method="POST" action="">
        <h2>Registration Form</h2>
        <input type="text" name="name" placeholder="Name" required><br><br>
        <input type="text" name="address" placeholder="Address" required><br><br>
        <input type="tel" id="phone" name="phone" placeholder="Phone Number" pattern="[6-9]{1}[0-9]{9}" title="Enter a valid Indian Mobile Number having 10 digits [start with 6-9]" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        Gender : <input type="radio" name="gender" value="Male"> Male
               <input type="radio" name="gender" value="Female"> Female <br><br>
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="password" name="repassword" placeholder="Re-enter Password" required><br><br>
        <input type="submit" name="submit"><br><br>
        <input type="reset" value="Clear">
    </form>
    </center><br><br>
   
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    if ($password == $repassword) {
        require '../connection.php';

        // Use prepared statements to prevent SQL injection
        $query = "INSERT INTO customer(name, address, phone, email, gender, username, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $query);

        if ($stmt) {
            // Bind parameters to the prepared statement
            mysqli_stmt_bind_param($stmt, "sssssss", $name, $address, $phone, $email, $gender, $username, $password);

            // Execute the prepared statement
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                echo '<script>alert("Registration Successful")</script>';
            } else {
                echo '<script>alert("Registration Failed")</script>';
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            echo '<script>alert("Prepared Statement Error")</script>';
        }

        // Close the connection
        mysqli_close($con);
    } else {
        echo '<script>alert("Invalid Password")</script>';
    }
}
?>
 <?php include '../footer.php'; ?>
</body>
</html>
