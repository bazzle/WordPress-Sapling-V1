<?php

/**
 * @desc Custom login screen
 */
function wpb_login_logo() { ?>
    <style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,600;0,800;1,800&family=Overpass:wght@600&display=swap');

		#login p, #login input, #login label, #login a{
			font-family:'Nunito Sans', sans-serif;
		}
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_template_directory_uri() ?>/assets/src/img/logo.svg);
			height:100px;
			width:300px;
			background-size: 300px 100px;
			background-repeat: no-repeat;
			padding-bottom: 10px;
        }
		#login #wp-submit{
			border-radius:0;
			background-color:#ed1a3b;
			border:none;
		}
		#login input{
			border:2px solid #707070;
			border-radius:0;
			font-size:16px;
		}
		#login input[type="submit"]{
			font-size:16px;
			font-family:'Proxima Nova Bold';
			padding:.5em 1.5em;
			min-height:unset;
			line-height:unset;
		}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'wpb_login_logo' );



/**
 * @desc Remove the default post/page editor
 */
function remove_editor() {
	remove_post_type_support('page', 'editor');
	remove_post_type_support('post', 'editor');
	remove_post_type_support('product', 'editor');
}
add_action('admin_init', 'remove_editor');


/**
 *  @desc Push Yoast to the bottom
 */
add_filter( 'wpseo_metabox_prio', function() { return 'low';});


// change Howdy message

add_filter( 'admin_bar_menu', 'replace_wordpress_howdy', 25 );
	function replace_wordpress_howdy( $wp_admin_bar ) {
		$my_account = $wp_admin_bar->get_node('my-account');
		$newtext = str_replace( 'Howdy,', 'Hello,', $my_account->title );
		$wp_admin_bar->add_node( array(
		'id' => 'my-account',
		'title' => $newtext,
	) );
}