add_filter(
    'rest_request_after_callbacks',
    function( $response, array $handler, \WP_REST_Request $request ) {
        if ( is_get_posts_request( $request ) ) {
            mutate_get_posts_response( $response );
        }
        return $response;
    },
    10,
    3
);

function is_get_posts_request( \WP_REST_Request $request ) {
    return '/wp/v2/posts' === $request->get_route()
        && 'GET' === $request->get_method();
}

function mutate_get_posts_response( $response ) {
    if ( ! ( $response instanceof \WP_REST_Response ) ) {
        return;
    }
    $data = array_map(
        'prefix_post_response',
        $response->get_data()
    );
    $response->set_data( $data );
}

function prefix_post_response( array $post ) {
    if ( isset( $post['title']['rendered'] ) ) {
		$post_data = get_post(88); // passing somethig stuff like that
        $post['title']['rendered'] = '[TEST] ' . $post['title']['rendered'];
        $post['c_data']['rendered'] = $post_data;
    }
    return $post;
}
