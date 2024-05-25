<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = $_POST['amount'];
    
    // Replace these variables with your MaishaPay test API keys and endpoint
    $api_url = "https://api.maisapay.com/v1/payments";
    $api_key = "your_test_api_key";
    $api_secret = "your_test_api_secret";
    
    // Data to be sent to the API
    $data = array(
        "amount" => $amount,
        "currency" => "USD",
        "description" => "Test Payment",
        // Additional required fields for MaishaPay
        "callback_url" => "https://yourwebsite.com/callback.php",
        "redirect_url" => "https://yourwebsite.com/thank_you.php"
    );

    // Initialize cURL
    $ch = curl_init($api_url);
    
    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Basic ' . base64_encode("$api_key:$api_secret")
    ));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    
    // Execute the request
    $response = curl_exec($ch);
    
    // Check for errors
    if ($response === false) {
        die('Error: ' . curl_error($ch));
    }
    
    // Close the cURL session
    curl_close($ch);
    
    // Process the response
    $response_data = json_decode($response, true);
    
    if ($response_data['status'] == 'success') {
        // Redirect to the payment page
        header('Location: ' . $response_data['payment_url']);
        exit();
    } else {
        echo 'Payment failed: ' . $response_data['message'];
    }
} else {
    die('Invalid request method');
}
?>
