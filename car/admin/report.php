<html>
    <head>
        <title>Report</title>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        form input[type="date"] {
            padding: 8px;
            font-size: 16px;
        }

        form input[type="submit"] {
            padding: 10px 15px;
            font-size: 16px;
            background-color: #3498db;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        table {
            border-collapse: collapse;
            width: 60%;
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
            background-color: #3498db;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
    </head>
    <body>
        <center>
            <?php include 'admin_nav.php'; ?>
            <h2>Report</h2>
            <form action="" method="POST">
                Starting Date : <input type="date" name="start"><br><br>
                End Date : <input type="date" name="end"><br><br>
                <input type="submit" name="submit">
            </form>

            <?php
                require "../connection.php";
                if(isset($_POST['submit']))
                {
                    $start=$_POST['start'];
                    $end=$_POST['end'];
                    $query= "select count(o_id) as order_count,count(p_id) as product_count,sum(total_price) as total_amount from orders where order_date between '$start' and '$end' and order_status='confirm'";
                    $result=mysqli_query($con,$query) or die("<script>alert('Selection Query Failed...')</script>".mysqli_error($con));
                    
                    echo "<table border='5'>";
                        echo "<tr><th>Total number of Orders</th><th>Total number of Products Sold</th><th>Total Amount</th></tr>";
                    while($row=mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                            echo "<td>".$row['order_count']."</td>";
                            echo "<td>".$row['product_count']."</td>";
                            echo "<td>".$row['total_amount']."</td>";
                        echo "</tr>";
                    }
                }
            ?>

        </table>
        </center>
    </body>
</html>
       