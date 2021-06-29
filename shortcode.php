<?php
function pizza_loop_shortcode( $atts ) {
    extract( shortcode_atts([
     
        'type' => 'product',
        'perpage' => 4,
		'cat' => '3'
	], $atts ) );


   
    $args = array(
        'post_type' => $type,
        'posts_per_page' => $perpage,
  
    );
    $pizza_query = new  WP_Query( $args );
    while ( $pizza_query->have_posts() ) : $pizza_query->the_post();
        $output .= '
			<div>  
					
					<p>'  . get_permalink() . ' </p>
					<p>'  . get_the_title() . ' </p>
			</div>
		';
    endwhile;
    wp_reset_query();

    return $output;
}
add_shortcode('pizza', 'pizza_loop_shortcode');