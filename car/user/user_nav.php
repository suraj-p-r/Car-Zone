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
            <a href="user_home.php">Home</a>
            <a href="../user/products.php">Cars</a>
            <a href="../user/my_orders.php">My Orders</a>
            <a href="../user/help.php">Help</a>
            <a href="contact_us.php">Contact Us</a>
            <a href="about.php">About</a>
            <a href="../logout.php">Logout</a>
    </nav>
</body>

</html>
