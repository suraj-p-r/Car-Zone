<?php session_start() ?>

<html>
    <head>
        <title>Login</title>
    </head>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-image: url("../images/car category.webp") ;            
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
    <body>
        <?php include '../index_nav.php'; ?><br><br>
        <center>
        <form method="POST" action="">
            <h2>Login Form</h2>
            <input type="text" name="username"placeholder="Username"><br><br>
            <input type="password" name="password" placeholder="Password"><br><br>
            <input type="submit" name="submit"><br><br>
            <input type="reset" value="Clear"><br><br>
            <input type="submit" name="forgot_password" value="Forgot Password"><br><br>
            <input type="submit" name="registration" value="Create Account"><br><br><br><br><br><br><br><br>
        </form>
        </center><br><br>
        
<?php
    if(isset($_POST['submit']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        require '../connection.php';
        $query="select * from customer";
        $result=mysqli_query($con,$query) or die("<script>alert('Selection Query Failed...')</script>".mysqli_error($con));
        while($row=mysqli_fetch_array($result))
        {
            $user=$row['username'];
            $pass=$row['password'];
            if($user==$username && $pass==$password)
            {
                $_SESSION['userid']=$row['userid'];
                $_SESSION['username']=$row['username'];
                $_SESSION['name']=$row['name'];
                header('Location: user_home.php');
                exit(0);
            }
            else
            {
                $flag=1;
            }
        }
        if($flag == 1)
        {
            echo '<script>alert("Invalid Username or Password")</script>';
         }
        mysqli_close($con);
    }

    if(isset($_POST['forgot_password']))
    {
        header("Location: forgot_password.php");
    }

    if(isset($_POST['registration']))
    {
        header("Location: registration.php");
    }
?>
    <?php include '../footer.php'; ?>
    </body>
</html>