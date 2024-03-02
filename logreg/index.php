<?php
    include_once "header.php"
?>

<section class="index-login">
    <div class="wrapper">
        <div class="index-login-register">
            <h3>Register</h3>
            <p>Register a new account</p>
            <form action="include/register.php" method= "post">
                
                <input type="text" name="username" placeholder="Username" required>
           
                <input type="password" name="password" placeholder="Password" required>
         
                <input type="password" name="repeatPass" placeholder="Confirm Password">
                 
                <input type="email" name="email" placeholder="Email" required>
                 
                <br>
                <button type="submit" class="btn">Register</button>
            </form> 
        
        <div class="index-login-login">
                <h3>Login</h3>
                <form action="include/login.php" method="post">
                <input type="text" name="username" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>   
            <div>
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
              </div>
              <button type="submit" class="btn">Login</button>
              <div class="remember-forgot">
                <br>
                    <a href="#">Forgot password?</a>
                </div>
            </form>
        </div>       
    </div> 
</section>


