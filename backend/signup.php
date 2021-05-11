
<?php require_once('./includes/header.php'); ?>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <?php
                        if (isset($_POST['submit'])) {
                            $first_name = trim($_POST['first-name']);
                            $last_name = trim($_POST['last-name']);
                            $full_name = $first_name . " " . $last_name;
                            $nickname = trim($_POST['nickname']);
                            $email = trim($_POST['email']);
                            $password = trim($_POST['password']);
                            $confirm_password = trim($_POST['confirm-password']);
                            if ($password != $confirm_password) {
                                $error = "Password doesn't match!";
                            } else {
                                date_default_timezone_set('Africa/Casablanca');
                                $hash = password_hash($password, PASSWORD_BCRYPT, ['cost'=> 10]);
                                $sql_add_user = "INSERT INTO users (user_name, user_nickname, user_nickname, user_password, user_photo, registered_on) VALUES (:name, :nickname, :email, :password, :photo, :date)";
                                $stmt = $pdo->prepare($sql_add_user);
                                $stmt->execute([
                                    ':name'     => $full_name,
                                    ':nickname'     => $nickname,
                                    ':email'    => $email,
                                    ':password' => $hash,
                                    ':photo' => 'avatar.png',
                                    ':date' => date('M n, Y') . ' at ' . date('h:i A')
                                ]);
                                $success = "Account created successefully <a href='signin.php'>Sign in now</a>";
                            }
                        }
                    ?>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header justify-content-center"><h3 class="font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form action="signup.php" method="POST">
                                        <?php
                                            if (isset($error)) {
                                                echo "<p class='alert alert-danger'>{$error}</p>";
                                            } elseif (isset($success)) {
                                                echo "<p class='alert alert-success'>{$success}</p>";
                                            }
                                        ?>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputFirstName">First Name</label><input name="first-name" class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter first name" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputLastName">Last Name</label><input name="last-name" class="form-control py-4" id="inputLastName" type="text" placeholder="Enter last name" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputUserNickname">Nickname</label><input name="nickname" class="form-control py-4" id="inputUserNickname" type="text" placeholder="Enter Nickname" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label><input name="email" class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input name="password" class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputConfirmPassword">Confirm Password</label><input name="confirm-password" class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Confirm password" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0"><button name="submit" class="btn btn-primary btn-block" href="#">Create Account</button></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="signin.php">Have an account? Go to signin</a></div>
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
