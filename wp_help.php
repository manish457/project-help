/*----- to print all he pages id and title --------*/
<?php
$page_ids=get_all_page_ids();
echo '<h3>My Page List :</h3>';
foreach($page_ids as $page)
{
	//echo '<pre>'.get_the_title($page);
	//echo '<pre>';echo $page;
}
?>
<?php $post_slug=$post->post_name; //echo $post_slug; 
if($post_slug == 'about'):
<?php $slug = get_post_field( 'post_name', get_post() ); ?>  //get the slag of any page

<?php
get_header(); //get original header
get_footer(); //get original header
get_header('home'); //get user created header page name='header-home.php'
?> 

<?php bloginfo('template_url'); ?>  //main page url
<?php bloginfo('template_url'); ?>/assets/images  //main page url
<?php get_template_directory_uri() ?>/assets/images  //main page url

<?php echo get_site_url(); ?>
<?php /* Template Name: Home */ ?>

<img src="<?php bloginfo('template_url'); ?>/images/loc.png" width="" height="" border="0" alt=""><?php echo(get_field('location')); ?> //normal image

<?php echo(get_field('schedule')); ?> //acf feild text

<?php $image = get_field('home_mid_image'); ?>
<section class="home_mid_sec" style="background:url(<?php echo $image['url']; ?>)no-repeat center center/cover"> //acf background image
<img src="<?php echo $image_mid_team['url']; ?>" width="" height="" border="0" alt=""> //acf img tag image

<?php if( get_field('field_name') ): ?>
	<p>My field value: <?php the_field('field_name'); ?></p>
<?php endif; ?>


//acf reapeter using slider //
<?php
	while( have_rows('logo_slider') ): the_row();
	$image_logo = get_sub_field('logo_image');
?>
<img src="<?php echo $image_logo['url']; ?>" width="" height="" border="0" alt="" class="logo_pad">


<?php dynamic_sidebar('header-image'); ?> //dynamic sidebar


//geting main page and their sub pages query
<?php
	$args = array( 'post_type' => 'page' , 'post_parent' => 35);
	$parent_services = new WP_Query( $args );
	if ( $parent_services->have_posts() ) 
	{      
		while ( $parent_services->have_posts() ) : $parent_services->the_post();
			//$procedure_term_image = get_wp_term_image($procedure_term->term_id);
			//the_post_thumbnail_url( $size ); exit;
			$ids=get_the_ID();
			$name=get_the_title();
?>	

<?php
		$args_subcat = array( 'post_type' => 'page', 'posts_per_page' => 10, 'post_parent' => $ids, 'order' => 'ASC', 'orderby' => 'menu_order' );
		$subcat_page = new WP_Query( $args_subcat );
		//echo '<pre>';print_r($subcat_page);exit;
		if ( $subcat_page->have_posts() ) 
		{	
?>
		<ul>
			<?php 
				while ( $subcat_page->have_posts() ) : $subcat_page->the_post();							
			?>
				
				<li><?php echo(get_the_title())?></li>
			<?php
				endwhile;
				wp_reset_query();						 
			?> 		
		</ul>
<?php
		}
?>
				<div class="text_img"><?php echo($name)?></div>


//feachered image
<img src="<?php the_post_thumbnail_url( $size ) ?>" width="" height="" border="0" alt="">
<?php echo(get_the_title())?> //to get the page title


//click on add and remove submenu
<script>
$(window).on("load", function(){
			$("#menu-gallery-menu li .sub-menu").attr("style","display:none !important");
			$("#menu-gallery-menu li:eq(0)").find(".sub-menu").attr("style","display:block !important");
		});
		$(function(){
		$("#menu-gallery-menu li a").click(function(event){
			if($(this).next("ul").hasClass("sub-menu"))
			{
				 event.preventDefault();

				if($(this).parent("li").find(".sub-menu").is(":visible"))
				{
				//$("#menu-gallery-menu li .sub-menu").attr("style","display:none !important");
				}
				else
				{
				$("#menu-gallery-menu li .sub-menu").attr("style","display:none !important");
				$(this).parent("li").find(".sub-menu").attr("style","display:block !important");
				}
			}
		});
		});

		$(window).on("load", function(){
			$("#menu-service-menu li .sub-menu").attr("style","display:none !important");
			$("#menu-service-menu li:eq(0)").find(".sub-menu").attr("style","display:block !important");
		});
		$(function(){
		$("#menu-service-menu li a").click(function(event){
			if($(this).next("ul").hasClass("sub-menu"))
			{
				 event.preventDefault();

				if($(this).parent("li").find(".sub-menu").is(":visible"))
				{
				//$("#menu-gallery-menu li .sub-menu").attr("style","display:none !important");
				}
				else
				{
				$("#menu-service-menu li .sub-menu").attr("style","display:none !important");
				$(this).parent("li").find(".sub-menu").attr("style","display:block !important");
				}
			}
		});
		});
</script>

//to get post information and page slug
<?php
global $post;
//echo '<pre>'; print_r($post);exit;
$slag=$post->post_name;
?>


//compair date with argument
<?php
$today = date('Ymd');
$args = array (
    'post_type' => 'project',
    'meta_query' => array(
		array(
	        'key'		=> 'start-date',
	        'compare'	=> '<=',
	        'value'		=> $today,
	    ),
	     array(
	        'key'		=> 'end-date',
	        'compare'	=> '>=',
	        'value'		=> $today,
	    )
    ),
);
$loop = new WP_Query( $args );
?>

"<?php bloginfo('template_url'); ?>/images/footer_back.jpg"   //backgroud image

//gravity form
<?php echo do_shortcode('[gravityform id=1 title=false description=false ajax=true]'); ?>

<script>
$(document).ready(function(){
    $("button").click(function(){
        $("ul").each(function(i, el){
            if (i % 2 === 0)
            {
            	alert('even');
            }
            else
            {
            	alert('odd');
            }
        });
    });
});
</script>

//acf repeater

<?php if( have_rows('repeater_field_name') ): ?>

	<ul class="slides">

	<?php while( have_rows('repeater_field_name') ): the_row(); 

		// vars
		$image = get_sub_field('image');
		$content = get_sub_field('content');
		$link = get_sub_field('link');

		?>

		<li class="slide">

			<?php if( $link ): ?>
				<a href="<?php echo $link; ?>">
			<?php endif; ?>

				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />

			<?php if( $link ): ?>
				</a>
			<?php endif; ?>

		    <?php echo $content; ?>

		</li>

	<?php endwhile; ?>

	</ul>

<?php endif; ?>

setup_postdata($post);

<!-- ::::::: display post data :::::::::::::: -->
 <?php $loop = new WP_Query( array( 'post_type' => 'article', 'posts_per_page' => 10 ) ); ?>

<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

    <?php the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?>

    <div class="entry-content">
        <?php the_content(); ?>
    </div>
<?php endwhile; ?>

 transform: rotate(-90deg);

 <!-- front end site url -->
 <?php echo get_site_url(); ?>

 get_template_part('template-parts/top-banner');

//to change page title
::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
add_filter( 'pre_get_document_title', 'cyb_change_page_title' );

function cyb_change_page_title () {
 $post_type = get_post_type();
 if($post_type=='current_projects'){
    return "Current Projects | ".get_the_title()." | ".get_option( 'blogname' );
 }
 elseif($post_type=='past_projects'){
	return "Past Projects | ".get_the_title()." | ".get_option( 'blogname' );
 }

}

catagory
:::::::::::::::::::::::::::::::::

 $categories = get_the_terms( get_the_ID(), 'article_category' );
foreach($categories as $category):
echo strtoupper($category->name)."&nbsp;";
endforeach;

//cont5act form 7 echo
::::::::::::::::::::::::::::::::
echo do_shortcode( '[contact-form-7 id="91" title="quote"]' );


//thumbnail only url
:::::::::::::::::::::::::::::::::::::::
<?php $post_entrmnt_dtls_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>


<?php if(get_field('highlighting_features_title')): ?>
<h2><?php the_field('highlighting_features_title'); ?></h2>
<?php endif;
if(get_field('highlighting_features_sub__title')): ?>
<h6><?php the_field('highlighting_features_sub__title'); ?></h6>
<?php endif; ?>

<?php if(get_field('blogs_button_text') && get_field('blogs_button_link')): ?>

//print texonomy list
<?php $terms = get_terms( array(
				'taxonomy' => 'gallery_taxonomy',
				'hide_empty' => false,
			) ); ?>

// how to printy tags
<?php wp_reset_query(); ?>
<?php $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 10 ) ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
<p><?php echo get_the_tag_list('<p>Tags: ',', ','</p>'); ?></p>
<?php endwhile; ?>
<?php wp_reset_query(); ?>

