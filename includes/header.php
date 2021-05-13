<?php session_start(); ?>
    <div id="layoutDefault">
            <div id="layoutDefault_content">
                <main>
                    
                    <nav class="navbar navbar-marketing navbar-expand-lg bg-white navbar-light">
                        <div class="container">
                            <a class="navbar-brand text-dark" href="index.php">Bloggy</a><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><img src="img/menu.png" style="height:20px;width:25px" /><i data-feather="menu"></i></button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto mr-lg-5">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php">Home </a>
                                    </li>
                                    <li class="nav-item dropdown no-caret">
                                        <a class="nav-link" href="contact.php">Contact</a>
                                    </li>
                                    <li class="nav-item dropdown no-caret">
                                        <a class="nav-link" href="about.php">About</a>
                                    </li>
                                </ul>
                                <?php if (isset($_SESSION['login'])) : ?>
                                    <form action="signout.php">
                                        <button type="submit" class="btn-teal btn rounded-pill px-4 ml-lg-4">Sign out - <?php echo $_SESSION['user_name']; ?><i class="fas fa-arrow-right ml-1"></i></button>
                                    </form>
                                <?php else: ?>
                                    <?php if (!isset($_COOKIE['_uid_']) && !isset($_COOKIE['_uiid_'])) : ?>
                                        <a class="btn-teal btn rounded-pill px-4 ml-lg-4" href="admin/signin.php">Sign in<i class="fas fa-arrow-right ml-1"></i></a>
                                        <a class="btn-teal btn rounded-pill px-4 ml-lg-4" href="admin/signup.php">Sign up<i class="fas fa-arrow-right ml-1"></i></a>
                                    <?php else: ?>
                                        <?php 
                                            $user_id = base64_decode($_COOKIE['_uid_']);
                                            $user_nickname = base64_decode($_COOKIE['_uiid_']);
                                            $sql = "SELECT * FROM users WHERE user_id = :id AND user_nickname = :nickname";
                                            $stmt = $pdo->prepare($sql);
                                            $stmt->execute([
                                                ':id' => $user_id,
                                                ':nickname' => $user_nickname,
                                            ]);
                                            $user = $stmt->fetch(PDO::FETCH_ASSOC);
                                            $user_name = $user['user_name'];
                                        ?>
                                        <form action="signout.php">
                                            <button type="submit" class="btn-teal btn rounded-pill px-4 ml-lg-4">Sign out - <?php echo $user_name; ?><i class="fas fa-arrow-right ml-1"></i></button>
                                        </form>
                                    <?php endif; ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    </nav>