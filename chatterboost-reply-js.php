<?php
// Add JavaScript code to handle ChatGPT reply
function chatterboost_add_js_to_comment_page()
{
    $openai_api_key = get_option('openai_api_key');
    ?>
    <script>
        jQuery(document).ready(function ($) {
            // Add click handler to "Reply with ChatGPT" button
            $('.chatterboost-reply').click(function () {
                var commentId = $(this).closest('tr').attr('id').replace('comment-', '');
                $('#comment-' + commentId + ' .row-actions .reply button').click();
                chatterboost_reply(commentId);
                return false;
            });

            function chatterboost_reply(comment_id) {
                var comment_text = $('#comment-' + comment_id + ' .column-comment').text().trim();
                var editRow = $('#replyrow');
                $('#replysubmit .spinner').addClass('is-active');
                var apiKey = "<?php echo esc_attr($openai_api_key); ?>";
                $.ajax({
                    type: "POST",
                    url: "https://api.openai.com/v1/completions",
                    headers: {
                        "Content-Type": "application/json",
                        "Authorization": "Bearer " + apiKey
                    },
                    data: JSON.stringify({
                        "model": "text-davinci-003",
                        "prompt": 'Responde el siguiente comentario en un tono de voz amable, persuasivo y profesional: ' + comment_text + '.',
                        "max_tokens": 1024,
                        "temperature": 0.5
                    }),
                    success: function (response) {
                        var choices = response.choices;
                        if (choices.length > 0) {
                            var choice = choices[0];
                            var reply_text = choice.text;
                            $('#replycontent', editRow).val(reply_text);
                            $('#replysubmit .spinner').removeClass('is-active');
                        }
                    }
                });
            }
        });


    </script>
    <?php
}
add_action('admin_footer-edit-comments.php', 'chatterboost_add_js_to_comment_page');