get_template_part()

get_site_url()


//display post type
<?php $loop = new WP_Query( array( 'post_type' => 'article', 'posts_per_page' => 10 ) ); ?>

<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

    <?php the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?>

    <div class="entry-content">
        <?php the_content(); ?>
		<?php the_category(); ?>
    </div>
<?php endwhile; ?>
<?php wp_reset_query(); ?>

//print catagories cepareter by comma
<?php 
 $categories = array_map(function($category) {
		return $category->cat_name;
	}, get_the_category());
?>
	<h3><?php echo implode(' , ', $categories); ?></h3>

	get_category_link

<?php 
foreach((get_the_category()) as $category) { 
    //this would print cat names.. You can arrange in list or whatever you want..
    echo '<span>'.$category->cat_name .'</span>';
} 
?>

//add "more" functinlity to the content
<?php
function new_excerpt_more($more) {
    global $post;
    return '....... <a href="'. get_permalink($post->ID) . '">read more</a>.';
}
add_filter('excerpt_more', 'new_excerpt_more');
?>
<?php the_excerpt(); ?>

<?php
//posted date and auther
?>
<h3>Posted <?php echo get_the_date(); ?> by <?php echo get_author_name(); ?></h3>


<?php 
//Print All categories
$terms_post = get_terms( array(
	'taxonomy' => 'category',
	'hide_empty' => false,
) ); ?>
<?php foreach($terms_post as $terms_posts):
$count_post = $terms_posts->count; //count post
?>
<li><a href="<?php echo get_category_link($terms_posts); ?>"><?php echo $terms_posts->name; ?> </a></li>
<?php endforeach; ?>

<?=get_the_date( 'F j' );?>

onclick="window.location.href='/page2'"

<?php
while ( have_posts() ) : the_post();
	the_content();
endwhile; 
?>

get post by cetagory
===============================
$pages = get_posts(array(
  'post_type' => 'page',
  'numberposts' => -1,
  'tax_query' => array(
    array(
      'taxonomy' => 'taxonomy-name',
      'field' => 'id',
      'terms' => 1 // Where term_id of Term 1 is "1".
    )
  )
);

onclick="window.location='http://www.example.com';"


 <!-- ============================ ACF relationship =============================-->

<?php 

$posts = get_field('relationship_field_name');

if( $posts ): ?>
    <ul>
    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
        <li>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <span>Custom field from $post: <?php the_field('author'); ?></span>
        </li>
    <?php endforeach; ?>
    </ul>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
<!-- ============================ End :: ACF relationship =============================-->

 <!-- ============================ Custom Post Type =========================== -->

<?php $loop = new WP_Query( array( 'post_type' => 'article', 'posts_per_page' => 10 ) ); ?>

<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

    <?php the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?>

    <div class="entry-content">
        <?php the_content(); ?>
    </div>
<?php endwhile; ?>

<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<!-- ============================ End :: Custom Post Type =========================== -->

<!-- ======================= excerpt ================================ -->
<?php
function new_excerpt_more($more) {
    global $post;
    return '....... <a href="'. get_permalink($post->ID) . '">read more</a>.';
}
add_filter('excerpt_more', 'new_excerpt_more');
?>
<?php the_excerpt(); ?>
<!-- ======================= end :: excerpt ================================ -->

<!-- ==================== simple data format =======================-->
<?php $post_date = date_create(get_the_date()); ?>
<?php echo date_format($post_date,"Y/m/d");?>
<!-- ==================== end :: simple data format =======================-->

<!-- ==================== excpert written in hand ==========================-->
<?php
$string= get_the_content();
$string = strip_tags($string);
if (strlen($string) > 500) {

	// truncate string
	$stringCut = substr($string, 0, 400);
	$endPoint = strrpos($stringCut, ' ');

	//if the string doesn't contain any space then it will cut without word basis.
	$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
	$string .= ' [...]';
}
?>
<!-- ==================== End :: excpert written in hand ==========================-->

<!-- ================== Add a button to an editor =====================-->
<?php
// Add Formats Dropdown Menu To MCE
if ( ! function_exists( 'wpex_style_select' ) ) {
	function wpex_style_select( $buttons ) {
		array_push( $buttons, 'styleselect' );
		return $buttons;
	}
}
add_filter( 'mce_buttons', 'wpex_style_select' );

// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'Popup Link',  
			'selector' => 'a',  
			'classes' => 'popup',
		),
		array(  
			'title' => 'Text Button Link',  
			'selector' => 'a',  
			'classes' => 'text-button-link',
		),
		array(  
			'title' => 'div',  
			'block' => 'div', 
			'wrapper' => true,
		),
		array(  
			'title' => 'Clear Both Block',  
			'block' => 'div', 
			'wrapper' => false,
			'classes' => 'clearfix',
		),
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 

function my_mce_buttons_2( $buttons ) {	
	/**
	 * Add in a core button that's disabled by default
	 */
	$buttons[] = 'superscript';
	$buttons[] = 'subscript';
	$buttons[] = 'iframe';

	return $buttons;
}
add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );
?>
<!-- ================== End :: Add a button to an editor =====================-->

<!-- ============== Print All Categories with their respective post ====================== -->
<?php 
$terms_post = get_terms( array(
	'taxonomy' => 'product_category',
	'hide_empty' => false,
) ); ?>
<?php foreach($terms_post as $terms_posts):
$term_taxonomy_id = $terms_posts->term_taxonomy_id;
?>
<li><?php echo $terms_posts->name; ?> 
	<?php $args = array(
	'post_type' => 'products',
	'tax_query' => array(
		array(
		'taxonomy' => 'product_category',
		'field' => 'term_id',
		'terms' => $term_taxonomy_id
		 )
	  )
	);
	$query = new WP_Query( $args ); 
	while ( $query->have_posts() ) : $query->the_post();
		the_title();
	endwhile;
	?>
