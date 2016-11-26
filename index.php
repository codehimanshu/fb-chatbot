<?php
$accessToken = "EAASb5TsHYK8BABHqcIhdCEQKrCvQGm7d8EV3HaurBmQC6MPNq2ZB0DlvMXWVdnS45N9ZAwbUiJwtqWeLILjHIPSjTdVr7JdNTQc3iLCFFIla9t4iBpOO8F79kmx53IGLzslGgx38uftM0wqNPCsJcG7O3tNVJXv2rtUHUkJwZDZD";
$input = json_decode(file_get_contents('php://input'), true);
$senderId = $input['entry'][0]['messaging'][0]['sender']['id'];
$messageText = $input['entry'][0]['messaging'][0]['message']['text'];
$answer = "I don't understand. Ask me 'hi'.";
if($messageText == "hi") {
    $answer = "Hello";
}
$response = [
    'recipient' => [ 'id' => $senderId ],
    'message' => [ 'text' => $answer ]
];
$ch = curl_init('https://graph.facebook.com/v2.6/me/messages?access_token='.$accessToken);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_exec($ch);
curl_close($ch);
?>