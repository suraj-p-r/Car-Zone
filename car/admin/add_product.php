<!DOCTYPE html>
<html>

<head>
    <title>Add Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        center {
            text-align: center;
            margin-top: 20px;
        }

        h1 {
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        select,
        input[type="text"],
        input[type="number"],
        input[type="radio"],
        input[type="file"] {
            padding: 8px;
            margin-bottom: 10px;
        }

        table {
            border-collapse: collapse;
            width: 50%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .container
        {
            align-items: center;
        }

        input[type="submit"],
        input[type="reset"] {
            padding: 10px;
            background-color: #3366cc;
            color: white;
            border: none;
            cursor: pointer;
            margin-right: 10px;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #254179;
        }
    </style>
</head>

<body>
    <?php include 'admin_nav.php'; ?>
    <center>
        <h2>Add Product</h2>
        <form method="POST" action="">
            <h4>Select Product Category</h4>
            <select name="category">
                <?php
                    require '../connection.php';
                    $query = "select category_id,name from category";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        echo "<option value='" . $row['category_id'] . "'>" . $row['name'] . "</option>";
                    }
                ?>
            </select><br><br>
            <table align='center'>
                <tr>
                    <td>Product Name : </td>
                    <td><input type="text" name="name" placeholder="Product Name"></td>
                </tr>
                <tr>
                    <td>No of Seats : </td>
                    <td><input type="number" name="seats" placeholder="No of Seats"></td>
                </tr>
                <tr>
                    <td>Transmission : </td>
                    <td>
                        <input type="radio" name="transmission" value="manual">Manual
                        <input type="radio" name="transmission" value="automatic">Automatic
                    </td>
                </tr>
                <tr>
                    <td>Mileage : </td>
                    <td><input type="number" name="mileage" placeholder="Mileage"></td>
                </tr>
                <tr>
                    <td>Fuel : </td>
                    <td>
                        <input type="radio" name="fuel" value="petrol">Petrol
                        <input type="radio" name="fuel" value="diesel">Diesel
                    </td>
                </tr>
                <tr>
                    <td>Model : </td>
                    <td><input type="number" name="model" placeholder="Model"></td>
                </tr>
                <tr>
                    <td>Air Condition : </td>
                    <td>
                        <input type="radio" name="ac" value="yes">Yes
                        <input type="radio" name="ac" value="no">No
                    </td>
                </tr>
                <tr>
                    <td>Color : </td>
                    <td><input type="text" name="color" placeholder="Color"></td>
                </tr>
                <tr>
                    <td>Price Per Hour : </td>
                    <td><input type="number" name="price_hour" placeholder="Price Per Hour"></td>
                </tr>
                <tr>
                    <td>Price Per Day : </td>
                    <td><input type="number" name="price_day" placeholder="Price Per Day"></td>
                </tr>   
                <tr>
                    <td>Stock : </td>
                    <td><input type="number" name="stock" placeholder="Stock Quantity"></td>
                </tr>                
                <tr>
                    <td>Status : </td>
                    <td>
                        <input type="radio" name="status" value="available">Available
                        <input type="radio" name="status" value="not availabla">Not Available
                    </td>
                </tr>
                <tr>
                    <td>Image : </td>
                    <td><input type="file" name="image"></td>
                </tr>
            </table><br>
            <input type="submit" name="submit">
            <input type="reset" value="Clear">
            </center>
        </form>
</body>

</html>

<?php
if (isset($_POST['submit']))
{
    $category = $_POST['category'];
    $name = $_POST['name'];
    $seats = $_POST['seats'];
    $transmission = $_POST['transmission'];
    $mileage = $_POST['mileage'];
    $fuel = $_POST['fuel'];
    $model = $_POST['model'];
    $ac = $_POST['ac'];
    $color = $_POST['color'];
    $price_hour = $_POST['price_hour'];
    $price_day = $_POST['price_day'];
    $stock = $_POST['stock'];
    $status = $_POST['status'];
    $image = $_POST['image'];

    $select = "SELECT name FROM product";
    $res = mysqli_query($con, $select) or die("<script>alert('Selection Query Failed...')</script>" . mysqli_error($con));
    $categoryExists = false;
    while ($row = mysqli_fetch_array($res)) {
        $existing_name = $row['name'];
        if ($existing_name == $name) {
            $categoryExists = true;
            break;
        }
    }

    if ($categoryExists) {
        echo "<script>alert('Product already exists. Try another Product')</script>";
    } else {
        $query = "insert into product(category_id,name,seats,transmission,mileage,fuel,model,ac,color,price_hour,price_day,stock,status,image) values ('$category','$name','$seats','$transmission','$mileage','$fuel','$model','$ac','$color','$price_hour','$price_day','$stock','$status','$image')";
        $result = mysqli_query($con, $query) or die("<script>alert('Insertion Query Failed...')</script>" . mysqli_error($con));
        if ($result)
        {
            echo '<script>alert("Product Added Successfully")</script>';
        }
        else
        {
            echo '<script>alert("Invalid Entry")</script>';
        }
    }
    mysqli_close($con);
}
?>
