<html>
    <head>
        <title>Help</title>
    </head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        center {
            margin-top: 20px;
        }

        h2 {
            color: #333;
        }

        form {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 50%;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"], input[type="reset"] {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #2980b9;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
    <body>
        <center>
            <?php include 'user_nav.php'; ?>
            <form action="" method="POST">
                <h2>HELP FORM</h2>
                Message : <textarea name="message" id="" cols="30" rows="10"></textarea><br><br><br>
                <input type="submit" name="submit">
                <input type="reset" value="Clear"><br><br><br>
                <input type="submit" name="Reply" value="Replies">
            </form>
            <?php
                session_start();
                require '../connection.php';

                // Check if the userid session variable is set
                if(isset($_SESSION['userid']))
                {
                    if(isset($_POST['submit']))
                    {
                        $message = $_POST['message'];
                        
                        // Use prepared statements to prevent SQL injection
                        $id=$_SESSION['userid'];
                        $query = "SELECT * FROM customer WHERE userid = $id";
                        $result = mysqli_query($con, $query) or die("<script>alert('Selection Query Failed...')</script>".mysqli_error($con));

                        // Fetch the data
                        while($row = mysqli_fetch_array($result))
                        {
                            $id = $row['userid'];
                            $name = $row['username'];
                        }
                        
                        $query="insert into help(userid,username,message,reply) values ('$id','$name','$message','NULL')";
                        $result=mysqli_query($con,$query) or die("<script>alert('Insertion Query Failed...')</script>".mysqli_error($con));
                        if($result)
                        {
                                echo '<script>alert("Message has been sent Successfully to the Admin.")</script>';
                        }
                    }
                    
                    if(isset($_POST['Reply']))
                    {
                        $userid=$_SESSION['userid'];
                        $query = "select * from help where userid='$userid'";
                        $result = mysqli_query($con, $query) or die("<script>alert('Selection Query Failed...')</script>" . mysqli_error($con));

                        echo "<table border=5 cellpadding=10>";
                        echo "<tr><th>Message</th><th>Reply</th></tr>";
                        while ($row = mysqli_fetch_assoc($result))
                        {
                            echo "<tr>";
                                echo "<td>" . $row['message'] . "</td>";
                                echo "<td>" . $row['reply'] . "</td>";
                            echo "</tr>";
                        } 
                        echo "</table>";
                    }    
                }
                else
                {
                    // Handle the case where $_SESSION['userid'] is not set
                    echo "<script>
                    if(window.confirm('Login to continue.'))
                    {
                        window.open('user_login.php', '_self');
                    }
                  </script> ";
                }

                mysqli_close($con);                
            ?>
        </center>
        <?php include '../footer.php'; ?>
    </body>
</html>






