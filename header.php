<?php
/**
 * Theme Header Section for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main" class="clearfix"> <div class="inner-wrap">
 *
 * @package ThemeGrill
 * @subpackage Spacious
 * @since Spacious 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" href="css/font-awesome.css">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700,700italic|Ubuntu+Mono:400,700' rel='stylesheet' type='text/css'>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Patrick+Hand&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


<?php
/**
 * This hook is javascript:document.forms['EditForm'].screen.value=3;  document.forms['EditForm'].submit();important for wordpress plugins and other many things
 */
wp_head();
?>
<meta property="fb:app_id" content="1662896957322742"/>

<meta property="fb:admins" content="100003831260354"/>
<script>
$(document).ready(function(){
    $(".main-navigation ul li a").hover(function(){
       $(this).animate({right: '20px'}, "fast");
       $(this).animate({right: '0px'}, "fast");
       $(this).animate({right: '15px'}, "fast");
$(this).animate({right: '0px'}, "fast");
$(this).animate({right: '10px'}, "fast");
$(this).animate({right: '0px'}, "fast");
$(this).animate({right: '5px'}, "fast");
$(this).animate({right: '0px'}, "fast");
        }, function(){
$(this).animate({top: '0px'});
    });
});
</script>

    
</head>
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=1662896957322742";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<body <?php body_class(); ?>>


    
<?php	do_action( 'before' ); ?>
<div id="page" class="hfeed site">
	<?php do_action( 'spacious_before_header' ); ?>
	<header id="masthead" class="site-header clearfix">

		<?php if( spacious_options( 'spacious_header_image_position', 'above' ) == 'above' ) { spacious_render_header_image(); } ?>

		<div id="header-text-nav-container">
			<div class="inner-wrap">

				<div id="header-text-nav-wrap" class="clearfix">
					<div id="header-left-section">
						<?php
						if( ( spacious_options( 'spacious_show_header_logo_text', 'text_only' ) == 'both' || spacious_options( 'spacious_show_header_logo_text', 'text_only' ) == 'logo_only' ) && spacious_options( 'spacious_header_logo_image', '' ) != '' ) {
						?>
							<div id="header-logo-image">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo spacious_options( 'spacious_header_logo_image', '' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
							</div><!-- #header-logo-image -->
						<?php
						}
						$screen_reader = '';
                  if ( ( spacious_options( 'spacious_show_header_logo_text', 'text_only' ) == 'logo_only' || spacious_options( 'spacious_show_header_logo_text', 'text_only' ) == 'none' ) ) {
                     $screen_reader = 'screen-reader-text';
                  }
						?>
						<div id="header-text" class="<?php echo $screen_reader; ?>">
                  <?php if ( is_front_page() || is_home() ) : ?>
							<h1 id="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
							</h1>
                  <?php else : ?>
                     <h3 id="site-title">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                     </h3>
                  <?php endif; ?>
                  <?php
                  $description = get_bloginfo( 'description', 'display' );
                  if ( $description || is_customize_preview() ) : ?>
                     <p id="site-description"><?php echo $description; ?></p>
                  <?php endif; ?><!-- #site-description -->
						</div><!-- #header-text -->
					</div><!-- #header-left-section -->
					<div id="header-right-section">
						<?php
						if( is_active_sidebar( 'spacious_header_sidebar' ) ) {
						?>
						<div id="header-right-sidebar" class="clearfix">
						<?php
							// Calling the header sidebar if it exists.
							if ( !dynamic_sidebar( 'spacious_header_sidebar' ) ):
							endif;
						?>
						</div>
						<?php
						}
						?>
						<nav id="site-navigation" class="main-navigation" role="navigation">
							<h3 class="menu-toggle"><?php _e( 'Menu', 'spacious' ); ?></h3>
							<?php
								if ( has_nav_menu( 'primary' ) ) {
									wp_nav_menu( array( 'theme_location' => 'primary' ) );
								}
								else {
									wp_page_menu();
								}
							?>
						</nav>
			    	</div><!-- #header-right-section -->

			   </div><!-- #header-text-nav-wrap -->
			</div><!-- .inner-wrap -->
		</div><!-- #header-text-nav-container -->

		<?php if( spacious_options( 'spacious_header_image_position', 'above' ) == 'below' ) { spacious_render_header_image(); } ?>

		<?php
   	if( spacious_options( 'spacious_activate_slider', '0' ) == '1' ) {
   		if( spacious_options( 'spacious_blog_slider', '0' ) == '0' ) {
   			if( is_home() || is_front_page() ) {
   				spacious_featured_image_slider();
			}
   		} else {
   			if( is_front_page() ) {
   				spacious_featured_image_slider();
   			}
   		}
   	}

		if( ( '' != spacious_header_title() )  && !( is_front_page() ) ) {
			if( !( spacious_options( 'spacious_blog_slider', '0' ) == '0' && is_home( ) ) ){ ?>
				<div class="header-post-title-container clearfix">
					<div class="inner-wrap">
						<div class="post-title-wrapper">
							<?php
							if( '' != spacious_header_title() ) {
							?>
                        <?php if ( is_home() ) : ?>
   						   	<h2 class="header-post-title-class"><?php echo spacious_header_title(); ?></h2>
                        <?php else : ?>
                           <h1 class="header-post-title-class"><?php echo spacious_header_title(); ?></h1>
                        <?php endif; ?>
						   <?php
							}
							?>
						</div>
						<?php if( function_exists( 'spacious_breadcrumb' ) ) { spacious_breadcrumb(); } ?>
					</div>
				</div>
			<?php
			}
	   	}
		?>
	</header>
	<?php do_action( 'spacious_after_header' ); ?>
	<?php do_action( 'spacious_before_main' ); ?>
	
	<div id="main" class="clearfix">
		<div class="inner-wrap">
		<script>
            var k="<?php echo is_user_logged_in();?>";
            if(k==1){
                $('.dangnhap').hide();
                $('.dangxuat').show();
            }else{
                $('.dangnhap').show();
                $('.dangxuat').hide();
            }
            </script>