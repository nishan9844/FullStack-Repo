<?php
require "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $student_id = $_POST['student_id'];
    $full_name  = $_POST['full_name'];
    $password   = $_POST['password'];

    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO students (student_id, full_name, password_hash)
            VALUES (:student_id, :full_name, :password_hash)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            ':student_id' => $student_id,
            ':full_name' => $full_name,
            ':password_hash' => $password_hash
        ]);

        header("Location: login.php");
        exit();
    } catch (PDOException $e) {
        echo "Registration failed";
    }
}
?>

<h2>Register</h2>
<form method="POST">
    Student ID:<br>
    <input type="text" name="student_id" required><br><br>

    Full Name:<br>
    <input type="text" name="full_name" required><br><br>

    Password:<br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Register</button>
</form>