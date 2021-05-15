<?php
    $get_title = "You are reading the post ";
    require_once("./includes/head.php");
    $current_page = basename(__FILE__); 
    require_once("./includes/header.php");
?>

                    <header class="page-header page-header-dark bg-gradient-primary-to-secondary">
                        <div class="page-header-content pt-10">
                            <div class="container text-center">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <h1 class="page-header-title mb-3">Post Title</h1>
                                        <p class="page-header-text">Date, category, time</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="svg-border-rounded text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0" /></svg>
                        </div>
                    </header>
                    <section class="bg-white py-10">
                        <div class="container">
                            <div>
                                <h1>This is a basic content page.</h1>
                                <p class="lead">You can use this page as a starting point to create your own custom pages, or choose an already built example page to start development!</p>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Qui quisquam animi temporibus ipsum iusto necessitatibus laudantium beatae. Eligendi dolorum laudantium numquam? Officiis nemo error animi aliquam dolor consequatur ducimus unde.</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui repellat magni eaque beatae explicabo fugit placeat earum, dolores quaerat aperiam vero adipisci quidem minus officiis blanditiis unde? Incidunt, ea ad.</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis sed illum soluta, quaerat et deleniti magnam laudantium, non omnis numquam quos placeat. Porro autem consectetur dolor minima voluptatum modi maiores.</p>
                            </div>

                        </div>

<?php require_once("./includes/footer.php"); ?>
