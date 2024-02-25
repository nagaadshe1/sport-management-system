<?php
@include 'config.php';
session_start();

if (isset($_POST['submit'])) {
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   $stmt = $conn->prepare("SELECT * FROM user_form WHERE email = ? AND password = ?");
   $stmt->bind_param("ss", $email, $pass);
   $stmt->execute();
   $result = $stmt->get_result();

   if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);
      if (($row['name']) == 'name') {
         $_SESSION['user_name'] = $row['name'];
         header('location:homePage.php');
         exit();
      } elseif (($row['name']) && $row['name'] != 'name') {
         $_SESSION['user_id'] = $row['id'];
         header('Location:homePage.php');
         exit();
      }
   } else {
      $error = "Incorrect email, password!";
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>
   <link rel="stylesheet" href="register-login.css">
</head>

<body>
   <div class="form-container">
      <form action="" method="post">
         <h3>Login Now</h3>
         <?php if (isset($error)) : ?>
            <div class="error-msg"><?php echo $error; ?></div>
         <?php endif; ?>
         <input type="email" name="email" required placeholder="Enter your email">
         <input type="password" name="password" required placeholder="Enter your password">
         <input type="submit" name="submit" value="Login Now" class="form-btn">
         <p>Don't have an account? <a href="register_form.php">Register Now</a></p>
      </form>
   </div>
   <div>
      <a href="mycart.php" class="btn btn-outline-success">My Events (0)</a>
   </div>
</body>

</html>
