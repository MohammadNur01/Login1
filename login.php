<?php
session_start();

include("connection.php");
include("function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

        // read from database

        $query = "SELECT * FROM users WHERE user_name = '$user_name' LIMIT 1";

        $result =  mysqli_query($con, $query);
        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if ($user_data['password'] == $password) {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");

                    echo "
                    <div class=\"alert alert-success\" role=\"alert\">
                    Successfully to insert data!
                    </div>
                    ";
                }
            }
        }
        echo "
        <div class=\"alert alert-danger\" role=\"alert\">
        Worng Username or password!
        </div>";
    } else {
        echo "
        <div class=\"alert alert-danger\" role=\"alert\">
        Please enter some valid information!
        </div>";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- my style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Login</title>
</head>

<body>
    <div class="container mt-3 rounded">
        <div id="box">
            <form action="" method="post">
                <h2 class="text-center">Login</h2>
                <label for="username">Username</label>
                <input type="text" name="user_name" id="username">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <input type="submit" value="Login" class=" btn btn-primary mt-3">
                <a class=" btn btn-link text-white mt-3 ml-3" href="signup.php">Signup</a>
            </form>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>