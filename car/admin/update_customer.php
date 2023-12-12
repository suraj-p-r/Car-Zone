<!DOCTYPE html>
<html>
    <head>
        <title>Update Customer</title>
        <style>
            body {
                font-family: Arial, sans-serif;
            }

            center {
                text-align: center;
                margin-top: 20px;
            }

            h1 {
                color: #333; /* Change the color to your preference */
            }

            table {
                border-collapse: collapse;
                width: 50%;
                margin-top: 20px;
            }

            th, td {
                border: 1px solid #ddd;
                padding: 15px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2; /* Change the color to your preference */
            }

            form {
                margin-top: 20px;
            }

            input[type="text"],
            input[type="number"],
            input[type="email"] {
                padding: 8px;
                width: 200px;
            }

            input[type="submit"] {
                padding: 10px;
                background-color: #3366cc; /* Change the color to your preference */
                color: white;
                border: none;
                cursor: pointer;
                margin-right: 10px;
            }

            input[type="submit"]:hover {
                background-color: #254179; /* Change the color to your preference */
            }

            input[type="radio"] {
                margin-right: 5px;
            }
        </style>
    </head>
    <body>
        <?php include 'admin_nav.php'; ?>
        <center>
            <h2>Update Customer</h2>

            <?php
                require "../connection.php";
                if(isset($_GET["user_id"]))
                {
                    $user_id=$_GET['user_id'];
                    $query= "select * from customer where userid='$user_id'";
                    $result=mysqli_query($con,$query) or die("<script>alert('Selection Query Failed...')</script>".mysqli_error($con));

                    echo "<table>";
                        echo "<tr><th>Customer ID</th><th>Customer Name</th><th>Customer Address</th><th>Customer Phone</th><th>Customer Email</th><th>Customer Gender</th><th>Customer Username</th></tr>";  
                        while($row = mysqli_fetch_array($result))
                        {
                            echo "<tr>";
                                echo "<td>" .$row['userid']. "</td>";
                                echo "<td>" .$row['name']. "</td>"; 
                                echo "<td>" .$row['address']. "</td>";
                                echo "<td>" .$row['phone']. "</td>";
                                echo "<td>" .$row['email']. "</td>";
                                echo "<td>" .$row['gender']. "</td>";
                                echo "<td>" .$row['username']. "</td>";
                            echo "</tr>";
                        }    
                    echo "</table><br><br>";
            ?>
                
            <form method="POST" action=""> 
                <table>
                    <tr>
                        <td>Update Name : </td>
                        <td><input type='text' name='name'></td>
                    </tr>
                    <tr>
                        <td>Update Address : </td>
                        <td><input type='text' name='address'></td>
                    </tr>
                    <tr>
                        <td>Update Phone : </td>
                        <td><input type='number' name='phone'></td>
                    </tr>
                    <tr>
                        <td>Update Email : </td>
                        <td><input type='email' name='email'></td>
                    </tr>
                    <tr>
                        <td>Update Gender : </td>
                        <td>
                            <input type="radio" name="gender" value="Male"> Male
                            <input type="radio" name="gender" value="Female"> Female
                        </td>
                    </tr>
                    <tr>
                        <td>Update Username : </td>
                        <td><input type='text' name='username'></td>
                    </tr>
                    <tr>
                        <td><input type='submit' name='submit'></td>
                    </tr>
                </table>
            </form>

            <?php
                if(isset($_POST['submit']))
                {
                    $name=$_POST['name'];
                    $address=$_POST['address'];
                    $phone=$_POST['phone'];
                    $email=$_POST['email'];
                    $gender=$_POST['gender'];
                    $username=$_POST['username'];
                    $query="update customer set name='$name',address='$address',phone='$phone',email='$email',gender='$gender',username='$username' where userid='$user_id'";
                    $result=mysqli_query($con,$query) or die("<script>alert('Updation Query Failed...')</script>".mysqli_error($con));
            
                    echo "<h1>Updated Category</h1>";
                    $query="select * from customer where userid='$user_id'";
                    $result=mysqli_query($con,$query) or die("<script>alert('Selection Query Failed...')</script>".mysqli_error($con));

                    echo "<table>";
                    echo "<tr><th>Customer ID</th><th>Customer Name</th><th>Customer Address</th><th>Customer Phone</th><th>Customer Email</th><th>Customer Gender</th><th>Customer Username</th></tr>";  
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                            echo "<td>" .$row['userid']. "</td>";
                            echo "<td>" .$row['name']. "</td>";
                            echo "<td>" .$row['address']. "</td>";
                            echo "<td>" .$row['phone']. "</td>";
                            echo "<td>" .$row['email']. "</td>";
                            echo "<td>" .$row['gender']. "</td>";
                            echo "<td>" .$row['username']. "</td>";
                        echo "</tr>";
                    }    
                    echo "</table>";
                }

                mysqli_close($con);
            ?>

            <?php
                }
            ?>
        </center>
    </body>
</html>
