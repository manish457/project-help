<?php
global $templates;
// ==================================== [procedure-page-list] content [/procedure-page-list] ==========================================
function procedure_page_list( $atts, $content = null ) {
	return '<div class="procedure-overview-content text-center"> ' . do_shortcode($content) . '</div>';
}
add_shortcode( 'procedure-page-list', 'procedure_page_list' );

// ==================================== Rectangle Box ==========================================
function box_shortcode( $atts, $content = null ) {
	return '<div class="procedure-section-left-inject rectangle-white-box"> <div class="procedure-section-left-inject-content">' . $content . '</div></div>';
}
add_shortcode( 'box', 'box_shortcode' );

// ==================================== Grey Section [grey-section] content [/grey-section] ==========================================
function grey_section_shortcode( $atts, $content = null ) {
	return '<div class="grey-section-wrapper background-full-width inject-top-bottom-gap"> <div class="grey-section">' . do_shortcode($content) . ' </div> </div>';
}
add_shortcode( 'grey-section', 'grey_section_shortcode' );

// ==================================== Content With Image Area [content-with-image-section] content [/content-with-image-section] ==========================================
function content_with_image_shortcode( $atts, $content = null ) {
	return '<div class="section-content-with-image"> ' . do_shortcode($content) . '</div>';
}
add_shortcode( 'content-with-image-section', 'content_with_image_shortcode' );

// ==================================== Content With Video Area [content-with-video-section] content [/content-with-video-section] ==========================================
function content_with_video_shortcode( $atts, $content = null ) {
	global $templates;
	ob_start();
?>
	<section class="video-content-area full-width">
		<div class="container">
			<?php if ( is_page_template( $templates.'template.campaign.php' ) ): ?>
			<div class="before-after-gallery-image">
				<img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/Body-Graphic-1.png" border="0" alt="" class="w-100">
			</div>
			<?php endif; ?>
			<div class="video-area-wrapper prl-20">
				<?php echo do_shortcode($content); ?>
				<?php //echo get_page_template(); ?>
			</div>
		</div>
	</section>
<?php
	$content_html = ob_get_clean();
	return $content_html;
}
add_shortcode( 'content-with-video-section', 'content_with_video_shortcode' );

