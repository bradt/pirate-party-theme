<?php get_header(); ?>

<div id="content" class="blog single">

	<?php get_sidebar(); ?>
	
	<div class="content-wrapper">
	
		<h1>Blog</h1>
		
		<?php
		the_post();
		$timezone = get_the_time('O');
		$timezone = substr($timezone, 0, 3) . ':' . substr($timezone, 3);
		?>
	
		<div class="post hentry">

			<h2><a id="post-<?php the_ID(); ?>" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>" class="entry-title"><?php the_title(); ?></a></h2>
			<div class="date"><span class="published" title="<?php the_time('Y-m-d\TH:i:s'); echo $timezone; ?>"><?php the_time('F jS, Y \a\t g:ia') ?></span><span class="comments"> | <a href="<?php comments_link(); ?>"><?php comments_number('No Comments', '1&nbsp;Comment', '%&nbsp;Comments'); ?></a></span><!-- by <?php the_author() ?> --><?php edit_post_link('Edit', ' (', ')'); ?></div>

			<div class="entry-content copy">
				<p><?php the_content(); ?>
			</div>

			<div class="tags"><?php the_tags('<b>Tags:</b> ', ' &bull; '); ?></div>

			<!--
			<?php trackback_rdf(); ?>
			-->
		</div>
	
		<?php comments_template(); // Get comments.php template ?>
	
	</div>

</div>

<?php get_footer(); ?>
