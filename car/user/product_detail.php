<html>
    <head>
        <title>Product Detail</title>
    </head>
    <style>
        img
        {
            width: 500px;
            height: 300px;
        }
        input[type="submit"] {
    background-color: #3498db;
    color: #fff;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #2980b9;
}
    </style>
    <body>

<?php
    if(isset($_GET['pro_id']))
    {
        $pro_id=$_GET['pro_id'];
        include '../connection.php';
        $query="select * from product where p_id='$pro_id'";
        $result=mysqli_query($con,$query);
        if($row=mysqli_fetch_array($result))
        {
?>
            <center>
                <?php include 'user_nav.php'; ?>
                <h2>Car Details</h2>
                <img src='../admin/admin_images/<?php echo $row["image"]?>' alt='<?php echo $row["name"]?>'>
                <h3>Name : <?php echo $row["name"]?></h3> 
                <p>Category : 
                    <?php
                        $query1 = "SELECT * FROM category WHERE category_id='" . $row['category_id'] . "'";
                        $result1 = mysqli_query($con, $query1) or die("<script>alert('Selection Query Failed...')</script>" . mysqli_error($con));
                        $row1 = mysqli_fetch_assoc($result1);
                        echo $row1["name"];
                    ?>
                </p>
                <p>Number of Seats : <?php echo $row["seats"]?></p>
                <p>Transmission Mode : <?php echo $row["transmission"]?></p>
                <p>Mileage : <?php echo $row["mileage"]?></p>
                <p>Fuel Type : <?php echo $row["fuel"]?></p>
                <p>Model : <?php echo $row["model"]?></p>
                <p>Air Condition : <?php echo $row["ac"]?></p>
                <p>Color : <?php echo $row["color"]?></p>
                <p>Price Per Hour : <?php echo $row["price_hour"]?></p>
                <p>Price Per Day : <?php echo $row["price_day"]?></p>
                <p>Status : <?php echo $row["status"]?></p>
                <a href="booking_details.php?pro_id=<?php echo $pro_id ?>" ><input type="submit" name="submit" value="Book"></a><br><br>
            </center>
<?php
        }
        else
        {
            echo "<script>alert('Product not found.')</script>";
        }
    }
    mysqli_close($con);
?>
    </body>
</html>
