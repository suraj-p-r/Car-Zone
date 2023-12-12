<html>
<head>
    <style>
            body
            {
                margin: 0;
                padding: 0;
                background-repeat: no-repeat;
                background-size: cover;
                background-attachment: fixed;
                font-family: 'Arial', sans-serif;
            }
            
            header
            {
                background-color: black;
                padding: 10px;
                text-align: center;
            }

            h1
            {
                color: white;
            } 

            nav
            {
                display: flex;
                justify-content: center;
                background-color: red;
                padding: 10px;
            }

            nav a
            {
                color: white;
                text-decoration: none;
                padding: 10px 30px;
                margin: 0 10px;
                border-radius: 5px;
                transition: background-color 0.3s;
            }

            nav a:hover
            {
                background-color: black;
            }         
    </style>
</head>

<body>
    <header>
            <h1>Car Zone</h1>
    </header>
    <nav>
        <a href="admin_home.php">Home</a>
        <a href="add_category.php">Add Category</a>
        <a href="add_product.php">Add Car</a>
        <a href="view_product.php">View Cars</a>
        <a href="view_category.php">View Categorys</a>
        <a href="view_customer.php">View Customers</a>
        <a href="view_orders.php">View Orders</a>
        <a href="report.php">Report</a>
        <a href="view_help.php">View Help</a>
        <a href="view_feedback.php">View Feedback</a>

        <a href="../logout.php">Logout</a>
    </nav>
</body>

</html>