<html>
    <head>
        <title>View Orders</title>
    </head>
    <body>
  
    </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
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
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: violet;
            color: white;
        }

        td img {
            height: 80px;
            width: 80px;
            object-fit: cover;
        }

        td a {
            display: inline-block;
            padding: 5px 10px;
            text-decoration: none;
            color: #fff;
            background-color: black;
            border-radius: 5px;
            margin-right: 5px;
        }

        td a:hover {
            background-color: #2980b9;
        }

        input[type="submit"] {
            display: block;
            margin: 5px 0;
            padding: 8px;
            text-align: center;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            border: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        header
        {
            width: 142%;
        }
        nav
        {
            width: 142%;
        }
    </style>
</head>
<body>
<?php include 'admin_nav.php'; ?>
    <center>
        <h2>View Orders</h2>
            <?php
                require '../connection.php';
                if(isset($_GET['o_id']) && isset($_GET['action']))
                {
                    $ord_id=$_GET['o_id'];
                    $action=$_GET['action'];

                    if($action == 'confirm')
                    {
                        $query1 = "update orders set order_status='$action' where o_id='$ord_id'";
                        $result1 = mysqli_query($con, $query1) or die("<script>alert('Updation Query Failed...')</script>" . mysqli_error($con));
                        if($result1)
                        {
                            $query5="select * from orders where o_id='$ord_id'";
                            $result5 = mysqli_query($con, $query5) or die("<script>alert('Insertion Query Failed...')</script>" . mysqli_error($con));
                            $row5=mysqli_fetch_array($result5);
                            $p_id=$row5['p_id'];       
                            $quantity=$row5['quantity'];       

                            //reducing the stock count
                            $query3="select * from product where p_id='$p_id'";
                            $result3 = mysqli_query($con, $query3) or die("<script>alert('Insertion Query Failed...')</script>" . mysqli_error($con));
                            $row3=mysqli_fetch_array($result3);
                            $stock=$row3['stock'];
                            $stock=$stock-$quantity;
                            $query4 = "update product set stock='$stock' where p_id='$p_id'";
                            $result4 = mysqli_query($con, $query4) or die("<script>alert('Insertion Query Failed...')</script>" . mysqli_error($con));

                            echo "<script>alert('Order $ord_id Confirmed Successfully')</script>";
                        }
                        else
                        {
                            echo "<script>alert('Error in updating Order $ord_id status')</script>";
                        }
                    }

                    if($action == 'decline')
                    {
                        $query1 = "update orders set order_status='$action' where o_id='$ord_id'";
                        $result1 = mysqli_query($con, $query1) or die("<script>alert('Updation Query Failed...')</script>" . mysqli_error($con));
                        if($result1)
                        {
                            echo "<script>alert('Order $ord_id Declined Successfully')</script>";
                        }
                        else
                        {
                            echo "<script>alert('Error in updating Order $ord_id status')</script>";
                        }
                    }
                }

                $query = "select * from orders order by o_id desc";
                $result = mysqli_query($con, $query) or die("<script>alert('Selection Query Failed...')</script>" . mysqli_error($con));
                echo "<table border='5'>"; 
                echo"<tr><th>Order ID</th><th>User ID</th><th>User Name</th><th>Product Name</th><th>Product Image</th><th>Pick Up Date</th><th>Pick Up Time</th><th>Return Date</th><th>Return Time</th><th>Customer Name</th><th>Customer Address</th><th>Phone Number</th><th>Customer Email</th><th>Quantity</th><th>Driving Licence</th><th>Total Time</th><th>Total Price</th><th>Payment ID</th><th>Payment Method</th><th>Feedback</th><th>Order Date</th><th>Order Status</th><th>Con/Dec</th></tr>";
                
                while($row = mysqli_fetch_assoc($result))
                {
                    $o_id=$row['o_id'];                         
            ?>                
                <tr>
                    <td> <?php echo $row['o_id'] ?> </td>
                    <td> <?php echo $row['userid'] ?> </td>
                    <td> <?php echo $row['c_name'] ?> </td>
                    <td>
                            <?php 
                                echo $row['p_name'];
                            ?>
                    </td>
                    <td>
                            <?php 
                                echo "<img src='../admin/admin_images/" . $row["p_image"] . "'"; 
                            ?>
                    </td>
                    <td> <?php echo $row['pickup_date'] ?> </td>
                    <td> <?php echo $row['pickup_time'] ?> </td>
                    <td> <?php echo $row['return_date'] ?> </td>
                    <td> <?php echo $row['return_time'] ?> </td>
                    <td> <?php echo $row['name'] ?> </td>
                    <td> <?php echo $row['address'] ?> </td>
                    <td> <?php echo $row['phone'] ?> </td>
                    <td> <?php echo $row['email'] ?> </td>
                    <td> <?php echo $row['quantity'] ?> </td>
                    <td> <img src='../user/user_images/<?php echo $row["licence"] ?>' alt="image"> </td>
                    <td>
                            <?php                      
                                echo $row['total_days'].'days ';
                                echo $row['total_hours'].'hours';
                            ?>
                    </td>
                    <td>
                            <?php 
                               echo $row['total_price'];
                            ?>
                    </td>
                    <td>
    
                        <?php 
                            $query2 = "select * from payment where o_id='$o_id'";
                            $result2 = mysqli_query($con, $query2) or die("<script>alert('Selection Query Failed...')</script>" . mysqli_error($con));
                            $row2 = mysqli_fetch_assoc($result2);
                            if($row2!=NULL)
                            {
                                echo $row2['pay_id'];
                            }
                            else
                            {
                                echo "N/A";
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            if($row2!=NULL)
                            {
                                echo $row2['payment_method'];
                            }
                            else
                            {
                                echo "N/A";
                            }
                        ?>
                    </td>
                    <td><a href="view_feedback.php?o_id=<?php echo $o_id ?>">Feedbacks</a></td>
                    <td> <?php echo $row['order_date'] ?> </td>
                    <td> <?php echo $row['order_status'] ?> </td>
                    <td>
                        <a href="view_orders.php?o_id=<?php echo $row['o_id'] ?> & action=confirm"><input type="submit" name="confirm" value="Confirm"></a><br><br>
                        <a href="view_orders.php?o_id=<?php echo $row['o_id'] ?> & action=decline"><input type="submit" name="decline" value="Decline"></a><br><br>
                    </td>
                    
                </tr>
            <?php
                }
                echo "</table><br>";
            ?>
    </center>
</body>
</html>
