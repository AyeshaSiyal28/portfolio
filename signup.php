<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $age      = $_POST['age'];
    $gender   = $_POST['gender'];
    $dob      = $_POST['dob'];

    // Insert query (use correct table name: users)
    $sql = "INSERT INTO user_db (name, email, password, age, gender, dob) 
            VALUES ('$name', '$email', '$password', '$age', '$gender', '$dob')";

    if ($conn->query($sql) === TRUE) {
        echo "Signup successful! <a href='login.php'>Login here</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Signup</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5 w-50">
  <div class="card p-4 shadow">
    <h2 class="text-center">Sign Up</h2>
    <form method="POST">
      <!-- Name -->
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" required>
      </div>

      <!-- Email -->
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>

      <!-- Password -->
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>

      <!-- Age -->
      <div class="mb-3">
        <label class="form-label">Age</label>
        <input type="number" name="age" class="form-control" min="1" max="120" required>
      </div>

      <!-- Gender -->
      <div class="mb-3">
        <label class="form-label">Gender</label>
        <select name="gender" class="form-select" required>
          <option value="" selected disabled>-- Select Gender --</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
        </select>
      </div>

      <!-- DOB -->
      <div class="mb-3">
        <label class="form-label">Date of Birth</label>
        <input type="date" name="dob" class="form-control" required>
      </div>

      <!-- Submit -->
      <button type="submit" class="btn btn-primary w-100">Sign Up</button>
    </form>

    <p class="mt-3 text-center">Already have an account? <a href="login.php">Login</a></p>
  </div>
</div>
</body>
</html>
