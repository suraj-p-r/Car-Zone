
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>About Us</title>
    <style>
        /* Your inline styles can go here if needed */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 15px;
            text-align: center;
        }

        header h1 {
            font-size: 24px;
        }

        header span {
            color: #ffcc00;
        }

        section {
            margin-bottom: 20px;
            text-align: justify;
        }

        h2 {
            color: #333;
        }

    </style>
</head>
<body>
    <?php include 'user_nav.php'; ?>
    <div class="container">
        <header>
            <h1>Welcome to <span>Car Zone</span></h1>
        </header>

        <section id="mission">
            <h2>Our Mission</h2>
            <p>At the heart of our mission is the belief that transportation should be a hassle-free experience. We strive to provide our customers with reliable and affordable car rental services that meet their needs and exceed their expectations. Our commitment is to make every journey with us a smooth and enjoyable one.</p>
        </section>

        <section id="vision">
            <h2>Our Vision</h2>
            <p>As we continue to evolve, our vision is to revolutionize the car rental industry by embracing cutting-edge technology. We aim to introduce innovative solutions that enhance the overall rental experience, from the reservation process to vehicle pick-up and return. Our goal is to be a leader in the industry, recognized for our commitment to excellence and customer satisfaction.</p>
        </section>
    </div><br><br>
    <?php include '../footer.php'; ?>
</body>
</html>

