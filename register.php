<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $postal_code = $_POST['postal_code'];
    $current_address = $_POST['current_address'];

    $sql = "INSERT INTO users (username, password, full_name, phone, email, country, postal_code, current_address)
            VALUES ('$username', '$password', '$full_name', '$phone', '$email', '$country', '$postal_code', '$current_address')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        header("Location: login.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