// ============================= [social-icon] =================================
function social_icon( $atts ){
	$content = '';
	ob_start();
	if( have_rows('manage_social_media', 'option') ):
	?>		
	<!-- [social-icon] -->
	<div class="footer-social">
		<ul>
		<?php
			// loop through the rows of data
			while ( have_rows('manage_social_media', 'option') ) : the_row();
				// display a sub field value
			?>
			<li>
				<a href="<?=get_sub_field('social_media_link')?>" title="<?php the_sub_field('social_media_name'); ?>" target="_blank ">
					<?php 
					if(get_sub_field('icon_or_image') == 'image'):
						if(get_sub_field('social_image')):
					?>
						<img src="<?php echo get_sub_field('social_image')['url']?>" border="0" alt="">
					<?php
						endif;
					else:
						the_sub_field('social_media_icon');
					endif;
					?>
				</a>
			</li>
			<?php
			endwhile;
		?>
		</ul>
	</div>
	<?php
	endif;
	$content = ob_get_clean();
	return $content;
}
add_shortcode( 'social-icon', 'social_icon' );
// ============================= #end :: [social-icon] ================================
// ============================= [inject-gallery] =================================
function inject_gallery_function( $atts ){
	$content = '';
	global $inject_section;
	global $common_setting;
	global $post;
	$post_id = $post->ID;
	$galleries = get_field('gallery_to_inject', $post_id);
	ob_start();
	if(get_field('inject_a_gallery', $post_id)==true):
?>
	<section class="before-after-gallery-area full-width" id="<?=set_id_for_quick_link(get_field('gallery_to_inject_title', $post_id))?>">
		<div class="container">
			<div class="before-after-gallery-area-wrapper">
				<div class="swiper-container before-after-galleries" >
					<div class="swiper-wrapper">
					<?php foreach( $galleries as $key => $post): // variable must be called $post (IMPORTANT) ?>
						<?php setup_postdata($post); ?>
						<div class="swiper-slide">
							<a href="<?php the_permalink(); ?>">
								<div class="each-before-after">
								<?php
								if( have_rows('before_n_after') ):
									while ( have_rows('before_n_after') ) : the_row();
								?>
									<img src="<?php echo get_sub_field('before_n_after_image')['url'] ?>" border="0" alt="<?php echo get_sub_field('before_n_after_image')['alt'] ?>" class="w-100">
								<?php
										break;
									endwhile;//before_n_after
								endif;//before_n_after
								?>
								</div>
							</a>
						</div>
						<?php endforeach; //$galleries ?>
						<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					</div>
				</div>
				<div class="before-after-gallery-image">
					<img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/Body-Graphic-1.png" border="0" alt="" class="w-100">
				</div>
			</div>
			<div class="before-after-gallery-content">
				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="ottawa-derm-heading text-center">
							<h2><?=get_field('gallery_to_inject_title', $post_id)?></h2>
							<a class="learn-more btn-style" href="<?=get_field('gallery_page_link', $post_id)?>">
								<span class="circle" aria-hidden="true">
								  <span class="icon arrow"></span>
								</span>
								<span class="button-text"><?=get_field('gallery_page_link_text', $post_id)?get_field('gallery_page_link_text', $post_id):__( "View patient Gallery", 'twentychild' )?></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
	endif;//inject_a_gallery
	$content = ob_get_clean();
	return $content;
}
add_shortcode( 'inject-gallery', 'inject_gallery_function' );	
// ============================= #end :: [inject-gallery] =================================

// ============================= #start :: [inject-testimonial] ================================
function testimonial_inject_function(){
	$content = '';
	global $post;
	$post_id = $post->ID;
	ob_start();
	if(get_field('testimonial_inject', $post_id)==true):
		$testimonials = get_field('testimonial_to_inject', $post_id);
?>
<section class="testimonial-area full-width" id="<?=set_id_for_quick_link('Patient Reviews')?>">
	<div class="testimonial-image"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/Group 267.png" border="0" alt="" class="w-100"></div>
	<div class="container">
		<div class="testimonial-content-wrapper text-center">
			<?php foreach( $testimonials as $key => $post): // variable must be called $post (IMPORTANT) ?>
				<?php setup_postdata($post); ?>
			<h2><?php $content = get_the_content(); echo wp_strip_all_tags( $content );  ?></h2>
				<?php endforeach; ?>
			<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<a class="learn-more btn-style" href="<?php the_field('review_page_link','option'); ?>">
				<span class="circle" aria-hidden="true">
				  <span class="icon arrow"></span>
				</span>
				<span class="button-text"><?= __('read more reviews', 'twentychild'); ?></span>
			</a>
		</div>
	</div>
</section>
<?php
	endif;
	$content = ob_get_clean();
	return $content;
}
add_shortcode( 'inject-testimonial', 'testimonial_inject_function' );
// ============================= #End :: [inject-testimonial] =================================

