<?php
session_start();
if (!isset($_SESSION['user_db'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Welcome</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5 w-50">
  <div class="card p-5 shadow text-center">
    <h2>Welcome, <?php echo $_SESSION['user_db']; ?> 🎉</h2>
    <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
  </div>
</div>
</body>
</html>