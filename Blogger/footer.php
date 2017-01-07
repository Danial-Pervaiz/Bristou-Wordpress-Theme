<footer>
		<div class="bristou-instagram style2">
			<h5>Follow @Bristou</h5>
			<?php
				$args_custom_footer_instagram_posts = array(
					'post_type'=>'instagram_for_footer'
				);
				$args_custom_insta_posts = new WP_Query( $args_custom_footer_instagram_posts );
				if( $args_custom_insta_posts->have_posts()){
					?>
						<ul class="row">
							<?php
								while( $args_custom_insta_posts->have_posts()){
									$args_custom_insta_posts->the_post();
									?>
								 		<li class="col-md-2">
									 		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									 			<?php the_post_thumbnail( array(187, 187), 'instagram_for_footer');?>
									 		</a>
								 		</li>
									<?php
								}
							?>
						</ul>
					<?php
				}
			?>
		</div><!-- Bristou Instagram -->
		<?php
			$args_footer_socials_icons = array(
				'post_type'=>'footer_social_media'
			);
			$args_footer_socials_icons_output = new WP_Query( $args_footer_socials_icons );
			if( $args_footer_socials_icons_output->have_posts() ){
				?>
					<div class="rounded-socials">
						<?php
							while($args_footer_socials_icons_output->have_posts()){
								$args_footer_socials_icons_output->the_post();
								$get_value_social_media_icons = get_field('social_media_icons_for_footer');
								if(in_array('facebook', $get_value_social_media_icons)){
									?>	
										<a href="<?php the_field('facebook_link'); ?>" title=""><i class="fa fa-facebook"></i></a>
									<?php
								}
								if(in_array('twitter', $get_value_social_media_icons)){
									?>
										<a href="<?php the_field('twitter_link');?>" title=""><i class="fa fa-twitter"></i></a>
									<?php
								}
								if(in_array('pinterest', $get_value_social_media_icons)){
									?>
										<a href="<?php the_field('pinterest_link'); ?>" title=""><i class="fa fa-pinterest"></i></a>
									<?php
								}
								if(in_array('google', $get_value_social_media_icons)){
									?>
										<a href="<?php the_field('google_plus_link');?>" title=""><i class="fa fa-google-plus"></i></a>
									<?php
								}
								if(in_array('tumblr', $get_value_social_media_icons)){
									?>
										<a href="<?php the_field('tumblr_link'); ?>" title=""><i class="fa fa-tumblr"></i></a>
									<?php
								}
								if(in_array('rss', $get_value_social_media_icons)){
									?>
										<a href="<?php the_field('rss_link');?>" title=""><i class="fa fa-rss"></i></a>
									<?php
								}
							}
						?>
					</div><!-- Rounded Socials -->
				<?php
			}
		?>

		<p class="bottom-line">© 2016 - Elite Layers. All Rights Reserved. </p>
	</footer><!-- Footer -->
	<script type="text/javascript">
		$(function() {
	        /* ============ Bristou Carousel ================*/
			$('.bristou-carousel').owlCarousel({
				autoplay:true,
				loop:true,
				smartSpeed:1000,
				dots:false,
				nav:true,
				margin:10,
				mouseDrag:true,
				autoHeight:true,
				items:3,
				center:true,
				responsive:{
					1200:{items:3},
					980:{items:1},
					767:{items:1},
					0:{items:1},

				}
			});
		});
	</script>
</body>
</html>