// ============================= #start :: [inject-product] ================================
function product_inject_function($atts){
	$content = '';
	global $post;
	$post_id = $post->ID;
	ob_start();
	if(get_field('inject_product', $post_id)==true):
		$products = get_field('products_to_inject', $post_id);
?>
<section class="ottawa-derm-patient-photos full-width">
	<div class="container">
		<div class="row ottawa-gallery">
			<?php 
				$i=0;
				$difference = 100;
				$each_row_columns = 3;
				foreach( $products as $post): // variable must be called $post (IMPORTANT) 
				setup_postdata($post); 
				$feature_img = get_the_post_thumbnail_url(get_the_ID(),'full'); 
				$jsuplxperspective = $difference + ($difference * ($i % $each_row_columns)); 
			?>
			<div class="col-lg-4 procedure-item" data-jsuplxperspective="<?=$jsuplxperspective?>">
				<a href="<?php the_permalink();?>">
				<div class="item-image">
					<img src="<?=$feature_img?>" border="0" alt="" class="w-100">
					<div class="item-text">
						<h3><?php the_title(); ?></h3>
					</div>
				</div>
				</a>
			</div>
			<?php $i++; endforeach; //products ?>
			<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		</div>
		<div class="before-after-gallery-content">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="ottawa-derm-heading text-center">
						<?php the_field('product_inject_bottom_content','option')?>
						<a class="learn-more btn-style" href="<?php the_field('product_page_link','option')?>">
							<span class="circle" aria-hidden="true">
							  <span class="icon arrow"></span>
							</span>
							<span class="button-text"><?=__( 'shop all products', 'twentychild' )?></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
	endif;//inject_product
	$content = ob_get_clean();
	return $content;
}
add_shortcode( 'inject-product', 'product_inject_function' );
// ============================= #End :: [inject-product] =================================

// ============================= #start :: [inject-contact-us] ================================
function contact_us_function(){
	$content = '';
	global $post;
	$post_id = $post->ID;
	ob_start();
	if(get_field('inject_contact_info', $post_id)==true):
		$background_image_contact_info = get_field('background_image_contact_info', $post_id);
		if($background_image_contact_info == '') {
			$background_image_contact_info = get_field('background_image_common_info', 'option');
		}
		$description_contact_info = get_field('description_contact_info', $post_id);
		if($description_contact_info == '') {
			$description_contact_info = get_field('description_common_info', 'option');
		}
?>
<section class="contact-us full-width">
	<div class="testimonial-image"><img src="<?=$background_image_contact_info?>" border="0" alt="" class="w-100"></div>
	<div class="container">
		<div class="contact-us-content text-center">
			<?=$description_contact_info?>
		</div>
	</div>
</section>
<?php
	endif;
	$content = ob_get_clean();
	return $content;
}
add_shortcode( 'inject-contact-us', 'contact_us_function' );
// ============================= #End :: [inject-contact-us] =================================

// ============================= #start :: [inject-blog] [inject-blog recent="true"] ================================
function blog_inject_function($atts){
	$content = '';
	global $post;
	$post_id = $post->ID;
	$page_title = $post->post_title;
	$number_inject_blog = 2;
	extract(
		shortcode_atts(
			array(
				"recent"       => false,
			), $atts, "inject-blog"
		)
	);
	ob_start();
	if(get_field('inject_blog', $post_id)==true || (isset($atts['recent']) && $atts['recent']==true)):
		$args = array( 'numberposts' => $number_inject_blog, 'order'=> 'DESC', 'orderby' => 'date' );
		if(get_field('inject_blog', $post_id)==true){
			if(get_field('inject_recent_blog', $post_id)==true){
				$blogs = get_posts( $args );
			}else{
				$blogs = get_field('blogs_to_inject', $post_id) ? get_field('blogs_to_inject', $post_id) : get_posts( $args );
			}
		}else{
			$blogs = get_posts( $args );
		}
		$difference = 100;
		$each_row_columns = 3;
		$blog_title_val = get_field('inject_blog_title', $post_id) ? get_field('inject_blog_title', $post_id) : __( 'learn more about ', 'twentychild' ) . $page_title;
?>
<section class="special-featured-service full-width">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-4">
				<div class="special-featured-service-content">
					<h2 id="<?=set_id_for_quick_link($blog_title_val)?>"><?=$blog_title_val?></h2>
					<a class="learn-more btn-style" href="<?php the_field('blog_page_link','option')?>">
						<span class="circle" aria-hidden="true">
						  <span class="icon arrow"></span>
						</span>
						<span class="button-text"><?=__( 'Read our blog', 'twentychild' )?></span>
					</a>
				</div>
			</div>
			<?php if($blogs): ?>
			<div class="col-lg-8">
				<div class="service-gallery">
					<div class="row">
						<?php 
						$i=0;
						foreach( $blogs as $post): // variable must be called $post (IMPORTANT)
						$jsuplxperspective = $difference + ($difference * ($i % $each_row_columns)); 
						?>
						<?php if($i==$number_inject_blog) break; ?>
						<?php setup_postdata($post); ?>
						<?php $feature_img = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
						<div class="col-lg-6 procedure-item" data-jsuplxperspective="<?=$jsuplxperspective?>">
							<a href="<?php the_permalink();?>">
							<div class="item-image">
								<img src="<?=$feature_img?>" border="0" alt="" class="w-100">
								<div class="item-text">
									<h3><?php the_title(); ?></h3>
								</div>
							</div>
							</a>
						</div>
						<?php $i++; endforeach; //$blogs ?>
						<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					</div>
				</div>
			</div>
			<?php endif; //$blogs ?>
		</div>
	</div>
</section>
<?php
	endif;//inject_blog
	$content = ob_get_clean();
	return $content;
}
add_shortcode( 'inject-blog', 'blog_inject_function' );
// ============================= #End :: [inject-blog] =================================
// ============================= [inject-quick-links] =================================
// Apply to fields named "hero_text".

