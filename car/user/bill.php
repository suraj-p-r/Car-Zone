<!DOCTYPE html>
<html>
<head>
    <title>Car Rental Bill</title>
    <style>
        div {
            border: 2px solid #000;
            border-radius: 5px;
            padding: 10px;
            margin: 20px;
            width: 50%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        h2, h5 {
            margin: 0;
        }
        #container
        {
            margin-left: 400px;
        }
        .right-align
        {
            text-align: right;
        }
    </style>
</head>
<body>
    <div id="container">
        <center>
            <h2>Car Zone</h2>
            <h5>Online Car Rental</h5>
        </center><br>

        <?php
            require '../connection.php';
            if(isset($_GET['o_id']))
            {
                $o_id=$_GET['o_id'];
                $invoice_no=mt_rand();
                $query = "select * from orders where o_id='$o_id'";
                $result = mysqli_query($con, $query) or die("<script>alert('Selection Query Failed...')</script>" . mysqli_error($con));
                while($row=mysqli_fetch_array($result))
                { 
                    $p_id=$row['p_id'];
        ?>

        <p class="right-align">Invoice No : <?php echo $invoice_no ?></p>
        <p class="right-align">Date : <?php echo $row['order_date'] ?></p>

        <p>Car Zone</p>
        <p>Muvattupuzha, Eranakulam</p>
        <p>9495767185</p>
        <p>carzone@gmail.com</p>       

        

        <h3 align="center">Customer Details</h3>

        <table>
            <tr><th>Customer Name</th><td><?php echo $row['name'] ?></td></tr>
            <tr><th>Customer Address</th><td><?php echo $row['address'] ?></td></tr>
            <tr><th>Customer Phone</th><td><?php echo $row['phone'] ?></td></tr>
            <tr><th>Customer Email</th><td><?php echo $row['email'] ?></td></tr>
        </table><br><br>

        <h3 align="center">Product</h3>

        <?php
            $query1 = "select * from product where p_id='$p_id'";
            $result1 = mysqli_query($con, $query1) or die("<script>alert('Selection Query Failed...')</script>" . mysqli_error($con));
            while($row1=mysqli_fetch_array($result1))
            {
        ?>

        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price Per Hour</th>
                <th>Price Per Day</th>
                <th>Amount</th>
            </tr>
            <tr>
                <td><?php echo $row1['name'] ?></td>
                <td><?php echo $row['quantity'] ?></td>
                <td><?php echo $row1['price_hour'] ?></td>
                <td><?php echo $row1['price_day'] ?></td>
                <td><?php echo $row['total_price'] ?></td>
            </tr>
        </table><br>

        <table>
            <tr><th>Total Amount</th><td><?php echo $row['total_price'] ?></td></tr>
        </table><br>
        <h3 align="center">Thank You</h3><br><br>
    <?php
                }
            }
        }
    ?>  
    </div>
    <center><a href="download_bill.php?o_id=<?php echo $o_id; ?>"><input type="submit" name="download_bill" value="Download Bill"></a><br><br>
    <form method="POST">
        <input type="submit" name="print" value="Print"><br><br>
    </form>
    <?php
        if(isset($_POST['print']))
        {
            echo "<script>window.print();</script>";
        }
    ?>  
    </center>
</body>
</html>
 