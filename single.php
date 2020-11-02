<?php
get_header();
if (has_post_thumbnail()) {
    echo '<div class="jumbotron pageSection bgImage d-flex align-items-center" style="
    background-image: url(';
    the_post_thumbnail_url();
    echo ');">';
} else {
    echo '<div class="jumbotron pageSection bgImage d-flex align-items-center" style="
    background-image: url(' . "/wp-content/themes/nepaliechords/assets/imgs/backgroundImage.jpg" . ');">';
}
?>
<div class="darkOverlay"></div>
<div class="singlePage titleBox container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center text-light display-4"><?php the_title(); ?></h1>
            <div class="text-center pageText"><?php the_category(', '); ?></div>
            <?php
            $post_tags = get_the_tags();

            if ($post_tags) {
                echo ("<div class='text-center pageText'><span class='text-light h4'>Tags:</span> ");
                foreach ($post_tags as $tag) {
                    if (count($post_tags) > 1) {
                        echo '<a href="' . get_tag_link($tag->term_id) . '">' . ucwords($tag->name) . '</a>, ';
                    } else {
                        echo '<a href="' . get_tag_link($tag->term_id) . '">' . ucwords($tag->name) . '</a>';
                    }
                }
                echo ("</div>");
            }
            ?>
        </div>
    </div>
</div>
</div>
<?php
get_template_part('inc/page', 'single');
get_footer();
?>