add_filter('acf/load_value/name=intro_content', 'my_acf_load_value', 10, 3);
add_filter('acf/load_value/name=doctor_content', 'my_acf_load_value', 10, 3);
add_filter('acf/load_value/name=board_certified_content', 'my_acf_load_value', 10, 3);
add_filter('acf/load_value/name=blog_description', 'my_acf_load_value', 10, 3);
add_filter('acf/load_value/name=product_inject_bottom_content', 'my_acf_load_value', 10, 3);
add_filter('acf/load_value/name=description_contact_info', 'my_acf_load_value', 10, 3);
add_filter('acf/load_value/name=description_common_info', 'my_acf_load_value', 10, 3);

function set_id_for_quick_link($value=''){
	if($value!=''){
		$value = 'quick-' . sanitize_title( $value );
	}
	return $value;
}
function my_acf_load_value( $content, $post_id, $field ) {
	$content = preg_replace_callback( '/(\<h[1-4](.*?))\>(.*)(<\/h[1-4]>)/i', function( $matches ) {
		if ( ! stripos( $matches[0], 'id=' ) ) :
			$heading_link = '<a href="#' . sanitize_title( $matches[3] ) . '" class="heading-link" id="quick-' . sanitize_title( $matches[3] ) . '"></a>';
			$matches[0] = $matches[1] . $matches[2] . ' id="' . sanitize_title( $matches[3] ) . '">' . $heading_link . $matches[3] . $matches[4];
		endif;
		return $matches[0];
	}, $content );
	return $content;
}

function auto_id_headings( $content ) {
	if(get_post_type() === 'page'):
		$content = preg_replace_callback( '/(\<h[1-4](.*?))\>(.*)(<\/h[1-4]>)/i', function( $matches ) {
			if ( ! stripos( $matches[0], 'id=' ) ) :
				$heading_link = '<a href="#' . sanitize_title( $matches[3] ) . '" class="heading-link" id="quick-' . sanitize_title( $matches[3] ) . '"></a>';
				$matches[0] = $matches[1] . $matches[2] . ' id="' . sanitize_title( $matches[3] ) . '">' . $heading_link . $matches[3] . $matches[4];
			endif;
			return $matches[0];
		}, $content );

		$content = preg_replace_callback( '/(\<p(.*?))\>(.*)(<\/p>)/i', function( $matches ) {
			if ( ! stripos( $matches[0], 'class=' ) ) :
				$class = (trim($matches[3])=='' || trim($matches[3],' ') =='' || $matches[3] == ' ') ? ' class="empty"' : '';
				$matches[0] = $matches[1] . $matches[2]. $class . ' >' . trim($matches[3]) . $matches[4];
			endif;
			return $matches[0];
		}, $content );
	endif;
	return $content;
}
add_filter( 'the_content', 'auto_id_headings' );

