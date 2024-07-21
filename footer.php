<section class="w3l-footer-22">
    <!-- footer-22 -->
    <div class="footer-hny py-5">
        <div class="container py-lg-5">
            <div class="text-txt row">
                <div class="left-side col-lg-4">
                    <h3><a class="logo-footer" href="index.php">
                            Body<span class="lohny">C</span>hic</a></h3>
                    <!-- if logo is image enable this   
                                    <a class="navbar-brand" href="#index.php">
                                        <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
                                    </a> -->
                    <p>When it comes to fashion, visuals are key. BodyChic is an all-inclusive Website aimed at all sizes, ages, ethnicities, genders, and sexual orientations.</p>
                    <ul class="social-footerhny mt-lg-5 mt-4">

                        <li><a class="facebook" href="#"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                        </li>
                        <li><a class="twitter" href="#"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                        </li>
                        <li><a class="google" href="#"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
                        </li>
                        <li><a class="instagram" href="#"><span class="fa fa-instagram" aria-hidden="true"></span></a>
                        </li>
                    </ul>
                </div>

                <div class="right-side col-lg-8 pl-lg-5">
                    <h4>Never get behind the latest fashion trends
                        Trending wear for everyone</h4>
                    <div class="sub-columns">
                        <div class="sub-one-left">
                            <h6>Useful Links</h6>
                            <div class="footer-hny-ul">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="about.php">About</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                </ul>
                                <ul>
                                    <li><a href="#">Careers</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Terms and Conditions</a></li>
                                    <li><a href="contact.php">Support</a></li>
                                </ul>
                            </div>

                        </div>
                        <div class="sub-two-right">
                            <h6>Our Store</h6>
                            <p class="mb-5">Jalandhar - Delhi, Grand Trunk Rd, Phagwara, Punjab 144001</p>

                            <h6>We accept:</h6>
                            <ul>
                                <li><a class="pay-method" href="#"><span class="fa fa-cc-visa" aria-hidden="true"></span></a>
                                </li>
                                <li><a class="pay-method" href="#"><span class="fa fa-cc-mastercard" aria-hidden="true"></span></a>
                                </li>
                                <li><a class="pay-method" href="#"><span class="fa fa-cc-paypal" aria-hidden="true"></span></a>
                                </li>
                                <li><a class="pay-method" href="#"><span class="fa fa-cc-amex" aria-hidden="true"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="below-section row">
                <div class="columns col-lg-6">
                    <ul class="jst-link">
                        <li><a href="#">Privacy Policy </a> </li>
                        <li><a href="#">Term of Service</a></li>
                        <li><a>Customer Care: 7884578837</a> </li>
                    </ul>
                </div>
                <div class="columns col-lg-6 text-lg-right">
                    <p>© 2024 BodyChic. All rights reserved. Design by <a href="https://www.linkedin.com/in/harsika-kumari/">
                            Harsika kumari</a>
                    </p>
                </div>
                <button onclick="topFunction()" id="movetop" title="Go to top">
                    <span class="fa fa-angle-double-up"></span>
                </button>
            </div>
        </div>
    </div>
    <!-- //titels-5 -->
    <!-- move top -->

    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("movetop").style.display = "block";
            } else {
                document.getElementById("movetop").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <!-- /move top -->
</section>


</body>

</html>

<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/jquery-2.1.4.min.js"></script>
<!--/login-->
<script>
    $(document).ready(function() {
        $(".button-log a").click(function() {
            $(".overlay-login").fadeToggle(200);
            $(this).toggleClass('btn-open').toggleClass('btn-close');
        });
    });
    $('.overlay-close1').on('click', function() {
        $(".overlay-login").fadeToggle(200);
        $(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
        open = false;
    });
</script>
<!--//login-->
<script>
    // optional
    $('#customerhnyCarousel').carousel({
        interval: 5000
    });
</script>
<!-- cart-js -->
<script src="assets/js/minicart.js"></script>
<script>
    transmitv.render();

    transmitv.cart.on('transmitv_checkout', function(evt) {
        var items, len, i;

        if (this.subtotal() > 0) {
            items = this.items();

            for (i = 0, len = items.length; i < len; i++) {}
        }
    });
</script>
<!-- //cart-js -->

<!-- disable body scroll which navbar is in active -->

<script>
    $(function() {
        $('.navbar-toggler').click(function() {
            $('body').toggleClass('noscroll');
        })
    });
</script>
<!-- disable body scroll which navbar is in active -->
<script src="assets/js/bootstrap.min.js"></script>