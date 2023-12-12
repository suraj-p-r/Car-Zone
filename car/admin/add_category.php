<!DOCTYPE html>
<html>

<head>
    <title>Admin Category</title>
    <style>
        body {
            background-color: coffee;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        center {
            text-align: center;
        }

        h1 {
            color: #333;
            /* Change the color to your preference */
        }

        form {
            margin-top: 20px;
        }

        input[type="text"] {
            padding: 8px;
            width: 200px;
        }

        input[type="submit"],
        input[type="reset"] {
            padding: 10px;
            background-color: #ff9900;
            /* Change the color to your preference */
            color: white;
            border: none;
            cursor: pointer;
            margin-right: 10px;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #cc7700;
            /* Change the color to your preference */
        }
    </style>
</head>

<body>
    <?php include 'admin_nav.php'; ?>
    <center>
        <h2>Add Category</h2>
        <form method="POST" action="">
            Category Name : <input type="text" name="name" placeholder="Category Name" required><br><br>
            <input type="submit" name="submit" value="Add Category">
            <input type="reset" value="Clear">
        </form>
    </center>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    
    require '../connection.php';

    $select = "SELECT name FROM category";
    $res = mysqli_query($con, $select) or die("<script>alert('Selection Query Failed...')</script>" . mysqli_error($con));

    $categoryExists = false;

    while ($row = mysqli_fetch_array($res)) {
        $existing_name = $row['name'];
        if ($existing_name == $name) {
            $categoryExists = true;
            break; // No need to continue checking once a match is found
        }
    }

    if ($categoryExists) {
        echo "<script>alert('Category Name already exists. Try another Category')</script>";
    } else {
        $query = "INSERT INTO category(name) VALUES ('$name')";
        $result = mysqli_query($con, $query) or die("<script>alert('Insertion Query Failed...')</script>" . mysqli_error($con));

        if ($result) {
            echo '<script>alert("Category Added Successfully")</script>';
        } else {
            echo '<script>alert("Invalid Entry")</script>';
        }
    }
    mysqli_close($con);
}
?>
