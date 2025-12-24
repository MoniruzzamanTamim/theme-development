<?php
/**
 * The template for displaying comments
 *
 * @package Tamim-Personal
 */

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            printf(
                _nx(
                    'One Comment',
                    '%1$s Comments',
                    get_comments_number(),
                    'comments title',
                    'tamim-personal'
                ),
                number_format_i18n( get_comments_number() )
            );
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'style'      => 'ol',
                'short_ping' => true,
            ) );
            ?>
        </ol>

        <?php the_comments_navigation(); ?>

    <?php endif; ?>

    <?php
    // Comment form
    if ( comments_open() ) {
        comment_form();
    }
    ?>
</div>
