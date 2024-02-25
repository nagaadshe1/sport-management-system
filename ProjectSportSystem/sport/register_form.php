<?php
@include 'config.php';

if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $phone = $_POST['phone'];
   $gender = $_POST['gender'];
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);

   $stmt = $conn->prepare("SELECT * FROM user_form WHERE email = ? AND password = ?");
   $stmt->bind_param("ss", $email, $pass);
   $stmt->execute();
   $result = $stmt->get_result();
   if (mysqli_num_rows($result) > 0) {

      $error[] = 'user already exist!';
   } else {

      if ($pass != $cpass) {
         $error[] = 'passwords do not match!';
      } else {
         $insert = "INSERT INTO user_form(name, email, phone, gender, password) VALUES('$name','$email','$phone','$gender', '$pass')";
         mysqli_query($conn, $insert);
         $success_msg = 'You have successfully registered!';
         // header("location:homePage.php");
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="register.css">

</head>

<body>

   <div class="form-container">
      <form action="" method="post">
         <h3>register now</h3>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            }
         }
         if (isset($success_msg)) {
            echo '<span class="success-msg">' . $success_msg . '</span>';
         }
         ?>
         <input type="text" name="name" required placeholder="Enter your name">
         <input type="tel" name="phone" required placeholder="Enter your Phone">
         <input type="email" name="email" required placeholder="Enter your email">
         <input type="password" name="password" required placeholder="Enter your password">
         <input type="password" name="cpassword" required placeholder="Confirm your password">
         <div style="display: inline-block; margin-right: 100px;">
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label>
         </div>
         <div style="display: inline-block; margin-right: 10px;">
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label>
         </div>
         <br>
      
         <input type="submit" name="submit" value="register now" class="form-btn">
         <p>Already have an account? <a href="login_form.php">Login now</a></p>
      </form>
   </div>

</body>

</html>