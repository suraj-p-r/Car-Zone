<!DOCTYPE html>
<html>
    <head>
        <title>Update Product</title>
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

            form
            {
                margin-top: 20px;
            }
            input[type="text"],
            input[type="number"],
            input[type="file"] {
                padding: 8px;
                width: 200px;
            }

            input[type="submit"],
            input[type="reset"] {
                padding: 10px;
                background-color: #3366cc; /* Change the color to your preference */
                color: white;
                border: none;
                cursor: pointer;
                margin-right: 10px;
            }

            input[type="submit"]:hover,
            input[type="reset"]:hover {
                background-color: #254179; /* Change the color to your preference */
            }

            input[type="radio"]
            {
                margin-right: 5px;
            }
        </style>
    </head>
    <body>
        <?php include 'admin_nav.php'; ?>
        <center>
            <h2>Update Product</h2>

            <?php
                require "../connection.php";
                if(isset($_GET["pro_id"]))
                {
                    $pro_id=$_GET['pro_id'];
                    $query= "select * from product where p_id='$pro_id'";
                    $result=mysqli_query($con,$query) or die("<script>alert('Selection Query Failed...')</script>".mysqli_error($con));

                    echo "<table>";
                        echo "<tr><th>Product ID</th><th>Category ID</th><th>Product Name</th><th>Product Seats</th><th>Product Transmission</th><th>Product Mileage</th><th>Product Fuel</th><th>Product Model</th><th>Product AC</th><th>Product Color</th><th>Product Price Per Hour</th><th>Product Price per Day</th><th>Product Image</th></tr>";  
                        while($row = mysqli_fetch_array($result))
                        {
                            echo "<tr>";
                                echo "<td>" .$row['p_id']. "</td>";
                                echo "<td>" .$row['category_id']. "</td>";
                                echo "<td>" .$row['name']. "</td>"; 
                                echo "<td>" .$row['seats']. "</td>";
                                echo "<td>" .$row['transmission']. "</td>";
                                echo "<td>" .$row['mileage']. "</td>";
                                echo "<td>" .$row['fuel']. "</td>";
                                echo "<td>" .$row['model']. "</td>";
                                echo "<td>" .$row['ac']. "</td>"; 
                                echo "<td>" .$row['color']. "</td>"; 
                                echo "<td>" .$row['price_hour']. "</td>"; 
                                echo "<td>" .$row['price_day']. "</td>"; 
                                echo "<td><img src='./admin_images/" . $row["image"] . "' width=100px height=100px></td>"; 
                            echo "</tr>";
                        }    
                    echo "</table><br><br>";
            ?>
                
            <form method="POST" action=""> 
                <table>
                    <tr>
                        <td>Update Name : </td>
                        <td><input type="text" name="name" placeholder="Product Name"></td>
                    </tr>
                    <tr>
                        <td>Update No of Seats : </td>
                        <td><input type="number" name="seats" placeholder="No of Seats"></td>
                    </tr>
                    <tr>
                        <td>Update Transmission : </td>
                        <td>
                            <input type="radio" name="transmission" value="manual">Manual
                            <input type="radio" name="transmission" value="automatic">Automatic
                        </td>
                    </tr>
                    <tr>
                        <td>Update Mileage : </td>
                        <td><input type="number" name="mileage" placeholder="Mileage"></td>
                    </tr>
                    <tr>
                        <td>Update Fuel : </td>
                        <td>
                            <input type="radio" name="fuel" value="petrol">Petrol
                            <input type="radio" name="fuel" value="diesel">Diesel
                        </td>
                    </tr>
                    <tr>
                        <td>Update Model : </td>
                        <td><input type="number" name="model" placeholder="Model"></td>
                    </tr>
                    <tr>
                        <td>Update Air Condition : </td>
                        <td>
                            <input type="radio" name="ac" value="yes">Yes
                            <input type="radio" name="ac" value="no">No
                        </td>
                    </tr>
                    <tr>
                        <td>Update Color : </td>
                        <td><input type="text" name="color" placeholder="Color"></td>
                    </tr>
                    <tr>
                        <td>Update Price Per Hour : </td>
                        <td><input type="number" name="price_hour" placeholder="Price Per Hour"></td>
                    </tr>
                    <tr>
                        <td>Update Price Per Day : </td>
                        <td><input type="number" name="price_day" placeholder="Price Per Day"></td>
                    </tr>
                    <tr>
                        <td>Update Image : </td>
                        <td><input type="file" name="image"></td>
                    </tr>
                </table><br>
                <input type="submit" name="submit">
                <input type="reset" value="Clear">
            </form>

            <?php
                if(isset($_POST['submit']))
                {
                    $name=$_POST['name'];
                    $seats=$_POST['seats'];
                    $transmission=$_POST['transmission'];
                    $mileage=$_POST['mileage'];
                    $fuel=$_POST['fuel'];
                    $model=$_POST['model'];
                    $ac=$_POST['ac'];
                    $color=$_POST['color'];
                    $price_hour=$_POST['price_hour'];
                    $price_day=$_POST['price_day'];
                    $image=$_POST['image'];

                    $query="update product set name='$name',seats='$seats',transmission='$transmission',mileage='$mileage',fuel='$fuel',model='$model',ac='$ac',color='$color',price_hour='$price_hour',price_day='$price_day',image='$image' where p_id='$pro_id'";
                    $result=mysqli_query($con,$query) or die("<script>alert('Updation Query Failed...')</script>".mysqli_error($con));
            
                    echo "<h2>Updated Product</h2>";
                    $query="select * from product where p_id='$pro_id'";
                    $result=mysqli_query($con,$query) or die("<script>alert('Selection Query Failed...')</script>".mysqli_error($con));

                    echo "<table>";
                    echo "<tr><th>Product ID</th><th>Category ID</th><th>Product Name</th><th>Product Seats</th><th>Product Transmission</th><th>Product Mileage</th><th>Product Fuel</th><th>Product Model</th><th>Product AC</th><th>Product Color</th><th>Product Price Per Hour</th><th>Product Price per Day</th><th>Product Image</th></tr>";  
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                            echo "<td>" .$row['p_id']. "</td>";
                            echo "<td>" .$row['category_id']. "</td>";
                            echo "<td>" .$row['name']. "</td>"; 
                            echo "<td>" .$row['seats']. "</td>";
                            echo "<td>" .$row['transmission']. "</td>";
                            echo "<td>" .$row['mileage']. "</td>";
                            echo "<td>" .$row['fuel']. "</td>";
                            echo "<td>" .$row['model']. "</td>";
                            echo "<td>" .$row['ac']. "</td>"; 
                            echo "<td>" .$row['color']. "</td>"; 
                            echo "<td>" .$row['price_hour']. "</td>"; 
                            echo "<td>" .$row['price_day']. "</td>";  
                            echo "<td><img src='./admin_images/" . $row["image"] . "' width=100px height=100px></td>"; 
                        echo "</tr>";
                    }
                    echo "</table>";

                    mysqli_close($con);
                }
            ?>

            <?php
                }
            ?>
        </center>
    </body>
</html>
