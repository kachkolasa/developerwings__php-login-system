<?php
$secret = 'your-secret-key';
$response = $_POST['g-recaptcha-response'];
$remoteip = $_SERVER['REMOTE_ADDR'];

$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = [
  'secret' => $secret,
  'response' => $response,
  'remoteip' => $remoteip
];
$options = [
  'http' => [
    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
    'method'  => 'POST',
    'content' => http_build_query($data)
  ]
];
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$responseData = json_decode($result);
if ($responseData->success) {
  // Captcha was successful, process login
} else {
  // Captcha was unsuccessful, display error message
  echo 'Please complete the captcha to prove that you are not a bot.';
}
