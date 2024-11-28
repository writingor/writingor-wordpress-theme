<?php
add_action('wp_ajax_writingor_contact_form', 'writingor_contact_form');
add_action('wp_ajax_nopriv_writingor_contact_form', 'writingor_contact_form');  

function writingor_contact_form() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        /**
         * Prepare response
         */
        $response = [
            'error' => [
                'count' => 0,
                'text' => '',
                'field' => ''
            ],
            'success' => false
        ];

        if (wp_verify_nonce($_POST['nonce'], 'writingor_nonce')) {
            /**
             * Get data
             */
            $contact = sanitize_text_field($_POST['contact']);
            $message = sanitize_textarea_field($_POST['message']);

            /**
             * Check data
             */
            if (!$contact) {
                $response['error']['count'] += 1;
                $response['error']['text'] += 'Enter your contact please.';
                $response['error']['field'] += 'contact';
            }

            /**
             * Send E-mail
             */
            if ($response['error']['count'] === 0) {
                $subject = 'Message from ' . $contact;
                $body = "Contact: $contact\nMessage:\n$message";
                $response['success'] = wp_mail(get_option('admin_email'), $subject, $body);
            }
        }

        /**
         * Return JSON
         */
        echo json_encode($response);

    } else {
        header("Location: /");
    }

    wp_die();
}