</li>
<?php endforeach; ?>
<!-- ============== End :: Print All Categories with their respective post ====================== -->

<!-- ============== Print cetagories of a perticuat post =================== -->
<?php $loop = new WP_Query( array( 'post_type' => 'offer', 'posts_per_page' => 20 ) ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); 
 $terms = wp_get_post_terms( get_the_ID() , 'offer_category');
 foreach($terms as $terms_list) {
	$terms_list_category = $terms_list->slug;
 }
?>
<?php wp_reset_postdata(); ?>
<!-- ============== End :: Print cetagories of a perticuat post =================== -->

<!-- ============================ Dotted Pagination Function ========================================== -->
<?php
function pagination($pages = '', $range = 2){
$showitems = ($range * 2)+1;

global $paged;
if(empty($paged)) $paged = 1;

if($pages == '')
{
global $wp_query;
$pages = $wp_query->max_num_pages;
if(!$pages)
{
$pages = 1;
}
}

if(1 != $pages)
{
echo "<div class=\"pagination-section\">";
if($paged > 1 ) echo "<span class=\"prev\" ><a href='" . get_pagenum_link($paged - 1) . "'>< previous page</a></span>";
if(($paged-3)>0) {
$output = $output . "<span class=\"page-no\"><a href='" . get_pagenum_link(1) . "' >1</a></span>";
}
if(($paged-3)>1) {
$output = $output . '<span class="dot-dot">...</span>';
}
//Loop for provides links for 2 pages before and after current page
for($i=($paged-2); $i<=($paged+2); $i++)	{
if($i<1) continue;
if($i>$pages) break;
if($paged == $i)
$output = $output . '<span id='.$i.' class="current">'.$i.'</span>';
else	
$output = $output . '<span><a href="' . get_pagenum_link($i) . '" >'.$i.'</a></span>';
}
//if pages exists after loop's upper limit
if(($pages-($paged+2))>1) {
$output = $output . '<span class="dot-dot">...</span>';
}
if(($pages-($paged+2))>0) {
if($paged == $pages)
$output = $output . '<span id=' . ($pages) .' class="current">' . ($pages) .'</span>';
else	
$output = $output . '<span><a href="' . get_pagenum_link($pages) .'" >' . ($pages) .'</a></span>';
}
echo $output;
if ($paged < $pages) echo "<span class=\"next\" ><a href=\"" .get_pagenum_link($paged + 1) . "\">next page ></a></span>";
echo "</div>\n";
echo '<div class="clearfix"></div>';
}
}
?>
<!-- ============================ End :: Dotted Pagination Function ================================== -->

<!-- ============================= Dotted Pagination ====================== -->
<div class="pagination-wrapper">
	<?php if (function_exists("pagination")) {
		pagination($the_query->max_num_pages);
	} ?>
</div>

<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
		'post_type' => 'post',
		//'orderby' => 'DATE', 
		//'order' => 'DESC', 
		'paged'=> $paged,
		'posts_per_page' => 10,
		'post_status' => 'publish'
	);//, 
	$the_query = new WP_Query($args);
?>
<!-- ============================= End :: Dotted Pagination ====================== -->

<!-- ============================== Print Post ============================ -->
<?php $loop = new WP_Query( array( 'post_type' => 'article', 'posts_per_page' => 10 , 'orderby' => 'date',
            'order'   => 'DESC' ) ); ?>

<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

    <?php the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?>

    <div class="entry-content">
        <?php the_content(); ?>
    </div>
<?php endwhile; ?>

<?php wp_reset_postdata(); ?>
<!-- ============================== End :: Print Post ============================ -->

<!-- ==================== Order Of Search Result Page ======================= -->
<?php add_filter( 'posts_orderby', 'order_search_by_post_type', 10, 2 );
function order_search_by_post_type( $orderby, $wp_query ){
    if( ! $wp_query->is_admin && $wp_query->is_search ) :
        global $wpdb;
        $orderby =
            "
            CASE WHEN {$wpdb->prefix}posts.post_type = 'page' THEN '1' 
                 WHEN {$wpdb->prefix}posts.post_type = 'post' THEN '2' 
                 WHEN {$wpdb->prefix}posts.post_type = 'gallery' THEN '3' 
                 WHEN {$wpdb->prefix}posts.post_type = 'testimonial' THEN '4'
				 WHEN {$wpdb->prefix}posts.post_type = 'video' THEN '4'
            ELSE {$wpdb->prefix}posts.post_type END ASC, 
            {$wpdb->prefix}posts.post_title ASC";
    endif;
    return $orderby;
}
?>
<!-- ==================== End :: Order Of Search Result Page ======================= -->

<!-- ================== Image On error ========================== -->
<img src="invalid_link" onerror="this.onerror=null;this.src='https://placeimg.com/200/300/animals';" >
<!-- ================== End :: Image On error ========================== -->

