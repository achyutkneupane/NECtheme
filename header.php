<!DOCTYPE html>
<html lang="en">
<!-- Nepali E-Chords -->
<!-- Developed by -->
<!-- Achyut Neupane -->
<!-- https://facebook.com/achyutkneupane -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    wp_head();
    if (is_user_logged_in()) {
        echo '<style>
        .navbar-b {
            top: 10px;
        }
        @media (max-width: 768px) {
            .navbar-b {
                top: 30px;
            }
        } 
        </style>';
    }
    ?>
    <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
        <div class="container-fluid">
            <div class="navbar-brand h1 mx-auto">
                <?php
                the_custom_logo();
                ?>
            </div>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
                aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <?php
            wp_nav_menu(array(
                'theme_location'  => 'primary',
                'depth'           => 2,
                'container'       => 'div',
                'container_class' => 'collapse navbar-collapse justify-content-end',
                'container_id'    => 'navbarDefault',
                'menu_class'      => 'navbar-nav align-top',
                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                'walker'          => new WP_Bootstrap_Navwalker(),
            ));
            ?>
        </div>
    </nav>
</head>

<body>