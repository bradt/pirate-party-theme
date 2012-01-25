<?php get_header(); ?>

<div id="content" class="blog">

	<?php get_sidebar(); ?>
	
	<div class="content-wrapper">
	
		<h1>Blog</h1>
		
		<ul class="posts">
		<?php $i = 0; if (have_posts()) : while (have_posts()) : the_post();
			$timezone = get_the_time('O');
			$timezone = substr($timezone, 0, 3) . ':' . substr($timezone, 3);
			?>
	
			<li class="post hentry">
	
				<h2><a id="post-<?php the_ID(); ?>" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>" class="entry-title"><?php the_title(); ?></a></h2>
				<div class="date"><span class="published" title="<?php the_time('Y-m-d\TH:i:s'); echo $timezone; ?>"><?php the_time('F jS, Y \a\t g:ia') ?></span><span class="comments"> | <a href="<?php comments_link(); ?>"><?php comments_number('No Comments', '1&nbsp;Comment', '%&nbsp;Comments'); ?></a></span><!-- by <?php the_author() ?> --><?php edit_post_link('Edit', ' (', ')'); ?></div>
	
				<div class="entry-summary copy">
					<p><?php pp_excerpt(); ?>
					<span class="read-more"><a href="<?php the_permalink() ?>">read more &raquo;</a></span></p>
				</div>
	
				<div class="tags"><?php the_tags('<b>Tags:</b> ', ' &bull; '); ?></div>
	
				<!--
				<?php trackback_rdf(); ?>
				-->
			</li>
	
			<?php comments_template(); // Get comments.php template ?>
	
		<?php $i++; endwhile; else: ?>
	
			<h2>Not Found</h2>
			<p>Sorry, but you are looking for something that isn't here.</p>
	
		<?php endif; ?>
		</ul>
	
		<div id="controls">
			<div class="older"><? next_posts_link('&laquo; older posts'); ?></div>
			<div class="newer"><? previous_posts_link('newer posts &raquo;'); ?></div>
		</div>
		
	</div>

</div>

<?php get_footer(); ?>