function filter_images($content){
	return preg_replace('/<img (.*) \/>\s*/iU', '<div class="clearfix"></div><img \1 />', $content);
}
//add_filter('the_content', 'filter_images');

function getTextBetweenH2andH3($string){
	$dom = new DOMDocument();
	$dom->loadHTML('<?xml encoding="utf-8" ?>' . $string);
	foreach($dom->getElementsByTagName('h2') as $node) {
		$key = $node->textContent;
		$matches[$key] = array();
		while(($node = $node->nextSibling) && $node->nodeName !== 'h2') {
			if($node->nodeName == 'h3') {
				$matches[$key][] = $node->textContent;   
			}
		}
	}
	return $matches;
}

function getTextBetweenTags($string, $tagname){
	$d = new DOMDocument();
	$d->loadHTML('<?xml encoding="utf-8" ?>' . $string);
	$return = array();
	foreach($d->getElementsByTagName($tagname) as $item){
		$return[] = $item->textContent;
	}
	return $return;
}
function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}	
function inject_quick_reference_function( $atts ){
	$content = '';
	global $templates;
	$template_file_path = $templates.'template.home.php';
	$optionID = get_id_by_template_name($template_file_path);
	$optionID = 'option';
	global $post;
	$post_id = $post->ID;
	ob_start();
	if(get_field('quick_links', $post_id)==true):
		if(get_field('intro_content', $post_id)){
			$parseMeIntro = get_field('intro_content', $post_id);
		}else{
			$parseMeIntro = array();
		}
		$parseMe = get_the_content($post_id);
		$doctor_content = get_field('doctor_content', $post_id) ? get_field('doctor_content', $post_id) : get_field('board_certified_content', $optionID);
		if(get_field('inject_essential_information_title', $post_id)):
		$parseMe = str_replace('[inject-essential-information]', '<h2>'.get_field('inject_essential_information_title', $post_id).'</h2>', $parseMe);
		endif;
		$parseMe = str_replace('[inject-doctor]', $doctor_content, $parseMe);
		$parseMe = str_replace('[inject-doctor doctor-logos="false"]', $doctor_content, $parseMe);

		//======== Inject Gallery ==============
		$parseMe = str_replace('[inject-gallery]', '<h2>'.get_field('gallery_to_inject_title', $post_id).'</h2>', $parseMe);
		//======== Inject Testimonial ==============
		$parseMe = str_replace('[inject-testimonial]', '<h2>Patient Reviews</h2>', $parseMe);
		//======== Inject Product ==============
		$parseMe = str_replace('[inject-product]', get_field('product_inject_bottom_content','option'), $parseMe);
		//======== Inject Contact-Us ==============
		$desc_contact_info = get_field('description_contact_info', $post_id) ? get_field('description_contact_info', $post_id) : get_field('description_common_info', 'option');
		$parseMe = str_replace('[inject-contact-us]', $desc_contact_info, $parseMe);
		//======== Inject Blog ==============
		$blog_title = '<h2>'.(get_field('inject_blog_title', $post_id) ? get_field('inject_blog_title', $post_id) : __( 'learn more about ', 'twentychild' ) . $post->post_title).'</h2>';
		$parseMe = str_replace('[inject-blog]', $blog_title, $parseMe);

		if(get_field('inject_faq_title', $post_id)):
		$parseMe = str_replace('[inject-faq]', '<h2>'.get_field('inject_faq_title', $post_id).'</h2>', $parseMe);
		endif;
		
		$headersInro = @getTextBetweenTags($parseMeIntro, 'h2');
		$headers = @getTextBetweenTags($parseMe, 'h2');
		$headers = array_merge($headersInro, $headers);
		if( !empty($headers) ):
	?>
	<div class="quick-links-area">
		<div class="quick-links-rotate">
			<div class="quick-links-arrow">
				<img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/ionic-ios-arrow-forward.png" border="0" alt="">
			</div>
			<h3><?=__( 'Jump to Section', 'twentychild' )?></h3>
		</div>
		<div class="quick-link-list">
			<ol>
				<?php
					foreach($headers as $key => $header){ 
						$headerLink = sanitize_title($header);
						$headerLink = strtolower($headerLink);
						$headerCount = strlen ( $header );
						if($headerCount > 123){
							$headerText = substr($header,0,120).'...';
						}else{
							$headerText = $header;
						}
						if(trim($headerText)!=''){
				?>								
				<li class="scroll-to-local-link">
					<a href="#quick-<?php echo $headerLink; ?>" alt="Scroll To <?php echo $header; ?>" id="<?php echo $headerLink; ?>" title="Scroll To <?php echo $header; ?>" class="link"><?php echo $headerText; ?></a>
				</li>
				<?php
						}
					}
				?>
			</ol>
		</div>
	</div>
	<?php
		endif; // ./$headers
	endif; // quick_links
	$content = ob_get_clean();
	return $content;
}
add_shortcode( 'inject-quick-links', 'inject_quick_reference_function' );
// ============================= END :: [inject-quick-links] =================================