<!-- ========================= Add custom widgets ==================== -->
<?php function wpb_widgets_init() {

register_sidebar( array(
    'name' => __( 'Newsletter', 'wpb' ),
    'id' => 'newsletter1',
    'description' => __( 'Newsletter section', 'wpb' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
) );
}
add_action( 'widgets_init', 'wpb_widgets_init' ); ?>
<!-- ========================= End :: Add custom widgets ==================== -->


<!-- ========================= Print category name with peticular ID ==================== -->
<?php $catsArray = array(121);
		$terms = get_terms( array(
				  'taxonomy' => 'category',
				  'include' => $catsArray,
				) ); ?>
<?php foreach($terms as $terms_list): ?>
<h2><?php echo $terms_list->name; ?></h2>
<?php endforeach; ?>
<!-- ========================= End :; Print category name with peticular ID ==================== -->

<!-- ========================== Search by title only ============================= -->
<?php 
function __search_by_title_only( $search, $wp_query )
{
global $wpdb;

if ( empty( $search ) )
return $search; // skip processing - no search term in query

$q = $wp_query->query_vars;
$n = ! empty( $q['exact'] ) ? '' : '%';

$search =
$searchand = '';

foreach ( (array) $q['search_terms'] as $term ) {
$term = esc_sql( like_escape( $term ) );

$search .= "{$searchand}($wpdb->posts.post_title REGEXP '[[:<:]]{$term}[[:>:]]')";

$searchand = ' AND ';
}

if ( ! empty( $search ) ) {
$search = " AND ({$search}) ";
if ( ! is_user_logged_in() )
$search .= " AND ($wpdb->posts.post_password = '') ";
}

return $search;
}

add_filter( 'posts_search', '__search_by_title_only', 1000, 2 );
?>
<!-- ========================== End :: Search by title only ============================= -->

<!-- ======================== When recapcha is not coming ============================== -->
      <div class="g-recaptcha" data-sitekey="6LedjqQUAAAAAHmWO4HlOy6BZ9iV7bFbKdLrliUm"></div>
    <script src='https://www.google.com/recaptcha/api.js'></script>
<!-- ======================== End :: When recapcha is not coming ============================== -->


<!-- ======================== Accordian with only one open ============================= -->
<script>
  /*ACCORDION SYSTEM*/
  /*jQuery('.acc-header').click(function () {
    if (jQuery(this).hasClass('open')) {
      jQuery(this).nextAll('.acc-body').first().fadeOut(0);
      jQuery(this).removeClass('open');
      jQuery(this).nextAll('.acc-body').first().addClass('hidden-acc');

    } else {
      jQuery(this).addClass('open');
      jQuery(this).nextAll('.acc-body').first().fadeIn(0);
      jQuery(this).nextAll('.acc-body').first().removeClass('hidden-acc');
    }
  });*/
	
	var acc = document.getElementsByClassName("acc-header");
	var panel = document.getElementsByClassName('hidden-acc');

	for (var i = 0; i < acc.length; i++) {
		acc[i].onclick = function() {
			var setClasses = !this.classList.contains('active');
			setClass(acc, 'active', 'remove');
			setClass(panel, 'show', 'remove');

			if (setClasses) {
				this.classList.toggle("active");
				this.nextElementSibling.classList.toggle("show");
			}
		}
	}

	function setClass(els, className, fnName) {
		for (var i = 0; i < els.length; i++) {
			els[i].classList[fnName](className);
		}
	}

</script>
<style>
	.hidden-acc {
		display:none;
		height: 0;
		overflow: hidden;
		transition: max-height 10ms ease-in-out;
	}
	.hidden-acc.show {
		display:block;
		height: auto;
	}
	</style>
<!-- ======================== End :: Accordian with only one open ============================= -->

<!-- Disable right click of mouse -->
oncontextmenu="return false;"


<!-- ============================= Add Quick Links ============================== -->
<?php
// ============================= [inject-quick-reference] =================================
function auto_id_headings( $content ) {
	$content = preg_replace_callback( '/(\<h[1-4](.*?))\>(.*)(<\/h[1-4]>)/i', function( $matches ) {
		if ( ! stripos( $matches[0], 'id=' ) ) :
			$heading_link = '<a href="#' . sanitize_title( $matches[3] ) . '" class="heading-link" id="quick-' . sanitize_title( $matches[3] ) . '"></a>';
			$matches[0] = $matches[1] . $matches[2] . ' id="' . sanitize_title( $matches[3] ) . '">' . $heading_link . $matches[3] . $matches[4];
		endif;
		return $matches[0];
	}, $content );

	$content = preg_replace_callback( '/(\<p(.*?))\>(.*)(<\/p>)/i', function( $matches ) {
		if ( ! stripos( $matches[0], 'class=' ) ) :
			$class = (trim($matches[3])=='' || trim($matches[3],'&nbsp;') =='' || $matches[3] == '&nbsp;') ? ' class="empty"' : '';
			$matches[0] = $matches[1] . $matches[2]. $class . ' >' . trim($matches[3],'&nbsp;') . $matches[4];
		endif;
		return $matches[0];
	}, $content );

    return $content;
}
add_filter( 'the_content', 'auto_id_headings' );

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
	global $inject_section;
	global $post;
	$post_id = $post->ID;
	ob_start();
	//if(get_field('inject_quick_links', $post_id)==true):
	?>
	<div class="clearfix"></div>
	<div class="inject-block-right">
		<div class="category-area quick-refrence">
			<h2>Quick Links</h2>
			<ul class="category">
			<?php						
				$parseMe = get_the_content($post_id);
				$headers = @getTextBetweenTags($parseMe, 'h2');
				foreach($headers as $header){ 
					$headerLink = sanitize_title($header);
					$headerLink = strtolower($headerLink);
					$headerCount = strlen ( $header );
					if($headerCount > 123){
						$headerText = substr($header,0,120).'...';
					}else{
						$headerText = $header;
					}
					if($header!=''){
				?>								
					<li class="scroll-to-local-link">
						<a href="#quick-<?php echo $headerLink; ?>" alt="Scroll To <?php echo $header; ?>" id="<?php echo $headerLink; ?>" title="Scroll To <?php echo $header; ?>" class="link"><?php echo $headerText; ?> </a>
					</li>
					<?php
					}
				}

			?>
			</ul>
		</div>
	</div>
	<?php
	//endif;
	$content = ob_get_clean();
	return $content;
}
add_shortcode( 'inject-quick-reference', 'inject_quick_reference_function' );
// ============================= END :: [inject-quick-reference] =================================
?>
<script>
$(document).ready(function(){
	$(".link").click(function() {
		var gid = $(this).attr('id');
		//alert(gid);
		$('html, body').animate({
			scrollTop: $("#quick-"+gid).offset().top-150
		}, 2000);
	});
});
</script>
<!-- ============================= End :: Add Quick Links ============================== -->

<script>
jQuery(function(){
   jQuery(".show-class").click(function () {
      jQuery(this).text(function(i, text){
          return text === "SHOW" ? "HIDE" : "SHOW";
      })
   });
})
</script>

template name
<?php  if(basename( get_page_template() ) == 'template.home.php'): ?>


//================== display post type ===================
<?php $loop = new WP_Query( array( 'post_type' => 'article', 'posts_per_page' => 10 ) ); ?>

<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

    <?php the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?>

    <div class="entry-content">
        <?php the_content(); ?>
    </div>
<?php endwhile; ?>

<?php wp_reset_postdata(); ?>


<!-- ================ ACCORDION WITH ONLY ONE OPEN AT A TIME =================== -->
<ul id="accordion">
  <li><span>Tab 1</span>
    <div>
tab1
    
    </div>
  </li>
  <li><span>Tab 2</span>
    <div>
   Tab 3
    </div>
    
  </li>
  
  <li><span>tab 3</span>
    <div>
  tab 3
    </div>
  </li>
  
  <li><span>tab 4</span>
    <div>
Tab 4
      </div>  

    
  </li>
  
</ul>
<script>
	$("#accordion > li > span").click(function() {
    $(this).toggleClass("active").next('div').slideToggle(250)
    .closest('li').siblings().find('span').removeClass('active').next('div').slideUp(250);
});
</script>
<style type="text/css">
	#accordion {
	list-style: none;
	padding: 2px;
}
#accordion > li {
	display: block;
	list-style: none;
}
#accordion > li > span {
	display: block;
	color: #fff;
	margin: 4px 0;
	padding: 6px;
	background: url(images/expand_arrow.png) no-repeat 99.5% 6px #525252;
	background-size: 20px;
	font-weight: normal;
	cursor: pointer; font-size:16px
}
#accordion > li > div {
	list-style: none;
	padding: 6px;
	display: none; overflow:auto
}
#accordion > ul li {
	font-weight: normal;
	cursor: auto;
	padding: 0 0 0 7px;
}
#accordion a {
	text-decoration: none;
}
#accordion li > span:hover {
}
#accordion li > span.active {
	background: url(images/collapse-arrow.png) no-repeat 99.5% 6px #000;
	background-size: 20px
}

</style>
<!-- ================ END :: ACCORDION WITH ONLY ONE OPEN AT A TIME =================== -->

<!-- ================ IN CASE CUSTOM POST TYPE SEARCH IS NOT COMMING ========================== -->
<?php
add_filter( 'pre_get_posts', 'tgm_io_cpt_search' );
/**
 * This function modifies the main WordPress query to include an array of 
 * post types instead of the default 'post' post type.
 *
 * @param object $query  The original query.
 * @return object $query The amended query.
 */
function tgm_io_cpt_search( $query ) {
	
    if ( $query->is_search ) {
	$query->set( 'post_type', array( 'page', 'post', 'gallery' ) );
    }
    
    return $query;
    
}
?>
<!-- ================ End :: IN CASE CUSTOM POST TYPE SEARCH IS NOT COMMING ========================== -->

