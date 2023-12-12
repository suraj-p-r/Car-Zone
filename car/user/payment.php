<html>
    <head>
        <title>Payment</title>
    </head>
    <body>
        <?php include 'user_nav.php'; ?>
        <center>
        <h2>Make Payment</h2><br><br>
            <form method="POST" action="">
            <?php 
                include '../connection.php';
                if(isset($_GET['ord_id']))
                {
                    $ord_id=$_GET['ord_id'];
                    
                    $query1="select * from orders where o_id='$ord_id'";
                    $result1 = mysqli_query($con, $query1) or die("<script>alert('Insertion Query Failed...')</script>" . mysqli_error($con));
                    $row1=mysqli_fetch_array($result1);
                    $p_id=$row1['p_id'];
                    $total_price=$row1['total_price'];
                    echo "<h3>Total Price : ".$total_price."</h3><br>";
            ?>    
                <input type="radio" name="payment" value="upi"> UPI <br><br>
                <input type="radio" name="payment" value="card"> CARD <br><br>
                <input type="submit" name="submit" value="Pay">
            </form>
            <?php
                    if(isset($_POST['submit']))
                    {
                        $payment_method=$_POST['payment']; 
                        
                        if($payment_method == "upi")
                        {
                            echo "Enter UPI ID : <input type='number' name='upinum'><br><br>";
                            echo "<input type='submit' name='submit' value='PAY'>";
                        
                            $invoice_no=mt_rand();
                            $query = "insert into payment (o_id,invoice_no,payment_method,date) values ('$ord_id','$invoice_no','$payment_method',NOW())";
                            $result = mysqli_query($con, $query) or die("<script>alert('Insertion Query Failed...')</script>" . mysqli_error($con));
                            if($result) 
                            {
                                echo "  <script>
                                            alert('Payment Successful.');
                                            window.open('my_orders.php?ord_id=<?php echo $ord_id ?>', '_self');
                                        </script> ";
                            }
                            else
                            {
                                echo "<script>alert('Payment Failed.')</script>";
                            }                
                        
                        }

                        if($payment_method == "card")
                        {
                            echo "Enter the Card Number : ";
                            echo "<input type='number' name='card_num'><br><br>";
                            echo "Enter Card Month : ";
                            echo "<input type='number' name='card_month'><br><br>";
                            echo "Enter Card Year : ";
                            echo "<input type='number' name='card_year'><br><br>";
                            echo "Enter CVV number : ";
                            echo "<input type='password' name='card_cvv'><br><br>";
                            echo "<input type='submit' name='submit' value='PAY'>";

                            $invoice_no=mt_rand();
                            $query = "insert into payment (o_id,invoice_no,payment_method,date) values ('$ord_id','$invoice_no','$payment_method',NOW())";
                            $result = mysqli_query($con, $query) or die("<script>alert('Insertion Query Failed...')</script>" . mysqli_error($con));
                            if($result)
                            {
                                echo "  <script>
                                            alert('Payment Successful.');
                                            window.open('my_orders.php?ord_id=<?php echo $ord_id ?>', '_self');
                                        </script> ";
                            }
                            else
                            {
                                echo "<script>alert('Payment Failed.')</script>";
                            }        
                        }                           
                    }
                }
            ?>
        </center>
    </body>
</html>