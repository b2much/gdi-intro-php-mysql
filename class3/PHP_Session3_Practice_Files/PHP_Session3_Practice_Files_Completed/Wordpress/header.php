<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title>
<?php
if (is_home()) {
echo bloginfo('name');
} elseif (is_404()) {
echo '404 Not Found';
} elseif (is_category()) {
echo 'Category:'; wp_title('');
} elseif (is_search()) {
echo 'Search Results';
} elseif ( is_day() || is_month() || is_year() ) {
echo 'Archives:'; wp_title('');
} else {
echo wp_title('');
}
?>
</title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if (function_exists('wp_enqueue_script') && function_exists('is_singular')) : ?>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php endif; ?>

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/screen.css" media="screen,projection" type="text/css" />
<!--[if IE 7]>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/stylesheets/screen_ie7.css" media="screen,projection" type="text/css" />
<![endif]-->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.tools.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/app.js"></script>

<?php wp_head(); ?>
</head>
<body class="<?php if(is_home()) {  echo "subpage subpage-stories"; } elseif( is_front_page() ) { echo "home"; }  ?>">
	<div id="root">
		<div id="header">
			<h1 id="logo"><span>New Narratives. Women Reporting Africa</span></h1>
			<p class="skip"><a href="#wrapper" accesskey="k">Skip to content</a></p>
			<div class="donate" style="float: right; margin-top: 69px;"><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_donations">
			<input type="hidden" name="business" value="donations@newnarratives.org">
			<input type="hidden" name="lc" value="US">
			<input type="hidden" name="item_name" value="NewNarratives.org">
			<input type="hidden" name="no_note" value="0">
			<input type="hidden" name="currency_code" value="USD">
			<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
			<input type="image" src="<?php bloginfo('template_url'); ?>/images/donate_btn.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form></div>
			
			
			

			
			
			
		</div><!--header -->
		<div id="nav" class="clr">
			<ul>
				<li class="<?php if( is_front_page() ) { echo "hover"; } ?>"><a href="<?php bloginfo('url'); ?>/" title="Home" accesskey="h">Home</a></li>
				<li class="odd <?php if( (is_home()) or (is_single()) ) { echo "hover"; } ?>"><a href="<?php bloginfo('url'); ?>/stories/" title="Stories" accesskey="s">Stories</a></li>
				<li class="<?php if( is_page('fellows') ) { echo "hover"; } ?>"><a href="<?php bloginfo('url'); ?>/fellows/" title="Fellows" accesskey="f">Fellows</a></li>
				<li class="odd <?php if( is_page('awards') ) { echo "hover"; } ?>"><a href="<?php bloginfo('url'); ?>/awards/" title="Awards" accesskey="a">Awards</a></li>
				<li class="<?php if( is_page('team') ) { echo "hover"; } ?>"><a href="<?php bloginfo('url'); ?>/team/" title="Team" accesskey="t">Team</a></li>
				<li class="odd last"><a href="#contact" rel="#contact" title="Contact" accesskey="c">Contact</a></li>
			</ul>
		</div><!--nav -->