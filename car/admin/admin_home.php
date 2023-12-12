<!DOCTYPE html>
<html>
    <head>
        <title>Admin Home</title>
        <style>
            body
            {
                background-image: url("./admin_images/admin_home_image.jpg");
                background-repeat: no-repeat;
                background-size: cover;
                background-color: coffee;
                color: white;
                font-family: Arial, sans-serif;
                margin: 0; /* Remove default margin */
            }

            .container
            {
                position: relative;
                width: 250px;
                height: 320px;
                background-color: black;
                margin: auto;
                padding: 10px;
                border-radius: 10px;
            }

            h1 {
                color: white; /* Change the color to your preference */
            }

            a {
                color: #ff9900; /* Change the color to your preference */
                text-decoration: none;
            }

            a:hover {
                text-decoration: none;
            }

            img {
                max-width: 100%;
                height: auto;
            }
        </style>
    </head>
    <body>
        <center>
            <?php include 'admin_nav.php'; ?>
            <h1>Welcome Admin</h1><br>
        </center>
    </body>
</html>
