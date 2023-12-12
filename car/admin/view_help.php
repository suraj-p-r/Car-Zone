<!DOCTYPE html>
<html>
    <head>
        <title>View Customers</title>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        center {
            margin-top: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: burlywood;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td a {
            display: inline-block;
            padding: 5px 10px;
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            border-radius: 5px;
        }

        td a:hover {
            background-color: #45a049;
        }
    </style>
    </head>
    <body>
        <?php include 'admin_nav.php'; ?>
        <center>
            <h2>View Help Requests From Customers</h2>
            <?php
                require '../connection.php';
                $query = "select * from help order by h_id desc";
                $result = mysqli_query($con, $query) or die("<script>alert('Selection Query Failed...')</script>" . mysqli_error($con));

                echo "<table border=5 cellpadding=10>";
                echo "<tr><th>Customer ID</th><th>Customer Username</th><th>Customer Message</th><th>Reply</th></tr>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                        echo "<td>" . $row['userid'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['message'] . "</td>";
                        echo "<td><a href='help_reply.php?he_id={$row['h_id']}'>Reply</a>";
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_close($con);
            ?>
        </center>
    </body>
</html>
