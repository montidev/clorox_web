<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php bloginfo('title'); ?></title>
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,200,200italic,300italic,400italic,600,600italic,700,700italic,900' rel='stylesheet' type='text/css'>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>

    <main id="main-wrapper">

			<section class="bg-blue" id="section-404">

				<div class="container404 bg-white">
					<p class="t1 blue"> No encontramos la página que buscabas, <br />pero tenemos algunos consejos para darte:</p>
					<section class="bg-transparent" id="section-relateds-tips">
							
					    <?php get_template_part('partials/grid', 'tips'); ?>

					    <div class="text-center btn-more">
					      <a href="<?php link_to('tips'); ?>">
					        <span class="icon iconX2 plus-icon-blue"></span>
					      </a>
					    </div>
					</section>				
					<?php 
						global $blog_id;
						$current_blog_details = get_blog_details( array( 'blog_id' => $blog_id ) );						
					?>
					<a href="<?php echo $current_blog_details->siteurl; ?>" class="">
						<img src="<?php echo get_logo_uri(); ?>" class="logo" atl="clorox logo" />
					</a>
				</div>

				<footer>
					<ul class="nav navbar-nav navbar-right social-links">
				    <li>
				      <a href="http://facebook.com/clorox" target="_blank" class="icon">
				        <img src="http://clorox.com.ar/wp-content/themes/clorox/assets/img/fb-icon-menu-x2-blue.png" alt="">
				      </a>
				    </li>
				    <li>
				      <a href="http://youtube.com/clorox" target="_blank" class="icon">
				        <img src="http://clorox.com.ar/wp-content/themes/clorox/assets/img/yt-icon-menu-x2-blue.png" alt="">
				      </a>
				    </li>
				  </ul>
					<p class="text-center white"> © 2016 Clorox - Política de privacidad </p>
				</footer>
			</section>
			
		</main>
		
		<style>
				html, body {
					height: 100%;
				}
				.error404 {
					padding-top: 0;
					height: 100%;
				
				}

				#section-404 {
					padding: 80px 50px;
					height: 100%;
					overflow-x: hidden;
					overflow-y: scroll;
				}

				.container404 {
					position: relative;
					width: 100%;
					max-width: 852px;
					padding: 85px 30px 35px;
					margin: auto auto;					
					text-align: center;
					height: 606px;
					margin-bottom: 12px;
				}

				.container404 .logo {
					position: absolute;
					margin-left: 50%;
					left: -63px;
					width: 126px;
					top: -36px;
				}

				.container404 .title h2 {
					font-size: 34px;
					font-weight: 700;
					margin-bottom: 10px;
				}

				.container404 p.t1 {
					font-size: 23px;
				}

				.container404 #section-relateds-tips {
					padding: 0;
					width: 1200px;
					position: relative;
					left: -600px;
					margin-left: 50%;
				}

				.container404 #section-relateds-tips .box-layered .body {
					box-shadow: 5px 9px 25px 0px rgba(0, 0, 0, 0.1);
				}

				.container404 .btn-more {
					margin-top: 0;
				}

				.container404 p.t2 {
					font-size: 25px;
					position: relative;
					right: 25px;
					line-height: 28px;
					margin-bottom: 0;
					z-index: 10;
				}				

				.error404 .nav.social-links li a {
					z-index: 10;
				}

				.error404 .nav.social-links li a:hover {
					z-index: 10;
					background-color: transparent;

				}

				.container404 .nav.social-links > li + li {
				    margin-left: 7px;
				}

				.woman-cleaning {
					position: absolute;
					right: -36px;
					bottom: 0;
					z-index: 0;
				}

				.error404 .social-links {
					left: auto;
			    right: auto;
			    padding: 0;
			    position: static;
			    float: none !important;
			    margin: 0 auto !important;
			    display: block;
			    width: 95px;
			    z-index: 10;
				}

				/* Medium Devices, Desktops */
				@media only screen and (max-width : 992px) {
					.container404 {
						height: auto;
					}

					.container404 #section-relateds-tips {
						width: 600px;
						margin-left: 50%;
						left: -300px;						
					}

					.container404 p.t1 {
						
					}

					.container404 p.t2 {
						right: 0;
					}

					.container404 .social-links {
						right: 0;
					}

					#section-404 {
						padding: 50px 0;
					}					
				}

				@media only screen and (max-width : 768px) {
					.container404 {
						width: 100%;
						max-width: auto;
					}

					.container404 #section-relateds-tips {
						width: 500px;
						margin-left: 50%;
						left: -250px;						
					}

					.container404 p.t1 {
						
					}

					.social-links li {
				    display: inline-block;
				    width: auto;
				    float: none;		    
					}

					.nav>li>a>img {
				    width: 30px;
				    height: 30px;
					}
				}

				@media only screen and (max-width : 480px) {
					.container404 {
						padding-left: 0;
						padding-right: 0;
					}

					.container404 p.t1 {
						padding-left: 10px;
						padding-right: 10px;
						font-size: 20px;
					}	

					.container404 #section-relateds-tips {
						width: 100%;
						margin-left: 0;
						left: auto;						
					}
				}
			</style>
	</body>
</html>

