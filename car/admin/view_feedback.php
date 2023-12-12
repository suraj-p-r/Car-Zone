<!DOCTYPE html>
<html>
    <head>
        <title>View Feedback</title>
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

        img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
    <body>
        <?php include 'admin_nav.php'; ?>
        <center>
            <h2>View Feedback</h2>
            <?php
                require '../connection.php';

                // Feedback of the particular order.
                if(isset($_GET['o_id']))
                {
                    $o_id=$_GET['o_id'];
                    $query = "select * from feedback where o_id='$o_id'";
                    $result = mysqli_query($con, $query) or die("<script>alert('Selection Query Failed...')</script>" . mysqli_error($con));
                    echo "<table border=5>";
                    echo "<tr><th>Feedback ID</th><th>Order ID</th><th>Username</th><th>Product Name</th><th>Product Image</th><th>Feedback</th></tr>";
                    
                    while($row = mysqli_fetch_array($result))
                    {
                    $userid=$row['userid'];
                    $p_id=$row['p_id'];
            ?>
                    <tr>
                        <td><?php echo $row['f_id'] ?></td>
                        <td><?php echo $row['o_id'] ?></td>
                        <td>
                            <?php
                                $query1 = "select * from customer where userid='$userid'";
                                $result1 = mysqli_query($con, $query1) or die("<script>alert('Selection Query Failed...')</script>" . mysqli_error($con));
                                $row1 = mysqli_fetch_array($result1);
                                $username=$row1['username'];

                                echo $username;
                            ?>
                        </td>
                        <td>
                            <?php
                                $query2 = "select * from product where p_id='$p_id'";
                                $result2 = mysqli_query($con, $query2) or die("<script>alert('Selection Query Failed...')</script>" . mysqli_error($con));
                                $row2 = mysqli_fetch_array($result2);

                                $p_name=$row2['name'];
                                $p_image=$row2['image'];

                                echo $p_name;
                            ?>
                        </td>
                        <td><img src="./admin_images/<?php echo $p_image ?>" alt="<?php echo $p_name ?>"></td>
                        <td><?php echo $row['message'] ?></td>
            <?php 
                    } 
                    echo "</tr>";

                    echo "</table>";
                }
                else
                {
                // Till here the feedback of that particular will be displayed.

                $query = "select * from feedback order by f_id desc";
                $result = mysqli_query($con, $query) or die("<script>alert('Selection Query Failed...')</script>" . mysqli_error($con));
                echo "<table border=5>";
                    echo "<tr><th>Feedback ID</th><th>Order ID</th><th>Username</th><th>Product Name</th><th>Product Image</th><th>Feedback</th></tr>";
                    
                while ($row = mysqli_fetch_array($result))
                {
                    $o_id=$row['o_id'];
                    $userid=$row['userid'];
                    $p_id=$row['p_id'];
            ?>
                <tr>
                        <td><?php echo $row['f_id'] ?></td>
                        <td><?php echo $row['o_id'] ?></td>
                        <td>
                            <?php
                                $query1 = "select * from customer where userid='$userid'";
                                $result1 = mysqli_query($con, $query1) or die("<script>alert('Selection Query Failed...')</script>" . mysqli_error($con));
                                $row1 = mysqli_fetch_array($result1);

                                $username=$row1['username'];

                                echo $username;
                            ?>
                        </td>
                        <td>
                            <?php
                                $query2 = "select * from product where p_id='$p_id'";
                                $result2 = mysqli_query($con, $query2) or die("<script>alert('Selection Query Failed...')</script>" . mysqli_error($con));
                                $row2 = mysqli_fetch_array($result2);

                                $p_name=$row2['name'];
                                $p_image=$row2['image'];

                                echo $p_name;
                            ?>
                        </td>
                        <td><img src="./admin_images/<?php echo $p_image ?>" alt="<?php echo $p_name ?>"></td>
                        <td><?php echo $row['message'] ?></td>
            <?php
                }
                echo "</tr>";

                    echo "</table>";
            }
                mysqli_close($con);
            ?>
        </center>
    </body>
</html>
