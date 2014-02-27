<?php
/**
 * Template Name: Shield Layout
 */

get_header(); ?>

	<div id="" class="content-area <?php echo lsx_main_class(); ?>">

		<?php lsx_content_before(); ?>

		<main id="main" class="site-main" role="main">
		<?php lsx_content_top(); ?>

		
		<!-- ==== HOME ==== -->
		<div id="headerwrap" id="home" name="home">
			<header class="clearfix">
	  		 		<h1><span class="icon icon-shield"></span></h1>
	  		 		<p>A Bootstrap 3 One Page Theme.</p>
	  		 		<p>Exclusive for BlackTie.co.</p>
	  		</header>	    
	    </div>
		
		
		<!-- ==== SERVICES ==== -->
		<div class="container" id="services" name="services">
			<div class="row">
				<div class="col-lg-4 callout">
					<span class="icon icon-stack"></span>
					<h2>Bootstrap 3</h2>
					<p>Shield Theme is powered by Bootstrap 3. The incredible Mobile First Framework is the best option to run your website. </p>
				</div>
				<div class="col-lg-4 callout">
					<span class="icon icon-eye"></span>
					<h2>Retina Ready</h2>
					<p>You can use this theme with your iPhone, iPad or MacBook Pro. This theme is retina ready and that is awesome. </p>
				</div>					
				<div class="col-lg-4 callout">
					<span class="icon icon-heart"></span>
					<h2>Crafted with Love</h2>
					<p>We don't make sites, we craft themes with love & passion. That is our most valued secret. We only do thing that we love.   </p>
				</div>	
			</div><!-- row -->
		</div><!-- greywrap -->
		
		
		
		<!-- ==== ABOUT ==== -->
		<div class="container" id="about" name="about">
			<div class="row white">
				<br>
				<h1 class="centered">A LITTLE ABOUT OUR AGENCY</h1>
				<hr>
				<br>
				<br>
				<div class="col-lg-6">
					<p>We believe ideas come from everyone, everywhere. In fact, at BlackTie, everyone within our agency walls is a designer in their own right. And there are a few principles we believe-and we believe everyone should believe-about our design craft. These truths drive us, motivate us, and ultimately help us redefine the power of design. We're big believers in doing right by our neighbors. After all, we grew up in the Twin Cities and we believe this place has much to offer. So we do what we can to support the community we love.</p>
				</div><!-- col-lg-6 -->
				
				<div class="col-lg-6">
					<p>Over the past four years, we've provided more than $1 million in combined cash and pro bono support to Way to Grow, an early childhood education and nonprofit organization. Other community giving involvement throughout our agency history includes pro bono work for more than 13 organizations, direct giving, a scholarship program through the Minneapolis College of Art & Design, board memberships, and ongoing participation in the Keystone Club, which gives five percent of our company's earnings back to the community each year.</p>
				</div><!-- col-lg-6 -->
			</div>
		</div>
		
		</main><!-- #main -->
		
		</div>
		</div>
		</div>
		
		
		<!-- ==== TESTIMONIALS ==== -->
		<div class="container" id="team" name="team">
		<br>
			<div class="row white centered">
			<h1 class="centered">TESTIMONIALS</h1>
			<hr>
			<br>
			<br>
			<?php echo do_shortcode("[testimonials orderby=rand columns=4]"); ?>
			</div>
		</div>		
		
		
		<!-- ==== OUR PORTFOLIO ==== -->
		<div class="container" id="portfolio" name="portfolio">
		<br>
			<div class="row white centered">
			<h1 class="centered">OUR PORTFOLIO</h1>
			<hr>
			<br>
			<br>
			<?php 
				query_posts(array(
					'post_type' => 'contact_details',
					'showposts' => 1
					) 
				);
			?>
			<?php while (have_posts()) : the_post(); ?>
				<?php 
					
					echo "post type not working yet";	
				
				?>
			<?php endwhile;?>
			</div>
		</div>	
		

	
		<!-- ==== TEAM MEMBERS ==== -->
		<div class="container" id="team" name="team">
		<br>
			<div class="row white centered">
			<h1 class="centered">MEET OUR AWESOME TEAM</h1>
			<hr>
			<br>
			<br>
			<?php
			    if ( class_exists( 'BS_Team' ) ) {
			        $BS_Team = new BS_Team();
			        echo $BS_Team->output( array(                                        
			         	'size' => 150,
			        	'responsive' => false,
			          	'panel_heading' => true,
			        	'columns' => 3,
			            'limit' => 6
			           )
			        );
			    };
			?>
			</div>
		</div>
	

		
		<!-- ==== BLOG POSTS WRAP ==== -->
		<div class="bodywrap">
			<div class="container" id="contact" name="contact">
				<div class="row">
					<br>
					<h1 class="centered">WE ARE STORY TELLERS</h1>
					<hr>
					<br>
					<br>
					
					<?php //if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="col-lg-6 blog-bg">
							<div class = "col-lg-4 centered">
								<!-- Author info -->
							</div>
							<div class="col-lg-8 blog-content">
								<h1>
									<a href="<?php //the_permalink(); ?>">
										<?php //the_title(); ?>
									</a>
								</h1>
								<?php //the_content(); ?>
							</div>
						</div>
					<?php //endwhile; ?>				
				</div>
			</div>
		</div>
		
		
		
		<!-- ==== SECTION DIVIDER6 ==== -->
		<section class="section-divider textdivider divider6">
			<div class="container">
			<?php 
				query_posts(array(
					'post_type' => 'contact_details',
					'showposts' => 1
				) );
			?>
			<?php while (have_posts()) : the_post(); ?>
				<h1>CRAFTED IN CAPE TOWN, RSA.</h1>
				<hr>
				<p><?php echo get_post_meta($post->ID, 'physical_address', true);?>,</p>
				<p><?php echo get_post_meta($post->ID, 'telephone_number', true);?></p>
				<p><a href="#"><i class="fa fa-twitter"></i></a> | <a href="#"><i class="fa fa-facebook"></i></a></p>
			</div><!-- container -->
		</section><!-- section -->
		
		
		
		<!-- ==== CONTACT ==== -->
		<div class="container" id="contact" name="contact">
			<div class="row">
			<br>
				<h1 class="centered">THANKS FOR VISITING US</h1>
				<hr>
				<br>
				<br>
				<div class="col-lg-4">
					<h3>Contact Information</h3>
					<p>
						<i class="fa fa-home"></i> <?php echo get_post_meta($post->ID, 'physical_address', true);?><br/>
						<i class="fa fa-phone"></i> <?php echo get_post_meta($post->ID, 'telephone_number', true);?> <br/>
						<i class="fa fa-mobile"></i> <?php echo get_post_meta($post->ID, 'mobile_number', true);?><br/>
						<i class="fa fa-envelope"></i> <a href="#"> <?php echo get_post_meta($post->ID, 'email', true);?></a> <br/>
						<i class="fa fa-twitter"></i> <a href="#"><?php echo get_post_meta($post->ID, 'twitter_id', true);?> </a> <br/>
						<i class="fa fa-facebook"></i> <a href="#"><?php echo get_post_meta($post->ID, 'telephone_number', true);?> </a> <br/>
					</p>
				</div><!-- col -->
			<?php endwhile;?>
				
				<div class="col-lg-4">
					<h3>Newsletter</h3>
					<p>Register to our newsletter and be updated with the latests information regarding our services, offers and much more.</p>
					<p>
						<form class="form-horizontal" role="form">
						  <div class="form-group">
						    <label for="inputEmail1" class="col-lg-4 control-label"></label>
						    <div class="col-lg-10">
						      <input type="email" class="form-control" id="inputEmail1" placeholder="Email">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="text1" class="col-lg-4 control-label"></label>
						    <div class="col-lg-10">
						      <input type="text" class="form-control" id="text1" placeholder="Your Name">
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-lg-10">
						      <button type="submit" class="btn btn-success">Sign in</button>
						    </div>
						  </div>
					   </form><!-- form -->
					</p>
				</div><!-- col -->
				
				<div class="col-lg-4">
					<h3>Support Us</h3>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				</div><!-- col -->

			</div><!-- row -->

		<?php lsx_content_bottom(); ?>
		<?php lsx_content_after(); ?>
		
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php //get_sidebar( 'alt' ); ?>
<?php get_footer(); ?>