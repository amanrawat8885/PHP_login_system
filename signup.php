<?php
    error_reporting(0);
    include('./db/database.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $img = $_FILES['photo']['name'];
        $tmp_name =$_FILES['photo']['tmp_name'];
        $role = $_POST['role'];

        $existSql = "SELECT * FROM loginself WHERE email = '$email'";
        $result = mysqli_query($conn, $existSql);

        $totalRow = mysqli_num_rows($result);
        if($totalRow > 0){
            echo '<script>alert("User email already exist")</script>';

        }else{
            if($password === $cpassword){
                move_uploaded_file($tmp_name, "./photo/$img");
                $sql = "INSERT INTO loginself (name, email, password, photo, role) 
                VALUES ('$name', '$email', '$password', '$img', '$role')";
                $result = mysqli_query($conn, $sql);
                if($result){
                    echo '<script>alert("Your ragistration successfully please login");
                    window.location = "../login_system_self/login.php";
                    </script>';
                }
            }else{
                echo '<script>alert("Password does not match")</script>';
            }
        }
        
    }
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>signup page</title>
</head>

<body>
    <div class="container d-flex justify-content-center mt-5">
        <form enctype="multipart/form-data" class="row rounded shadow py-5 px-3 col-xl-6 col-lg-8 col-md-8" action="../login_system_self/signup.php" method="POST">
            <h2>User Sign up</h2>
            <div class="col-md-6 my-2">
                <label for="inputEmail4" class="form-label m-0">Username</label>
                <input required type="text" class="form-control" name="name">
            </div>
            <div class="col-md-6 my-2"> 
                <label for="inputPassword4" class="form-label m-0">email</label>
                <input required type="email" class="form-control" id="inputPassword4" name="email">
            </div>
            <div class="col-md-6 my-2">
                <label for="inputPassword4" class="form-label m-0">Password</label>
                <input required type="password" class="form-control" id="inputPassword4" name="password">
            </div>
            <div class="col-md-6 my-2">
                <label for="inputPassword4" class="form-label m-0">confirm password</label>
                <input required type="password" class="form-control" id="inputPassword4" name="cpassword">
            </div>
            <div class="col-md-6 my-2">
                <label for="inputPassword4" class="form-label m-0">Choose photo</label>
                <input required type="file" class="form-control" id="inputPassword4" name="photo">
            </div>
            <div class="col-md-6 my-2">
                <label for="inputPassword4" class="form-label m-0">Select your role</label>
                <select class="form-select outline-0" aria-label="Default select example" name="role" required>
                    <option value="voter">Voter</option>
                    <option value="group">Group</option>
                  </select>
            </div>
            <div class="col-12 mt-4 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Login</button>
                <!-- ./my_php_project/voting system/login.php -->
            </div>
        </form>     
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
