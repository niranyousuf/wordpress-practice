
    
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="product-info">
                        <a href="<?php echo site_url() ?>" class="logo">
                            Code<span>Monster</span>
                        </a>
                        <p>Experience remarkable WordPress products with a new level of power, beauty, and human-centered designs. Think you know WordPress products? Think deeper!</p>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="policies footer-links">
                                <h3>Pages</h3>
                                <ul class="links">
                                    <li><a href="<?php echo site_url('/about-us') ?>">About Us</a></li>
                                    <li><a href="<?php echo site_url('/privacy-policy') ?>">Privacy policy</a></li>
                                    <li><a href="#">Refund policy</a></li>
                                    <li><a href="#">Terms & conditions</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="social-media footer-links">
                                <h3>Social media</h3>
                                <ul class="links">
                                    <li><a href="#"><span class="icon icon-facebook"></span> Facebook</a></li>
                                    <li><a href="#"><span class="icon icon-twitter"></span> Twitter</a></li>
                                    <li><a href="#"><span class="icon icon-linkedin"></span> Linkedin</a></li>
                                    <li><a href="#"><span class="icon icon-instagram"></span> Instagram</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="copyright">
                        <p>&copy; <?php echo date('Y') ?> CodeMonster | All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<!-- 
    <div class="search_overlay">
        <div class="search_box">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="field_group">
                            <span class="icon icon-search"></span>
                            <input type="text" placeholder="What are you looking for?" id="search_input" class="search_input">
                            <span class="icon icon-cancel search-hide"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="search_results">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div id="search__results">

                        <h2>Your search results</h2>

                        <ul class="search-result__list">
                            <li><a href="#">JavaScript is the best</a></li>
                            <li><a href="#">WordPres is a CMS system</a></li>
                            <li><a href="#">C is the mother of all language</a></li>
                        </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> -->

    <?php wp_footer(); ?>
</body>

</html>