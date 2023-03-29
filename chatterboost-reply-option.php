<?php
// Add button to comment row actions
function chatterboost_add_button_to_comment_row_actions($actions, $comment) {
    $actions['chatterboost_reply'] = '<a href="#" class="chatterboost-reply">' . __( 'Responder con ChatterBoosT AI', 'chatterboost' ) . '</a>';
    return $actions;
}
add_filter('comment_row_actions', 'chatterboost_add_button_to_comment_row_actions', 10, 2);
