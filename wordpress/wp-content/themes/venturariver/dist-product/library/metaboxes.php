<?php
function log_error($message){
  if (WP_DEBUG === true) {
    if (is_array($message) || is_object($message)) {
      error_log(print_r($message, true));
    } else {
      error_log($message);
    }
  }

}
global $post;

if(isset($_GET['post']))
  $post_id = $_GET['post'] ;
elseif(isset($_POST['post_ID']))
  $post_id = $_POST['post_ID'] ;

if(isset($post_id))
  $template_file = get_post_meta($post_id,'_wp_page_template',TRUE);

/*********************
 *********************
 *********************
 *********************
 ******ADD Metas******
 *********************
 *********************
 *********************
 *********************
 */
function add_custom_boxes(){
  global $post;
  if(isset($post)){
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;

    $template_file = get_post_meta($post_id,'_wp_page_template',TRUE);


    // Add Home-page metas
    if($template_file == 'templates/page-home.php'){
      add_meta_box( 'home_left_column', __( 'Top Column', 'home_left_column' ), 'home_left_column', 'page' );
      add_meta_box( 'home_center_left_column', __( 'Middle Column', 'home_center_left_column' ), 'home_center_left_column', 'page' );
      add_meta_box( 'home_center_right_column', __( 'Bottom Column', 'home_center_right_column' ), 'home_center_right_column', 'page' );
      remove_post_type_support('page','editor');
    }
    elseif($template_file == 'default'){
      add_meta_box( 'default_main_body', __( 'Main body', 'default_main_body' ), 'default_main_body', 'page' );
    }
  }
}

/******************
 *  GENERIC PAGE template
 */
function default_main_body($post){
  wp_nonce_field( basename( __FILE__ ), 'page_body_nonce' );
  $stored_meta = get_post_meta( $post->ID);
?>
    <p>
        <label for="page_body" class="prfx-row-title"><?php _e( 'Main Content Body', 'prfx-textdomain' )?></label>
                <!-- Create / Call The TinyMCE Editor -->
<?php
  if(isset($stored_meta['page_body'])){
    $meta_additional = $stored_meta['page_body'][0];;
  }else
    $meta_additional = "";
  wp_editor($meta_additional, 'page_body', array(
    'wpautop'               =>      true,
    'media_buttons' =>      true,
    'textarea_name' =>      'page_body',
    'textarea_rows' =>      10,
    'teeny'                 =>      false
  ));
?>
    </p>
<?php
}

/********************
 ***HOMEPAGE METAS***
 ********************
 */
function home_left_column($post){
  wp_nonce_field( basename( __FILE__ ), 'home_left_nonce' );
  $stored_meta = get_post_meta( $post->ID);
?>
    <p>
        <label for="left_column_body" class="prfx-row-title"><?php _e( 'Left Column Body', 'prfx-textdomain' )?></label>
                <!-- Create / Call The TinyMCE Editor -->
<?php
  if(isset($stored_meta['left_column_body'])){
    $meta_additional = $stored_meta['left_column_body'][0];;
  }else
    $meta_additional = "";
  wp_editor($meta_additional, 'left_column_body', array(
    'wpautop'               =>      true,
    'media_buttons' =>      true,
    'textarea_name' =>      'left_column_body',
    'textarea_rows' =>      10,
    'teeny'                 =>      false
  ));
?>
    </p>
<?php
}

function home_center_left_column($post){
  wp_nonce_field( basename( __FILE__ ), 'home_center_left_nonce' );
  $stored_meta = get_post_meta( $post->ID);
?>
    <p>
        <label for="center_left_column_body" class="prfx-row-title"><?php _e( 'Center Left Column Body', 'prfx-textdomain' )?></label>
                <!-- Create / Call The TinyMCE Editor -->
<?php
  if(isset($stored_meta['center_left_column_body'])){
    $meta_additional = $stored_meta['center_left_column_body'][0];;
  }else
    $meta_additional = "";
  wp_editor($meta_additional, 'center_left_column_body', array(
    'wpautop'               =>      true,
    'media_buttons' =>      true,
    'textarea_name' =>      'center_left_column_body',
    'textarea_rows' =>      10,
    'teeny'                 =>      false
  ));
?>
    </p>
<?php
}

function home_center_right_column($post){
  wp_nonce_field( basename( __FILE__ ), 'home_center_right_nonce' );
  $stored_meta = get_post_meta( $post->ID);
?>
    <p>
        <label for="center_right_column_body" class="prfx-row-title"><?php _e( 'Center Right Column Body', 'prfx-textdomain' )?></label>
                <!-- Create / Call The TinyMCE Editor -->
<?php
  if(isset($stored_meta['center_right_column_body'])){
    $meta_additional = $stored_meta['center_right_column_body'][0];;
  }else
    $meta_additional = "";
  wp_editor($meta_additional, 'center_right_column_body', array(
    'wpautop'               =>      true,
    'media_buttons' =>      true,
    'textarea_name' =>      'center_right_column_body',
    'textarea_rows' =>      10,
    'teeny'                 =>      false
  ));
?>
    </p>
<?php
}


function save_page_metas($post_id){
  global $post;
  // Checks save status
  $is_autosave = wp_is_post_autosave( $post_id );
  $is_revision = wp_is_post_revision( $post_id );


  $is_valid_nonce = ( isset( $_POST[ 'page_body_nonce' ] ) && wp_verify_nonce( $_POST[ 'page_body_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
  if($is_valid_nonce){
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
      return;
    }
    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'page_body' ] ) ) {
      update_post_meta( $post_id, 'page_body', $_POST[ 'page_body' ]  );
    }
  }
}

function save_home_metas($post_id){
  global $post;
  // Checks save status
  $is_autosave = wp_is_post_autosave( $post_id );
  $is_revision = wp_is_post_revision( $post_id );

  error_log("Wtf");

  $is_valid_nonce = ( isset( $_POST[ 'home_left_nonce' ] ) && wp_verify_nonce( $_POST[ 'home_left_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
  if($is_valid_nonce){
    $is_valid_nonce = ( isset( $_POST[ 'home_right_nonce' ] ) && wp_verify_nonce( $_POST[ 'home_right_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if($is_valid_nonce){
      $is_valid_nonce = ( isset( $_POST[ 'home_center_left_nonce' ] ) && wp_verify_nonce( $_POST[ 'home_center_left_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
      if($is_valid_nonce){
        $is_valid_nonce = ( isset( $_POST[ 'home_center_right_nonce' ] ) && wp_verify_nonce( $_POST[ 'home_center_left_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
        if($is_valid_nonce){
          // Exits script depending on save status
          if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
            return;
          }
          // Checks for input and sanitizes/saves if needed
          if( isset( $_POST[ 'left_column_body' ] ) ) {
            update_post_meta( $post_id, 'left_column_body', $_POST[ 'left_column_body' ]  );
          }
          if( isset( $_POST[ 'center_left_column_body' ] ) ) {
            update_post_meta( $post_id, 'center_left_column_body', $_POST[ 'center_left_column_body' ]  );
          }
          if( isset( $_POST[ 'center_right_column_body' ] ) ) {
            update_post_meta( $post_id, 'center_right_column_body', $_POST[ 'center_right_column_body' ]  );
          }
        }
      }
    }
  }
}

add_action ('add_meta_boxes', 'add_custom_boxes');

// Add Home-page metas
if(isset($template_file) && $template_file == 'templates/page-home.php'){
  add_action ('save_post', 'save_home_metas');
}
if(isset($template_file) && $template_file == 'default'){
  add_action('save_post', 'save_page_metas');
}
?>
