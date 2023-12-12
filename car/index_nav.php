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
        <a href="../index.php">Home</a>
        <a href="../user/user_login.php">User Login</a>
        <a href="../user/registration.php">User Registration</a>
        <a href="../admin/admin_login.php">Admin Login</a>
    </nav>
</body>

</html>
