<?php
include 'database/db_config.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($user_id, $hashed_password, $user_role);
    $stmt->fetch();
    $stmt->close();

    if ($hashed_password && password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_role'] = $user_role;
        header("Location: userPannel/user_home.php");
        exit;
    } else {
        header("Location: login.php?error=Invalid email or password.");
        exit;
    }
    $conn->close();
}
?>