<?php require_once('./includes/header.php'); ?>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <?php
                            if (isset($_POST['submit'])) {
                                $email = trim($_POST['email']);
                                $password = trim($_POST['password']);

                                $sql_signin = "SELECT * FROM users WHERE user_email = :email";
                                $stmt = $pdo->prepare($sql_signin);
                                $stmt->execute([
                                    ':email' => $email
                                ]);
                                $count = $stmt->rowCount();
                                if (!$count) {
                                    $error = "Wrong credentials. please login again!";
                                } else if ($count > 1) {
                                    $error = "Wrong credentials. please login again!";
                                } else if ($count == 1) {
                                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                                    $user_password_hash = $user['user_password'];
                                    if (password_verify($password, $user_password_hash)) {
                                        $success = "Sign in successful!";
                                    } else {
                                        $error_password = "Wrong password!";
                                    }
                                }
                            }
                            ?>
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h3 class="font-weight-light my-4">SIGN IN</h3>
                                </div>
                                <div class="card-body">
                                <?php
                                    if (isset($success)) {
                                        echo "<p class='alert alert-success'>{$success}</p>";
                                    }
                                    if (isset($error)) {
                                        echo "<p class='alert alert-danger'>{$error}</p>";
                                    } else if (isset($error_password)) {
                                        echo "<p class='alert alert-danger'>{$error_password}</p>";
                                    }
                                ?>
                                    <form action="signin.php" method="POST">
                                        <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label><input class="form-control py-4" id="inputEmailAddress" name="email" type="email" placeholder="Enter email address" /></div>
                                        <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="Enter password" /></div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox"><input name="check" class="custom-control-input" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Remember password</label></div>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><a class="small" href="#"></a><button name="submit" type="submit" class="btn btn-primary btn-block" href="index.php">SIGN IN</button></div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="signup.php">Need an account? Sign up!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!--Script JS-->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>