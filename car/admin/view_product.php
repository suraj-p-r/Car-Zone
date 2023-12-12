<!DOCTYPE html>
<html>
    <head>
        <title>View Product</title>
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
                width: 80%;
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

            img {
                max-width: 100px;
                max-height: 100px;
            }

            a {
                color: #3366cc; /* Change the color to your preference */
                text-decoration: none;
            }

            a:hover {
                text-decoration: none;
            }
            header
            {
                width: 120%;
            }
            nav
            {
                width: 120%;
            }
        </style>
    </head>
    <body>
        <?php include 'admin_nav.php'; ?>
        <center>
            <h2>View Product</h2>
            <?php
                require '../connection.php';
                $query = "select * from product order by p_id desc";
                $result = mysqli_query($con, $query) or die("<script>alert('Selection Query Failed...')</script>" . mysqli_error($con));

                echo "<table>";
                echo "<tr><th>Product ID</th><th>Category</th><th>Product Name</th><th>Product Seats</th><th>Product Transmission</th><th>Product Mileage</th><th>Product Fuel</th><th>Product Model</th><th>Product AC</th><th>Product Color</th><th>Product Price Per Hour</th><th>Product Price Per Day</th><th>Stock</th><th>Status</th><th>Product Image</th><th>Update Product</th><th>Remove Product</th></tr>";
                while ($row = mysqli_fetch_array($result))
                {
                    $cat_id=$row['category_id'];

                    echo "<tr>";
                        echo "<td>" . $row['p_id'] . "</td>";

                        $query1 = "select * from category where category_id='$cat_id'";
                        $result1 = mysqli_query($con, $query1) or die("<script>alert('Selection Query Failed...')</script>" . mysqli_error($con));
                        $row1=mysqli_fetch_array($result1);
                        
                        echo "<td>" . $row1['name'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['seats'] . "</td>";
                        echo "<td>" . $row['transmission'] . "</td>";
                        echo "<td>" . $row['mileage'] . "</td>";
                        echo "<td>" . $row['fuel'] . "</td>";
                        echo "<td>" . $row['model'] . "</td>";
                        echo "<td>" . $row['ac'] . "</td>";
                        echo "<td>" . $row['color'] . "</td>";
                        echo "<td>" . $row['price_hour'] . "</td>";
                        echo "<td>" . $row['price_day'] . "</td>";
                        echo "<td>"
                                    . $row['stock'] . 
                                    "<br><br><form method='POST' action=''>
                                    <input type='number' name='stock' placeholder='Stock Quantity'><br><br>
                                    <input type='hidden' name='p_id' value='{$row['p_id']}'>
                                    <button type='submit' name='updateStock'>Update</button>
                                    </form>";
                    
                    if(isset($_POST['updateStock']))
                    {
                        $stock=$_POST['stock'];
                        $p_id = $_POST['p_id'];
    
                        $query2="update product set stock='$stock' where p_id='$p_id'";
                        $result2=mysqli_query($con,$query2) or die("<script>alert('Updation Query Failed...')</script>".mysqli_error($con));
                        if($result2)
                        {
                            header('Location: view_product.php');
                        }
                    } 
                    
                    echo "</td>";
                    
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td><img src='./admin_images/" . $row["image"] . "'></td>";
                        echo "<td><a href='update_product.php?pro_id={$row['p_id']}'>Update</a></td>";
                        echo "<td><a href='view_product.php?pro_id={$row['p_id']}'>Remove</a></td>";
                    echo "</tr>";
                }
                echo "</table>"; 

                /* if(isset($_POST['stock_update']) && !empty($_POST['stock_update']))
                {
                    $stock=$_POST['stock'];
                    $p_id = $_POST['p_id'];

                    $query2="update product set stock='$stock' where p_id='$p_id'";
                    $result2=mysqli_query($con,$query2) or die("<script>alert('Updation Query Failed...')</script>".mysqli_error($con));

                    if($result2)
                    {
                        echo "<script>
                                if(window.alert('Stock Updated.'))
                                {
                                    window.open('view_product.php', '_self');
                                }            
                                </script> ";
                    }
                } 
                
                if(isset($_GET['p_id']))
                {
                    $p_id=$_GET['p_id'];
                        $stock=$_POST['stock'];
                        $query2="update product set stock='$stock' where p_id='$p_id'";
                        $result2=mysqli_query($con,$query2) or die("<script>alert('Updation Query Failed...')</script>".mysqli_error($con));
    
                        /* if($result2)
                        {
                            echo "<script>
                                    if(window.alert('Stock Updated.'))
                                    {
                                        window.open('view_product.php', '_self');
                                    }            
                                    </script> ";
                        } 
                }*/


                

                if (isset($_GET["pro_id"]))
                {
                    $pro_id = $_GET['pro_id'];
                    $query = "delete from product where p_id='$pro_id'";
                    mysqli_query($con, $query) or die("Wrong Query");
                    header("Location: view_product.php");
                }

                mysqli_close($con);
            ?>
        </center>
    </body>
</html>
