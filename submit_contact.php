<?php
$host = "localhost";
$user = "root";
$password = ""; 
$dbname = "contacts";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contact_id = $conn->real_escape_string($_POST['contact_id']);
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);
    $submitted_at = $conn->real_escape_string($_POST['submitted_at']);

    $sql = "INSERT INTO maldita (contact_id, name, email, message, submitted_at) VALUES ('$contact_id, '$name', '$email', '$message', '$submitted_at')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Message sent successfully!');
                window.location.href = 'contactus.html';
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $conn->error . "');
                window.history.back();
              </script>";
    }
}

$conn->close();
?>
