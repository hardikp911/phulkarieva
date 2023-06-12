
<!DOCTYPE html>
<html>
<head>
    <title>Responsive Login Form Design</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<body> 
     <div class="wrapper">
         <div class="headline">
             <h1>Welcome. We exist to make entrepreneurship easier.</h1>
         </div>
         <form class="form" method="post" action="#">
            <div class="signup">
                <div class="form-group">
                    <input type="text" placeholder="Full name" required="">
                </div>
                <div class="form-group">
                    <input type="email" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn">SIGN UP</button>
                <div class="account-exist">
                    Already have an account? <a href="#" id="login">Login</a>
                </div>
            </div>
            <div class="signin"> 
                <div class="form-group">
                    <input type="email" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" required="">
                </div>
                <div class="forget-password">
                    <div class="check-box">
                        <input type="checkbox" id="checkbox">
                        <label for="checkbox">Remember me</label>
                    </div>
                    <a href="#">Forget password?</a>
                </div>
                <button type="submit" class="btn">LOGIN</button>
                <div class="account-exist">
                    Create New a account? <a href="#" id="signup">Signup</a>
                </div>
            </div>
         </form>
     </div>

    <script src="main.js"></script>
</body>
</html>

