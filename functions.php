<?php
automatic_feed_links();

function pp_excerpt($maxlength = 0) {
  $excerpt = get_the_excerpt();
  $excerpt = str_replace('[...]', '...', $excerpt);
  if ($maxlength && strlen($excerpt) > $maxlength) {
    $excerpt = substr($excerpt, 0, $maxlength-3) . '...';
  }
  echo $excerpt;
}

function pp_get_tweets($num = 3) {
	require_once(ABSPATH . 'wp-includes/class-snoopy.php');
	$twitterdata = get_option("latesttweets");
	$url = "http://twitter.com/statuses/user_timeline/piratepartyca.json?count=" . $num;
	if ($twitterdata['lastcheck'] < ( mktime() - 60 ) ) {
	  $snoopy = new Snoopy;
	  $result = $snoopy->fetch($url);
	  if ($result) {
		$twitterdata = json_decode($snoopy->results,true);
		$twitterdata['lastcheck'] = mktime();
		update_option('latesttweets',$twitterdata);
	  } else {
		echo "Twitter API not responding.";
	  }
	}
	
	return $twitterdata;
}

function pp_tweet_content($tweet) {
	$pattern = '/\@([a-zA-Z0-9]+)/';
	$replace = '<a href="http://twitter.com/'.strtolower('\1').'">@\1</a>';
	$tweet = preg_replace($pattern,$replace,$tweet);  
	$tweet = make_clickable($tweet);
	return $tweet;
}

if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Blog Sidebar',
        'before_title' => '<h2>',
        'after_title' => '</h2><div class="widget-content">',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div></div>'
    ));
}

?>
