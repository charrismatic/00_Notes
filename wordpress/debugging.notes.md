HOW TO PRINT THE QUERY OF WP_QUERY THAT WAS JUST EXECUTED;

$recent_query->request;

$args = array(
    'post_type'      => 'page',
    'post__in'       => array(get_the_ID()),
    'posts_per_page' => -1,
);

$pageloop = new WP_Query($args);
echo $pageloop->request;
while ($pageloop->have_posts()) : $pageloop->the_post(); 
