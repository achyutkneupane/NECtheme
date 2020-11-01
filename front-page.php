<?php
get_header();
?>
<div class="homeSection bgImage" style="
  background-image: url('/wp-content/themes/nepaliechords/assets/imgs/backgroundImage.jpg');">
    <div class="darkOverlay"></div>
    <div class="titleBox display-table" id="TitleBox">
        <div class="table-cell">
            <h1 class="text-light display-1"><?php bloginfo('name'); ?></h1>
            <hr />
            <h3 class="text-light mt-3 subTitle">
                <?php bloginfo('description'); ?>
            </h3>
            <div class="subtext text-light">
                <?php echo (get_the_content()); ?>
            </div>
        </div>
    </div>
</div>

<div class="blogSection">
    <div class="container box-shadow-full my-5">
        <div class="row">
            <div class="col-md-12 display-4 text-center pb-4" style="color: #141446;">Articles</div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="nepaliechords-articles-tab" role="tablist"
                    aria-orientation="vertical">
                    <a class="nav-link bg-light text-dark my-1 active" id="nepaliechords-news-tab" data-toggle="pill"
                        href="#nepaliechords-news" role="tab" aria-controls="nepaliechords-news"
                        aria-selected="true">News</a>
                    <a class="nav-link bg-light text-dark my-1" id="nepaliechords-release-tab" data-toggle="pill"
                        href="#nepaliechords-release" role="tab" aria-controls="nepaliechords-release"
                        aria-selected="false">Recent Releases</a>
                    <a class="nav-link bg-light text-dark my-1" id="nepaliechords-interviews-tab" data-toggle="pill"
                        href="#nepaliechords-interviews" role="tab" aria-controls="nepaliechords-interviews"
                        aria-selected="false">Interviews</a>
                    <a class="nav-link bg-light text-dark my-1" id="nepaliechords-events-tab" data-toggle="pill"
                        href="#nepaliechords-events" role="tab" aria-controls="nepaliechords-events"
                        aria-selected="false">Events</a>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="nepaliechords-articles-tabContent">
                    <div class="tab-pane fade show active" id="nepaliechords-news" role="tabpanel"
                        aria-labelledby="nepaliechords-news-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <?php get_catg_post('news'); ?>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="<?php echo (esc_url(get_category_link(get_cat_ID('news')))); ?>"
                                    class="btn btn-outline-dark">View All News</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nepaliechords-release" role="tabpanel"
                        aria-labelledby="nepaliechords-release-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <?php get_catg_post('new-releases'); ?>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="<?php echo esc_url(get_category_link('7')); ?>"
                                    class="btn btn-outline-dark">View All Releases</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nepaliechords-interviews" role="tabpanel"
                        aria-labelledby="nepaliechords-interviews-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <?php get_catg_post('interview') ?>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="<?php echo esc_url(get_category_link(get_cat_ID('interviews'))); ?>"
                                    class="btn btn-outline-dark">View All Interviews</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nepaliechords-events" role="tabpanel"
                        aria-labelledby="nepaliechords-events-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <?php get_catg_post('events'); ?>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="<?php echo esc_url(get_category_link(get_cat_ID('events'))); ?>"
                                    class="btn btn-outline-dark">View All Events</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
get_footer();
?>