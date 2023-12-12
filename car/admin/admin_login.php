<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-image: url("admin_images/jimny.jpg");
            margin: 0;
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
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
    <?php include '../index_nav.php'; ?>
    <div class="center">
        <form method="POST" action="">
            <h2>Admin Form</h2>
            <input type="text" name="admin_name" placeholder="Admin Name"><br><br>
            <input type="password" name="password" placeholder="Password"><br><br>
            <input type="submit" name="submit"><br><br><br>
            <input type="reset" value="Clear">
        </form>
    </div> 

    <?php

    if(isset($_POST['submit']))
    {
        $admin_name=$_POST['admin_name'];
        $password=$_POST['password'];
        include '../connection.php';
        $query="select admin_name,password from admin";
        $result=mysqli_query($con,$query) or die("<script>alert('Selection Query Failed...')</script>".mysqli_error($con));
        while($row=mysqli_fetch_array($result))
        {
            $admin=$row['admin_name'];
            $pass=$row['password'];
            if($admin==$admin_name && $pass==$password)
            {
                header('Location: admin_home.php');
                exit(0);
            }
            else
            {
                $flag=1;
            }
        }
        if($flag == 1)
        {
            echo '<script>alert("Unauthorised Person.[Access only for Admin]")</script>';
        }
        mysqli_close($con);
    }
    ?>
    <?php include '../footer.php'; ?>
</body>
</html>