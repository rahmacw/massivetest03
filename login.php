<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_info = $_POST['login_info'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$login_info' OR email='$login_info' OR phone='$login_info'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo "Login successful!";
            session_start();
            $_SESSION['username'] = $row['username'];
            header("Location: home.html");
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found!";
    }
}
$conn->close();
?>