<!-- ================ Gallery Next Previous case ============================== -->
<?php
	$current_post = get_post();
	$post_type = 'gallery';
	$post_category ='gallery-category';
	$term_obj_list = get_the_terms( $post->ID, $post_category );
	$terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
	$current_post_categories = get_the_terms( $current_post->ID, $post_category );
	$current_post_categories_ids = array();
	$current_post_category_id = '';
	foreach($current_post_categories as $category):
		$current_post_categories_name = $category->name;
		$current_post_category_id = $category->term_id;
		//echo $current_post_categories_name;
		array_push($current_post_categories_ids, $category->term_id);
	endforeach;
	$before_id = '';
	$after_id = '';
	if(!empty($current_post_categories_ids)):
		$current_post_categories_id = implode(',',$current_post_categories_ids);
		$querystr = "SELECT $wpdb->posts.* FROM $wpdb->posts  LEFT JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id) WHERE $wpdb->posts.ID > $current_post->ID AND ( $wpdb->term_relationships.term_taxonomy_id IN ($current_post_categories_id)) AND $wpdb->posts.post_type = '".$post_type."' AND ($wpdb->posts.post_status = 'publish') ORDER BY $wpdb->posts.ID ASC LIMIT 0, 1";
		$pageposts = $wpdb->get_results($querystr, OBJECT);
		if(!empty($pageposts)):
			$before_id = $pageposts[0]->ID;
			$before_title = $pageposts[0]->post_title;
			$before_url = get_post_permalink($pageposts[0]->ID);
		endif;
		$querystr1 = "SELECT $wpdb->posts.* FROM $wpdb->posts  LEFT JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id) WHERE $wpdb->posts.ID < $current_post->ID AND ( $wpdb->term_relationships.term_taxonomy_id IN ($current_post_categories_id)) AND $wpdb->posts.post_type = '".$post_type."' AND ($wpdb->posts.post_status = 'publish') ORDER BY $wpdb->posts.ID DESC LIMIT 0, 1";
		$pageposts1 = $wpdb->get_results($querystr1, OBJECT);
		if(!empty($pageposts1)):
			$after_id = $pageposts1[0]->ID;
			$after_title = $pageposts1[0]->post_title;
			$after_url = get_post_permalink($pageposts1[0]->ID);
		endif;
	endif;
	if($current_post_category_id!=''):
		$term = get_term( $current_post_category_id, $post_category );
		$term_link = get_term_link( $term );
		$back_to = $term_link;
	else:
		$back_to = get_field('gallery_url', $common_setting);
	endif;
	$page_term = $current_post_categories[0];
	$taxonomy_slug = $post_category;
?>
<a href="<?=$before_url; ?>" title="<?=$before_title; ?>" class="common-button blue-border-button"><?=__('Previous case', 'dlm') ?></a>
<a href="<?=$after_url; ?>" title="<?=$after_url; ?>" class="common-button blue-border-button active"><?=__('Next case', 'dlm') ?></a>
<!-- ================ End :: Gallery Next Previous case ============================== -->


<!-- ====================== Meta Query ============================ -->
<?php
$post_type = 'event';
$taxonomy_slug = 'event-categories';
$terms_list = array(
	'weight-loss-surgery-pre-op-seminar',
	'weight-loss-surgery-seminar'
);
$meta_query = array(
	array(
		'relation' => 'AND',
		array(
			'key' => '_event_start_date',
			'value' => date('Y-m-d'),
			'compare' => '>',
		),
	),
);
$args = array(
	'post_type' => $post_type, 
	'posts_per_page' => -1, 
	'meta_key' => '_event_start_date', 
	'orderby' => 'meta_value',
	'order'   => 'ASC',
	'tax_query' => array(
		array(
			'taxonomy' => $taxonomy_slug,
			'field' => 'slug',
			'terms' => $terms_list,
		)
	),
	'meta_query'	=> $meta_query,
);
$query = new WP_Query( $args );
?>
<!-- ====================== Meta Query ============================ -->

<!-- ======================= jQuery Replace ========================= -->
<script>
	jQuery( document ).ready(function() {
	jQuery('.address-block p').each(function() {
		var text = jQuery(this).text();
		var breakTag = '<br/>';
		text = text.replace('(972) 863-2111', '(972) 702-8888');
		text = (text + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
		jQuery(this).html(text)
	});
});
</script>
<!-- ======================= end :: jQuery Replace ========================= -->

<script>
	$('#myModal').modal({
		backdrop: 'static',
		keyboard: false
	})
</script>

<script>
	$(document).ready(function() {
	  setTimeout(function() {
		$("#signInButton").trigger('click');
	  }, 5000);
	});
</script>



<?php if('post' === get_post_type()): ?>
<?php $terms = wp_get_post_terms( get_the_ID() , 'category');
 foreach($terms as $terms_list) {
	$terms_list_id = $terms_list->term_id;
  ?>
 <?php $args = array(
'post_type' => 'post',
'posts_per_page' => 3,
'post__not_in'   => array( $post->ID ),
'tax_query' => array(
	array(
	'taxonomy' => 'category',
	'field' => 'term_id',
	'terms' => $terms_list_id,
	 )
  )
);
$query = new WP_Query( $args ); 
while ( $query->have_posts() ) : $query->the_post();
?>

static content
<?=__('Call', 'twentytwenty') ?>

if(function_exists('count_nav_parent_items')){


<script>
	function setCookie(cname,cvalue,exdays) {
	  var d = new Date();
	  d.setTime(d.getTime() + (exdays*24*60*60*1000));
	  var expires = "expires=" + d.toGMTString();
	  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}
	function getCookie(cname) {
	  var name = cname + "=";
	  var decodedCookie = decodeURIComponent(document.cookie);
	  var ca = decodedCookie.split(';');
	  for(var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') {
		  c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
		  return c.substring(name.length, c.length);
		}
	  }
	  return "";
	}

	function checkCookie() {
	  var user=getCookie("username");
	  if (user != "") {
	  } else {
		 user = "new_user";
		 /*=============== Popup Mail form =============*/
		 $(window).scroll(function() {
			var scrollDistance = $(window).scrollTop();	
				if ($('.opl').position().top <= scrollDistance) {
						$('.open_nleter').addClass('selected');
				}else{
					$('.open_nleter').removeClass('selected');
					$('.open_nleter').removeClass('selected2');
				}
		 });
			$(window).on('load resize', function() {
				$('.open_nleter_close').click(function(){
					$('.open_nleter').addClass('selected2');
				});
			});
		/*=============== Popup Mail form =============*/
		 if (user != "" && user != null) {
		   setCookie("username", user, 3);
		 }
	  }
	}	
</script>

<!-- =============== radio button condition check =============== -->
<script>
jQuery(window).on('load', function () {
    $('.surgical-section').hide();
    $('.non-surgical-section').hide();

    $("input[name=user-type]:radio").click(function () {
        if ($('input[name=user-type]:checked').val() == "Surgical") {
            $('.non-surgical-section').hide();
            $('.surgical-section').show();

        } else if ($('input[name=user-type]:checked').val() == "Non-surgical") {
            $('.non-surgical-section').show();
            $('.surgical-section').hide();

        }
    });
});
</script>
<!-- =============== end :: radio button condition check =============== -->

<!-- ===================== POPUP SECTION ========================== -->
<div class="modal fade" id="popup-section" role="dialog">
	<div class="modal-dialog">
	  <div class="modal-content">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<div class="modal-body">
		  <img src="http://cosmeticplastics.com/wp-content/uploads/2020/03/cosmetic_popup-covid19.png" />
		</div>
	  </div>      
	</div>
</div>
<script>
	jQuery(document).ready(function(){
		jQuery('#popup-section').modal('show');
	});
</script>
<style type="text/css">
#popup-section .close {
    font-size: 27px;
    position: absolute;
    background: rgba(0, 0, 0, 0.7019607843137254);
    opacity: 1;
    text-shadow: none;
    color: #fff;
    padding: 8px 13px;
    z-index: 9;
    border-radius: 50%;
    right: -21px;
    top: -19px;
}
#popup-section .modal-content {
    border-radius: 0;
    font-family: 'Big Caslon';
    margin-top: 50px;
}
@media(max-width:480px) {
	#popup-section .close {
		padding: 6px 11px;
		right: -9px;
		top: -9px;
	}
}
</style>
<!-- ===================== END :: POPUP SECTION ========================== -->
<!-- ===================== Youtube thumbnail ========================== -->
<?php
	$video_iframe = get_field('video_iframe');
	preg_match('/src="([^"]+)"/', $video_iframe, $match);
	$video_iframe_url = $match[1];
	$video_iframe_link = explode('/',$video_iframe_url);
	$iframe_link = end($video_iframe_link);
