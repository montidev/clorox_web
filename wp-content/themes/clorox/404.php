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
					
					<div class="title">
						<h2> Error 404 </h2>
					</div>
					<p class="t1 blue"> Mmm, alguien ha limpiado muy bien esta página.</p>
					<?php 
						global $blog_id;
						$current_blog_details = get_blog_details( array( 'blog_id' => $blog_id ) );						
					?>
					<p class="t2 grey"> Puedes evitar el sitio de <a class="blue" href="<?php echo $current_blog_details->siteurl; ?>"><?php echo $current_blog_details->blogname; ?></a><br /> para más información </p>
					<?php display_social_networks(); ?>

					<img src="<?php echo get_logo_uri(); ?>" class="logo" atl="clorox logo" />
					<img src='<?php echo get_template_directory_uri()?>/assets/img/woman-cleaning.png' class="woman-cleaning" alt="woman cleaning" />
				</div>


				<footer>
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
					background-color: ;
				}

				#section-404 {
					padding: 80px 50px;
					height: 100%;
				}

				.container404 {
					position: relative;
					width: 100%;
					max-width: 590px;
					padding: 55px 30px 35px;
					margin: auto auto;					
					text-align: center;
					height: 452px;
					margin-bottom: 30px;
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
					margin-bottom: 182px;
				}

				.container404 p.t2 {
					font-size: 25px;
					position: relative;
					right: 25px;
					line-height: 28px;
					margin-bottom: 0;
					z-index: 10;
				}

				.container404 .social-links {
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

				.container404 .social-links li a {
					z-index: 10;
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

				/* Medium Devices, Desktops */
				@media only screen and (max-width : 992px) {
					.woman-cleaning {
						display: none;
					}

					.container404 p.t1 {
						margin-bottom: 140px
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

					.container404 p.t1 {
						margin-bottom: 120px
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
					.container404 p.t1 {
						margin-bottom: 100px
					}	
				}
			</style>
	</body>
</html>

