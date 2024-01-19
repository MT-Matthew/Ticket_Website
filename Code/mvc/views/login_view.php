<?php

$obj = new user();

$username_register = isset($_POST['username_register']) ? $_POST['username_register'] : "";
$email_register = isset($_POST['email_register']) ? $_POST['email_register'] : "";
$password_register = isset($_POST['password_register']) ? $_POST['password_register'] : "";

$username_login = isset($_POST['username_login']) ? $_POST['username_login'] : "";
$password_login = isset($_POST['password_login']) ? $_POST['password_login'] : "";


?>




<!doctype html>
<html lang="en">

<head>
  <title>Webleb</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://localhost/ticketweb/login-style.css">
</head>

<body>
  <div id="stars"></div>
  <div id="stars2"></div>
  <div id="stars3"></div>
  <div class="section">
    <div class="container">
      <div class="row full-height justify-content-center">
        <div class="col-12 text-center align-self-center py-5">
          <div class="section pb-5 pt-5 pt-sm-2 text-center">
            <h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
            <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
            <label for="reg-log"></label>
            <div class="card-3d-wrap mx-auto">
              <div class="card-3d-wrapper">

                <!--------------------------------------------------------------------------------------------------------------------------------------------------->
                <div class="card-front">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <h4 class="mb-4 pb-3">Log In</h4>
                      <form class="form" method="post" name="login">
                        <div class="form-group mt-2">
                          <input type="text" class="form-style" name="username_login" placeholder="Username" autofocus="true" required />
                          <i class="input-icon uil uil-at"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="password" class="form-style" name="password_login" placeholder="Password" required />
                          <i class="input-icon uil uil-lock-alt"></i>
                        </div>
                        <input type="submit" value="Login" name="submit_login" class="btn mt-4" />

                        <br><br>
                        <?php

                        if (isset($_POST['submit_register'])) {
                          if (!$obj->checkEmail($email_register)) {
                            $obj->AddManager($username_register, $email_register, $password_register);
                            header('Location: http://localhost/ticketweb/home');
                          } else {
                            echo "Email đã được sử dụng";
                          }
                        }

                        if (isset($_POST['submit_login'])) {
                          if ($obj->checkAccount($username_login, $password_login)) {
                            header('Location: http://localhost/ticketweb/home');
                          } else {
                            echo "Tài khoản hoặc mật khẩu sai";
                          }
                        }

                        ?>
                      </form>
                    </div>
                  </div>
                </div>



                <!--------------------------------------------------------------------------------------------------------------------------------------------------->
                <div class="card-back">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <h4 class="mb-3 pb-3">Sign Up</h4>
                      <form class="form" action="" method="post">
                        <div class="form-group">
                          <input type="text" class="form-style" name="username_register" placeholder="Username" required />
                          <i class="input-icon uil uil-user"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="text" class="form-style" name="email_register" placeholder="Email Adress" required>
                          <i class="input-icon uil uil-phone"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="password" class="form-style" name="password_register" placeholder="Password" required>
                          <i class="input-icon uil uil-lock-alt"></i>
                        </div>
                        <input type="submit" name="submit_register" value="Register" class="btn mt-4">



                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>