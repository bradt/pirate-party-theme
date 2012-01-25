<?php get_header(); the_post(); ?>

<div id="content" class="page">
	<?php get_sidebar('page'); ?>
	
	<div class="content-wrapper">

		<h1><?php the_title(); ?></h1>
	
		<div class="copy">
	
			<?php the_content("more..."); ?>
			
			<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
	
			<?php edit_post_link('Edit'); ?>
	
		</div>
		
	</div>
	
</div>

<?php get_footer(); ?>
