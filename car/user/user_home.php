<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Home</title>
    <style>
       body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}

center {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
}

#container {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 800px;
    width: 100%;
    margin-top: 20px;
}

h2 {
    color: #333;
    margin-bottom: 20px;
}

.product {
    margin-bottom: 30px;
    text-align: center;
    border-bottom: 1px solid #ddd;
    padding-bottom: 20px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.product:hover {
    transform: scale(1.05);
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
}

img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
    margin-bottom: 10px;
}

h3 {
    color: #333;
    margin-bottom: 5px;
}

p {
    color: #666;
    margin: 5px 0;
}

button {
    background-color: #3498db;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #2980b9;
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
</head>
<body>
    <?php include 'user_nav.php'; ?>
    <center>
        <h2>Welcome 
            <?php  
                if($_SESSION)
                { 
                    echo $_SESSION['name'];
                }
            ?>
        </h2><br>
        <div id="container">
            <?php
                require '../connection.php';
                $query = "select * from product where stock > 0 order by p_id desc";
                $result = mysqli_query($con, $query) or die("<script>alert('Selection Query Failed...')</script>" . mysqli_error($con));

                while ($row = mysqli_fetch_assoc($result))
                {
            ?>
                <div class="product">
                    <img src='../admin/admin_images/<?php echo $row["image"]?>' alt='<?php echo $row["name"]?>'>
                    <h3><?php echo $row["name"]?></h3>

                    <p>Category :  
                    <?php
                        $query1 = "SELECT * FROM category WHERE category_id='" . $row['category_id'] . "'";
                        $result1 = mysqli_query($con, $query1) or die("<script>alert('Selection Query Failed...')</script>" . mysqli_error($con));
                        $row1 = mysqli_fetch_assoc($result1);
                        echo $row1["name"];
                    ?>
                    </p>

                    <p>Status : <?php echo $row["status"]?></p>
                    <p>Stock : <?php echo $row["stock"]?></p>
                    
                    <a href="product_detail.php?pro_id=<?php echo $row['p_id']?>" ><input type="submit" name="submit" value="View Car"></a>
                </div>
            <?php
                }
                mysqli_close($con);
            ?>
        </div>
    </center>
    <?php include '../footer.php'; ?>
</body>
</html>
