<html>
    <head>
        <title>View Booking Details </title>
        <style>
            img
            {
                height: 500px;
                width: 500px;
            } 
        </style>
    </head>
    <body>
    <center>
        <?php include 'user_nav.php'; ?>
        <h2>Booking Details</h2>
        <form method="POST" action="">
            <?php
                if(isset($_GET['pro_id']))
                {
                    $pro_id=$_GET['pro_id'];
                    require '../connection.php';
                    $query = "select * from orders where p_id='$pro_id' order by o_id desc limit 1";
                    $result = mysqli_query($con, $query) or die("<script>alert('Selection Query Failed...')</script>" . mysqli_error($con));
                    $row = mysqli_fetch_assoc($result);
                    $o_id=$row['o_id'];
            ?>
                <table border="5">
                    <tr><th>User Name</th><td> <?php echo $row['c_name'] ?> </td></tr>
                    <tr>
                        <th>Product Name</th>
                        <td>
                            <?php 
                                $query1 = "select * from product where p_id='$pro_id'";
                                $result1 = mysqli_query($con, $query1) or die("<script>alert('Selection Query Failed...')</script>" . mysqli_error($con));
                                $row1 = mysqli_fetch_array($result1);
                                echo $row1['name'];
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Product Image</th>
                        <td>
                            <?php 
                                echo "<img src='../admin/admin_images/" . $row1["image"] . "'"; 
                            ?>
                        </td>
                    </tr>
                    <tr><th>Pick Up Date</th><td> <?php echo $row['pickup_date'] ?> </td></tr>
                    <tr><th>Pick Up Time</th><td> <?php echo $row['pickup_time'] ?> </td></tr>
                    <tr><th>Return Date</th><td> <?php echo $row['return_date'] ?> </td></tr>
                    <tr><th>Return Time</th><td> <?php echo $row['return_time'] ?> </td></tr>
                    <tr><th>Customer Name</th><td> <?php echo $row['name'] ?> </td></tr>
                    <tr><th>Customer Address</th><td> <?php echo $row['address'] ?> </td></tr>
                    <tr><th>Phone Number</th><td> <?php echo $row['phone'] ?> </td></tr>
                    <tr><th>Customer Email</th><td> <?php echo $row['email'] ?> </td></tr>
                    <tr><th>Quantity</th><td> <?php echo $row['quantity'] ?> </td></tr>
                    <tr><th>Driving Licence</th><td> <img src='./user_images/<?php echo $row["licence"] ?>' alt="image"> </td></tr>
                    <tr><th>Total Time</th>
                        <td>
                            <?php                      
                                echo $row['total_days'].'days ';
                                echo $row['total_hours'].'hours';
                            ?>
                        </td>
                    </tr>

                    <tr><th>Total Price</th>
                        <td>
                            <?php 
                               echo $row['total_price'];
                            ?>
                        </td>
                    </tr>

                    <tr><th>Order Date</th><td> <?php echo $row['order_date'] ?> </td></tr>
                    <tr><th>Order Status</th><td> <?php echo $row['order_status'] ?> </td></tr>

                </table><br>
                <button><a href="payment.php?ord_id=<?php echo $o_id ?>">Book Now</a></button>

            <?php
                }
            ?>
        </form>
    </center>
    </body>
</html>