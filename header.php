<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php if (is_mobile()): ?>
    <style type="text/css">
    <?php include( 'style_mobile.css' ); ?>
    </style>
<?php else: ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<?php endif; ?>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php
wp_head();
global $wp_theme_options;
?>
</head>
<body>

<h1 class="title"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>

<?php if (!is_mobile()): ?>
<div id="header">
		<?php get_search_form(); ?>
		<div class="description"><?php bloginfo('description'); ?></div>
</div>
<?php endif; ?>

<div id="page">
