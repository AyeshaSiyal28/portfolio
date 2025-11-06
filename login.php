<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $sql    = "SELECT * FROM user_db WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_db'] = $user['name'];
            header("Location: welcome.php");
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5 w-50">
  <div class="card p-4 shadow">
    <h2 class="text-center">Login</h2>
    <form method="post">
      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-success w-100">Login</button>
    </form>
    <p class="mt-3 text-center">Don't have an account? <a href="signup.php">Sign Up</a></p>
  </div>
</div>
</body>
</html>
