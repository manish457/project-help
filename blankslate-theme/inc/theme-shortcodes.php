<?php

global $templates;

// ============================= [business-benifit-inject] =================================

function benifit_inject_shortcode( $atts ){

	$content = '';
	global $post;
	$post_id = $post->ID;
	ob_start();
  if(get_field('show_business_benefits', $post_id)==true ):
	
	?>
	<?php
    $benifits_title = get_field('business_benefits_title' ,$post_id);
    if($benifits_title ==""){
      $benifits_title = get_field('business_benefits_title' ,'option');
    }
	?>
	 <section id="benifit" class="benifit">
      <div class="container" data-aos="fade-up">
        <div class="section">
          <h2><?php echo $benifits_title?></h2>
        </div>
        <div class="row">
        <?php if( have_rows('business_benefits_manage' , $post_id) ): ?>
        	<?php  while( have_rows('business_benefits_manage' , $post_id) ): the_row();?>
          <div class="col-lg-3 col-md-3 d-flex" data-aos="fade-up">
            <div class="info-box">
              <img src="<?php the_sub_field('business_benefits_icon'); ?>" alt="">
              <h3><?php the_sub_field('business_benefits_title'); ?></h3>
              <p><?php the_sub_field('business_benefits_content'); ?></p>
            </div>
          </div>
          <?php  endwhile; ?>    
        <?php  else:?>	
        	<?php  while( have_rows('business_benefits_manage' ,'option') ): the_row();?>
          <div class="col-lg-3 col-md-3 d-flex" data-aos="fade-up">
            <div class="info-box">
              <img src="<?php the_sub_field('business_benefits_icon'); ?>" alt="">
              <h3><?php the_sub_field('business_benefits_title'); ?></h3>
              <p><?php the_sub_field('business_benefits_content'); ?></p>
            </div>
          </div>
          <?php  endwhile; ?> 
          <?php endif;?>
          </div> 
      </div>
    </section>
		
	<?php
	endif;
	$content = ob_get_clean();
	return $content;

}

add_shortcode( 'business-benifit-inject', 'benifit_inject_shortcode' );

// ============================= #end :: [business-benifit-inject] ================================



