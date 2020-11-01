<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="contentSection">
    <div class="container box-shadow-full my-3">
        <div class="row">
            <div class="col-md-12">
                <?php
                        if (get_the_content() !== NULL) {
                            the_content();
                        } else
                            echo ("<div class='display-4 text-center'>UNDER CONSTRUCTION !!!</div>");
                        ?>

            </div>
        </div>
    </div>
</div>
<?php endwhile;
else : endif; ?>