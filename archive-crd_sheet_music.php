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
<div class="titleBox display-table">
    <div class="table-cell">
        <h1 class="text-light display-1"><?php post_type_archive_title(); ?></h1>
    </div>
</div>
</div>
<?php
get_template_part('inc/page', 'chord');
get_footer();
?>