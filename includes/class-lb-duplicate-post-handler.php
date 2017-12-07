<?php
/**
 * Duplicate post handler
 */

class LB_Duplicate_Post_Handler {

	/**
	 * A reference to an instance of this class.
	 *
	 * @since 1.0.0
	 * @var   object
	 */
	private static $instance = null;

	protected $nonce = 'lb-duplicate-post';

	/**
	 * Initalize plugin actions
	 *
	 * @return void
	 */
	public function init() {

		add_filter( 'page_row_actions', array( $this, 'add_duplicate_link' ), 10, 2 );
		add_filter( 'post_row_actions', array( $this, 'add_duplicate_link' ), 10, 2 );

		// Process additional data
		add_action( 'lb_duplicate_post_handler', array( $this, 'set_thumbnail' ), 10, 2 );
		add_action( 'lb_duplicate_post_handler', array( $this, 'set_meta' ), 10, 2 );
		add_action( 'lb_duplicate_post_handler', array( $this, 'set_terms' ), 10, 3 );

		add_action( 'wp_ajax_' . $this->nonce, array( $this, 'duplicate_handler' ) );
	}

	/**
	 * Insert Duplicate link into posts actions.
	 *
	 * @param  array   $actions Existsing actions array.
	 * @param  WP_Post $post    Current post object.
	 * @return array
	 */
	public function add_duplicate_link( $actions, $post ) {

		$actions['lb-duplicate'] = sprintf(
			'<a href="%2$s" aria-label="%1$s">%1$s</a>',
			esc_html__( 'Duplicate', 'duplicate-post-littlebizzy' ),
			$this->get_duplicate_url( $post->ID )
		);

		return $actions;
	}

	/**
	 * Returns duplicate post URL
	 *
	 * @return string
	 */
	public function get_duplicate_url( $post_id ) {

		global $wp;

		return add_query_arg(
			array(
				'action' => $this->nonce,
				'post'   => $post_id,
				'ref'    => urlencode( add_query_arg( $wp->query_string, '', home_url( $wp->request ) ) ),
				'_nonce' => wp_create_nonce( $this->nonce )
			),
			esc_url( admin_url( 'admin-ajax.php' ) )
		);

	}

	/**
	 * Set post thumbnail for new post.
	 *
	 * @param int $new_id New post ID.
	 * @param int $old_id Old post ID.
	 */
	public function set_thumbnail( $new_id, $old_id ) {

		if ( ! has_post_thumbnail( $old_id ) ) {
			return;
		}

		$thumb_id = get_post_thumbnail_id( $old_id );

		set_post_thumbnail( $new_id, $thumb_id );

	}

	/**
	 * Set post meta data.
	 *
	 * @param int $new_id New post ID.
	 * @param int $old_id Old post ID.
	 */
	public function set_meta( $new_id, $old_id ) {

		$meta_keys = get_post_custom_keys( $old_id );

		if ( empty( $meta_keys ) ) {
			return;
		}

		$skip_meta = array(
			'_edit_lock',
			'_edit_last',
			'_thumbnail_id',
		);

		$meta_keys = array_diff( $meta_keys, $skip_meta );

		foreach ( $meta_keys as $meta_key ) {

			$meta_values = get_post_custom_values( $meta_key, $old_id );

			foreach ($meta_values as $meta_value) {

				$meta_value = maybe_unserialize( $meta_value );
				add_post_meta(
					$new_id,
					$meta_key,
					map_deep( $meta_value, array( $this, 'addslashes_to_strings_only' ) )
				);

			}
		}
	}

	/**
	 * Set new post terms.
	 *
	 * @param int   $new_id   New post ID.
	 * @param int   $old_id   Old post ID.
	 * @param array $old_post
	 */
	public function set_terms( $new_id, $old_id, $old_post ) {

		if ( empty( $old_post['post_type'] ) ) {
			return;
		}

		$taxonomies = get_object_taxonomies( $old_post['post_type'], $output );
		$taxonomies = array_keys( $taxonomies );

		foreach ( $taxonomies as $tax ) {

			$terms = wp_get_object_terms( $old_id, $tax );
			$terms = wp_list_pluck( $terms, 'term_id' );

			if ( ! empty( $terms ) ) {
				wp_set_object_terms( $new_id, $terms, $tax );
			}

		}

	}

	/**
	 * Addslashes callback
	 *
	 * @param  mixed $value Input value.
	 * @return mixed
	 */
	public function addslashes_to_strings_only( $value ) {
		return is_string( $value ) ? addslashes( $value ) : $value;
	}

	/**
	 * Redirect URL
	 *
	 * @return string
	 */
	public function redirect_url() {

		if ( ! isset( $_REQUEST['ref'] ) ) {
			return false;
		}

		return urldecode( $_REQUEST['ref'] );

	}

	/**
	 * Process post duplicating
	 *
	 * @return void
	 */
	public function duplicate_handler() {

		if ( ! current_user_can( 'publish_posts' ) ) {
			wp_die(
				esc_html__( 'Stop cheating please!', 'duplicate-post-littlebizzy' ),
				esc_html__( 'Stop cheating please!', 'duplicate-post-littlebizzy' )
			);
		}

		$redirect = $this->redirect_url();
		$nonce    = isset( $_REQUEST['_nonce'] ) ? $_REQUEST['_nonce'] : false;

		if ( ! wp_verify_nonce( $nonce, $this->nonce ) ) {
			wp_redirect( $redirect );
			die();
		}

		$post_id = isset( $_REQUEST['post'] ) ? absint( $_REQUEST['post'] ) : false;

		if ( ! $post_id ) {
			wp_redirect( $redirect );
			die();
		}

		$post = get_post( $post_id, ARRAY_A  );

		unset( $post['ID'] );
		unset( $post['guid'] );
		unset( $post['post_name'] );

		$date = date( 'Y-m-d H:i:s' );

		$post['post_status']       = 'draft';
		$post['post_date']         = $date;
		$post['post_date_gmt']     = $date;
		$post['post_modified']     = $date;
		$post['post_modified_gmt'] = $date;

		$new_post = wp_insert_post( $post );

		if ( $new_post && ! is_wp_error( $new_post ) ) {
			do_action( 'lb_duplicate_post_handler', $new_post, $post_id, $post );
		}

		wp_redirect( $redirect );
		die();

	}

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @return object
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}
}

/**
 * Returns instance of LB_Duplicate_Post_Handler class
 *
 * @return object
 */
function lb_duplicate_post_handler() {
	return LB_Duplicate_Post_Handler::get_instance();
}
