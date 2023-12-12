<html>
    <head>
        <title>Forgot Password</title>
    </head>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-image: url("../admin/admin_images/ben.jpg");
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
        
        input[type="number"]
        {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
    <body>
    <?php include '../index_nav.php'; ?>
        <center>
        <div id="info"class="container">
        <form method="POST" action="">
            <h2 id="head">Forgot Password</h2><br>
            <h3>Password Reset</h3>
            <input type="text" name="username" placeholder="Username"><br><br>
            <input type="number" name="phone" placeholder="Phone No"><br><br>
            <input type="text" name="password" placeholder="New Password"><br><br>
            <input type="text" name="repassword" placeholder="Re-enter Password"><br><br>
            <input type="submit" name="submit" value="Change Password"><br><br>
            <input type="reset" name="reset" value="Clear">
            </div>
        </form>
        </center>
    
<?php
    if(isset($_POST['submit']))
    {
        $username=$_POST['username'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];
        $repassword=$_POST['repassword'];
        include '../connection.php'; 
        if($password==$repassword)
        {
            $flag=0;
            $select="select username,phone from customer";
            $res=mysqli_query($con,$select) or die("<script>alert('Selection Query Failed...')</script>".mysqli_error($con));
            while($row=mysqli_fetch_array($res))
            {
                $user=$row['username'];
                $ph=$row['phone'];
                if($user==$username && $ph==$phone)
                {
                    $query="update customer set password='$password' where username='$username'";
                    $result=mysqli_query($con,$query) or die("<script>alert('Updation Query Failed...')</script>".mysqli_error($con));
                    if($result)
                    {
                        echo '<script>alert("Password Changed Successfull")</script>';
                    }
                    $flag=1;   
                }
            }
            if($flag==0)
            {
                echo '<script>alert("Username & Phone does not match")</script>';
            }
            mysqli_close($con);
        }
        else
        {
            echo '<script>alert("Invalid Password")</script>';
        }
    }

    if(isset($_POST['back']))
    {
        header('Location:login.php');
    }

    include '../footer.php';
?>

</body>
</html>