<?php
require_once "../../util/dbConnect.php";

?>
<html>

<head>
    <title>Login</title>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/login.css" rel="stylesheet" type="text/css"/>
</head>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
            
                <form method="post">
                    <h1>Login</h1>
                    <?php              
                    if (isset($_POST['submit'])) {
                        $username = $_POST['username'];
                        $password = md5($_POST['password']);
                        $query = "SELECT * FROM admin WHERE username='{$username}' AND password='{$password}'";
                        $result = $mysqli->query($query);
                        $infoUser = mysqli_fetch_assoc($result);
                        if ($infoUser) {
                            $_SESSION['admin'] = $infoUser;
                            header('Location: ../dashboard');
                        } else {
                            echo "Tài khoản hoặc mật khẩu không chính xác!";
                        }
                    }
                    ?>
                    <div class="container">
                    
                    <label for="uname">Username</label>
                    <input type="text" name="username"  placeholder="Username"><br/>
                    
                    <label for="psw">Password</label>
                    <input type="password" name="password" placeholder="Password">
                    <div class="btn-box">
                    <input type="submit" name="submit" value="Login">
                    </div>  
                    <div>
                    
                </form>
            </div>
        </div>
    </div>
</div>


</html>