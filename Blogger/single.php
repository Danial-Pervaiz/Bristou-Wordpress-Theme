<?php
	// header
	get_header();
		?>
			<!-- carousel section -->
			<?php 
				$args = array(
					'post_type'=>'slides',
					'orderBy'=>'menu_order',
					'posts_per_page'=> -1
				);

				$slides = new WP_Query( $args );
			?>
			<?php if( $slides->have_posts() ): ?>
				<section>
					<div class="block no-padding">
						<div class="row">
							<div class="col-md-12">
								<div class="bristou-carousel">
									<?php while( $slides->have_posts() ) : $slides->the_post();?>
										<div class="bristou-slide">
											<?php the_post_thumbnail('slides'); ?>
											<div class="bristou-slide-name">
												<a class="cat" href="#" title=""><?php 
													$categories = get_the_category(); 
													$seprator   = ', ';
													$output 	= '';

													if($categories){
														foreach( $categories as $category){
															$output .= $category->cat_name . $seprator;
														}
														echo trim($output, $seprator);
													}
												?></a>
												<h3><a href="#" title=""><?php the_title();?></a></h3>
												<ul class="meta">
													<li><?php the_time('F j Y'); ?></li>
												</ul>
											</div>
										</div><!-- Bristou Slide -->
									<?php endwhile;?>
								</div><!-- Bristou Carousel -->
							</div>
						</div>
					</div>
				</section>
			<?php endif; ?>
				<section>
					<div class="block">
						<div class="container">
							<div class="row">
								<div class="custom-grid1 bristou-col">
									<div class="bristou-blog">
										<?php 
											if(have_posts()){ 
												while(have_posts()){
													the_post();
													$categories_single_post = get_the_category();
													$seprator_single_post = ', ';
													$output_single_post ='';
													?>
														<div class="bristou-post">
															<div class="post-img"><a href="<?php the_permalink(); ?>" title=""><?php the_post_thumbnail();?></a></div>
											
				
															<h3 class="post-title"><a href="<?php the_permalink();?>" title=""><?php the_title();?></a></h3>
															<ul class="meta">															<li><?php the_time('F j Y'); ?></li>
															</ul>
															<p><?php the_content(); ?></p>
														</div><!-- Bristou Post -->
													<?php
												}
											}
										?>
									</div><!-- Bristou Blog -->
									<div class="post-paginations">
										<a href="#" title="">Older Posts <i class="icon-arrows-slim-right"></i></a>
									</div>
								</div>

								<aside class="custom-grid2 bristou-col sidebar">
									<?php 
										$args_about_us = array(
											'post_type'=>'about_me'
										);
										$about_me = new WP_Query( $args_about_us );
										if( $about_me->have_posts() ){
											while( $about_me->have_posts() ){
												$about_me->the_post();
												?>
													<div class="widget">
														<div class="widget-title"><h4><?php the_title(); ?></h4></div>
														<div class="about-widget">
															<?php the_post_thumbnail('about_me'); ?>
															<p><?php the_content(); ?> </p>
															<div class="socials">
																<?php 
																$value = get_field('social_media_icons');
																

																if( in_array('facebook', $value) ){ ?>
																	<a href="#" title=""><i class="fa fa-facebook"></i></a>
																<?php } ?>
																<?php
																if( in_array('twitter', $value) ){ ?>
																	<a href="#" title=""><i class="fa fa-twitter"></i></a>
																<?php } ?>
																<?php
																if( in_array('instagram', $value) ){ ?>
																	<a href="#" title=""><i class="fa fa-instagram"></i></a>
																<?php } ?>
																<?php
																if( in_array('tumblr', $value) ){ ?>
																	<a href="#" title=""><i class="fa fa-tumblr"></i></a>
																<?php } ?>
																<?php
																if( in_array('pinterest', $value) ){ ?>
																	<a href="#" title=""><i class="fa fa-pinterest"></i></a>
																<?php } ?>
																<?php
																if( in_array('rss', $value) ){ ?>
																	<a href="#" title=""><i class="fa fa-rss"></i></a>
																<?php } ?>
															</div>
																
															<!-- <div class="socials">
																<a href="#" title=""><i class="fa fa-facebook"></i></a>
																<a href="#" title=""><i class="fa fa-twitter"></i></a>
																<a href="#" title=""><i class="fa fa-pinterest"></i></a>
																<a href="#" title=""><i class="fa fa-instagram"></i></a>
																<a href="#" title=""><i class="fa fa-tumblr"></i></a>
																<a href="#" title=""><i class="fa fa-rss"></i></a>
															</div> -->
																	
															
														</div>
													</div><!-- Widget -->
												<?php
											}
										}
									?>
									<!-- news letter section  -->
									<?php
										$args_subscribe_letter = array(
											'post_type'=>'news_letter_section'
										);
										$news_letter = new WP_Query($args_subscribe_letter);
										if($args_subscribe_letter){
											?>
												<div class="widget">
													<?php
														if($news_letter->have_posts()){
															while($news_letter->have_posts()){
																$news_letter->the_post();
																?>
																	<div class="newsletter-widget">
																		<h5><?php the_field('heading_news_letter'); ?></h5>
																		<form>
																			<input type="email" placeholder="<?php the_field('email_news_letter');?>" />
																			<button><?php the_field('title_news_letter_button');?></button>
																		</form>
																	</div>
																<?php
															}
														}
													?>
												</div><!-- Widget -->
											<?php
										}
									?>
									<?php 
										$args_instagram_posts = array(
											'post_type'=>'instagram_posts'
										);
										$instagram_posts = new WP_Query( $args_instagram_posts );
										if( $args_instagram_posts ){ 
											if($instagram_posts->have_posts()){
												?>
													<div class="widget">
														
															<?php 
																$counter = 0;
																while($instagram_posts->have_posts()){
																	$instagram_posts->the_post();
																	$counter++;
																	if($counter == 1){
																		?>
																			<div class="widget-title">
																				<h4><?php the_field('section_heading'); ?></h4>
																			</div>
																		<?php
																		break;
																	} 
																	
																}
																
															?>
														
														<div class="bristou-instagram">
															<ul class="row">
																<?php 
																	while($instagram_posts->have_posts()){
																		$instagram_posts->the_post();
																		$fields = get_field('image');
																		if(!empty($fields)){
																			?>
																		 		<li class="col-md-4">
																		 			<a href="#" title="">
																		 				<img src="
																		 					<?php echo $fields['url'];?>" 
																		 					alt="<?php the_title(); ?>" 
																		 				/>
																	 				</a>
																	 			</li>
																			<?php
																	 	} //if statement
																 	} // while statement
																?>
															</ul>
														</div>
													</div><!-- Widget -->
												<?php
											} // main if statement ends here
													
										} // checks if $args_instagram_posts exists
									?>
									<?php
										$args_banner_ads = array(
											'post_type'=>'banner_post'
										);
										$banner_post = new WP_Query( $args_banner_ads );
										if( $banner_post->have_posts() ){
											while( $banner_post->have_posts()){
												$banner_post->the_post();
												?>
													<div class="widget">
														<div class="widget-title"><h4><?php the_title(); ?></h4></div>
														<div class="add">
															<a href="#" title=""><?php the_post_thumbnail('banner_post');?></a>
														</div>
													</div><!-- Widget -->
												<?php
											}
										}
									?>
									<?php
										$args_popular_post_type = array(
											'post_type'=>'popular_posts'
										);
										$popular_post = new WP_Query( $args_popular_post_type );
										if($popular_post->have_posts()){
											?>
												<div class="widget">
													<?php
														$counter_popular_post = 0;
														while($popular_post->have_posts()){
															$popular_post->the_post();
															$counter_popular_post++;
															if($counter_popular_post == 1){
																?>
																	<div class="widget-title">
																		<h4><?php the_field('section_heading');?></h4>
																	</div>
																<?php
																break;
															}
														}
													?>
													<div class="popular-posts">
														<?php
															while($popular_post->have_posts()){
																$popular_post->the_post();
																$field_image_latest_post = get_field('image_post');
																?>
																	
																		<div class="sidebar-post">
																			<?php
																				if($field_image_latest_post){
																					?>
																						<a class="side-post-img" href="#" title="">
																							<img src="
																								<?php 
																							        echo $field_image_latest_post['url'];?>"/>
																						</a>
																					<?php
																				}
																			?>
																			<div class="side-post-detail">
																				<h5>
																					<a href="<?php get_the_permalink();?>" title="">
																						<?php the_field('heading_post');?>
																					</a>
																				</h5>
																				<span><?php the_time('F j Y'); ?></span>
																			</div>
																		</div><!-- Sidebar Post -->
																<?php
															}
														?>
													</div><!--  popular post -->
												</div><!-- Widget -->
											<?php
										}
									?>

									<div class="widget">
										<div class="widget-title"><h4>Categories</h4></div>
										<select>
											<option>Adventures</option>
											<option>Travel</option>
											<option>Lifestyle</option>
											<option>Food</option>
										</select>
									</div><!-- Widget -->
								</aside><!-- Sidebar -->
							</div>
						</div>
					</div>
				</section>
			<?php
		// footer
	get_footer();
?>