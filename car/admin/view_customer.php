<!DOCTYPE html>
<html>
    <head>
        <title>View Customers</title>
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
            <h2>View Customers</h2>
            <?php
                require '../connection.php';
                $query = "select userid, name, address, phone, email, gender, username from customer order by userid desc";
                $result = mysqli_query($con, $query) or die("<script>alert('Selection Query Failed...')</script>" . mysqli_error($con));

                echo "<table>";
                echo "<tr><th>Customer ID</th><th>Customer Name</th><th>Customer Address</th><th>Customer Phone</th><th>Customer Email</th><th>Customer Gender</th><th>Customer Username</th><th>Remove Customer</th></tr>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                        echo "<td>" . $row['userid'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['gender'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td><a href='view_customer.php?user_id={$row['userid']}'>Remove</a></td>";
                    echo "</tr>";
                }
                echo "</table>";

                if (isset($_GET["user_id"])) {
                    $user_id = $_GET['user_id'];
                    $query = "delete from customer where userid='$user_id'";
                    mysqli_query($con, $query) or die("Wrong Query");
                    header("Location: view_customer.php");
                }

                mysqli_close($con);
            ?>
        </center>
    </body>
</html>