?>
<div class="video-bg" style="background-image:url(https://i.ytimg.com/vi/<?=$iframe_link?>/hqdefault.jpg); height: 190px; width: 360px;"></div>

<!-- ===================== End:: Youtube thumbnail ========================== -->

<!-- ===================== Model Cookie ======================= -->

<a href="" class="btn btn-ghost-blue " onclick="setCookie("username", user, 3);">Yes</a>

<script>
function setCookie(cname,cvalue,exdays) {
var d = new Date();
d.setTime(d.getTime() + (exdays*24*60*60*1000));
var expires = "expires=" + d.toGMTString();
document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
var name = cname + "=";
var decodedCookie = decodeURIComponent(document.cookie);
var ca = decodedCookie.split(';');
for(var i = 0; i < ca.length; i++) {
var c = ca[i];
while (c.charAt(0) == ' ') {
c = c.substring(1);
}
if (c.indexOf(name) == 0) {
return c.substring(name.length, c.length);
}
}
return "";
}
var user=getCookie("username");
if (user != "") {
} else {
user = "new_user";
/*=============== Popup =============*/
jQuery(window).on('load',function(){
jQuery('#agepopup').modal('show');

});
/*=============== Popup =============*/

}
</script>

<!-- ===================== End :: Model Cookie ======================= -->

<?php
// Reviews category shortcode
function review_cat_func($atts) {
    extract(shortcode_atts(array(
            'class_name'    => 'cat-post',
            'totalposts'    => '10',
            'category'      => '',
            'thumbnail'     => 'false',
            'excerpt'       => 'true',
            'orderby'       => 'post_date'
            ), $atts));

    global $post;
      $category_terms = get_terms( 'review_category', array( 'slug' => $atts ) );
       $cat_name= get_field( 'heading', 'category_' .  $category_terms[0]->term_id );
        if($cat_name){
       $builder .= "<div class='header-block media-box'> ".$cat_name." </div>";
        }else{
             $builder .= "<div class='header-block media-box'>Watch Real Patient Reviews</div>";
        }
        $builder .='<div class="box header">';
         $builder .='<ul class="media-slider" id="media-box">';
      $args = array(
        'posts_per_page' => $totalposts, 
        'orderby' => $orderby,
        'post_type' => 'review',
        'tax_query' => array(
            array(
                'taxonomy' => 'review_category',
                'field' => 'slug',
                'terms' => $atts['slug']
            )
        ));
           
    $myposts = NEW WP_Query($args);

    while($myposts->have_posts()) {
        $myposts->the_post();
        $builder .= '<li>';
        $builder .= '<div class="media-image">'.get_the_post_thumbnail($post->ID, 'full').'</div>';
        $builder .= '<a class="slide_img" href="'.get_permalink().'">'.get_the_title().'</a>';
        $builder .= '</li>';
    };
    $builder .= '</ul>';
    $builder .= '</div>';
    wp_reset_query();
    return $builder;
}
add_shortcode('review-inject', 'review_cat_func');


// END:: Reviews category shortcode
?>

////// loop toggle **********/
<script>
    jQuery(document).ready(function() {
	  jQuery('.blog-parent-category-list').on('click', function(event) {
		jQuery(this).closest('.blog-parent-category-list').find('.sub-menu').toggle();
	  });
	});
	/********** anchor tag top offset ***********/
	$( ".dropdown-menu li a" ).click(function( event ) {
		event.preventDefault();
		$("html, body").animate({ scrollTop: $($(this).attr("href")).offset().top-150 }, 500);
	});
</script>
/////////////// Trim title//////////
<?php echo mb_strimwidth(get_the_title(), 0, 45, '...'); ?>

<?php
/*::::::: Serch Order ::::::::::::*/
add_filter( 'posts_orderby', 'order_search_by_post_type', 10, 2 );
function order_search_by_post_type( $orderby, $wp_query ){
    if( ! $wp_query->is_admin && $wp_query->is_search ) :
        global $wpdb;
        $orderby =
            "
            CASE WHEN {$wpdb->prefix}posts.post_type = 'page' THEN '1' 
                 WHEN {$wpdb->prefix}posts.post_type = 'post' THEN '2' 
                 WHEN {$wpdb->prefix}posts.post_type = 'gallery' THEN '3' 
                 WHEN {$wpdb->prefix}posts.post_type = 'testimonial' THEN '4'
            ELSE {$wpdb->prefix}posts.post_type END ASC, 
            {$wpdb->prefix}posts.post_title ASC";
    endif;
    return $orderby;
}

/****** search limit to title only *********/
function __search_by_title_only( $search, &$wp_query )
{
    global $wpdb;
 
    if ( empty( $search ) )
        return $search; // skip processing - no search term in query
 
    $q = $wp_query->query_vars;    
    $n = ! empty( $q['exact'] ) ? '' : '%';
 
    $search =
    $searchand = '';
 
    foreach ( (array) $q['search_terms'] as $term ) {
        $term = esc_sql( like_escape( $term ) );
        $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
        $searchand = ' AND ';
    }
 
    if ( ! empty( $search ) ) {
        $search = " AND ({$search}) ";
        if ( ! is_user_logged_in() )
            $search .= " AND ($wpdb->posts.post_password = '') ";
    }
 
    return $search;
}
add_filter( 'posts_search', '__search_by_title_only', 500, 2 );
?>
/*********** clickable menu if not clicking *********/
<script>
$('.menu-item.pending').live('mouseover', function(){
		adasi_add_checkbox(
 this );
	});
</script>
/************** Display Limited Content *****************/
<?php
	$string= get_the_content();
	$string = strip_tags($string);
	if (strlen($string) > 200) {
		$stringCut = substr($string, 0, 200);
		$endPoint = strrpos($stringCut, ' ');
		$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
		
	}
