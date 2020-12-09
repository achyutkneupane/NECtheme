</body>
<div class="footerSection">
    <div class="container-fluid py-3">
        <div class="row">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <?php dynamic_sidebar('new-sidebar-2'); ?>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col-md-4 p-4">
                        <div class="row pb-2">
                            <div class="col-md-12 title h1">Contact Us</div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text h5">
                                <i class="fa fa-map-marker mr-4" aria-hidden="true"></i>
                                Thapagaun, Kathmandu
                            </div>
                            <div class="col-md-12 text h5">
                                <i class="fa fa-envelope mr-3" aria-hidden="true"></i>
                                <a href="mailto:nepalitabs@gmail.com">nepalitabs@gmail.com</a>
                            </div>
                            <div class="col-md-12 text h5">
                                <i class="fa fa-phone mr-4" aria-hidden="true"></i>
                                <a href="tel:+9779823734019">+(977)98-23734019</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 p-4">
                        <div class="row pb-2">
                            <div class="col-md-12 title h1">About Us</div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text h5">
                                Most popular online portal in the Nepali music scene. Started
                                <?php echo (date("Y") - 2012); ?> years ago as the first
                                Nepali channel to offer comprehensive guitar lessons, over the years, we expanded our
                                services in promoting, preserving and cultivating Nepali music like none others.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 p-4">
                        <div class="row pb-2">
                            <div class="col-md-12 title h1">Social Media</div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 social-btn">
                                <a href="https://facebook.com/nepaliechords" target="_blank">
                                    <div class="social face"><i class="fa fa-facebook fa-2x"></i>
                                    </div>
                                </a>
                                <a href="https://instagram.com/nepaliechords" target="_blank">
                                    <div class="social insta"><i class="fa fa-instagram fa-2x"></i>
                                    </div>
                                </a>
                                <a href="https://youtube.com/NepaliEChords" target="_blank">
                                    <div class="social yt"><i class="fa fa-youtube fa-2x"></i>
                                    </div>
                                </a>
                                <a href="mailto:nepalitabs@gmail.com" target="_blank">
                                    <div class="social gmail"><i class="fa fa-envelope fa-2x"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            &copy; <?php echo date("Y"); ?> | <a href="<?php the_permalink(); ?>"><?php bloginfo('name'); ?></a>
        </div>
    </div>
</div>
</div>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-V1CHYMCFDP"></script>
<script>
window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());

gtag('config', 'G-V1CHYMCFDP');
</script>

</html>

<?php
wp_footer();

if (is_user_logged_in()) {
    echo '
        <script>
        document.getElementById("TitleBox").style.height = "93vh";
        $(window).trigger("scroll");
        $(window).on("scroll", function () {
            if ($(window).scrollTop() > 10) {
                if ($(window).width() < 768) {
                    document.getElementById("mainNav").style.top = "0";
                }
                else {
                    document.getElementById("mainNav").style.top = "32px";
                }
            } else {
                if ($(window).width() < 768) {
                    document.getElementById("mainNav").style.top = "32px";
                }
                else {
                    document.getElementById("mainNav").style.top = "18px";
                }
            }   
            });
        </script>
        ';
}
?>