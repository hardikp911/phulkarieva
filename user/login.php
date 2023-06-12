<?php
session_start();

include("../database/connection.php"); // Include the database connection file
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['signup'])) {
        // Retrieve form data
        $fullname = $_POST['signup_fullname'];
        $email = $_POST['signup_email'];
        $password = $_POST['signup_password'];
        // Perform validation on the form data


        // if (!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z\d]).{8,15}$/', $password)) {

        //     $message = "Password must contain at least one uppercase letter, one digit, one symbol, and be between 8 and 15 characters long.";
        // }
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


        // If validation passes, insert the user data into the database
        $sql = "INSERT INTO login (fullname, email, password) VALUES ('$fullname', '$email', '$hashedPassword')";
        if (mysqli_query($conn, $sql)) {
            // User registration successful
            $_SESSION['fullname'] = $fullname;
            $_SESSION['email'] = $email;
            header("Location: index.php");
            exit();
        } else {
            // User registration failed
            // Handle the error or redirect to an error page
            echo "Error: " . mysqli_error($conn);
        }
    }

    if (isset($_POST['login'])) {
        $email = $_POST['login_email'];
        $password = $_POST['login_password'];
        $sql = "SELECT password FROM login WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $hashedPasswordFromDatabase = $row['password'];
                // Verify the password
                if (password_verify($password, $hashedPasswordFromDatabase)) {
                    $_SESSION['email'] = $email;
                    header("Location: index.php");
                    exit();
                } else {
                    $message = "Password is incorrect";
                }
            } else {
                $message = " No matching email found in the database";
            }
        } else {
            $message = "Query execution error";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login/SignUp page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="./login.css">
</head>

<body>
    <div class="wrapper">
        <div class="headline">
            <h2>Empowering women's fashion entrepreneurship effortlessly. Welcome to Phulkari eva.</h2>
        </div>
        <div class="signup">
            <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                <div class="form-group">
                    <input type="text" name="signup_fullname" placeholder="Full name" required="">
                </div>
                <div class="form-group">
                    <input type="email" name="signup_email" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="signup_password" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn" name="signup">SIGN UP</button>
                <div class="error-message"><?php if (isset($message)) {  print_r($message);   }  ?></div>
                <div class="account-exist">
                    Already have an account? <a href="#" id="login">Login</a>
                </div>
            </form>
        </div>
        <div class="signin">
            <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <input type="email" name="login_email" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="login_password" placeholder="Password" required="">
                </div>
                <div class="forget-password">
                    <div class="check-box">
                        <!-- <input type="checkbox" id="checkbox" name="remember_me"> -->
                        <!-- <label for="checkbox">Remember me</label> -->
                    </div>
                    <a href="#">Forget password?</a>
                </div>
                <button type="submit" class="btn" name="login">LOGIN</button>
                <div class="error-message"><?php if (isset($message)) {  print_r($message);   }  ?></div>
                <div class="account-exist">
                    Create a new account? <a href="#" id="signup">Signup</a>
                </div>
            </form>

        </div>

    </div>

    <script src="./login.js"></script>
</body>

</html>