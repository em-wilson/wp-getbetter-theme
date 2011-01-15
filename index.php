<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

global $wp_theme_options;
global $ad_units_shown;
get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if ( $wp_theme_options['banner_ad'] && 1 == 2 ) : ?>
		<div style="margin-top: 8px">
			<?php echo stripslashes( $wp_theme_options['banner_ad'] ); ?>
		</div>
	<?php endif; ?>

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
            <?php if (is_mobile()): ?>
                <div <?php post_class() ?> id="post-<?php the_ID(); ?>" onclick="location.href='<?php the_permalink();?>';this.style.backgroundColor='#00008a';">            <?php else: ?>                <div <?php post_class() ?> id="post-<?php the_ID(); ?>">            <?php endif; ?>
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>                                <?php if (!is_mobile()): ?>                    <div class="entry">
                        <?php the_content('Read the rest of this entry &raquo;'); ?>
                    </div>                <?php endif; ?>

				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			</div>

			<?php if ( !is_mobile() && $wp_theme_options['homepage_ad'] && $ad_units_shown < 3 ) : ?>
				<div>
					<?php	$ad_units_shown++;
						echo stripslashes( $wp_theme_options['homepage_ad'] ); ?>
				</div>
			<?php endif; ?>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
