<html>
    <head>
        <title>Feedback</title>
    </head>
    <body>
        <center>
            <?php include 'user_nav.php'; ?>
            <form action="" method="POST">
                <h2>Feedback</h2>
                Enter Your Feedback on the product purchased : <textarea name="message" id="" cols="30" rows="10" required></textarea><br><br><br>
                <input type="submit" name="submit">
                <input type="reset" value="Clear"><br><br><br>
            </form>
            <?php
                session_start();
                require '../connection.php';
                if(isset($_GET['o_id']))
                {
                    $o_id=$_GET['o_id'];
                
                    $query = "select * from orders where o_id='$o_id'";
                    $result = mysqli_query($con, $query) or die("<script>alert('Selection Query Failed...')</script>" . mysqli_error($con));
                    $row = mysqli_fetch_assoc($result);
                    $p_id=$row['p_id'];

                    $userid=$_SESSION['userid'];
                    $username=$_SESSION['username'];

                    if(isset($_POST['submit']))
                    {
                        $message = $_POST['message'];
                                                   
                        $query1="insert into feedback(o_id,p_id,userid,username,message) values ('$o_id','$p_id','$userid','$username','$message')";
                        $result1=mysqli_query($con,$query1) or die("<script>alert('Insertion Query Failed...')</script>".mysqli_error($con));
                        if($result1)
                        {
                            echo '<script>alert("Feedback has been sent Successfully.")</script>';
                        }        
                    }        
                    mysqli_close($con);                
                }
            ?>
        </center>
    </body>
</html>

