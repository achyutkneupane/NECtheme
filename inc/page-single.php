<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="contentSection">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 box-shadow-full my-3 mx-2">
                <div class="row">
                    <div class="col-md-12 text-muted blackLink">
                        <?php
                                echo ("<div class='text-muted mb-3 text-left'>");
                                the_time();
                                echo (" by ");
                                the_author_posts_link();
                                echo ("</div>");
                                ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php
                                the_content();
                                comments_template();
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