<?php
    session_start();
    require_once("config.php");
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT name, email, event FROM user_form WHERE id = '$user_id'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $eventName = $row['event'];
    $user_name = $row['name'];
    $user_email = $row['email'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Participant Profile</title>
    <link rel="stylesheet" type="text/css" href="user.css">
</head>

<body>
    <div class="container">
        <h1>Participant Profile</h1>
        <form action="" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $user_name ?>">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user_email ?>">

            <label for="event">Event:</label>
            <input id="event" name="event" value="<?php echo $eventName; ?>">

            <button type="submit" name="update">Update Profile</button>
            <?php 
                if(isset($_POST['update'])){
                    
                }
            ?>
            <button type="button" onclick="deleteEvent()">Delete Profile</button>
        </form>
    </div>

    <script>
    function deleteEvent() {
        var confirmDelete = confirm("Are you sure you want to delete your profile?");
        if (confirmDelete) {
            // Submit form to delete_profile.php
        }
    }
    </script>
</body>

</html>