// ==================================== multiple columns [multiple-columns] [column] content [/column] [/multiple-columns] ==========================================
function multiple_columns_shortcode( $atts, $content = null ) {
	return '<div class="compare-description-wrap compare-body-width">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'multiple-columns', 'multiple_columns_shortcode' );

function multiple_columns_column_shortcode( $atts, $content = null ) {
	return '<div class="col-md-6"><div class="compare-description-each compare-each-side">' . do_shortcode($content) . '</div></div>';
}
add_shortcode( 'column', 'multiple_columns_column_shortcode' );

//========================== [learn-more] =========================================

function learn_more_button_shortcode( $atts, $content = null ) {
	return '
	<a href="'.$atts['link'].'" class="cta">
		<span>learn more</span>
		<svg xmlns="http://www.w3.org/2000/svg" width="9.077" height="15.875" viewBox="0 0 9.077 15.875">
			<path id="Icon_ionic-ios-arrow-forward" data-name="Icon ionic-ios-arrow-forward" d="M17.587,14.131l-6.007-6a1.13,1.13,0,0,1,0-1.6,1.144,1.144,0,0,1,1.607,0l6.806,6.8a1.132,1.132,0,0,1,.033,1.564l-6.835,6.849a1.135,1.135,0,0,1-1.607-1.6Z" transform="translate(-11.246 -6.196)" fill="#228091"></path>
		</svg> 
	</a>
	';
}
add_shortcode( 'learn-more', 'learn_more_button_shortcode' );

//========================== End :: [learn-more] =========================================

//========================== [clearfix] =========================================

function clearfix_after_div_shortcode( $atts, $content = null ) {
	return '<div class="clearfix"></div>';
}
add_shortcode( 'clearfix', 'clearfix_after_div_shortcode' );

//========================== [clearfix] =========================================

// ============================= #start :: [inject-meet-the-doctor] ================================
function meet_the_doctor_function(){
	$content = '';
	global $post;
	$post_id = $post->ID;
	ob_start();
	if(get_field('inject_meet_our_doctors', $post_id)==true):		
?>
<section class="telehealth full-width">
	<div class="container">
		<div class="telehealth-eye-exams">
			<div class="row">
				<div class="col-lg-4 telehealth-eye-exams-image">
					<?php if(get_field('meet_our_doctors_image', $post_id)) : ?>
					<img src="<?php the_field('meet_our_doctors_image', $post_id);?>" width="100%" height="auto" border="0" alt="">
					<?php else : ?>
					<img src="<?php the_field('doctor_image', 'option');?>" width="100%" height="auto" border="0" alt="">
					<?php endif; ?>
				</div>
				<div class="col-lg-8 telehealth-eye-exams-content">
					<?php if(get_field('meet_our_doctors_content', $post_id)) : ?>
						<?php the_field('meet_our_doctors_content', $post_id); ?>
					<?php else : ?>
						<?php the_field('doctor_content', 'option'); ?>
					<?php endif; ?>
					<a href="<?php the_field('our_doctors_page_link', 'option');?>" class="common-button black-line">our doctors</a>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
	endif;
	$content = ob_get_clean();
	return $content;
}
add_shortcode( 'inject-meet-the-doctor', 'meet_the_doctor_function' );
// ============================= #End :: [inject-meet-the-doctor] =================================
// ============================= #start :: [inject-big-button]  ================================
function big_button_function(){
	$content = '';
	global $post;
	$post_id = $post->ID;
	ob_start();
	if(get_field('inject_big_button', $post_id)==true):		
?>
<?php if( have_rows('manage_big_button', $post_id) ): ?>
<section class="telehealth full-width">
	<div class="container">		
		<div class="row">
			<?php while( have_rows('manage_big_button', $post_id) ) : the_row(); ?>
			<div class="col-lg-4">
				<div class="each-big-button" style="background:url('<?php the_sub_field('big_button_image');?>')no-repeat center center / cover">
					<a href="<?php the_sub_field('big_button_link');?>"><?php the_sub_field('big_button_title');?></a>
				</div>
			</div>	
			<?php  endwhile; ?>
		</div>
	</div>
</section>

<?php
	endif;
	endif;
	$content = ob_get_clean();
	return $content;
}
add_shortcode( 'inject-big-button', 'big_button_function' );
// ============================= #End :: [inject-big-button]  =================================
// ============================= #start :: [inject-lasik-self-test]  ================================
function lasik_self_test_function(){
	$content = '';
	global $post;
	$post_id = $post->ID;
	ob_start();
	if(get_field('inject_lasik_self_test', $post_id)==true):
	if(get_field('lasik_self_test_background', $post_id)) : 
		$self_test_background = get_field('lasik_self_test_background', $post_id);
	else :
		$self_test_background = get_field('lasik_self_test_background', 'option');
	endif;
	if(get_field('lasik_self_test_title', $post_id)) : 
		$lasik_self_test_title = get_field('lasik_self_test_title', $post_id);
	else :
		$lasik_self_test_title = get_field('lasik_self_test_title', 'option');
	endif;
	if(get_field('lasik_self_test_button_link', $post_id)) : 
		$lasik_self_test_button_link = get_field('lasik_self_test_button_link', $post_id);
	else :
		$lasik_self_test_button_link = get_field('lasik_self_test_button_link', 'option');
	endif;
	if(get_field('lasik_self_test_learn_more_link', $post_id)) : 
		$lasik_self_test_learn_more_link = get_field('lasik_self_test_learn_more_link', $post_id);
	else :
		$lasik_self_test_learn_more_link = get_field('lasik_self_test_learn_more_link', 'option');
	endif;
?>
<section class="telehealth full-width">
	<div class="container">		
		<div class="lasik-self-test" style="background:url(<?=($self_test_background )?>)no-repeat center center / cover">
			<div class="lasik-self-test-content lasik-self">
				<h2><?=($lasik_self_test_title)?></h2>
				<a href="<?=($lasik_self_test_button_link)?>" class="common-button" >TAKE SELF TEST</a>
				<a href="<?=($lasik_self_test_learn_more_link)?>" class="common-button" >LEARN MORE</a>
			</div>
		</div>
	</div>
</section>
<?php
	endif;
	$content = ob_get_clean();
	return $content;
}
add_shortcode( 'inject-lasik-self-test', 'lasik_self_test_function' );
// ============================= #End :: [inject-lasik-self-test]  =================================
// ============================= #start :: [inject-visit-vision]  ================================
function visit_vision_function(){
	$content = '';
	global $post;
	$post_id = $post->ID;
	ob_start();
	if(get_field('inject_visit_vision', $post_id)==true):
	if(get_field('visit_vision_background', $post_id)) : 
		$visit_vision_background = get_field('visit_vision_background', $post_id);
	else :
		$visit_vision_background = get_field('visit_vision_background', 'option');
	endif;
	if(get_field('visit_vision_title', $post_id)) : 
		$visit_vision_title = get_field('visit_vision_title', $post_id);
	else :
		$visit_vision_title = get_field('visit_vision_title', 'option');
	endif;
	if(get_field('visit_vision_like_me_link', $post_id)) : 
		$visit_vision_like_me_link = get_field('visit_vision_like_me_link', $post_id);
	else :
		$visit_vision_like_me_link = get_field('visit_vision_like_me_link', 'option');
	endif;
	if(get_field('visit_vision_learn_more_link', $post_id)) : 
		$visit_vision_learn_more_link = get_field('visit_vision_learn_more_link', $post_id);
	else :
		$visit_vision_learn_more_link = get_field('visit_vision_learn_more_link', 'option');
	endif;
?>
<section class="telehealth full-width">
	<div class="container">		
		<div class="lasik-self-test visit-vision" style="background:url(<?=($visit_vision_background )?>)no-repeat center center / cover">
			<div class="lasik-self-test-content">
				<h2><?=($visit_vision_title)?></h2>
				<a href="<?=($visit_vision_like_me_link)?>" class="common-button" >VISIT VISION LIKE ME</a>
				<a href="<?=($visit_vision_learn_more_link)?>" class="common-button" >LEARN MORE</a>
			</div>
		</div>
	</div>
</section>
<?php
	endif;
	$content = ob_get_clean();
	return $content;
}
add_shortcode( 'inject-visit-vision', 'visit_vision_function' );
// ============================= #End :: [inject-visit-vision]  =================================
// ============================= #start :: [inject-billing-questions]  ================================
function billing_questions_function(){
	$content = '';
	global $post;
	$post_id = $post->ID;
	ob_start();
	if(get_field('inject_billing_questions', $post_id)==true):	
	if( have_rows('manage_billing_questions', $post_id) ):
	$i = 1; 
?>
<div class="accordion" id="accordionExample">
	<?php while( have_rows('manage_billing_questions', $post_id) ) : the_row(); ?>
	<div class="card">
		<div class="card-header" id="heading<?=($i)?>">
			<h2 class="mb-0">
				<button class="btn btn-link <?php if($i != 1 ) : ?>collapsed<?php endif; ?>" type="button" data-toggle="collapse" data-target="#collapse<?=($i)?>" aria-expanded="<?php if($i == 1 ) : ?>true<?php else : ?>false<?php endif; ?>" aria-controls="collapse<?=($i)?>">
				<?php the_sub_field('question'); ?>
				</button>
			</h2>
		</div>
		<div id="collapse<?=($i)?>" class="collapse <?php if($i == 1 ) : ?>show<?php endif; ?>" aria-labelledby="heading<?=($i)?>" data-parent="#accordionExample">
			<div class="card-body">
				<?php the_sub_field('answer'); ?>
			</div>
		</div>
	</div>
	<?php $i++; endwhile; ?>	
</div>
<?php
	endif;
	endif;
	$content = ob_get_clean();
	return $content;
}
add_shortcode( 'inject-billing-questions', 'billing_questions_function' );
// ============================= #End :: [inject-billing-questions]  =================================

