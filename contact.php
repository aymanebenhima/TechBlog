<?php
    $get_title = "Contact us";
    require_once("./includes/head.php");
    $current_page = basename(__FILE__); 
    require_once("./includes/header.php");
?>

                    <header class="page-header page-header-dark bg-gradient-primary-to-secondary">
                        <div class="page-header-content pt-10">
                            <div class="container text-center">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <h1 class="page-header-title mb-3"><?php echo $get_title; ?></h1>
                                        <p class="page-header-text">We will back to you in a week!</p>
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
                            
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6"><label class="text-dark" for="inputName">Full name</label><input class="form-control py-4" id="inputName" type="text" placeholder="Full name" /></div>
                                    <div class="form-group col-md-6"><label class="text-dark" for="inputEmail">Email</label><input class="form-control py-4" id="inputEmail" type="email" placeholder="name@example.com" /></div>
                                </div>
                                <div class="form-group"><label class="text-dark" for="inputMessage">Message</label><textarea class="form-control py-3" id="inputMessage" type="text" placeholder="Enter your message..." rows="4"></textarea></div>
                                <div class="text-center"><button class="btn btn-primary btn-marketing mt-4" type="submit">Submit Request</button></div>
                            </form>

                        </div>

                        <div class="svg-border-rounded text-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34" preserveAspectRatio="none" fill="currentColor"><path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0" /></svg>
                        </div>
                    </section>
                </main>
            </div>
            <div id="layoutDefault_footer">
                <footer class="footer pt-4 pb-4 mt-auto bg-dark footer-dark">
                    <div class="container">
                        <hr class="my-1" />
                        <div class="row align-items-center">
                            <div class="col-md-6 small">Copyright &#xA9; Your Website 2020</div>
                            <div class="col-md-6 text-md-right small">
                                <a href="#">Privacy Policy</a>
                                &#xB7;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
<?php require_once("./includes/footer.php"); ?>
