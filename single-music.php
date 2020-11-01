<?php
/*
Template Name: Chords & Tabs
Template Post Type: crd_sheet_music
*/
get_header();
echo '<div class="archiveSection bgImage" style="
    background-image: url(' . "/wp-content/themes/nepaliechords/assets/imgs/backgroundImage.jpg" . ');">';
?>
<div class="darkOverlay"></div>
<div class="chordPage titleBox display-table">
    <div class="table-cell">
        <h1 class="text-light display-1">
            Chords & Tabs
        </h1>
    </div>
</div>
</div>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="contentSection">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 box-shadow-full my-3 mx-2">
                <div class="row">
                    <div class="col-md-12">
                        <?php the_content(); ?>
                        <?php
                                if (comments_open() || get_comments_number()) :
                                    get_comments();
                                endif;
                                ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4 box-shadow-full my-3 mx-2">
                <?php get_sidebar('sidebar'); ?>
            </div>
        </div>
    </div>
    <?php endwhile;
else : endif; ?>
    <?php get_footer(); ?>