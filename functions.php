<?php
function nec_themesupport()
{
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'nec_themesupport');

function nec_bootstrapnav()
{
    require_once get_template_directory() . '/inc/wp-bootstrap-nav.php';
    register_nav_menus(array(
        'primary' => __('Main_Menu'),
    ));
}
add_action('after_setup_theme', 'nec_bootstrapnav');

function nec_stylefetch()
{
    wp_enqueue_style('nepaliechords-theme', get_template_directory_uri() . "/style.css", array('nepaliechords-bootstrap', 'nepaliechords-fontawesome'), '1.0', 'all');
    wp_enqueue_style('nepaliechords-bootstrap', get_template_directory_uri() . "/assets/css/bootstrap.css", array(), '4.3.1', 'all');
    wp_enqueue_style('nepaliechords-fontawesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0', 'all');
}
add_action('wp_enqueue_scripts', 'nec_stylefetch');

function nec_scriptfetch()
{
    wp_enqueue_script('nepaliechords-theme', get_template_directory_uri() . "/assets/js/main.js", array('nepaliechords-jquery', 'nepaliechords-popper', 'nepaliechords-bootstrap'), '1.0', true);
    wp_enqueue_script('nepaliechords-jquery', get_template_directory_uri() . "/assets/js/jquery.js", array(), '3.3.1', true);
    wp_enqueue_script('nepaliechords-popper', get_template_directory_uri() . "/assets/js/popper.js", array(), '1.16.1', true);
    wp_enqueue_script('nepaliechords-bootstrap', get_template_directory_uri() . "/assets/js/bootstrap.js", array(), '4.3.1', true);
}
add_action('wp_enqueue_scripts', 'nec_scriptfetch');

function get_catg_post($categoryName)
{
    $getCat_query = new WP_Query(array(
        'category_name' => $categoryName,
        'post_status' => 'publish',
        'posts_per_page' => 4,
    ));
    if ($getCat_query->have_posts()) :
        while ($getCat_query->have_posts()) : $getCat_query->the_post();
            echo ("<div class='container my-3 blogFetch box-shadow-full' style='background-color: #f6f6f6;'>
                    <div class='row'>
                        <div class='col-md-3 justify-content-center'>
                        <img src='");
            the_post_thumbnail_url();
            echo ("' style='height: 100%; width: 100%; object-fit: contain;'></div>
            <div class='col-md-9 justify-content-left'>
                <div class='row'>
                    <h3 class='col-md-12 archiveTitle blackLink'><a href='");
            the_permalink();
            echo ("'>");
            the_title();
            echo ("</a></h3>
                </div>
                <div class='row'>
                <div class='col-md-12 text-muted blackLink'>");
            the_time();
            echo (" by ");
            the_author_posts_link();
            echo ("</div></div>
                <div class='row'>
                    <div class='col-md-12 archiveText'>");
            the_excerpt();
            echo ("</div>
            </div>
            <div class='row'>
                    <div class='col-md-12'>
                    <a href='");
            the_permalink();
            echo ("'>Read Full</a>
            </div>
                    </div>
            </div>
            </div>
            </div>");
        endwhile;
        wp_reset_postdata();
    else :
        echo ("
        <div class='container my-3 blogFetch box-shadow-full' style='background-color: #f6f6f6;'>
            <div class='row'>
                <div class='col-md-12 h2 text-center'>
                No Articles here
                </div>
            </div>
        </div>
        ");
    endif;
}
add_theme_support('post-thumbnails');

function nepaliechords_widgets_init()
{

    register_sidebar(array(
        'name' =>  __('Posts Bar', 'nepaliechords'),
        'id' => 'sidebar',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="text-center mb-5">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'nepaliechords_widgets_init');

function nepaliechords_time_ago()
{

    global $post;

    $date = get_post_time('G', true, $post);
    $chunks = array(
        array(60 * 60 * 24 * 365, __('year', 'nepaliechords'), __('years', 'nepaliechords')),
        array(60 * 60 * 24 * 30, __('month', 'nepaliechords'), __('months', 'nepaliechords')),
        array(60 * 60 * 24 * 7, __('week', 'nepaliechords'), __('weeks', 'nepaliechords')),
        array(60 * 60 * 24, __('day', 'nepaliechords'), __('days', 'nepaliechords')),
        array(60 * 60, __('hour', 'nepaliechords'), __('hours', 'nepaliechords')),
        array(60, __('minute', 'nepaliechords'), __('minutes', 'nepaliechords')),
        array(1, __('second', 'nepaliechords'), __('seconds', 'nepaliechords'))
    );

    if (!is_numeric($date)) {
        $time_chunks = explode(':', str_replace(' ', ':', $date));
        $date_chunks = explode('-', str_replace(' ', '-', $date));
        $date = gmmktime((int)$time_chunks[1], (int)$time_chunks[2], (int)$time_chunks[3], (int)$date_chunks[1], (int)$date_chunks[2], (int)$date_chunks[0]);
    }

    $current_time = current_time('mysql', $gmt = 0);
    $newer_date = strtotime($current_time);

    $since = $newer_date - $date;

    if (0 > $since)
        return __('sometime', 'nepaliechords');
    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        if (($count = floor($since / $seconds)) != 0)
            break;
    }
    $output = (1 == $count) ? '1 ' . $chunks[$i][1] : $count . ' ' . $chunks[$i][2];


    if (!(int)trim($output)) {
        $output = '0 ' . __('seconds', 'nepaliechords');
    }

    $output .= __(' ago', 'nepaliechords');

    return $output;
}
add_filter('the_time', 'nepaliechords_time_ago');
add_filter('get_the_time', 'nepaliechords_time_ago');

add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = "<h1 class='text-light display-1'>" . ucwords(single_tag_title('', false)) . "</h1>";
    } elseif (is_tag()) {
        $title = "<h1 class='text-light display-1'>" . ucwords(single_tag_title('', false)) . "</h1>";
    } elseif (is_author()) {
        $title = "<h1 class='text-light display-3'>Posts by " . ucwords(get_the_author()) . "</h1>";
    } elseif (is_tax()) { //for custom post types
        $title = "<h1 class='text-light display-1'>" . sprintf(__('%1$s'), single_term_title('', false)) . "</h1>";
    } elseif (is_post_type_archive()) {
        $title = "<h1 class='text-light display-1'>" . ucwords(post_type_archive_title('', false)) . "</h1>";
    } else {
        $title = "<h1 class='text-light display-1'>" . ucwords(the_title('', false)) . "</h1>";
    }
    return $title;
});

function default_comments_on($data)
{
    if ($data['post_type'] == 'crd_sheet_music') {
        $data['comment_status'] = 1;
    }

    return $data;
}
add_filter('wp_insert_post_data', 'default_comments_on');

function nepaliechords_custom_logo_setup()
{
    $defaults = array(
        'height'      => 50,
        'width'       => 200,
        'flex-height' => false,
        'flex-width'  => false,
        'header-text' => array('site-title', 'site-description'),
        'unlink-homepage-logo' => true,
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'nepaliechords_custom_logo_setup');