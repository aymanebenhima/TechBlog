<?php $get_title = "Browse every blog you need in"; ?>
<?php require_once("./includes/header.php"); ?>

                    <header class="page-header page-header-dark bg-secondary">
                        <div class="page-header-content">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-xl-8 col-lg-10 text-center">

                                        <h1 class="page-header-title">Welcome to Bloggy</h1>
                                        <p class="page-header-text mb-5">Are you searching for some content that you haven't found yet? Try searching in the search box below!</p>
                                        <form class="page-header-signup mb-2 mb-md-0" action="search.php" method="POST">
                                            <div class="form-row justify-content-center">
                                                <div class="col-lg-6 col-md-8">
                                                    <div class="form-group mr-0 mr-lg-2"><input name="search-key" class="form-control form-control-solid rounded-pill" type="text" placeholder="Search keyword..."/></div>
                                                </div>
                                                <div class="col-lg-3 col-md-4"><button class="btn btn-teal btn-block btn-marketing rounded-pill" type="submit">Search</button></div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="svg-border-waves text-white">
                            <svg class="wave" style="pointer-events: none" fill="currentColor" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 75">
                                <defs>
                                    <style>
                                        .a {
                                            fill: none;
                                        }
                                        .b {
                                            clip-path: url(#a);
                                        }
                                        .d {
                                            opacity: 0.5;
                                            isolation: isolate;
                                        }
                                    </style>
                                    <clipPath id="a"><rect class="a" width="1920" height="75" /></clipPath>
                                </defs>
                                <title>wave</title>
                                <g class="b"><path class="c" d="M1963,327H-105V65A2647.49,2647.49,0,0,1,431,19c217.7,3.5,239.6,30.8,470,36,297.3,6.7,367.5-36.2,642-28a2511.41,2511.41,0,0,1,420,48" /></g>
                                <g class="b"><path class="d" d="M-127,404H1963V44c-140.1-28-343.3-46.7-566,22-75.5,23.3-118.5,45.9-162,64-48.6,20.2-404.7,128-784,0C355.2,97.7,341.6,78.3,235,50,86.6,10.6-41.8,6.9-127,10" /></g>
                                <g class="b"><path class="d" d="M1979,462-155,446V106C251.8,20.2,576.6,15.9,805,30c167.4,10.3,322.3,32.9,680,56,207,13.4,378,20.3,494,24" /></g>
                                <g class="b"><path class="d" d="M1998,484H-243V100c445.8,26.8,794.2-4.1,1035-39,141-20.4,231.1-40.1,378-45,349.6-11.6,636.7,73.8,828,150" /></g>
                            </svg>
                        </div>
                    </header>
                    <section class="bg-white py-10">
                        <!--Start-->
                        <div class="container">
                        <h1>Most popular post:</h1>
                        <hr />
                        <?php 
                            $sql_most_popular = "SELECT * FROM posts WHERE post_status = :status ORDER BY post_views DESC LIMIT  0, 1";
                            $stmt = $pdo->prepare($sql_most_popular);
                            $stmt->execute([
                                ':status'   => 'Published'
                            ]);
                            while($post = $stmt->fetch(PDO::FETCH_ASSOC)):
                                $post_id = $post['post_id'];
                                $post_title = $post['post_title'];
                                $post_detail = substr($post['post_detail'], 0, 300);
                                $post_image = $post['post_image'];
                                $post_date = $post['post_date'];
                                $post_author = $post['post_author'];
                                $post_views = $post['post_views'];

                        ?>
                            <a class="card post-preview post-preview-featured lift mb-5" href="single.php?post_id=<?php echo $post_id; ?>">
                                <div class="row no-gutters">
                                    <div class="col-lg-5"><div class="post-preview-featured-img" style='background-image: url("<?php echo $post_image; ?>")'></div></div>
                                    <div class="col-lg-7">
                                        <div class="card-body">
                                            <div class="py-5">
                                                <h5 class="card-title"><?php echo $post_title; ?></h5>
                                                <p class="card-text"><?php echo $post_detail; ?>...</p>
                                            </div>
                                            <hr />
                                            <div class="post-preview-meta">
                                                <img class="post-preview-meta-img" src="./img/avatar.png" />
                                                <div class="post-preview-meta-details">
                                                    <div class="post-preview-meta-details-name"><?php echo $post_author; ?></div>
                                                    <div class="post-preview-meta-details-date">Posted on: <?php echo $post_date; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php endwhile; ?>
                            <h1>Recent posting:</h1>
                            <hr />
                            <div class="row">
                            <?php
                                $sql_posts = "SELECT * FROM posts WHERE post_status = :status ORDER BY post_id DESC LIMIT 0, 6";
                                $stmt = $pdo->prepare($sql_posts);
                                $stmt->execute([
                                    ':status' => 'Published'
                                ]);
                                while ($posts = $stmt->fetch(PDO::FETCH_ASSOC)) :
                                    $post_id = $posts['post_id'];
                                    $post_title = $posts['post_title'];
                                    $post_detail = substr($posts['post_detail'], 0, 140);
                                    $post_image = $posts['post_image'];
                                    $post_date = $posts['post_date'];
                                    $post_author = $posts['post_author'];
                                    $post_views = $posts['post_views'];
                            ?>
                                <div class="col-md-6 col-xl-4 mb-5">
                                    <a class="card post-preview lift h-100" href="single.php?post_id=<?php echo $post_id; ?>"
                                        ><img class="card-img-top" src="<?php echo $post_image; ?>" alt="<?php echo $post_image; ?>" />
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $post_title; ?></h5>
                                            <p class="card-text"><?php echo $post_detail; ?> ...</p>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <div class="post-preview-meta">
                                                <img class="post-preview-meta-img" src="./img/avatar.png" />
                                                <div class="post-preview-meta-details">
                                                    <div class="post-preview-meta-details-name"><?php echo $post_author; ?></div>
                                                    <div class="post-preview-meta-details-date">Posted on: <?php echo $post_date; ?></div>
                                                </div>
                                            </div>
                                            <div class="post-preview-meta">
                                                <?php echo $post_views; ?>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile; ?>
                            </div>

                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-blog justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#!" aria-label="Previous"><span aria-hidden="true">&#xAB;</span></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#!">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#!">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#!">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#!">12</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#!" aria-label="Next"><span aria-hidden="true">&#xBB;</span></a>
                                    </li>
                                </ul>
                            </nav>


                            <h1 class="pt-5">Most viewed posts:</h1>
                            <hr />
                            <div class="row">
                            <?php
                                $sql_viewed_posts = "SELECT * FROM posts WHERE post_status = :status ORDER BY post_views DESC LIMIT 0, 3";
                                $stmt = $pdo->prepare($sql_viewed_posts);
                                $stmt->execute([
                                    ':status'   => 'Published'
                                ]);
                                while($posts = $stmt->fetch(PDO::FETCH_ASSOC)):
                                    $post_id = $posts['post_id'];
                                    $post_title = $posts['post_title'];
                                    $post_detail = substr($posts['post_detail'], 0, 140);
                                    $post_image = $posts['post_image'];
                                    $post_date = $posts['post_date'];
                                    $post_author = $posts['post_author'];
                            ?>
                                <div class="col-md-6 col-xl-4 mb-5">
                                    <a class="card post-preview lift h-100" href="single.php?post_id=<?php echo $post_id; ?>"
                                        ><img class="card-img-top" src="<?php echo $post_image; ?>" alt="<?php echo $post_image; ?>" />
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $post_title; ?></h5>
                                            <p class="card-text"><?php echo $post_detail; ?> ...</p>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <div class="post-preview-meta">
                                                <img class="post-preview-meta-img" src="./img/avatar.png" />
                                                <div class="post-preview-meta-details">
                                                    <div class="post-preview-meta-details-name"><?php echo $post_author; ?></div>
                                                    <div class="post-preview-meta-details-date">Posted on: <?php echo $post_date; ?></div>
                                                </div>
                                            </div>
                                            <div class="post-preview-meta">
                                                <?php echo $post_views; ?>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile; ?>
                            </div>

                            <h1 class="pt-5">Browse by categories:</h1>
                            <hr />
                            <div class="row features text-center mb-5">
                            <?php
                                $sql_categories = "SELECT * FROM categories WHERE category_status = :status";
                                $stmt = $pdo->prepare($sql_categories);
                                $stmt->execute([
                                    ':status' => 'Published'
                                ]);
                                while ($categories = $stmt->fetch(PDO::FETCH_ASSOC)) :
                                    $category_id = $categories['category_id'];
                                    $category_name = $categories['category_name'];
                                    $category_total_posts = $categories['category_total_posts'];
                            ?>
                                <div class="col-lg-4 col-md-6 mb-5">
                                    <a class="card card-link border-top border-top-lg border-primary h-100 lift" href="categories.php?category_id=<?php echo $category_id . "&category_name=" . $category_name; ?>"
                                        ><div class="card-body p-5">
                                            <div class="icon-stack icon-stack-lg bg-primary-soft text-primary mb-4"><i data-feather="user"></i></div>
                                            <h6><?php echo $category_name; ?></h6>
                                        </div>
                                        <div class="card-footer bg-transparent pt-0 pb-5"><div class="badge badge-pill badge-light font-weight-normal px-3 py-2"><?php echo $category_total_posts . " Post" . $is_plural=($category_total_posts)>1?"s":""; ?></div></div></a
                                    >
                                </div>
                            <?php endwhile; ?>
                            </div>

                        </div>
                        <!--End-->   

<?php require_once("./includes/footer.php"); ?>
