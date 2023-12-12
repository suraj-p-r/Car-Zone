<?php session_start(); ?>

<html>
    <head>
        <title>Book Details</title>
    </head>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}

center {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
}

h2 {
    color: #333;
    margin-bottom: 20px;
}

form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

input[type="date"],
input[type="time"],
input[type="text"],
textarea,
input[type="tel"],
input[type="email"],
input[type="number"],
input[type="file"],
input[type="submit"] {
    width: 100%;
    padding: 12px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #3498db;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #2980b9;
}
nav
{
    width: 100%;
}
header
{
    width: 100%;
}
    </style>
    <body>
        <?php
            include '../connection.php';

            if($_SESSION)
            {
                if(isset($_GET['pro_id']))
                {
                    $pro_id=$_GET['pro_id'];

                    $query1="select * from product where p_id='$pro_id'";   
                    $result1=mysqli_query($con,$query1) or die("<script>alert('Selection Query Failed...')</script>".mysqli_error($con));
                    $row1=mysqli_fetch_array($result1);
                    $p_name=$row1['name'];
                    $p_image=$row1['image'];         
        ?>
                    <center>
                        <?php include 'user_nav.php'; ?><br><br>
                        <form method="POST" action="">
                        <h2>Enter the Details to Book</h2><br>
                        Pick Up Date : <input type="date" name="pickup_date" required><br><br>
                        Pick Up Time : <input type="time" name="pickup_time" required><br><br><br>
                        Return Date : <input type="date" name="return_date" required><br><br>
                        Return Time : <input type="time" name="return_time" required><br><br><br>
                        Name : <input type="text" name="name" placeholder="Name" required><br><br><br>
                        Address : <textarea name="address" id="" cols="25" rows="3" placeholder="Address" required></textarea><br><br><br>
                        Phone : <input type="tel" id="phone" name="phone" placeholder="Phone Number" pattern="[6-9]{1}[0-9]{9}" title="Enter a valid Indian Mobile Number having 10 digits [start with 6-9]" required><br><br>
                        Email : <input type="email" name="email" placeholder="Email" required><br><br><br>
                        Quantity : <input type="number" name="quantity" placeholder="Quantity" max="<?php echo $row1['stock'] ?>" required><br><br><br>
                        Driving Licence : <input type="file" name="licence" required><br><br><br>
                        <input type="submit" name="submit">
                    </form>
                    </center>
        <?php
                }
            }  
            else
            {
                echo "<script>
                        if(window.confirm('Login to continue.'))
                        {
                            window.open('user_login.php', '_self');
                        }
                      </script> ";
            } 
        ?>
    </body>
</html>

<?php
    if(isset($_POST['submit']))
    {
        $userid=$_SESSION['userid'];
        $c_name=$_SESSION['name'];

        $pickup_date = $_POST['pickup_date'];
$pickup_time = $_POST['pickup_time'];
$return_date = $_POST['return_date'];
$return_time = $_POST['return_time'];
$licence = $_POST['licence'];
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$quantity = $_POST['quantity'];

//$diff = (strtotime($return_date) - strtotime($pickup_date)) / (60*60*24);
$pick_date_time = strtotime("$pickup_date $pickup_time");
$return_date_time = strtotime("$return_date $return_time");
$diff = ($return_date_time - $pick_date_time);
$hour = ($diff / 3600);
$days = floor($hour / 24);
$hours = $hour % 24;

$day_rent = $row1['price_day'];
$hour_rent = $row1['price_hour'];

// Calculate the price for each component (per day and per hour)
$day_price = $days * $day_rent;
$hour_price = $hours * $hour_rent;

// Calculate the total price
$total_price = $day_price + $hour_price;
$total_price *= $quantity;

        
        $order_status="pending";
        
        $query="insert into orders (userid,c_name,p_id,p_name,p_image,pickup_date,pickup_time,return_date,return_time,name,address,phone,email,quantity,licence,total_days,total_hours,total_price,order_date,order_status) values ('$userid','$c_name','$pro_id','$p_name','$p_image','$pickup_date','$pickup_time','$return_date','$return_time','$name','$address','$phone','$email','$quantity','$licence','$days','$hours','$total_price',NOW(),'$order_status')";
        $result=mysqli_query($con,$query) or die("<script>alert('Insertion Query Failed...')</script>".mysqli_error($con));
        if($result)
        {
            echo "  <script>
                        alert('Details Provided Successfully');
                        window.open('view_booking_details.php?pro_id=" . $pro_id . "', '_self');
                    </script> ";
        }
        mysqli_close($con);
    }  
?>