?>
<p><?php echo $string; ?></p>
/************** END: Display Limited Content *****************/

/* =========== Advance Search ===========*/
add_filter( 'posts_where', 'where_advance_search_page', 20, 2 );
function where_advance_search_page( $where, $wp_query ) {
	if(isset($_POST['action']) && $_POST['action'] == 'advance_search_result'){
		global $wpdb;
		if (isset($_POST['search'])) {
			$search_query = $_POST['search'];
			$where .= " AND " . $wpdb->posts . ".post_title LIKE '%" . $search_query. "%' ";
		}
		//echo $where;
	}
	return $where;
}

function advance_search_result(){
	if (isset($_POST['search'])) {
		$search_query = $_POST['search'];
		//print_r($_POST);
		/* ======================== Page ================ */
		/*$pages = get_posts(array(
			'post_type' => 'page',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'orderby' => 'title',
			'order' => 'ASC',
			's' => $search_query
			
		));*/
		
		/*if(!empty($pages)){
			//print_r($pages);
		?>
			<h5><?=__('Pages', 'twentytwenty')?></h5>
			<ul>
		<?php foreach($pages as $page){ ?>
				<a href="<?=get_permalink($page->ID)?>">
				<li onclick="fill('<?=htmlentities($page->post_title)?>', '<?=get_permalink($page->ID)?>')">
					<h4><?=$page->post_title; ?></h4>
					<p><?=get_the_excerpt($page->ID); ?></p>
				</li>
				</a>
		<?php } ?>
			</ul>
		<?php
		}*/
		$args = array(
			'post_type' => 'page',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'orderby' => 'title',
			'order' => 'ASC',
			//'s' => $search_query
		);
		$the_query = new WP_Query( $args );
		if($the_query->have_posts()){
		?>
		<h5><?=__('Pages', 'twentytwenty')?></h5>
			<ul>
		<?php
			while ($the_query -> have_posts()) : $the_query -> the_post();
			?>
				<a href="<?=get_permalink()?>">
				<li onclick="fill('<?=htmlentities(get_the_title())?>', '<?=get_permalink()?>')">
					<h4><?=get_the_title(); ?></h4>
					<p><?=get_the_excerpt(); ?></p>
				</li>
				</a>
			<?php
			endwhile;
		?>
			</ul>
		<?php
		}
		/* ======================== Gallery ================ */
		global $wpdb;
		$term_slug = "gallery-category";
		$post_type = 'gallery';
		$term_ids=array(); 
		//SELECT t.*  FROM `wpdlm_terms` as t INNER JOIN  wpdlm_term_taxonomy as tt ON t.term_id = tt.term_id  WHERE tt.taxonomy = 'gallery-category' AND t.`name` LIKE '%Face%'
		//$cat_Args="SELECT * FROM $wpdb->terms WHERE name LIKE '%".$_REQUEST['s']."%' ";
		$cat_Args="SELECT t.*  FROM $wpdb->terms as t INNER JOIN $wpdb->term_taxonomy as tt ON t.`term_id` = tt.`term_id`  WHERE tt.`taxonomy` = '".$term_slug."' AND t.`name` LIKE '%".$search_query."%' ";
		$cats = $wpdb->get_results($cat_Args, OBJECT);
		foreach($cats as $cat){
			//echo '<pre>'; print_r($cat) ; echo '</pre>';
			array_push($term_ids,$cat->term_id);
		}
		$q1 = get_posts(array(
				'fields' => 'ids',
				'post_type' => $post_type,
				'post_status' => 'publish',
				'posts_per_page' => -1,
				's' => $search_query 

		));
		/*$q2 = get_posts(array(
				'fields' => 'ids',
				'post_type' => $post_type,
				'post_status' => 'publish',
				'posts_per_page' => -1,
				'category' =>$term_ids
		));*/
		//echo '<pre>'; print_r($term_ids) ; echo '</pre>';
		$q2 = get_posts(
			array(
				'fields' => 'ids',
				'posts_per_page' => -1,
				'post_type' =>  $post_type,
				'tax_query' => array(
					array(
						'taxonomy' => $term_slug,
						'field' => 'term_id',
						'terms' => $term_ids,
					)
				)
			)
		);
		$unique = array_unique( array_merge( $q1, $q2 ) );
		if(!empty($unique)){
			$galleries = get_posts(array(
				'post_type' => $post_type,
				'post__in' => $unique,
				'posts_per_page' => -1,
				'orderby' => 'title',
				'order' => 'ASC',
			));
		}else{
			$galleries = array();
		}
		if(!empty($galleries)){
		?>
			<h5><?=__('Galleries', 'twentytwenty')?></h5>
			<ul>
		<?php foreach($galleries as $gallery){ ?>
				<a href="<?=get_permalink($gallery->ID)?>">
				<li onclick="fill('<?=htmlentities($gallery->post_title)?>', '<?=get_permalink($gallery->ID)?>')">
					<h4><?=$gallery->post_title; ?></h4>
					<p><?=get_the_excerpt($gallery->ID); ?></p>
				</li>
				</a>
		<?php } ?>
			</ul>
		<?php
		}
		/* ======================== Blog ================ */
		$blogs = get_posts(array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'orderby' => 'title',
			'order' => 'ASC',
			's' => $search_query
		));
		if(!empty($blogs)){
		?>
			<h5><?=__('Blogs', 'twentytwenty')?></h5>
			<ul>
		<?php foreach($blogs as $blog){ ?>
				<a href="<?=get_permalink($blog->ID)?>">
				<li onclick="fill('<?=htmlentities($blog->post_title)?>', '<?=get_permalink($blog->ID)?>')">
					<h4><?=$blog->post_title; ?></h4>
					<p><?=get_the_excerpt($blog->ID); ?></p>
				</li>
				</a>
		<?php } ?>
			</ul>
		<?php
		}
		
		//print_r($pages);
	}
}
add_action( 'wp_ajax_advance_search_result', 'advance_search_result' );
add_action( 'wp_ajax_nopriv_advance_search_result', 'advance_search_result' );
/* =========== End :: Advance Search ===========*/

//EOROR 404 at pagination in archive page
flush_rewrite_rules( false );
function custom_posts_per_page( $query ) {
	if ( !is_admin() && ($query->is_archive('gallery') || $query->is_archive()) ) {
		set_query_var('posts_per_page', 1);
	}
}
add_action( 'pre_get_posts', 'custom_posts_per_page' );




/* ===========  Previous - Next Dynamic ===========*/

<div class="previous-post-link">
     <?php next_post_link('&laquo %link', 'Previous', $in_same_term = true, $excluded_terms = '', $taxonomy = 'gallery-category'); ?>                   
</div> 
<div class="next-post-link">
     <?php previous_post_link('%link &raquo', 'Next', $in_same_term = true, $excluded_terms = '', $taxonomy = 'gallery-category'); ?>                   
</div>
/* =========== End :: Previous - Next Dynamic ===========*/

/* ===========  Css class add Dynamic ===========*/

<?php if ( !is_front_page() ) { echo 'inner-header'; } ?>

/* =========== End:  Css class add Dynamic ===========*/

/* =========== Gallery site-breadcrumb ===========*/

<?php
	$post_type = 'gallery';
	$taxonomy_slug = 'gallery-category';
	$current_post_categories = get_the_terms( get_the_ID(), $taxonomy_slug )[0];
	$tax_query = $current_post_categories->term_id;
	//print_r($current_post_categories);
