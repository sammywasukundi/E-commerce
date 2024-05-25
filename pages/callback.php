<?php
// Process the callback from MaishaPay
$data = json_decode(file_get_contents('php://input'), true);

if ($data['status'] == 'completed') {
    // Payment was successful
    // You can update your database here
    file_put_contents('log.txt', print_r($data, true), FILE_APPEND);
} else {
    // Payment failed or was canceled
    file_put_contents('log.txt', 'Payment failed or canceled', FILE_APPEND);
}
?>
