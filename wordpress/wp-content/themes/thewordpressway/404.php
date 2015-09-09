<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title">Oops! Sorry, this page doesn't exist.</h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p style="text-align: center;">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/molodotme.jpg">
                    </p>
					<p style="text-align: center;">
                        <strong>Credit:</strong> <a href="http://molome.com/" target="_blank">MOLOME</a>
                    </p>

					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
