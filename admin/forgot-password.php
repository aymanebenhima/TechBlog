<?php 
    $get_title = "Reset password";
    require_once('../includes/db.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title><?php echo $get_title; ?> Dashboard || Admin Panel</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="js/all.min.js"></script>
        <script src="js/feather.min.js"></script>
    </head>
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h3 class="font-weight-light my-4">Password Recovery</h3>
                                </div>
                                <div class="card-body">
                                <div class="small mb-3 text-muted">Enter your email address and we will send you a link to reset your password.</div>
                                    <?php
                                        if (isset($_POST['reset'])) {
                                            $nickname = trim($_POST['nickname']);
                                            $email = trim($_POST['email']);

                                            $sql = "SELECT * FROM users WHERE user_nickname = :nickname AND user_email = :email";
                                            $stmt = $pdo->prepare($sql);
                                            $stmt->execute([
                                                ':nickname' => $nickname,
                                                ':email' => $email
                                            ]);

                                            $count = $stmt->rowCount();
                                            if ($count) {
                                                $user =$stmt->fetch(PDO::FETCH_ASSOC);
                                                $user_id = $user['user_id'];
                                                $show = "new password";   
                                            } else {
                                                echo '<p class="alert alert-danger">Wrong credentials</p>';
                                            }
                                        }
                                        
                                        if (isset($_POST['update'])) {
                                            $password = trim($_POST['password']);
                                            $confirm_password = trim($_POST['confirm-password']);
                                            $user_id = $_POST['id'];
                                            $show = "new password";
                                            if ($password == $confirm_password) {
                                                $hash_password = password_hash($password, PASSWORD_BCRYPT, ['cost'=> 10]);
                                                $sql = "UPDATE users SET user_password = :password WHERE user_id = :id";
                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute([
                                                    ':password' => $hash_password,
                                                    ':id' => $user_id
                                                ]);
                                                echo '<p class="alert alert-success">Password updated <a href="signin.php">Login now!</a></p>';
                                            } else {
                                                echo '<p class="alert alert-danger">Password does not match!</p>';
                                            }
                                        }
                                    ?>
                                    <?php if (!isset($show)) : ?>
                                        <form action="forgot-password.php" method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputNickname">Nickname</label>
                                                <input name="nickname" class="form-control py-4" id="inputNickname" type="text" placeholder="Enter your nickname" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input name="email" class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="signin.php">Return to sign in</a>
                                                <button class="btn btn-primary" name="reset" type="submit">Reset Password</button>
                                            </div>
                                        </form>
                                    <?php else : ?>
                                        <form action="forgot-password.php" method="POST">
                                            <div class="form-group">
                                                <input name="id" class="form-control py-4" value="<?php echo $user_id ?>" type="hidden" />
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input name="password" class="form-control py-4" id="inputPassword" type="password" placeholder="Enter your new password" required />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputConfirmPassword">Confirm password</label>
                                                <input name="confirm-password" class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Confirm your password" required />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" name="update" type="submit">Update Password</button>
                                            </div>
                                        </form>

                                    <?php endif; ?>
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