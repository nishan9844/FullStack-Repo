<?php
session_start();
require "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $student_id = $_POST['student_id'];
    $password   = $_POST['password'];

    $sql = "SELECT password_hash FROM students WHERE student_id = :student_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':student_id' => $student_id]);

    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['logged_in'] = true;
        $_SESSION['student_id'] = $student_id;
        header("Location: dashboard.php");
        exit();
    }

    echo "<p style='color:red;'>Invalid login details</p>";
}
?>

<h2>Login</h2>
<form method="POST">
    Student ID:<br>
    <input type="text" name="student_id" required><br><br>

    Password:<br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
</form>
