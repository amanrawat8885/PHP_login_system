<?php
session_start();
$userProfile = $_SESSION['user_email'];

if($userProfile == true){

}else{
    header('location: login.php');
}


   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        button{
            font-size: 1.3rem;
            padding: 0.5rem 1rem 0.5rem 1rem;
            border: none;
            background-color: darkmagenta;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
        echo "<h1>Welcome to main page $userProfile Happy to help you</h1>";
    ?>
<br>
    <a href="../login_system_self/login.php"><button type="submit" name="btn">logout</button></a>
</body>
</html>