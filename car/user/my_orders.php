<!DOCTYPE html>
<html>
<head>
    <title>My Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
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
            background-color: brown;
            color: white;
        }

        img {
            height: 100px;
            width: 100px;
        }

        a {
            text-decoration: none;
            color: blue;
        }

        a:hover {
            color: darkblue;
        }

        center {
            margin-top: 20px;
        }
        header
        {
            width: 125%;
        }
        nav
        {
            width: 125%;
        }
    </style>
</head>
<body>
    <?php include 'user_nav.php'; ?>
    <center>
        <h2>My Orders</h2>
        <form method="POST" action="">
            <?php
                require '../connection.php';
                session_start();
                if ($_SESSION) {
                    $userid = $_SESSION['userid'];
                    $query = "select * from orders where userid='$userid' order by o_id desc";
                    $result = mysqli_query($con, $query) or die("<script>alert('Selection Query Failed...')</script>" . mysqli_error($con));
                    echo "<table border=5>";
                    echo "<tr><th>Order ID</th><th>Product Name</th><th>Product Image</th><th>Pick Up Date</th><th>Pick Up Time</th><th>Return Date</th><th>Return Time</th><th>Customer Name</th><th>Customer Address</th><th>Phone Number</th><th>Customer Email</th><th>Quantity</th><th>Driving Licence</th><th>Total Time</th><th>Total Price</th><th>Payment Method</th><th>Order Date</th><th>Order Status</th><th>Feedback</th><th>Bill</th>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        $o_id = $row['o_id'];
            ?>
                        </tr>
                        <tr>
                            <td> <?php echo $row['o_id'] ?> </td>
                            <td> <?php echo $row['p_name'] ?> </td>
                            <td> <?php echo "<img src='../admin/admin_images/" . $row["p_image"] . "' alt='Product Image'>" ?> </td>
                            <!-- Add other table data as needed -->
                            <td> <?php echo $row['pickup_date'] ?> </td>
                            <td> <?php echo $row['pickup_time'] ?> </td>
                            <td> <?php echo $row['return_date'] ?> </td>
                            <td> <?php echo $row['return_time'] ?> </td>
                            <td> <?php echo $row['name'] ?> </td>
                            <td> <?php echo $row['address'] ?> </td>
                            <td> <?php echo $row['phone'] ?> </td>
                            <td> <?php echo $row['email'] ?> </td>
                            <td> <?php echo $row['quantity'] ?> </td>
                            <td> <img src='./user_images/<?php echo $row["licence"] ?>' alt="image"> </td>
                            <td> <?php echo $row['total_days'] . 'days ' . $row['total_hours'] . 'hours'; ?> </td>
                            <td> <?php echo $row['total_price']; ?> </td>
                            <td>
                                <?php
                                $query1 = "select * from payment where o_id='$o_id'";
                                $result1 = mysqli_query($con, $query1) or die("<script>alert('Selection Query Failed...')</script>" . mysqli_error($con));
                                $row1 = mysqli_fetch_assoc($result1);
                                if($row1)
                                    echo $row1['payment_method'];
                                else
                                    echo "N/A";
                                ?>
                            </td>
                            <td> <?php echo $row['order_date'] ?> </td>
                            <td> <?php echo $row['order_status'] ?> </td>
                            <?php
                            $order_status = $row['order_status'];
                            if ($order_status == 'confirm') {
                            ?>
                                <td> <a href="feedback.php?o_id=<?php echo $o_id ?>">Feedback</a> </td>
                                <td> <a href="bill.php?o_id=<?php echo $o_id ?>">Bill</a> </td>
                            <?php
                            } else {
                                echo "<td>N/A</td>";
                                echo "<td>N/A</td>";
                            }
                            ?>
                        </tr>
                    <?php
                    }
                    echo "</table><br>";
                }
            ?>
        </form>
    </center>
</body>
</html>
