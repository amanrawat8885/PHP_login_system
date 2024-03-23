<?php
    include("./db/database.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM loginself WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        $totalRow = mysqli_num_rows($result);
        if($totalRow == 1){
            session_start();
            $_SESSION['user_email'] = $email;
            header('location: index.php');
        }else{
            echo '<script>alert("Password does not match")</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="container">
        <form action="../login_system_self/login.php" method="POST" autocomplete="off"> <!--this is autometic old email come off -->
            <h2>User Login</h2>
            <div class="input-box">
                <p>Useremail</p>
                <input type="email" name="email" required>
            </div>
            <div class="input-box">
                <p>Password</p>
                <input type="password" name="password" required>
            </div>
            <div class="btn-box">
                <button name="submit" type="submit">Login</button>
                <p style="font-size: 1rem; margin-top: 1rem;">New user?<a href="./signup.php">Register now</a></p>
            </div>
        </form>
    </div>
</body>

</html>