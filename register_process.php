<?php
include 'database/db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = htmlspecialchars($_POST['fullname']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $role = htmlspecialchars($_POST['role']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    if (empty($fullname) || empty($email) || empty($password) || $password !== $confirm) {
        header("Location: register.php?error=Please fill in all fields correctly.");
        exit;
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (fullname, email, phone, role, password) VALUES (?, ?, ?, ?, ?)"); //removed username
        $stmt->bind_param("sssss", $fullname, $email, $phone, $role, $hashed_password);

        if ($stmt->execute()) {
            header("Location: login.php?success=Registration successful. Please log in.");
            exit;
        } else {
            header("Location: register.php?error=Registration failed: " . urlencode($stmt->error));
            exit;
        }

        $stmt->close();
    }
    $conn->close();
}
?>