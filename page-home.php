<?php

/* Template Name: Homepage */

get_header();
the_post();
?>

<div id="content" class="home">

	<a href="" class="banner">Welcome to Pirate Party headquarters! The Pirate
	Party of Canada strives to reform Canadian copyright laws, reform the
	patent system, and protect every Canadian’s right to privacy.</a>

<div class="blog">
		<h3>Blog <a href="/feed/" class="rss"><img src="<?php bloginfo('template_url'); ?>/img/icon/rss-16x16.gif" alt="Subscribe"/></a></h3>
		<?php
		$posts = get_posts('numberposts=5');
		if (!empty($posts)) :
			?>
			<ul>
			<?php
			foreach ($posts as $post) :
				setup_postdata($post);
				?>
				<li>
					<div class="date published"><?php the_time('F j\<\b\r\ \/\> Y') ?></div>
					<div class="details">
						<h4><a id="post-<?php the_ID(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h4>
						<p class="entry-summary copy">
							<?php pp_excerpt(150) ?>
							<a href="<?php the_permalink() ?>" class="more">read more &raquo;</a>
						</p>
					</div>
				</li>
				<?php
			endforeach;
			?>
			</ul>
			<a href="" class="pagenav">more articles &raquo;</a>
			<?php
		endif;
		?>
	</div>
	
	<div class="right">
		<a href="get-involved" class="callout get-involved">Get Involved</a>
<!--		<a href="donate" class="callout donate">Donate</a> -->

      <?php
        $crl = curl_init();
        curl_setopt($crl, CURLOPT_URL, "https://crm.piratepartyofcanada.com/membership_count.php");
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($crl, CURLOPT_CONNECTTIMEOUT, 5);
        $res = curl_exec($crl);
        curl_close($crl);
      ?>
      Signatures collected: <?= $res ?> <a href = "https://crm.piratepartyofcanada.com/membership_signup.php">Add yours</a>.<br/><br/>

		<div class="tweets">
			<h3>Latest Tweets</h3>
			<?php
			$tweets = pp_get_tweets();
			if (!empty($tweets)) :
				?>
				<ul>
				<?php
				for ($i = 0; $i < count($tweets) - 1; $i++) :
					$text = pp_tweet_content($tweets[$i]['text']);
					$date = human_time_diff(strtotime($tweets[$i]['created_at']));
					?>
					<li>
						<p class="copy">
							<?php echo $text; ?>
							<a href="<?php echo $link; ?>">#</a>
							<?php echo $date; ?> ago
						</p>
					</li>
					<?php
				endfor;
				?>
				</ul>
				<a href="http://twitter.com/piratepartyca" class="pagenav">more tweets &raquo;</a>
				<?php
			endif;
			?>
		</div>
		<div class="social">
			<h3>Follow Us / Friend Us</h3>
			<ul>
				<li><a href="http://www.facebook.com/group.php?gid=6709501675&amp;ref=share" class="facebook">Facebook</a></li>
				<li><a href="http://www.twitter.com/piratepartyca" class="twitter">Twitter</a></li>
				<li><a href="http://www.flickr.com/photos/41239618@N05/" class="flickr">Flickr</a></li>
				<li><a href="http://www.youtube.com/PiratePartyOfCanada" class="youtube">YouTube</a></li>
			</ul>
		</div>
	</div>
	
</div>

<?php get_footer(); ?>
