<html>
<head>
    <title>Car Zone</title>
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
                width: 100%;
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
                width: 100%;
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

            .img
            {
                position: relative;
                width: 1535px; /* Use 100% width to make it responsive */
                height: 545px;
                background-size: cover;
                background-position: center;
                opacity: 80%;
            }

            #ii
            {
                width: 100%; /* Use 100% width to make it responsive */
                height: 100%;
                object-fit: cover;
            }       
            
        h2 {
            font-size: 40px; /* Adjust font size as needed */
            margin: 0;
            position: absolute;
            top: 47%; /* Position at the vertical center */
            left: 20%; /* Position at the horizontal center */
            transform: translate(-50%, -50%); /* Center the text precisely */
            text-align: center; /* Center align the text */
            z-index: 1; /* Ensure the text is above the image */
            color: white;
        }

        h5 {
            font-size: 16px; /* Adjust font size as needed */
            margin: 0;
            position: absolute;
            top: 53%; /* Position at the vertical center */
            left: 20%; /* Position at the horizontal center */
            transform: translate(-50%, -50%); /* Center the text precisely */
            text-align: center; /* Center align the text */
            z-index: 1; /* Ensure the text is above the image */
            color: white;
        }
    </style>
</head>

<body bgcolor="black">
    <header>
            <h1>Car Zone</h1>
    </header>
    <nav>
        <a href="index.php">Home</a>
        <a href="./user/user_login.php">User Login</a>
        <a href="./user/registration.php">User Registration</a>
        <a href="./admin/admin_login.php">Admin Login</a>
    </nav>    
    <div class="img">
        <img src="./images/index_image.jpg" alt="Div Image" id="ii">
    </div>
    <h2>Car hire for any kind of trip</h2>
        <h5>Great deals at great prices, from the biggest car hire companies</h5>
    <?php include 'footer.php'; ?>
</body>

</html>