?>

<div class="site-breadcrumb">
	<?php
	if (function_exists('parent_gallery_category_breadcrumb')) {
		parent_gallery_category_breadcrumb($term->term_id, $taxonomy_slug);
	} 
	
	if (function_exists('parent_gallery_category_breadcrumb')) {
		parent_gallery_category_breadcrumb($tax_query, $taxonomy_slug );
	}
	if (function_exists('simple_breadcrumb')) {
		simple_breadcrumb();
	} 
	?>
</div>
/* =========== End: Gallery site-breadcrumb ===========*/

/* =========== Word Count With button ===========*/
function prefix_wcount(){
    ob_start();
    the_content();
    $content = ob_get_clean();
    return sizeof(explode(" ", $content));
}

<div class="testimonials-each">
	<?php //echo prefix_wcount(); ?>
	<?php $excerpt= get_the_excerpt();echo substr($excerpt, 0, 210);?>
	<?php if(prefix_wcount() > 34):?>
	<a href="javascript:;"  data-fancybox data-src="#modal-<?=$i?>"><?=__( 'Continue Reading', 'twentytwenty' )?></a>
	<?php endif;?>
	<div class="popup-section" id="modal-<?=$i?>" style="display:none;">
				<h2>Patient Review</h2>
				<?php the_content();?>
	</div>
</div>

/* =========== End: Word Count With button ===========*/

/* =========== Pagination ===========*/
<!-- Pagination  -->
	<div class="col-lg-12">
		<div class="pegination-area">
			<?php if($the_query->max_num_pages): ?>
			<!-- Pagination -->
			<?php if (function_exists("pagination")) {
				pagination($the_query->max_num_pages);
			} ?>
			<?php endif; ?>
		</div>
		
	</div>
<!-- End :: Pagination  -->
/* =========== End: Pagination ===========*/

/* =========== current_post_categories print by post ===========*/
<?php
	$post_type = 'gallery';
	$taxonomy_slug = 'gallery-category';
	$current_post_categories = get_the_terms( get_the_ID(), $taxonomy_slug )[0];
	$tax_query = $current_post_categories->name;
	//print_r($current_post_categories);
	//$tax_query = $current_post_categories->term_id;
?>
<div class="gallery-interior-each-block-content">
	<h5><?php echo $tax_query;?></h5>
</div>

/* =========== End: current_post_categories print by post ===========*/
// ==============   Fancybox popup      /////////////////
<style>
#popup_box {
    display:none;
    width:400px !important;
    margin:0;
    padding:0;
}
#popup_box button svg{
	color: #fffafa;	
}
</style>
<div id="popup_box">
    	<a href="/contact-us/">
				<img src="/wp-content/uploads/2022/09/insurance-pop-up.jpg"/>
		</a>
</div>
<script type="text/javascript">
	$(document).ready(function() {	
    $('#popup_box').fancybox().trigger('click'); 
});
 </script>
// ==============   Fancybox popup      /////////////////

/* =========== ACF select Option ===========*/

<?php if( get_field('choose_media_category_icon') == 'online' ) { ?>
	<img src="/wp-content/uploads/2022/05/Online.svg" border="0" alt="" class="media-type-icon">
	<?php } else if( get_field('choose_media_category_icon') == 'print'){ ?>
	<img src="/wp-content/uploads/2022/05/Print.svg"  border="0" alt="" class="media-type-icon">
	<?php } else if(get_field('choose_media_category_icon') == 'television'){ ?>
	<img src="/wp-content/uploads/2022/05/Television-1.svg"  border="0" alt="" class="media-type-icon">
<?php } ?>

/* =========== End: ACF select Option ===========*/

/* =========== WORD count with Heading(wysing editor) ===========*/

<?php $textcount = strlen(get_sub_field('treatment_tab_block'));  ?>
<?php //echo $textcount; ?>
<?php $textcount = strlen(strip_tags(get_sub_field('treatment_tab_block'))); ?>
<?php //echo $textcount; ?>
<div class="dirk-circle-tab-content">
	<?php the_sub_field('treatment_tab_block'); 	
	?>
</div>

<?php if($textcount > 300):?>
<div class="expand-link-btn">Read More</div>

<?php endif;?>

/* =========== End: WORD count with Heading(wysing editor) ===========*/
/*================= permalink hide ================= */
function remove_from_public( $args, $post_type ) {

    $args['public'] = false;
    $args['show_ui'] = true;

    // some other common uses:
    //$args['show_in_rest'] = false;
    //$args['rewrite']  = false;
    //$args['rest_base'] = false;

    return $args;
}
add_filter( 'register_post_type_args', 'remove_from_public', PHP_INT_MAX, 2 );
/*================= End: permalink hide ================= */

/********* file down-load after mail sent******* */

add_action( 'wp_footer', 'add_download_pdf_file' );
function add_download_pdf_file()
{
$contactform_id = (int) 837;
$pdf_filename = get_sub_field('download_file');
///$filename = 'WpWebGuru';
?>
<script>
    document.addEventListener( 'wpcf7mailsent', function( event ) 				  
    {
		let myForm = event.detail
   
        if ( <?php echo $contactform_id;?> == event.detail.contactFormId )
        {
          let targetId = event.target.parentNode.parentNode.getAttribute("data-pdf");
          

            document.querySelector(`#downloadAble li:nth-child(${targetId}) a`).click();
            //document.querySelector(`input[type="hidden" i]`).innerHTML = '<a href="<?php echo $pdf_filename;  ?>"></a>';
		
		
        }
		
    },  );
</script>
<?php
}

/********* file down-load after mail sent******* */
/********* acf repeater arry value print******* */
<?php
if (have_rows('cleaning_features')):
	$slides = get_field('cleaning_features');
	if ($slides && is_array($slides)):
		$first_slide = $slides[0]; 
		$image = $first_slide['image'];
		$caption = $first_slide['content'];
		?>
		<div class="each-home">
		  <?php echo $caption; ?>

		  <?php if( !empty( $image ) ): ?>
		  <figure>
			<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
		  </figure>
		  <?php endif; ?>
		</div>                    
	<?php endif;
endif;
?>
/*********  END:: acf repeater arry value print******* */


/********* post single page call******* */
function custom_post_type_template($template) {
    if (is_singular('artical')) {
        $new_template = locate_template(array('single-press-article.php'));
        if (!empty($new_template))
            return $new_template;
    }
    return $template;
}
add_filter('template_include', 'custom_post_type_template');

/********* End: post single page call******* */
/********* rating******* */
<?php $value = get_field( "rating" );
if( $value==1 ) {
	echo '<i class="bi bi-star-fill"></i>';
		  }else if( $value==1.5 ) {
			  echo '<i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>';
		  }else if( $value==2 ) {
		  echo '<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>';
	  }else if( $value==2.5 ) {
		  echo '<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>';
	  }else if( $value==3 ) {
	  echo '<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>';
  }else if( $value==3.5 ) {
	  echo '<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>';
  }else if( $value==4 ) {
  echo '<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>';
}else if( $value==4.5 ) {
  echo '<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>';
}else if( $value==5 ) {
  echo '<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>';
} else {
			  echo 'No ratings found';
		  }
?>
/********* End: rating******* */