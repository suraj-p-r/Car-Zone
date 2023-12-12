<!DOCTYPE html>
<html>
    <head>
        <title>View Category</title>
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
                padding: 10px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2; /* Change the color to your preference */
            }

            a {
                color: #3366cc; /* Change the color to your preference */
                text-decoration: none;
            }

            a:hover {
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <?php include 'admin_nav.php'; ?>
        <center>
            <h2>View Category</h2>
            <?php
                require '../connection.php';
                $query = "select category_id, name from category order by category_id desc";
                $result = mysqli_query($con, $query) or die("<script>alert('Selection Query Failed...')</script>" . mysqli_error($con));

                echo "<table>";
                echo "<tr><th>Category ID</th><th>Category Name</th><th>Update Category</th><th>Remove Category</th></tr>";
                while ($row = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                        echo "<td>" . $row['category_id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td><a href='update_category.php?cat_id={$row['category_id']}'>Update</a></td>";
                        echo "<td><a href='view_category.php?cat_id={$row['category_id']}'>Remove</a></td>";
                    echo "</tr>";
                }
                echo "</table>";

                if (isset($_GET["cat_id"]))
                {
                    $cat_id = $_GET['cat_id'];
                    $query = "delete from category where category_id='$cat_id'";
                    mysqli_query($con, $query) or die("<script>alert('Deletion Query Failed...')</script>" . mysqli_error($con));

                    $query1 = "delete from product where category_id='$cat_id'";
                    mysqli_query($con, $query1) or die("<script>alert('Deletion Query Failed...')</script>" . mysqli_error($con));
            
                    header("Location: view_category.php");
                }

                mysqli_close($con);
            ?>
        </center>
    </body>
</html>
