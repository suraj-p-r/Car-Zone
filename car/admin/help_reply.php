<!DOCTYPE html>
<html>
    <head>
        <title>Help Reply</title>
    </head>
    <body>
        <?php include 'admin_nav.php'; ?>
        <center>
            <h2>Help Reply</h2>

            <?php
                require "../connection.php";
                if(isset($_GET["he_id"]))
                {
                    $he_id=$_GET['he_id'];
                    $query= "select * from help where h_id='$he_id'";
                    $result=mysqli_query($con,$query) or die("<script>alert('Selection Query Failed...')</script>".mysqli_error($con));

                    echo "<table border=5 cellpadding=10>";
                        echo "<tr><th>Customer ID</th><th>Customer Username</th><th>Customer Message</th</tr>";  
                        while($row = mysqli_fetch_array($result))
                        {
                            echo "<tr>";
                                echo "<td>" .$row['userid']. "</td>";
                                echo "<td>" .$row['username']. "</td>"; 
                                echo "<td>" .$row['message']. "</td>";
                            echo "</tr>";
                        }    
                    echo "</table><br><br>";
            ?>
                
            <form method="POST" action=""> 
                Reply : <textarea name="reply" id="" cols="30" rows="10"></textarea><br><br><br>
                <input type="submit" name="submit">
                <input type="reset" value="Clear"><br><br><br>
            </form>

            <?php
                if(isset($_POST['submit']))
                {
                    
                    $reply=$_POST['reply'];

                    $query="update help set reply='$reply' where h_id='$he_id'";
                    $result=mysqli_query($con,$query) or die("<script>alert('Updation Query Failed...')</script>".mysqli_error($con));
                    if($result)
                    {
                        echo '<script>alert("Reply sent successfully to the customer.")</script>';
                    }

                    mysqli_close($con);
                }
            ?>

            <?php
                }
            ?>
        </center>
    </body>
</html>
