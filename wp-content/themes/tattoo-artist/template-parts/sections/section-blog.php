<?php  
	$tattooartist_hs_blog 			= esc_attr(get_theme_mod('hs_blog','1'));
	$tattooartist_blog_title 		= esc_attr(get_theme_mod('blog_title'));
	$tattooartist_blog_subtitle		= esc_attr(get_theme_mod('blog_subtitle')); 
	$tattooartist_blog_description	= esc_attr(get_theme_mod('blog_description'));
	$tattooartist_blog_num			= esc_attr(get_theme_mod('blog_display_num','3'));
	if($tattooartist_hs_blog=='1'):
?>

<section id="blog-section" class="blog-area home-blog">

	<div class="container">
		<div class="row ">
			<div class="header-section">
				<h3 class="section-title"><?php echo esc_html(get_theme_mod('blog_heading')); ?>
					<div class="title-icn"></div>
				</h3>			
			</div>
		 </div> 
		<?php if(!empty($tattooartist_blog_title) || !empty($tattooartist_blog_subtitle) || !empty($tattooartist_blog_description)): ?>
			<div class="title">
				<?php if(!empty($tattooartist_blog_title)): ?>
					<h6><?php echo wp_kses_post($tattooartist_blog_title); ?></h6>
				<?php endif; ?>
				
				<?php if(!empty($tattooartist_blog_subtitle)): ?>
					<h2><?php echo wp_kses_post($tattooartist_blog_subtitle); ?></h2>
					<span class="shap"></span>
				<?php endif; ?>
				
				<?php if(!empty($tattooartist_blog_description)): ?>
					<p><?php echo wp_kses_post($tattooartist_blog_description); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?> 

		<div class="row">
			<?php 	
				$tattooartist_blogs_args = array( 'post_type' => 'post', 'posts_per_page' => $tattooartist_blog_num,'post__not_in'=>get_option("sticky_posts")) ; 	
				$tattooartist_blog_wp_query = new WP_Query($tattooartist_blogs_args);
				if($tattooartist_blog_wp_query)
				{	
				while($tattooartist_blog_wp_query->have_posts()):$tattooartist_blog_wp_query->the_post(); ?>
				<div class="col-lg-4 col-md-4 col-sm-12 ">
					<div class="blogbx">
						
							
							<?php if (has_post_thumbnail( $post->ID ) ): ?>
							<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
							<a href="<?php echo esc_url( get_permalink() ); ?>">	
								<div class="blog-image" style="background-image: url('<?php echo esc_url($image[0]); ?>')">
									
									<div class="box-admin">
										<ul class="comment-timing">
											<li class="ath"><a href="<?php echo esc_url( get_permalink() ); ?>"><i class="fa fa-calendar"></i><?php echo get_the_date( 'j' ); ?> <?php echo get_the_date( 'M' ); ?><?php echo get_the_date( 'Y' ); ?></a> </li>

											<li class="comm"><a href="<?php echo esc_url( get_permalink() ); ?>"><i class="fa fa-comment-o"></i> <?php echo esc_html(get_comments_number($post->ID)); ?>  </a> </li>
										</ul>
									</div>
								</div>
							</a>
							<?php else: 
								$img = get_template_directory_uri().'/assets/images/default.png';
								?>
								<!-- <a href="<//?php echo esc_url( get_permalink() ); ?>">
									<div class="blog-image" style="background-image: url('<//?php echo esc_url($img); ?>')">
										

									</div>
								</a> -->
							<?php endif; ?>

							<div class="clearfix"></div>
							<div class="blog-content">
								
								<?php 
									if ( is_single() ) :
										
									the_title('<h6 class="post-title">', '</h6>' );
									
									else:
									
									the_title( sprintf( '<h6 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' );
									
									endif; 
									?> 
									<p>
								 		<?php echo wp_trim_words(get_the_content(), 35);	?>
								 	</p>
									
									<div class="srvc-btns">
										<div class="srvc-btns1">
											<div class="srvc-btns2">
												<a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e('Read more','tattoo-artist'); ?></a>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
									<!-- <div class="b-btn">
										<a href="</?php echo esc_url( get_permalink() ); ?>">
											Read more
										</a>
									</div> -->
							</div>
						<div class="clearfix"></div>
					</div>
				</div>

			<?php endwhile; 
				}
				wp_reset_postdata();
			?>
		</div>

	</div>

</section>
<?php endif; ?>