<?php
// SHort codes for Modals

// Add Shortcode
function sls_modal_shortcode( $atts , $content = null ) {

    // Attributes
    extract( shortcode_atts(
        array(
            'id' => 'modal-1',
            'button_class' => 'default',
            'header_text' => 'Modal Header', // add more attributes as needed, use the 'esc_attr($att_name) to display it 
        ), $atts )
    );

    // code
    ob_start();
    $modal = '<div id="' . esc_attr($id) . '" class="modal fade" role="dialog" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title">' . esc_attr($header_text) . '</h3>
          </div>
          <div class="modal-body">
            ' . $content . ' 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
    <button type="button" class="btn btn-' . esc_attr($button_class) . ' btn-medium" data-toggle="modal" data-target="#' . esc_attr($id) . '">Learn More</button>';
    $modal .= ob_get_contents();
    ob_end_clean();
    return $modal;
    }

add_shortcode( 'sls-modal', 'sls_modal_shortcode' );
?>
