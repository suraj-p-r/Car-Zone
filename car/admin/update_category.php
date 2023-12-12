<!DOCTYPE html>
<html>
    <head>
        <title>Update Category</title>
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

            form {
                margin-top: 20px;
            }

            input[type="text"] {
                padding: 8px;
                width: 200px;
            }

            input[type="submit"] {
                padding: 10px;
                background-color: #3366cc; /* Change the color to your preference */
                color: white;
                border: none;
                cursor: pointer;
                margin-right: 10px;
            }

            input[type="submit"]:hover {
                background-color: #254179; /* Change the color to your preference */
            }
        </style>
    </head>
    <body>
        <?php include 'admin_nav.php'; ?>
        <center>
            <h2>Update Category</h2>

            <?php
                require "../connection.php";
                if(isset($_GET["cat_id"]))
                {
                    $cat_id=$_GET['cat_id'];
                    $query= "select * from category where category_id='$cat_id'";
                    $result=mysqli_query($con,$query) or die("<script>alert('Selection Query Failed...')</script>".mysqli_error($con));

                    echo "<table>";
                        echo "<tr><th>Category ID</th><th>Category Name</th></tr>";  
                        while($row = mysqli_fetch_array($result))
                        {
                            echo "<tr>";
                                echo "<td>" .$row['category_id']. "</td>";
                                echo "<td>" .$row['name']. "</td>"; 
                            echo "</tr>";
                        }    
                    echo "</table><br><br>";                
            ?>
            
            <form method="POST" action=""> 
                <table>
                    <tr>
                        <td>Update Name : </td>
                        <td><input type='text' name='name'></td>
                    </tr>
                    <tr>
                        <td><input type='submit' name='submit'></td>
                    </tr>
                </table>
            </form>

            <?php
                if(isset($_POST['submit']))
                {
                    $name=$_POST['name'];
                    $query="update category set name='$name' where category_id='$cat_id'";
                    $result=mysqli_query($con,$query) or die("<script>alert('Updation Query Failed...')</script>".mysqli_error($con));
            
                    echo "<h1>Updated Category</h1>";
                    $query="select category_id,name from category where category_id='$cat_id'";
                    $result=mysqli_query($con,$query) or die("<script>alert('Selection Query Failed...')</script>".mysqli_error($con));

                    echo "<table>";
                    echo "<tr><th>Category ID</th><th>Category Name</th></tr>";  
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                        echo "<td>" .$row['category_id']. "</td>";
                        echo "<td>" .$row['name']. "</td>";
                        echo "</tr>";
                    }    
                    echo "</table>";
                }

                mysqli_close($con);
            ?>

            <?php
                }
            ?>

        </center>
    </body>
</html>
