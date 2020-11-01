<div class="contentSection">
    <div class="container-fluid my-3">
        <div class="row justify-content-center">
            <?php if (have_posts()) : while (have_posts()) : the_post();
                    if (get_post_type() == 'crd_sheet_music') {
            ?>
            <div class="box-shadow-full col-md-5 m-2">

                <?php
                            echo ("<div class='row justify-content-between'>
                        <div class='col-md-4'>
                        <img src='");
                            the_post_thumbnail_url();
                            echo ("' style='height: 100%; width: 100%; object-fit: contain;'>
                        </div>
                        <div class='col-md-8'><a href='");
                            the_permalink();
                            echo ("'><h5>");
                            the_title();
                            echo ("</h5></a>
                        <div class='text-muted blackLink'>");
                            the_time();
                            echo (" by ");
                            the_author_posts_link();
                            echo ("</div><div class='archiveText' style='font-size: 20px !important;'>");
                            the_excerpt();
                            echo ("</div></div></div>");
                            ?>
            </div>
            <?php
                    }
                endwhile;
            else : endif; ?>
        </div>
    </div>
    <?php if ((get_previous_posts_link() != NULL) || (get_next_posts_link() != NULL)) {
    ?>
    <div class="container my-2">
        <div class="row justify-content-center">
            <?php
                if ((get_previous_posts_link() != NULL))
                    echo ("<div class='text-center btn btn-dark whiteLink mx-1'>" . get_previous_posts_link() . "</div>");
                ?>
            <?php
                if ((get_next_posts_link() != NULL))
                    echo ("<div class='text-center btn btn-dark whiteLink mx-1'>" . get_next_posts_link() . "</div>");
                ?>
        </div>
    </div>
    <?php
    }
    ?>
</div>