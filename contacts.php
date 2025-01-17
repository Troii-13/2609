<?php
$host = "localhost";
$user = "root";
$password = ""; 
$dbname = "contacts";

$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    $stmt = $conn->prepare("INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    
    if ($stmt->execute()) {
        echo "<script>
                alert('Message sent successfully!');
                window.location.href = 'contactus.html';
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $stmt->error . "');
                window.history.back();
              </script>";
    }

    $stmt->close(); 
}

$conn->close(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malditah Online Shop - Contact Us</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f7e9fa;
        }

        .navbar {
            background-color: #f6c6fa;
            padding: 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar-logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #600060;
        }

        .navbar-links {
            display: flex;
            gap: 2rem;
        }

        .navbar-links a {
            text-decoration: none;
            color: #600060;
            font-weight: bold;
            font-size: 1rem;
        }

        .main-content {
            padding: 2rem;
            text-align: center;
            max-width: 1000px;
            margin: 2rem auto;
            background-color: #E0E0E0;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .contact-title {
            font-size: 2.5rem;
            color: #600060;
            margin-bottom: 1.5rem;
        }

        .contact-description {
            font-size: 1.2rem;
            color: #800080;
            margin-bottom: 2rem;
        }

        .contact-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }

        .contact-form input, .contact-form textarea {
            width: 80%;
            max-width: 600px;
            padding: 0.8rem;
            border: 1px solid #600060;
            border-radius: 5px;
        }

        .contact-form textarea {
            resize: none;
            height: 150px;
        }

        .contact-form button {
            background-color: #600060;
            color: white;
            font-weight: bold;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .contact-form button:hover {
            background-color: #800080;
        }

        .additional-info {
            margin-top: 3rem;
            padding: 2rem;
            background-color: #ffc1ef;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .additional-info h2 {
            font-size: 2rem;
            color: #600060;
        }

        .additional-info p {
            font-size: 1rem;
            color: #800080;
            line-height: 1.6;
        }

        footer {
            background-color: #fcb3ff;
            padding: 1rem;
            text-align: center;
            color: #600060;
            margin-top: 2rem;
        }

    </style>
</head>
<body>
    <header class="navbar">
        <div class="navbar-logo"><img src="logo.png" style="width:150px; height:50px;"></div>
        <nav class="navbar-links">
            <a href="indexcatwip.html">HOME</a>
            <a href="aboutus.html">ABOUT US</a>
            <a href="catalogue.html">CATALOGUE</a>
            <a href="contactus.html">CONTACT US</a>
            <a href="login (1).html">LOG-OUT</a>
        </nav>
    </header>

    <main class="main-content">
        <h1 class="contact-title">Contact Us</h1>
        <p class="contact-description">
            We'd love to hear from you! Whether you have a question, feedback, or need assistance, feel free to reach out.
        </p>

        <form class="contact-form" method="POST">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" required></textarea>
            <button type="submit">SEND</button>
        </form>
        
        <div id="successMessage" style="display: none; margin-top: 1rem; color: green; font-weight: bold;">
    Thank you! Your message has been successfully submitted.
</div>


        <div class="additional-info">
            <h2>Additional Information</h2>
            <p>
                You can also reach us at our support email: <strong>placeholder@gmail..com</strong><br>
                Or call us directly at: <strong>+123-456-7890</strong>
            </p>
            <p>
                Our customer service hours are Monday to Saturday.
            </p>
        </div>
    </main>

    <footer>
        Empowering Style and Confidence - Malditah Online Shop 2024.
    </footer>
</body>
</html>
