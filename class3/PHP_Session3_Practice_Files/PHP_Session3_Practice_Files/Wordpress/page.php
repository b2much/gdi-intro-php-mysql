<?php get_header(); ?>
		<div id="wrapper">			
            
			<div class="content">
				
					<div class="stories">
					                    	                                
						<?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
        
                           <?php the_content(); ?>
        
                        <?php endwhile; ?>                        
                        <?php else : ?>
                        <?php endif; ?>
                    
				</div>
                
			</div><!--content -->
		</div><!--wrapper -->
        
<?php get_footer(); ?>
