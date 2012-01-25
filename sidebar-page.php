<?php
// Get the section
if ($post->post_parent != 0) {
	$page = get_post($post->post_parent);
}
else {
	$page =& $post;
}
?>

<div id="sidebar">
	<div class="widget widget-pages">
		<h2><?php echo get_the_title($page->ID); ?></h2>
		<ul>
			<?php wp_list_pages('title_li=&child_of=' . $page->ID); ?>
		</ul>
	</div>	
</div>
