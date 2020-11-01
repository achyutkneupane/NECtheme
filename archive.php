<?php
get_header();
if (has_post_thumbnail()) {
    echo '<div class="jumbotron pageSection bgImage d-flex align-items-center" style="
    background-image: url(';
    the_post_thumbnail_url();
    echo ');">';
} else {
    echo '<div class="pageSection bgImage" style="
    background-image: url(' . "/wp-content/themes/nepaliechords/assets/imgs/backgroundImage.jpg" . ');">';
}
?>
<div class="darkOverlay"></div>
<div class="singlePage titleBox container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center text-light display-4">
                <?php echo (get_the_archive_title()); ?>
            </h1>
        </div>
    </div>
</div>
</div>
<?php

get_template_part('inc/page', 'archive');
get_footer();
?>