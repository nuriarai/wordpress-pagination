/*********************
WORDPRESS PAGE NAVI  
*********************/

add_filter('next_posts_link_attributes', 'posts_link_attributes_next');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_prev');

function posts_link_attributes_next() {
    return 'class="next"';
}
function posts_link_attributes_prev() {
    return 'class="prev"';
}

// Numeric Page Navi 
function new_page_navi() {
  global $wp_query;
  $bignum = 999999999;
  if ( $wp_query->max_num_pages <= 1 )
    return;
  echo previous_posts_link();
  echo next_posts_link();
  echo '<nav class="pagination">';
  echo paginate_links( array(
    'base'         => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
    'format'       => '',
    'current'      => max( 1, get_query_var('paged') ),
    'total'        => $wp_query->max_num_pages,
    'prev_next'		=> false,
    'type'         => 'list',
    'end_size'     => 3,
    'mid_size'     => 3,
    'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
  ) );
  echo '</nav>';
} /* end page navi */
